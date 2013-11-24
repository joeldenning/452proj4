<?php
$source = $_GET['city1'];
$dest = $_GET['city2'];
$sql = 
"
	SELECT SUM(mileage), CONNECT_BY_ROOT flight_num as f
		FROM flight 
		WHERE dest_city = '$dest'
		START WITH source_city = '$source'
		CONNECT BY PRIOR dest_city = source_city
	GROUP BY f
";

sql($sql);