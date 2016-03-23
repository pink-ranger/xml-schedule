<?php
class Timetable extends CI_Model {
    protected $xml = null;
    protected $timeslots = Array();
    protected $days = Array();
    protected $courses = Array();
    
    public function __construct() {
        parent::__construct();
        $this->xml = simplexml_load_file(DATAPATH, 'timetable.xml');
        
        foreach($this->xml->timetable->times->time as $time) {
            $key = (string)$times['slot']];
            $bookingArray = array();
            foreach($time->booking as $booking)
            {
                array_push($bookingArray, new Booking($booking));
            }
            $timeslots[$key] = $bookingArray;
        }
        
        foreach($this->xml->timetable->days->day as $day) {
            $key = (string)$day['code'];
            $bookingArray = array();
            foreach($day->booking as $booking)
            {
                array_push($bookingArray, new Booking($booking));
            }
            $days[$key] = $bookingArray;
        }
        
        foreach($this->xml->timetable->courses->course as $course) {
            $key = (string)$course['name'];
            $bookingArray = array();
            foreach($course->booking as $booking)
            {
                array_push($bookingArray, new Booking($booking));
            }
            $courses[$key] = $bookingArray;
        }
    }
}

class Booking {
    private $day;
    private $name;
    private $time;
    private $room;
    private $instructor;
    private $type;
    
    public function __construct($booking) {
        $this->day = $day_of_week;
        $this->name = $booking->course_name;
        $this->time = $booking->time_slot;
        $this->instructor = $booking->instructor;
        $this->type = $booking->type;
    }
}
