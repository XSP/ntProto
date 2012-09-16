<?php

require_once('../configurations/config.php');
require_once('../classes/db_operations.php');

$database = new database_connect();
$database -> db_connect();

$query = mysql_query("INSERT INTO test_table(test_data) VALUES(1000)");

$database -> db_disconnect();

?>