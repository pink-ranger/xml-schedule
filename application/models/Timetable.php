<?php
class Timetable extends CI_Model {
    protected $xml = null;
    protected $timeslots = Array();
    protected $days = Array();
    protected $courses = Array();
    
    public function __construct() {
        parent::__construct();
        $this->xml = simplexml_load_file(DATAPATH, 'timetable.xml');//this is wrong, look at news
        
        foreach($this->xml->times->time as $time) {
            $key = (string)$times['slot'];
            $bookingArray = array();
            foreach($time->booking as $booking)
            {
                $booking->time = $time['slot'];
                array_push($bookingArray, new Booking($booking));
            }
            $timeslots[$key] = $bookingArray;
        }
        
        foreach($this->xml->timetable->days->day as $day) {
            $key = (string)$day['code'];
            $bookingArray = array();
            foreach($day->booking as $booking)
            {
                array_push($bookingArray, new Booking("day", $key, $booking));
            }
            $days[$key] = $bookingArray;
        }
        
        foreach($this->xml->timetable->courses->course as $course) {
            $key = (string)$course['name'];
            $bookingArray = array();
            foreach($course->booking as $booking)
            {
                array_push($bookingArray, new Booking("course", $key, $booking));
            }
            $courses[$key] = $bookingArray;
        }
    }
}

class Booking {
    private $day; //public plz
    private $name;
    private $time;
    private $room;
    private $instructor;
    private $type;
    private $course;
    
    public function __construct($keyType, $key, $booking) {
        if ($keyType == "time")
        {
            $this->time = $key;
        }
        else
        {
            $this->time = $booking->time_slot;
        }
        
        if ($keyType == "course")
        {
            $this->course = $key;
        }
        else
        {
            $this->course = $booking->course_name;
        }
        
        if ($keyType == "day")
        {
            $this->day = $key;
        }
        else
        {
            $this->day = $booking->day_of_week;
        }
        
        $this->day = $day_of_week;
        $this->name = $booking->course_name;
        $this->instructor = $booking->instructor;
        $this->type = $booking->type;
    }
}
