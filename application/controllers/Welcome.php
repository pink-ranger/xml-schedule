<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {
  /*
  function __construct() 
  {
    parent::__construct();
    $this->load->model('timetable');
  }*/
  
  public function index()
  {
    $this->load->model('timetable');
    $times = $this->timetable->getTimeslots();
    $days = $this->timetable->getDays();
    $courses = $this->timetable->getCourses();
    foreach($times as $time)
    {
      foreach($time as $booking)
      {
        $timesArray[] = $booking;
      }
    } 

    foreach($days as $day)
    {
      foreach($day as $booking)
      {
        $daysArray[] = $booking;
      }
    }

    foreach($courses as $course)
    {
      foreach($course as $booking)
      {
        $coursesArray[] = $booking;
      }
    }
    
    $this->data['pagebody'] = 'timetable';
    $this->data['times'] = $timesArray;
    $this->data['days'] = $daysArray;
    $this->data['courses'] = $coursesArray;
    $this->render();
  }
}
