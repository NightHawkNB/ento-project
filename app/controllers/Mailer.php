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

            $email = $_SESSION['email_verification']['email'] ?? $_SESSION['USER_DATA']->email;
            $name = $_SESSION['email_verification']['name']  ?? ($_SESSION['USER_DATA']->fname. " " . $_SESSION['USER_DATA']->lname);
            $subject = "Verification Code";
            $verification_code = rand(100000, 999999);

            $codeFromDatabase = $code->first(['user_id' => $user_id]);

            if(!empty($codeFromDatabase)) {
//                $code->update($user_id, ['user_id' => $user_id, 'verification_code' => $verification_code]);

                $created_datetime = new DateTime($codeFromDatabase->created_datetime);
                $current_datetime = new DateTime();
                $time_difference = $current_datetime->diff($created_datetime);
                $remaining_time = new stdClass();
                $remaining_time->i = 14-$time_difference->i;
                $remaining_time->s = 60-$time_difference->s;

                if($time_difference->d < 1 && $time_difference->i < 15) {

                    echo "cannot_update_code|". $remaining_time->i . ":" . $remaining_time->s;
                    die;

                } else if ($time_difference->d < 1 && $time_difference->i < 30) {

                    // Updating the verification code from the database
                    $current_time = new DateTime();
                    $code->update($user_id, ['user_id' => $user_id, 'verification_code' => $verification_code, 'created_datetime' => $current_time->format("Y-m-d H:i:s")]);

                    $body = $this->verification_template($verification_code);

                    if(Mailer::sendMail($email, $name, $subject, $body)) {
                        echo "code_updated";
                    }
                    else echo "failed";

                    die;

                }

            } else {
                $code->insert(['user_id' => $user_id, 'verification_code' => $verification_code]);
            }

            $body = $this->verification_template($verification_code);


            if(Mailer::sendMail($email, $name, $subject, $body)) {
                echo "success";
            }
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
            echo $e;
            return false;
        }
    }

    public function verification_template($verification_code): string
    {
       return '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf8">
            <meta http-equiv="x-ua-compatible" content="ie=edge">
            <meta name="viewport" content="width=device-width,initial-scale=1">
        
            <title>ENTO | Email Verification</title>
        
            <style>
                * {
                    padding: 0;
                    margin: 0;
                }
        
                body {
                    display: flex;
                    height: 100%;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    margin: auto;
                    font-family: Verdana,serif;
                }
        
                .main-container {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    width: 600px;
                }
        
                h1 {
                    padding: 20px 0;
                    text-align: center;
                }
        
                .code-container {
                    width: 100%;
                    /*background: red;*/
                    padding: 10px 0;
                    display: flex;
                    justify-content: center;
                }
        
                .code {
                    background-color: darkgrey;
                    font-size: 1.2rem;
                    font-weight: bold;
                    letter-spacing: 2px;
                    width: 90%;
                    text-align: center;
                    padding: 10px 0;
                    border-radius: 50px;
                }
        
                p {
                    padding: 10px 20px;
                    text-align: center;
                }
        
                img, svg {
                    width: 300px;
                    height: fit-content;
                    aspect-ratio: 1/1;
                    padding: 20px;
                }
        
                footer {
                    background-color: aqua;
                    color: white;
                    width: 100%;
                }
            </style>
        
        </head>
        <body>
        <div class="main-container">
        
            <h1>
                <span style="color: rebeccapurple">ENTO<br/></span>
                Email Verification Code
            </h1>
        
            <img src="https://rb.gy/fgyqhv" alt="image">
        
            <div class="code-container">
                <div class="code">
                    '. $verification_code .'
                </div>
            </div>
        
            <p>
                ENTO requires a verified email address, so you can be sure to get notified of any important news or changes,
                 get purchase details of any tickets and other important details easily.
            </p>
        
            <footer>
                <p>ENTO | Create the ideal Musical Event</p>
            </footer>
        </div>
        
        </body>
        </html>';
    }

}