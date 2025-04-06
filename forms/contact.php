<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Make sure PHPMailer is installed via Composer

$mail = new PHPMailer(true);

try {
    // SMTP Settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'divyamane179@gmail.com'; 
    $mail->Password = 'hlxr axse iliq tbwa';   
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Email Details
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('divyamane179@gmail.com'); // Your receiving email
    $mail->Subject = $_POST['subject'];
    $mail->Body = nl2br($_POST['message']);
    $mail->isHTML(true);

    // Send Email
    if ($mail->send()) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send the message.";
    }
} catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}";
}
?>