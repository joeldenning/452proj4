<?php 
$source = $_GET['city1'];
$dest = $_GET['city2'];
$sql = 
"
SELECT MIN(fare)
FROM
(
	SELECT fare FROM
	(
		SELECT airfare + PRIOR airfare fare
		FROM flight 
		WHERE dest_city='$dest'
		START WITH source_city='$source'
		CONNECT BY
		  PRIOR dest_city = source_city
)
  
";

sql($sql);

?>