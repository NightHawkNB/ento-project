<?php
class Eventm extends controller{
    public function __construct()
    {
        if(!Auth::logged_in())
        {
            message("please login");
            redirect('home');
        }
        if(!Auth::is_eventm())
        {
            message("Access Denied");
            redirect('home');
        }
    }
    public function index(): void
    {
        $this->view('common/dashboard');
    }

    public function event($page = null): void
    {
//        show($page);
        $ads = new Ad();
        $data['ads'] = $ads->where(['pending' => 0]);

        if($page == "create_event") $this->view('common/events/create_event');
        else if($page == 2) $this->view('common/events/create_event_2');
        else if($page == 3) {
            $data['ads'] = $ads->where(['pending' => 0, 'category' => 'venue']);
            $this->view('common/events/create_event_3', $data);
        } else if($page == 4) {
            $data['ads'] = $ads->where(['pending' => 0, 'category' => 'band']);
            $this->view('common/events/create_event_4', $data);
        } else if($page == 5) {
            $data['ads'] = $ads->where(['pending' => 0, 'category' => 'singer']);
            $this->view('common/events/create_event_5', $data);
        } else if($page == 'confirm') {
            $this->view('common/events/create_event_confirm');
        } else if($page == 'confirm-check') {
            message("Event Created");
            redirect('client/event');
        } else if($page == null) {
            redirect('client/manage');
        } else {
            message('No such page exists');
            $this->view('common/events/create_event');
        }

    }

}