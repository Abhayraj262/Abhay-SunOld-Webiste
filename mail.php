<?php
require __DIR__ . '/vendor/autoload.php'; // Include Google Client Library

use Google\Client;
use Google\Service\Sheets;

if (isset($_POST['submit'])) {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $message = $_POST['Message'];

    // Email information
    $to = "project12.sun@gmail.com";  // Replace with your Gmail
    $subject = "New Contact Us Submission";
    $headers = "From: " . $email;

    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Message: $message\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
    }

    // Save to Google Sheet
    $client = new Client();
    $client->setApplicationName('Google Sheets API Integration');
    $client->setScopes([Sheets::SPREADSHEETS]);
    $client->setAuthConfig('credentials.json'); // Path to the downloaded credentials.json file
    $client->setAccessType('offline');

    $service = new Sheets($client);
    $spreadsheetId = '1MHfpjKz5iGjmrszDYKWov7Pz3P74gL3Qbil4DcCxGXA'; // Replace with your Google Sheet ID
    $range = 'Sheet1!A:D'; // Range where you want to add data

    $values = [
        [$name, $email, $phone, $message]
    ];

    $body = new Sheets\ValueRange([
        'values' => $values
    ]);

    $params = [
        'valueInputOption' => 'RAW'
    ];

    $result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);

    if ($result) {
        echo "Data saved to Google Sheet successfully!";
    } else {
        echo "Failed to save data to Google Sheet.";
    }
}
?>
