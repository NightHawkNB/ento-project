<?php

// Setting the default time zone for the datetime objects
date_default_timezone_set('Asia/Colombo');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../app/middleware/phpmailer/src/Exception.php';
require '../app/middleware/phpmailer/src/PHPMailer.php';
require '../app/middleware/phpmailer/src/SMTP.php';

class Mailer extends Controller {

    public function email_verification(): void
    {

        $code = new Email_code();
        $user_id = $_SESSION['email_verification']['user_id'] ?? $_SESSION['USER_DATA']->user_id;
        $data['email'] = $_SESSION['email_verification']['email'] ?? $_SESSION['USER_DATA']->email;

        if($_SERVER['REQUEST_METHOD'] == "PUT") {
        // Controller for handling mails

            $email = $_SESSION['email_verification']['email'];
            $name = $_SESSION['email_verification']['name'];
            $subject = "Verification Code";
            $verification_code = rand(100000, 999999);
            $body = $verification_code;

            $codeFromDatabase = $code->where(['user_id' => $user_id]);

            if($codeFromDatabase) {
                $code->update($user_id, ['user_id' => $user_id, 'verification_code' => $verification_code]);

                $created_datetime = new DateTime($codeFromDatabase->created_datetime);
                $current_datetime = new DateTime();
                $time_difference = $current_datetime->diff($created_datetime);

                if(!($time_difference->d < 1 && $time_difference->i < 15)) {

                    echo "cannot_update_code|".$time_difference;
                    die;

                } else if (!($time_difference->d < 1 && $time_difference->i < 30)) {

                    // Updating the verification code from the database
                    $code->update($user_id, ['user_id' => $user_id, 'verification_code' => $verification_code]);

                    echo "code_updated";
                    die;

                }

            } else {
                $code->insert(['user_id' => $user_id, 'verification_code' => $verification_code]);
            }


            if(Mailer::sendMail($email, $name, $subject, $body)) echo "success";
            else echo "failed";

            die;

        } else if($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Checking the validity of the entered email verification code

            $codeFromDatabase = $code->where(['user_id' => $user_id]);

            // If there is an active verification code already, replace it with the new code
            if($codeFromDatabase) {
                $codeFromDatabase = $codeFromDatabase[0];
            } else {
                message('The verification code has expired');
                redirect('mailer/email_verification');
            }

            $created_datetime = new DateTime($codeFromDatabase->created_datetime);
            show($created_datetime);

            $current_datetime = new DateTime();
            show($current_datetime);

            $time_difference = $current_datetime->diff($created_datetime);
            show($time_difference);

//            die;

            if(!($time_difference->d < 1 && $time_difference->i < 30)) {

                // Deleting the verification code from the database
                $code->query('DELETE FROM email_verification WHERE user_id = :user_id', ['user_id' => $user_id]);

                message('The verification code has expired');
                redirect('mailer/email_verification');
            }

            if($codeFromDatabase->verification_code == $_POST['pin']) {

                $user = new User();

                // Updating the user as a verified user
                $user->update($user_id, ['user_id' => $user_id, 'verified' => 1]);

                // Deleting the verification code from the database
                $code->query('DELETE FROM email_verification WHERE user_id = :user_id', ['user_id' => $user_id]);

                unset($_SESSION['email_verification']);

                message('Email verification successful. Please Login', false, 'success');
                redirect('login');
            } else {
                message('Invalid Verification Code', false, 'failed');
                redirect('mailer/email_verification');
            }
        }
    
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

            return true;

        } catch (Exception $e) {
//            echo $e;
            return false;
        }
    }

}