<?php
// Set timezone
date_default_timezone_set('UTC');

// Start date
$date = '2009-11-06';
// End date
$end_date = '2010-11-31';

while (strtotime($date) <= strtotime($end_date)) {
echo  date("M Y", strtotime($date)) . "<br/>";
$date = date ("Y-m-d", strtotime("+1 month", strtotime($date)));
}
date("M Y", strtotime($date));
?>
  <?php
  
  //All months
for($m=1; $m<=12; ++$m){
    echo date('F', mktime(0, 0, 0, $m, 1)).'<br>';
}
?>