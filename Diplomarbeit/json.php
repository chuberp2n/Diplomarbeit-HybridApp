<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chris
 * Date: 16.07.12
 * Time: 15:56
 * To change this template use File | Settings | File Templates.
 */

header('Content-type: application/json');


$server = "localhost";
$username = "t3kuoni";
$password = "gu3shaeZ";
$database = "t3kuoni";

$con = mysql_connect($server, $username, $password) or die ("Could not connect: " . mysql_error());
mysql_select_db($database);

// $sql = "SELECT `name` FROM  `tx_kuonistammdaten_topregion` LIMIT 0 , 30";
$sql = "SELECT `name`,`topregion` FROM  `tx_kuonistammdaten_topregion` WHERE  `name` !=  '' LIMIT 0,30";
$result = mysql_query($sql) or die ("Query error: " . mysql_error());

$records = array();

while($row = mysql_fetch_assoc($result)) {
    $records[] = $row;
}

mysql_close($con);

echo $_GET['jsoncallback'] . '(' . json_encode($records) . ');';


?>