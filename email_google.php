<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'public/libs/PHPMailer/vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Konfigurasi server dan pengguna Gmail
    $mail->SMTPDebug = SMTP::DEBUG_OFF;  // Ganti menjadi SMTP::DEBUG_SERVER jika Anda ingin melihat debug server
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'fikriyogi05@gmail.com'; // Ganti dengan alamat email Anda
    $mail->Password = 'ulug rqob xvdl jhil';       // Ganti dengan kata sandi email Anda
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Gunakan ENCRYPTION_SMTPS untuk SSL
    $mail->Port = 587; // Port 465 digunakan jika Anda menggunakan ENCRYPTION_SMTPS

    // Pengaturan email
    $mail->setFrom('youremail@gmail.com', 'Your Name'); // Ganti dengan nama dan alamat email Anda
    $mail->addAddress('recipient@example.com', 'Recipient Name'); // Ganti dengan alamat penerima


    // Baca isi file template email HTML
    // $template = file_get_contents('template_email.html');

    // Ganti teks dalam template
    $teksBaru = 'Halo, Selamat Datang!';
    // $template = str_replace('Selamat datang!', $teksBaru, $template);

    $mail->isHTML(true);
    $mail->Subject = 'Subject of the Email';
    $mail->Body = $teksBaru;


    // Kirim email
    $mail->send();
    echo 'Email telah berhasil dikirim';
} catch (Exception $e) {
    echo "Terjadi kesalahan dalam pengiriman email: {$mail->ErrorInfo}";
}

