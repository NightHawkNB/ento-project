<?php

class Chat extends controller {

    public function __construct() {
        // Constructor
    }

    // $sen = user_id of the sender -- Sender can be anyone but the client
    // $rec = user_id of the receiver -- Client
    // $id = unique ID used to identify the chat and the reservation

//    reserve($sen = null, $rec = null, $id = null, "reservations")

    public function reserve($sen = null, $rec = null, $id = null): void
    {
        if((empty($sen) AND empty($rec)) OR empty($sen)) {

            message("Invalid Link");
            redirect("home");

        } else if(empty($rec)) {

            // View the list of possible receivers
            message("No receiver specified");
            redirect("home");

        } else {
            $data = chat($sen, $rec, $id, 'reservations');
            $this->view("common/chat/chat", $data);
        }
    }

    public function complaint($sen = null, $rec = null, $id = null): void
    {
        if((empty($sen) AND empty($rec)) OR empty($sen)) {

            message("Invalid Link");
            redirect("home");

        } else if(empty($rec)) {

            // View the list of possible receivers
            message("No receiver specified");
            redirect("home");

        } else {
            $data = chat($sen, $rec, $id, 'complaints');
            $this->view("common/chat/chat", $data);
        }
    }

    public function resreq($sen = null, $rec = null, $id = null): void
    {

        $chat_location = "";

        if((empty($sen) AND empty($rec)) OR empty($sen)) {

            message("Invalid Link");
            redirect("home");

        } else if(empty($rec)) {

            // View the list of possible receivers
            message("No receiver specified");
            redirect("home");

        } else {

            $chat = new Request_chat();
            $chat_location = $chat->where(['sender_id' => $sen, 'receiver_id' => $rec, 'resreq_id' => $id]);
            if($chat_location) {

                if($chat_location[0]->source == "") {
                    $chat_id = $chat_location[0]->chat_id;
                    $filepath = "../app/data/chats/requests/". $chat_id .".txt";
                    $file = fopen($filepath, "w");
                    fclose($file);

                    $chat->update($chat_id, ['source' => $filepath]);
                    $chat_location = $filepath;
                }

                $chat_location = $chat_location[0]->source . "";

            } else {

                $chat->insert(['sender_id' => $sen, 'receiver_id' => $rec, 'resreq_id' => $id]);
                $chat_id = $chat->where(['sender_id' => $sen, 'receiver_id' => $rec, 'resreq_id' => $id])[0]->chat_id . "";
                $filepath = "../app/data/chats/requests/". $chat_id .".txt";
                $file = fopen($filepath, "w");
                fclose($file);

                $chat->update($chat_id, ['source' => $filepath]);
                $chat_location = $filepath;
            }

        }


        if($_SERVER['REQUEST_METHOD'] == "POST") {

            // Content
            $json_data = file_get_contents("php://input");

            // If the second argument is set to true, the function returns an array. Otherwise, it returns an object
            $php_data = json_decode($json_data);

            date_default_timezone_set('Asia/Colombo');
            $message = date("[Y-m-d H:i:s]")." | ".$php_data->type." : ".$php_data->content;
            echo $message;

            $file = fopen($chat_location, "a") or die("Unable to open file!");
            fwrite($file, $message."\n");
            fclose($file);

//            show($php_data);

            // Save the message in the appropriate file if exists, otherwise create new file.
            // Append

            die;

        } else if ($_SERVER['REQUEST_METHOD'] == "PUT") {

            // Content
            $json_data = file_get_contents("php://input");

            // If the second argument is set to true, the function returns an array. Otherwise, it returns an object
            $php_data = json_decode($json_data);

            // from attribute sends the most recent message currently viewed
            $start = $php_data->from;

            $chat = new Request_chat();

            // This occurs only if there is a chat, and it's source path is specified.
            $chat_location = $chat->where(['sender_id' => $sen, 'receiver_id' => $rec, 'resreq_id' => $id])[0]->source;

            // Send the messages that come after the received message

            $file = fopen($chat_location, "r") or die("Unable to open file!");

            $content = array();

            $count = 0;
            while(!feof($file)) {

                $count++;
                $row_data = fgets($file);

                // We append to the variable $content, only the new messages that came after the current message
                if($count > $start) {
                    if($row_data != "") {
                        $content[] = msg_str_obj($row_data);
                    }
                }

            }

            fclose($file);

            echo json_encode($content);

            die;

        } else {

            $file = fopen($chat_location, "r") or die("Unable to open file!");

            $content = array();

            while(!feof($file)) {
                $row_data = fgets($file);
                if($row_data != "") {
                    $content[] = msg_str_obj($row_data);
                }
            }

            fclose($file);

            $data['msg'] = $content;
            $data['rec'] = $rec;
            $data['sen'] = $sen;
            $data['reservation_id'] = $id;

//            show((Auth::is_client())? "1" : "0");
//            die;

            $this->view("common/chat/chat", $data);
        }

    }

}

