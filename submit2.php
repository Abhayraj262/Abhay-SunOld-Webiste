<?php

$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];
$Company = $_POST['Company'];
$Product = $_POST['Product'];
$Message = $_POST['Message'];
$fromurl = $_POST['from_page'];


$name_regex = "/^[a-zA-Z ]+$/";
$email_regex = "/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9_]+\.[a-zA-Z]{2,5}$/";
$mobile_regex = "/^[0-9]{10}$/";
$message_regex ="/\b(?:(?:https?|ftp|http):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";


  
        // Verified - send email
		
//  if(!preg_match($name_regex,$Name)){
//         echo "Please enter only letters in Name";
//         exit();
//         }else if(!preg_match($email_regex,$Email)){
//             echo "Email should be in proper format";
//             exit();
//         }else if(!preg_match($mobile_regex,$Phone)){
//             echo "Mobile Number Should Be In Proper Format";
//             exit();
//         }else if(preg_match($message_regex,$Message)){
//             echo "Please enter only letters in Message";
//             exit();
//         } else if(strlen($Message) > 200){
//             echo "Please enter only 200 letters in Message";
//             exit();
//         }
    

    



function writeToGoogleSheet($Name, $Email, $Phone, $Message, $Company, $Product) {
    $date = date('Y-m-d');
    $gs_sid = '1Ra6jIggyswr6pl16IAcQGvYzLpIr0mNdZKzEXVney5A';
    $gs_clid = '1026589435923-e0ti1j2cnvn6msq4r0u50nfj29rqs4ui.apps.googleusercontent.com';
    $gs_clis = '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'; 
    $gs_rtok = '1//0gnGV7cUd3B7eCgYIARAAGBASNwF-L9Ir2yd9Fl7D4LWnfM5vosMJNimXzYoLDSBbugDrQtzUkFyF6RWzvLuH-7TA6u6TlO3AL-U';
    $gs_url = 'https://sheets.googleapis.com/v4/spreadsheets/'.$gs_sid.'/values/A1:append?includeValuesInResponse=true&insertDataOption=INSERT_ROWS&responseDateTimeRenderOption=SERIAL_NUMBER&responseValueRenderOption=FORMATTED_VALUE&valueInputOption=RAW';
    $data = array($date, $Name, $Email, $Phone, $Message, $Company, $Product);
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

writeToGoogleSheet($Name, $Email, $Phone, $Message, $Company, $Product);


    
    	$subject = 'Hi, I am ' .$Name. ' My Requirements Given Below'; 
		

		$body .= "<table  border='2' width='400'background-color='yellow' >";
		$body .= "<tr><td><b>Name</b> :</td><td>".$Name."</td></tr>";
		$body .= "<tr><td><b>Email</b> :</td><td>".$Email."</td></tr>";
		$body .= "<tr><td><b>Mobile Number</b> :</td><td>".$Phone."</td></tr>";
		$body .= "<tr><td><b>Company</b> :</td><td>".$Company."</td></tr>";
		$body .= "<tr><td><b>Product</b> :</td><td>".$Product."</td></tr>";
		$body .= "<tr><td><b>Message</b> :</td><td>".$Message."</td></tr>";
			$body .= "<tr><td><b>From Page</b> :</td><td>".$fromurl."</td></tr>";
		$body .= "</table>";
		$header = "From: $name <info@sunconsultants.co.in>\r\n";
		$from = 'sunconsultants.co.in';
		$fromName = 'sunconsultants';

		$admin_header = "MIME-Version: 1.0\r\n";
		$admin_header .= 'Content-type: text/html; charset=iso-8859-1' . "\r \n";
		$admin_header .= 'From: ' . $from . ' ' . "\r\n";
		$mail_array = array('sunconsultantsinfo@gmail.com');//array('sunconsultantsinfo@gmail.com');
		

		foreach($mail_array as $email1){
			
			mail($email1, $subject, $body, $admin_header);		
		}
		
				
		header("location:https://sunconsultants.co.in/thank-you/");
?>