<form action="search" name="search" method="POST">
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
      Days <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
      {daysList}
      <li><a href="#">{day}</a></li>
      {/daysList}
    </ul>
    <input name="search_day" type="hidden"/>
  </div>
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
      Slots <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
      {slotsList}
      <li><a href="#">{slot}</a></li>
      {/slotsList}
    </ul>
    <input name="search_slot" type="hidden"/>
  </div>
  <button type="submit" class="btn btn-default">Search</button>
</form>

<div>
  <h2>Search Results</h2>
  <h3 id = "output">{message}</h3>
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

<h2>List of Bookings (Times Facet)</h2>  
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

<h2>List of Booking (Days Facet)</h2>
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

<h2>List of Booking (Courses Facet)</h2>
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