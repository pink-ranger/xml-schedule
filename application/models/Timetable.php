<?php
class timetable extends CI_Model {
    protected $xml = null;
    protected $timeslots = array();
    protected $days = array();
    protected $courses = array();
    
    public function __construct() {
        parent::__construct();
        $this->xml = simplexml_load_file(DATAPATH . 'timetable.xml', 
                "SimpleXMLElement", LIBXML_NOENT);
        
        foreach($this->xml->times->time as $time) {
            $key = (string)$time['slot'];
            $bookingArray = array();
            foreach($time->booking as $booking)
            {
                $booking->time_slot = $key;
                array_push($bookingArray, new Booking($booking));
            }
            $this->timeslots[$key] = $bookingArray;
        }
        
        foreach($this->xml->days->day as $day) {
            $key = (string)$day['code'];
            $bookingArray = array();
            foreach($day->booking as $booking)
            {
              $booking->day_of_week = $key;
              array_push($bookingArray, new Booking($booking));
            }
            $this->days[$key] = $bookingArray;
        }
        
        foreach($this->xml->courses->course as $course) {
            $key = (string)$course['name'];
            $bookingArray = array();
            foreach($course->booking as $booking)
            {
                $booking->course_name = $course['name'];
                array_push($bookingArray, new Booking($booking));
            }
            $this->courses[$key] = $bookingArray;
        }
    }
    
    function getTimeslots()
    {
      return $this->timeslots;
    }
    
    function getDays()
    {
      return $this->days;
    }
    
    function getCourses()
    {
      return $this->courses;
    }

    function getDaysForDropDown()
    {
        $days = $this->days;
        $daysArray = array();
        foreach($days as $key => $value)
        {
            $daysArray[] = $key;
        }
        return $daysArray;
    }

    function  getTimesForDropdown()
    {
        $times = $this->timeslots;
        $timesArray = array();
        foreach($times as $key => $value)
        {
            $timesArray[] = $key;
        }
        return $timesArray;
    }


    function findBookingsUsingTimesFacet($day, $slot)
    {
        $times = $this->timeslots;
        foreach($times as $key => $value)
        {
            if($key == $slot)
            {
                foreach($value as $booking)
                {
                    if ($booking->day == $day)
                    {
                        return $booking;
                    }
                }
            }
        }
        echo NULL;
    }

    function findBookingsUsingDaysFacet($day, $slot)
    {
        $days = $this->days;
        foreach($days as $key => $value)
        {
            if($key == $day)
            {
                foreach($value as $booking)
                {
                    if ($booking->time == $slot)
                    {
                        return $booking;
                    }
                }
            }
        }
        echo NULL;
    }

    function findBookingsUsingCoursesFacet($day, $slot)
    {
        $courses = $this->courses;
        foreach($courses as $course)
        {    
            foreach($course as $booking)
            {
                if ($booking->day == $day && $booking->time == $slot)
                {
                    return $booking;
                }
            }
        }
        echo NULL;
    }
}

class Booking {
    public $day; 
    public $time;
    public $course;
    public $room;
    public $instructor;
    public $type;
    
    public function __construct($booking) {
      $this->day = (string)$booking->day_of_week;
      $this->time = (string)$booking->time_slot;
      $this->course = (string)$booking->course_name;
      $this->room = (string)$booking->room;
      $this->instructor = (string)$booking->instructor;
      $this->type = (string)$booking->type;
    }
}
