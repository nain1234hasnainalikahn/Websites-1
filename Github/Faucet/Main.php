<?php
$sitekey = '6a75bac3-bdf5-43c2-a56f-1da35e0c230f';
$secretkey = '0x405dF20A566e06AF36Fd77161B037dA4026Cb74A';
$apiKey = '28c33f1539db39ea4784265af40bd7786d47dee2c50768f4aae5382e5e5b6ec0';

if (isset($_POST["submit"])) {
    $recipientAddress = $_POST['address'];
    $response = $_POST['h-captcha-response'];

    if (empty($recipientAddress)) {
        $_SESSION['error'] = "Error: FaucetPay BTC address is required.";
    } elseif (empty($response)) {
        $_SESSION['error'] = "Error: Please solve the hCaptcha.";
    } elseif (validateBTCAddress($recipientAddress)) {
        // Verify hCaptcha
        $verifyUrl = 'https://hcaptcha.com/siteverify';
        $data = array(
            'secret' => $secretkey,
            'response' => $response
        );

        $options = array(
            'http' => array(
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context = stream_context_create($options);
        $verify = file_get_contents($verifyUrl, false, $context);
        $captchaSuccess = json_decode($verify);

        if ($captchaSuccess->success) {
            // Check the last claim time
            $lastClaimTime = isset($_SESSION['last_claim_time']) ? $_SESSION['last_claim_time'] : 0;
            $currentTime = time();
            $timeDiff = $currentTime - $lastClaimTime;

            if ($timeDiff >= 600) {
                // Generate a random amount between 1 and 6 satoshis
                $amount = rand(1, 6);

                // Send satoshis via FaucetPay API
                $apiUrl = "https://faucetpay.io/api/v1/send";
                $params = array(
                    "api_key" => $apiKey,
                    "to" => $recipientAddress,
                    "currency" => "BTC",
                    "amount" => $amount
                );

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $apiUrl);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $response = curl_exec($ch);
                curl_close($ch);

                $responseData = json_decode($response, true);

                if ($responseData && $responseData["status"] == 200) {
                    // Update last claim time
                    $_SESSION['last_claim_time'] = $currentTime;

                    // Set timer active in session
                    $_SESSION['timer_active'] = true;

                    // Display success message (without timer)
                    $_SESSION['error'] = "Congratulations! You received $amount satoshis.";

                    // Redirect to the same page
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit();
                } else {
                    $_SESSION['error'] = "Failed to send satoshis. Error: " . $responseData["message"];
                }
            } else {
                // Display error message if the time gap is not yet reached
                $_SESSION['error'] = "You can claim again in " . (600 - $timeDiff) . " seconds.";
            }
        } else {
            $_SESSION['error'] = "Invalid hCaptcha.";
        }
    } else {
        $_SESSION['error'] = "Invalid BTC address format.";
    }
}

function validateBTCAddress($address) {
    $pattern = '/^(bc1|[13])[a-zA-HJ-NP-Z0-9]{25,39}$/';
    return preg_match($pattern, $address);
}

$apiUrl = $apiKey;
$faucetpaybalance = fetchFaucetPayBalance($apiUrl);

function fetchFaucetPayBalance($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $responseData = json_decode($response, true);
    return isset($responseData['faucetpaybalance']) ? $responseData['faucetpaybalance'] : 0;
}
?>