
<!-- ================================================ -->

<body>

    <head>
        <title>Sending SMS</title>
    </head>

    <form method="post">
        <label>Mobile NUMBER</label>
        <input type="text" name="mobile" autofocus>
        <br><br>
        <label>Enter Message</label>
        <input type="text" name="message">

        <input type="submit" name="submit">
    </form>
</body>


<?php
if (isset($_POST['submit'])){
    $mobile =$_POST['mobile']; $message = $_POST['message'];

$apiKey = urlencode('7778ed15bc2a8d0baaf6ba20efc1007e');
$sender = urlencode('POPeye');
$numbers = array($mobile);
$message = rawurldecode('today so blue');
$data = array('apiKey' => $apiKey, 'mobile' => $numbers, 
'sender' => $sender, 'message' => $message);

$ch = curl_init('https://api-v2.thaibulksms.com');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
$response = curl_exec($ch);
curl_close($ch);
echo $response; 

}

// $sms = new  \THAIBULKSMS_API\SMS\SMS($apiKey, $apiSecretKey);

// $body = [
//     'msisdn' => $_POST['num'],
//     'message' => $_POST['message'],
// ];
// $res = $sms->sendSMS($body);

// if ($res->httpStatusCode == 201) {
//     echo "Successful";
//     var_dump($res);
// } else {
//     echo "Error";
//     var_dump($res);
// }

// $curl = curl_init();

// curl_setopt_array($curl, [
//     CURLOPT_URL => "https://api-v2.thaibulksms.com/sms",
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_ENCODING => "",
//     CURLOPT_MAXREDIRS => 10,
//     CURLOPT_TIMEOUT => 30,
//     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//     CURLOPT_CUSTOMREQUEST => "POST",
//     CURLOPT_HTTPHEADER => [
//         "Accept: application/json",
//         "Content-Type: application/x-www-form-urlencoded"
//     ],
// ]);

// $response = curl_exec($curl);
// $err = curl_error($curl);

// curl_close($curl);

// if ($err) {
//     echo "cURL Error #:" . $err;
// } else {
//     echo $response;
// }
