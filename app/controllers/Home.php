<?php

class Home extends Controller{
    public function index() {
        $this->view('home');
    }

    public function events($id = null) {
        $data['record'] = array(
            array(
                'event_id' => 1,
                'name' => 'Yaathra',
                'details' => "Details About the Event",
                'ticketing_plan' => array('5000', '3000', '1000'),
                'venue_id' => 2,
                'band_id' => 1,
                'vuser_id' => 2,
                'venueO_id' => 3,
                'DateTime' => "2023-11-13",
                'image' => "event-01.jpeg"
            ),
            array(
                'event_id' => 2,
                'name' => 'Melody Friday',
                'details' => "Details About the Second Event",
                'ticketing_plan' => array('5000', '3000'),
                'venue_id' => 4,
                'band_id' => 3,
                'vuser_id' => 1,
                'venueO_id' => 4,
                'DateTime' => "2023-10-20",
                'image' => "event-02.jpeg"
            )
        );

        $this->view('events', $data);
    }
}