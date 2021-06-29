<?php 
function bulksmsdetails($number, $text) {
	       
    $url = 'http://aakashsms.com/admin/public/sms/v1/send';
    $postData['auth_token'] = "1955db2f23a27d4e6226a604873c922614f72e6c94547d5035932efe8e9a4989";
    $postData['from'] = 31001;
    $postData['to'] = $number;
    $postData['text'] = $text;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    $result = curl_exec($ch);
    curl_close($ch);
    
    $json = json_decode($result, true);

    return $json;
}
if(isset($_POST['submit'])){
    $number = filter_var($_POST['number'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    $got = bulksmsdetails($number, $message);
    echo $got['response'];
    die();
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center>
    <form method="POST" >
    <label>
    Number:
        <input type="text" placeholder="Mobile Number" name="number"/>
    </label>
    <br>
    <label>
    Message:
        <textarea name="message"></textarea>
    </label>
    <br>
            <input value="Send Message" type="submit" name="submit"/>
    </form>
    <center>
</body>
</html>
