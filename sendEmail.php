<?php

$name = $_POST['Name'];
$email = $_POST['Email'];
$phone = $_POST['Phone'];
$company = $_POST['Company'];
$product = $_POST['Product'];
$message = $_POST['Message'];
$fromurl = $_POST['from_page'];


$name_regex = "/^(?!.*\bhttps?:\/\/)[a-zA-Z ]{1,15}$/";
$email_regex = "/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9_]+\.[a-zA-Z]{2,5}$/";
$mobile_regex = "/^[6-9]{1}[0-9]{9}$/";
$message_regex = "/^(?!.*\bhttps?:\/\/)[0-9a-zA-Z.,-: ]{1,60}$/";

if (!preg_match($name_regex, $name)) {
    echo "Name should be in proper format and up to 15 characters.";
    exit();
} elseif (!preg_match($email_regex, $email)) {
    echo "Email should be in proper format.";
    exit();
} elseif (!preg_match($mobile_regex, $phone)) {
    echo "Mobile should be a valid 10-digit Indian number.";
    exit();
} elseif (!preg_match($message_regex, $message)) {
    echo "Message should be in proper format and up to 60 characters.";
    exit();
}

// Check if any field contains a URL
$fields = [$name, $email, $phone, $company, $product, $message];
foreach ($fields as $field) {
    if (preg_match("/\bhttps?:\/\/\b/", $field)) {
        echo "URLs are not allowed in any fields.";
        exit();
    }
}

if (empty($name) || empty($email) || empty($phone)) {
    echo 'Please correct the fields';
    return false;
}

function writeToGoogleSheet($name, $email, $phone, $message, $company, $product) {
    $date = date('Y-m-d');
    $gs_sid = '1Ra6jIggyswr6pl16IAcQGvYzLpIr0mNdZKzEXVney5A';
    $gs_clid = '1026589435923-e0ti1j2cnvn6msq4r0u50nfj29rqs4ui.apps.googleusercontent.com';
    $gs_clis = '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'; 
    $gs_rtok = '1//0gnGV7cUd3B7eCgYIARAAGBASNwF-L9Ir2yd9Fl7D4LWnfM5vosMJNimXzYoLDSBbugDrQtzUkFyF6RWzvLuH-7TA6u6TlO3AL-U';
    $gs_url = 'https://sheets.googleapis.com/v4/spreadsheets/'.$gs_sid.'/values/A1:append?includeValuesInResponse=true&insertDataOption=INSERT_ROWS&responseDateTimeRenderOption=SERIAL_NUMBER&responseValueRenderOption=FORMATTED_VALUE&valueInputOption=RAW';
    $data = array($date, $name, $email, $phone, $message, $company, $product);
    $rows = '"' . implode('","', $data) . '"';
    $gs_body = '{"majorDimension":"ROWS", "values":[[' . $rows . ']]}';

    $session = curl_init("https://www.googleapis.com/oauth2/v4/token?client_id=" . $gs_clid . "&client_secret=" . $gs_clis . "&refresh_token=" . $gs_rtok . "&grant_type=refresh_token");
    curl_setopt($session, CURLOPT_POST, true);
    curl_setopt($session, CURLOPT_HEADER, false);
    curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

    $response = json_decode(curl_exec($session), true);
    curl_close($session);
    $access_token = $response['access_token'];

    $headr = array();
    $headr[] = 'Content-type: application/json';
    $headr[] = 'Authorization: Bearer ' . $access_token;

    $session2 = curl_init($gs_url);
    curl_setopt($session2, CURLOPT_POST, true);
    curl_setopt($session2, CURLOPT_HTTPHEADER, $headr);
    curl_setopt($session2, CURLOPT_POSTFIELDS, $gs_body);
    curl_setopt($session2, CURLOPT_RETURNTRANSFER, true);
    $response2 = curl_exec($session2);

    curl_close($session2);
}

$ip = $_SERVER["REMOTE_ADDR"];
$geo = json_decode(file_get_contents("http://ipinfo.io/" . $ip . "/json"));
$city = $geo->city;
$region = $geo->region;
$country = $geo->country;

writeToGoogleSheet($name, $email, $phone, $message, $company, $product);

$subject = "Enquiry from sunconsaltants.in website";

$body = "<table border='1' width='400'>";
$body .= "<tr><td><b>Name:</td><td>" . $name . "</b></td></tr>";
$body .= "<tr><td><b>Email:</td><td>" . $email . "</b></td></tr>";
$body .= "<tr><td><b>Phone:</td><td>" . $phone . "</b></td></tr>";
$body .= "<tr><td><b>Message:</td><td>" . $message . "</b></td></tr>";
$body .= "<tr><td><b>From Page</b> :</td><td>".$fromurl."</td></tr>";
$body .= "</table>";

$header = "From:sunconsultants.co.in\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";

$mail_array = array('sunconsaltantsinfo@gmail.com');

foreach ($mail_array as $to) {
    $retval = mail($to, $subject, $body, $header);
}

if ($retval == true) {
    header("Location: https://sunconsultants.co.in/thank-you/");
} else {
    echo "Message could not be sent...";
}

?>
