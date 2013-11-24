<?php
$source = $_GET['city1'];
$dest = $_GET['city2'];
$sql = 
"
SELECT * FROM flight 
WHERE dest_city='NY'
AND ROWNUM <= 1
START WITH source_city='Montreal'
CONNECT BY
  PRIOR dest_city = source_city
ORDER BY LEVEL ASC
";

sql($sql);