<?php 
$source = $_GET['city1'];
$dest = $_GET['city2'];
$max_hours = $_GET['max-layover-duration'];
$max_minutes_military = $max_hours * 100;

$sql = 
"
SELECT MIN(fare)
FROM
(
	SELECT airfare + PRIOR airfare fare
	FROM flight 
	WHERE
		dest_city='$dest'
		AND
		dep_time - PRIOR arr_time <= $max_minutes_military
	START WITH source_city='$source'
	CONNECT BY
	  PRIOR dest_city = source_city

	UNION

	SELECT airfare fare
	FROM flight
	WHERE 
		dest_city='$dest'
	    AND
	    source_city='$source'
)
  
";

sql($sql);

?>