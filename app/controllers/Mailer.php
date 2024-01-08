<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../app/middleware/phpmailer/src/Exception.php';
require '../app/middleware/phpmailer/src/PHPMailer.php';
require '../app/middleware/phpmailer/src/SMTP.php';

class Mailer extends Controller {

    public function email_verification() {

        $code = new Email_code();
        $user_id = $_SESSION['email_verification']['user_id'];

        if($_SERVER['REQUEST_METHOD'] == "PUT") {
        // Controller for handling mails

            $email = $_SESSION['email_verification']['email'];
            $name = $_SESSION['email_verification']['name'];
            $subject = "Verification Code";
            $verification_code = rand(100000, 999999);
            
            $code->insert(['user_id' => $user_id, 'verification_code' => $verification_code]);

            if(Mailer::sendMail($email, $name, $subject, $verification_code)) echo "success";
            else echo "failed";

            die;

        } else {

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Checking the validity of the entered email verification code

                $codeFromDatabase = $code->where(['user_id' => $user_id]);
                if($codeFromDatabase) $codeFromDatabase = $codeFromDatabase[0]->verification_code;
                else {
                    message('The verification code has expired');
                    redirect('mailer/email_verification');
                }

                if($codeFromDatabase == $_POST['pin']) {

                    $user = new User();
                    $user->update($user_id, ['user_id' => $user_id, 'verified' => 1]);

                    unset($_SESSION['email_verification']);

                    message('Email verification successful. Please Login', false, 'success');
                    redirect('login');
                } else {
                    message('Invalid Verification Code', false, 'failed');
                    redirect('mailer/email_verification');
                }

            }
            
        }


        $data['email'] = $_SESSION['email_verification']['email'];
    
        $this->view('includes/auth/email_confirmation', $data);
    }


    public static function sendMail($recipient_mail, $recipient_name, $subject, $body) : bool
    {
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP(); //send using smtp

            $mail->SMTPDebug = 0;
            $mail->SMTPAuth = TRUE;
            $mail->SMTPSecure = "tls";
            $mail->Port = 587;

            $mail->Host = "smtp.gmail.com";
            $mail->Username = "developer.ento@gmail.com";
            $mail->Password = "jxacfjpqzmqyptuu";

            $mail->isHTML();
            $mail->addAddress($recipient_mail, $recipient_name);
            $mail->setFrom("developer.ento@gmail.com", "ENTO");
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->send();
            echo "Success"; 
            return true;

        } catch (Exception $e) {
            echo $e;
            echo '\n';
            echo "Error\n";
            return false;
        }
    }

}