<?php
class Booking extends CI_Model {
    
    private $day;
    private $name;
    private $time;
    private $room;
    private $instructor;
    private $type;
    
    public function __construct($day, $booking) {
        parent::__construct();
        $this->day = $day;
        $this->name = $booking->course_name;
        $this->time = $booking->time_slot;
        $this->instructor = $booking->instructor;
        $this->type = $booking->type;
    }
}
