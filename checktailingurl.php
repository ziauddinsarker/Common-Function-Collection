
<?php 
echo "This will get current url and check last trailing string";

if(strpos($_SERVER['REQUEST_URI'], 'edit-report') !== false) {         			
			$date = $pos === false ? $_SERVER['REQUEST_URI'] : substr($_SERVER['REQUEST_URI'], $pos + 1);
			echo "<br>Last Trailing String: ".$date;
        }else {
		echo "you are accessing wrong url";
		}
			


?>