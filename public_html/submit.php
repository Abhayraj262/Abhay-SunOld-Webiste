<?php

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$message = $_POST['message'];
$fromurl = $_POST['from_page'];


  
        // Verified - send email
		
$name_regex = "/^[a-zA-Z ]+$/";
$email_regex = "/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9_]+\.[a-zA-Z]{2,5}$/";
$mobile_regex = "/^[0-9]{10}$/";
$message_regex ="/\b(?:(?:https?|ftp|http):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";

  
        // Verified - send email
		
 if(!preg_match($name_regex,$name)){
        echo "Please enter only letters in Name";
        exit();
        }else if(!preg_match($email_regex,$email)){
            echo "Email should be in proper format";
            exit();
        }else if(!preg_match($mobile_regex,$mobile)){
            echo "Mobile Number Should Be In Proper Format";
            exit();
        }else if(preg_match($message_regex,$message)){
            echo "Please enter only letters in Message";
            exit();
        } else if(strlen($message) > 500){
            echo "Please enter only 500 letters in Message";
            exit();
        }
    

    
    
     if (empty($name) && empty($email) && empty($mobile) && empty($message)) {
    echo 'Please correct the fields';
    exit;}

function writeToGoogleSheet($name, $email, $mobile, $message, $fromurl) {
    $date = date('Y-m-d');
    $gs_sid = '1Ra6jIggyswr6pl16IAcQGvYzLpIr0mNdZKzEXVney5A';
    $gs_clid = '1026589435923-e0ti1j2cnvn6msq4r0u50nfj29rqs4ui.apps.googleusercontent.com';
    $gs_clis = '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'; 
    $gs_rtok = '1//0gnGV7cUd3B7eCgYIARAAGBASNwF-L9Ir2yd9Fl7D4LWnfM5vosMJNimXzYoLDSBbugDrQtzUkFyF6RWzvLuH-7TA6u6TlO3AL-U';
    $gs_url = 'https://sheets.googleapis.com/v4/spreadsheets/'.$gs_sid.'/values/A1:append?includeValuesInResponse=true&insertDataOption=INSERT_ROWS&responseDateTimeRenderOption=SERIAL_NUMBER&responseValueRenderOption=FORMATTED_VALUE&valueInputOption=RAW';
    $data = array($date, $name, $email, $mobile, $message, $fromurl);
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

writeToGoogleSheet($name, $email, $mobile, $message, $fromurl);
    
	    $subject = 'Hi, I am ' .$name. ' My Requirements Given Below'; 
		$mail_array = array('sunconsultantsinfo@gmail.com');

		$body .= "<table  border='2' width='400'background-color='yellow' >";
		$body .= "<tr><td><b>Name</b> :</td><td>".$name."</td></tr>";
		$body .= "<tr><td><b>Email</b> :</td><td>".$email."</td></tr>";
		$body .= "<tr><td><b>Mobile Number</b> :</td><td>".$mobile."</td></tr>";
		$body .= "<tr><td><b>Message</b> :</td><td>".$message."</td></tr>";
		$body .= "<tr><td><b>From Page</b> :</td><td>".$fromurl."</td></tr>";
		$body .= "<tr><td><b>IP</b> :</td><td>".$_SERVER['REMOTE_ADDR']."</td></tr>";
		$body .= "</table>";
		
	    $header = "From: $name <info@sunconsultants.co.in>\r\n";
		$fromName = 'sunconsultants';

		$admin_header = "MIME-Version: 1.0\n";
		$admin_header .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$admin_header .= 'From: ' . $from . ' ' . "\r\n";

		foreach($mail_array as $email1){
			
			mail($email1, $subject, $body, $admin_header);		
		}
				
		header("location:https://sunconsultants.co.in/thank-you/");
		
?>