function msg_str_obj ($str) : object
{
    $temp = explode("|", $str);
    $meta = strtotime(trim($temp[0], "[ ]"));

    $date = date('Y-m-d', $meta);
    $time = date('h:i A', $meta);

    $data = trim($temp[1]);
    $data = explode(":", $data);
    $user = strtolower(trim($data[0]));
    $msg = trim($data[1]);

    $message = new stdClass();

    $message->date = $date;
    $message->time = $time;
    $message->user = $user;
    $message->content = $msg;

    return $message;
}

function chat($sen, $rec, $id, $folder_name)
{

    $chat_location = "";

    $chat = new Res_chat();
    $chat_location = $chat->where(['sender_id' => $sen, 'receiver_id' => $rec, 'id' => $id]);
    if($chat_location) {

        if($chat_location[0]->source == "") {
            $chat_id = $chat_location[0]->chat_id;
            $filepath = "../app/data/chats/". $folder_name ."/". $chat_id .".txt";

            // To create the file in the filepath mentioned above
            $file = fopen($filepath, "w");
            fclose($file);

            $chat->update($chat_id, ['source' => $filepath]);
            $chat_location = $filepath;
        } else {
            $chat_location = $chat_location[0]->source . "";
        }

    } else {

        $chat->insert(['sender_id' => $sen, 'receiver_id' => $rec, 'id' => $id]);
        $chat_id = $chat->where(['sender_id' => $sen, 'receiver_id' => $rec, 'id' => $id])[0]->chat_id . "";
        $filepath = "../app/data/chats/". $folder_name ."/". $chat_id .".txt";
        $file = fopen($filepath, "w");
        fclose($file);

        $chat->update($chat_id, ['source' => $filepath]);
        $chat_location = $filepath;
    }


    if($_SERVER['REQUEST_METHOD'] == "POST") {

        // Content
        $json_data = file_get_contents("php://input");

        // If the second argument is set to true, the function returns an array. Otherwise, it returns an object
        $php_data = json_decode($json_data);

        date_default_timezone_set('Asia/Colombo');
        $message = date("[Y-m-d H:i:s]")." | ".$php_data->type." : ".$php_data->content;
        echo $message;

        $file = fopen($chat_location, "a") or die("Unable to open file!");
        fwrite($file, $message."\n");
        fclose($file);

//            show($php_data);

        // Save the message in the appropriate file if exists, otherwise create new file.
        // Append

        die;

    } else if ($_SERVER['REQUEST_METHOD'] == "PUT") {

        // Content
        $json_data = file_get_contents("php://input");

        // If the second argument is set to true, the function returns an array. Otherwise, it returns an object
        $php_data = json_decode($json_data);

        // from attribute sends the most recent message currently viewed
        $start = $php_data->from;

        $chat = new Res_chat();

        // This occurs only if there is a chat, and it's source path is specified.
        $chat_location = $chat->where(['sender_id' => $sen, 'receiver_id' => $rec, 'reservation_id' => $id])[0]->source;

        // Send the messages that come after the received message

        $file = fopen($chat_location, "r") or die("Unable to open file!");

        $content = array();

        $count = 0;
        while(!feof($file)) {

            $count++;
            $row_data = fgets($file);

            // We append to the variable $content, only the new messages that came after the current message
            if($count > $start) {
                if($row_data != "") {
                    $content[] = msg_str_obj($row_data);
                }
            }

        }

        fclose($file);

        echo json_encode($content);

        die;

    } else {

        $file = fopen($chat_location, "r") or die("Unable to open file!");

        $content = array();

        while(!feof($file)) {
            $row_data = fgets($file);
            if($row_data != "") {
                $content[] = msg_str_obj($row_data);
            }
        }

        fclose($file);

        $data['msg'] = $content;
        $data['rec'] = $rec;
        $data['sen'] = $sen;
        $data['unique_id'] = $id;

//            show((Auth::is_client())? "1" : "0");
//            die;

        return $data;
    }

}
