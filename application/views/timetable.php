
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