<?php

// Main Controller Class

class Controller {

    public function view($view, $data = []) {

        extract($data);

        $filename = "../app/views/".strtolower($view).".view.php";
        if(file_exists($filename)) {
            require $filename;
        }else{
            echo "Could not find the view file: ".$filename;
        }
    }

    public function profile($method = null)
    {

        $user = new User();

        $data['user'] = $row = $user->first(['user_id' => Auth::getUser_id()]);

        if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) {
            $_POST['user_id'] = Auth::getUser_id();
            $user->update(Auth::getUser_id(), $_POST);
            redirect("$row->user_type/profile/edit-profile/" . $row->user_id);
        }

        if (empty($method)) $this->view('common/profile/overview', $data);
        else if ($method === 'edit-profile') $this->view('common/profile/edit', $data);
        else if ($method === 'settings') $this->view('common/profile/settings', $data);
        else if ($method === 'verify') $this->view('common/profile/verify', $data);
        else if ($method === 'change-password') $this->view('common/profile/change-password', $data);
        else {
            message("Page not found");
            redirect("$row->user_type/profile");
        }
    }
}