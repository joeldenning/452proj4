<?php 
$source = $_GET['city1'];
$dest = $_GET['city2'];
$cant_stop_here = $_GET['city3'];

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
		source_city != '$cant_stop_here'
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