
<?php 


  $time = time();
  echo "time: " . $time;
  $_SESSION['time_started'] = $time;
  $_SESSION['time_remaining'] = 20; //45 minutes

	  $oldtime = $_SESSION['time_started'];
      $newtime = time();
      $difference = $newtime - $oldtime;
      $_SESSION['time_remaining'] = $_SESSION['time_remaining'] - $difference;
      if ($_SESSION['time_remaining'] > 0)
      { 
          $_SESSION['time_started'] = $newtime; 
         //continue
		 echo "Start Time"  . $_SESSION['time_started'] . "<br>";
		 echo "Difference" . $difference;
		 
		 echo "Remaining Time"  . $_SESSION['time_remaining'] . "<br>";
		 echo "This is exam ";
		 
      } else {
         //out of time
		  echo "This exam is over ";
      }	  
	  
	  ?>
<script type="text/javascript">

/*
var TimeLimit = new Date('<?php echo date('r', $_SESSION['TIMER']) ?>');
</script>

<script type="text/javascript">
function countdownto() {
  var date = Math.round((TimeLimit-new Date())/1000);
  var hours = Math.floor(date/3600);
  date = date - (hours*3600);
  var mins = Math.floor(date/60);
  date = date - (mins*60);
  var secs = date;
  if (hours<10) hours = '0'+hours;
  if (mins<10) mins = '0'+mins;
  if (secs<10) secs = '0'+secs;
  document.body.innerHTML = hours+':'+mins+':'+secs;
  setTimeout("countdownto()",1000);
  }

countdownto();

*/
</script>

<?php

$day = date('d');
$month =  date('m');
$year =  date('Y') ;


for($d=1; $d<=31; $d++)
{
	$time=mktime(12, 0, 0, $month, $d, $year);
	if (date('m', $time)==$month)
	echo "<tr>";
	echo "<td>". date('d', $time)."</td><br>";
	echo "<tr>";
}

?>
