<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<nav class="navbar navbar-default navbar-fixed-top navbar-inverse"">
  <div class="container">
    <div class="navbar-header">
      <strong><a class="navbar-brand" href="#">BCIT Timetable</a></strong>
    </div>
  </div>
</nav>

</br></br></br>
<div class="jumbotron">
  <h2>COMP 4 O - Spring (Mar. to May) BCIT Timetable</h2>
  <p>This time table displays the list of bookings for the BCIT program CST for set 4O. It's sorted via time, days and courses. Select day AND time slot to search for specific course during that slot.</p>
</div>

<form action="search" name="search" method="POST">
  <span class="dropdown">
    <button class="btn btn-primary dropdown-toggle btn-lg btn-default" type="button" data-toggle="dropdown">
      Days <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
      {daysList}
      <li><a href="#">{day}</a></li>
      {/daysList}
    </ul>
    <input name="search_day" type="hidden"/>
  </span>
  <span class="dropdown">
    <button class="btn btn-primary dropdown-toggle btn-lg btn-default" type="button" data-toggle="dropdown">
      Slots <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
      {slotsList}
      <li><a href="#">{slot}</a></li>
      {/slotsList}
    </ul>
    <input name="search_slot" type="hidden"/>
  </span>
  <button type="submit" class="btn btn-default btn btn-lg btn-success">Search</button>
</form>

</br>
<div class="panel panel-info">
  <div class="panel-heading">
    <h1 class="panel-title">Search Results</h1>
  </div>
  <div class="panel-body">
    <table class="table">
      <thead>
        <tr>
          <th>Facet</th>
          <th>Day</th>
          <th>Time</th>
          <th>Course</th>
          <th>Room</th>
          <th>Instructor</th>
          <th>Type</th>
        </tr>
      </thead>
        <tbody>
          {search_results}
          <tr>
            <td>{facet}</td>
            <td>{day}</td>
            <td>{time}</td>
            <td>{course}</td>
            <td>{room}</td>
            <td>{instructor}</td>
            <td>{type}</td>
          </tr>
          {/search_results}
        </tbody> 
      </table>
  </div>
  <div class="alert alert-info" role="alert">
      <strong>{message}</strong> 
  </div>
</div>

</br>
<div class="panel panel-default">
  <div class="panel-heading">
    <button class="btn btn-link" data-toggle="collapse" data-target="#times"><h3 class="panel-title">List of Bookings (Times Facet)</h3></button>
  </div>
  <div id="times" class="panel-body collapse">
    <table class="table">
      <thead>
        <tr>
          <th>time</th>
          <th>day</th>
          <th>course</th>
          <th>room</th>
          <th>instructor</th>
          <th>type</th>
        </tr>
      </thead>
      <tbody>
        {times}
            <tr>
              <td>{time}</td>
          <td>{day}</td>
          <td>{course}</td>
          <td>{room}</td>
          <td>{instructor}</td>
          <td>{type}</td>
        </tr>
        {/times}
      </tbody> 
    </table>
  </div>
</div>

</br>
<div class="panel panel-default">
  <div class="panel-heading">
    <button class="btn btn-link" data-toggle="collapse" data-target="#days"><h3 class="panel-title">List of Booking (Days Facet)</h3></button>
  </div>
  <div id="days" class="panel-body collapse">
    <table class="table">
      <thead>
        <tr>
          <th>day</th>
          <th>time</th>
          <th>course</th>
          <th>room</th>
          <th>instructor</th>
          <th>type</th>
        </tr>
      </thead>
      <tbody>
        {days}
        <tr>
          <td>{day}</td>
          <td>{time}</td>
          <td>{course}</td>
          <td>{room}</td>
          <td>{instructor}</td>
          <td>{type}</td>
        </tr>
        {/days}
      </tbody> 
    </table>
  </div>
</div>

</br>
<div class="panel panel-default">
  <div class="panel-heading">
    <button class="btn btn-link" data-toggle="collapse" data-target="#courses"><h3 class="panel-title">List of Booking (Courses Facet)</h3></button>
  </div>
  <div id="courses" class="panel-body collapse">
    <table class="table">
      <thead>
        <tr>
          <th>day</th>
          <th>time</th>
          <th>course</th>
          <th>room</th>
          <th>instructor</th>
          <th>type</th>
        </tr>
      </thead>
      <tbody>
        {courses}
        <tr>
          <td>{course}</td>
          <td>{day}</td>
          <td>{time}</td>
          <td>{room}</td>
          <td>{instructor}</td>
          <td>{type}</td>
        </tr>
        {/courses}
      </tbody> 
    </table>
  </div>
</div>

<footer class="footer">
  <div class="container">
    <p class="text-muted">&copy; Group 5 (Juan Tam-Huang , Seonghyoung Lee, Vivek Kalia)</p>
  </div>
</footer>