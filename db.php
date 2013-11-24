<?php
$GLOBALS['con'] = oci_connect('joel', 'root', 'localhost/XE');
if (!$GLOBALS['con']) {
	$e = oci_error();
	trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
?>