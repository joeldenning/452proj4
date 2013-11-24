<?php
include_once("db.php");

function sql($sql) {
	echo "$sql<br><br>";
	$prepared = oci_parse($GLOBALS['con'], $sql);
	oci_execute($prepared);
	echo "<table border='1'>\n";
	for( $i=1; $i <= oci_num_fields($prepared); $i++ ) {
		echo "<th>".oci_field_name($prepared, $i)."</th>";
	}
	while ($row = oci_fetch_array($prepared, OCI_ASSOC+OCI_RETURN_NULLS)) {
		echo "<tr>";
		foreach ($row as $item) {
			echo "    <td>" . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") . "</td>";
		}
		echo "</tr>";
	}
	echo "</table>";			
}

$filename = $_GET['number'].$_GET['option'].".php";
include_once($filename);
?>