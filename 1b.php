<?php 
$source = $_GET['city1'];
$dest = $_GET['city2'];
$n = $_GET['max-layovers'];
$n++;
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
		LEVEL <= $n
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

