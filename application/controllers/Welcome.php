<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {
  
  public function index()
  {
    $times = $this->timetable->getTimeslots();
    $days = $this->timetable->getDays();
    $courses = $this->timetable->getCourses();
    $daysList = $this->timetable->getDaysForDropdown();
    $slotsList = $this->timetable->getTimesForDropdown();

    $timesArray = array();
    foreach($times as $time)
    {
      foreach($time as $booking)
      {
        $timesArray[] = $booking;
      }
    } 

    $daysArray = array();
    foreach($days as $day)
    {
      foreach($day as $booking)
      {
        $daysArray[] = $booking;
      }
    }

    $coursesArray = array();
    foreach($courses as $course)
    {
      foreach($course as $booking)
      {
        $coursesArray[] = $booking;
      }
    }

    $daysListArray = array();
    
    foreach($daysList as $day)
    {
      $daysListArray[] = array('day' => $day);
    }

    $slotsListArray = array();
    foreach($slotsList as $slot)
    {
      $slotsListArray[] = array('slot' => $slot);
    }
    
    
    $this->data['pagebody'] = 'timetable';
    $this->data['times'] = $timesArray;
    $this->data['days'] = $daysArray;
    $this->data['courses'] = $coursesArray;
    $this->data['daysList'] = $daysListArray;
    $this->data['slotsList'] = $slotsListArray;
    if (empty($this->data['message']))
    {
      $this->data['message'] = "";  
    }
    if (empty($this->data['search_results']))
    {
      $this->data['search_results'] = array(array("facet"=>"", "day"=>"", "time"=>"",
        "course"=>"", "room"=>"", "instructor"=>"", "type"=>""));
    }
    $this->render();
  }

  public function search()
  {
    $day = $_POST['search_day'];
    $slot = $_POST['search_slot'];
    $timesResultArray = array();
    $daysResultArray = array();
    $coursesResultArray = array();
    $searchResultsArray = array();
    if (!empty($day) && !empty($slot))
    {
      $bookingFromTimesFacet = $this->timetable->findBookingsUsingTimesFacet($day, $slot);
      $bookingFromDaysFacet = $this->timetable->findBookingsUsingDaysFacet($day, $slot);
      $bookingFromCoursesFacet = $this->timetable-> findBookingsUsingCoursesFacet($day, $slot);
      
      if ($bookingFromTimesFacet != NULL && $bookingFromDaysFacet != NULL && $bookingFromCoursesFacet != NULL)
      {
        if ($bookingFromTimesFacet->time == $bookingFromDaysFacet->time && $bookingFromTimesFacet->time == $bookingFromCoursesFacet->time &&
            $bookingFromTimesFacet->day == $bookingFromDaysFacet->day && $bookingFromTimesFacet->day == $bookingFromCoursesFacet->day &&
            $bookingFromTimesFacet->course == $bookingFromDaysFacet->course && $bookingFromTimesFacet->course == $bookingFromCoursesFacet->course &&
            $bookingFromTimesFacet->room == $bookingFromDaysFacet->room && $bookingFromTimesFacet->room == $bookingFromCoursesFacet->room &&
            $bookingFromTimesFacet->instructor == $bookingFromDaysFacet->instructor && $bookingFromTimesFacet->instructor == $bookingFromCoursesFacet->instructor &&
            $bookingFromTimesFacet->type == $bookingFromDaysFacet->type && $bookingFromTimesFacet->type == $bookingFromCoursesFacet->type)
        {
          $bookingFromTimesFacet->facet = "all";
          $searchResultsArray[] = $bookingFromTimesFacet; 
          $this->data['message'] = "BINGO";
        }
        else
        {
          $bookingFromTimesFacet->facet = "times";
          $searchResultsArray[] = $bookingFromTimesFacet;
          $bookingFromDaysFacet->facet = "days";
          $searchResultsArray[] = $bookingFromDaysFacet;
          $bookingFromDaysFacet->facet = "courses";
          $searchResultsArray[] = $bookingFromCoursesFacet;
          $this->data['message'] = "Inconsistent data found";
        }
      }
      else if ($bookingFromTimesFacet == NULL && $bookingFromDaysFacet == NULL && $bookingFromCoursesFacet == NULL)
      {
        $this->data['message'] = "No booking found";
      }
      else 
      {
        if ($bookingFromTimesFacet != NULL)
        {
          $bookingFromTimesFacet->facet = "times";
          $searchResultsArray[] = $bookingFromTimesFacet;
        }
        if ($bookingFromDaysFacet != NULL)
        {
          $bookingFromDaysFacet->facet = "days";
          $searchResultsArray[] = $bookingFromDaysFacet;
        }
        if ($bookingFromCoursesFacet != NULL)
        {
          $bookingFromCoursesFacet->facet = "courses";
          $searchResultsArray[] = $bookingFromCoursesFacet;
        }
        $this->data['message'] = "Inconsistent data found";
      }
    }
    else
    {
      $this->data['message'] = "You must select both a day and a slot!"; 
    }
    $this->data['search_results'] = $searchResultsArray;
    $this->index(); 
  }
}
