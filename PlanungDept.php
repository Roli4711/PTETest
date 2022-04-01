<!doctype html>
<html>
<head>
    <meta http-equiv="expires" content="Sat, 12 Jun 2010 12:00:00 GMT">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta charset="utf-8">
</head >
<body>
<?php

$server = "127.0.0.1";
$user = "root";
$pwd = "Roli4711";

$server = "infoprot.mysql.db.hostpoint.ch";
$user = "infoprot_pt";
$pwd = "Roli4711*";

$dbname = "infoprot_shop";
//include("connect/dbname.php");

$conn = mysqli_connect($server, $user, $pwd, "$dbname");
// Check connection
if (!$conn)
    die("Connection failed: " . mysqli_connect_error());
$conn->set_charset("utf8");

$sql = "SELECT * FROM activity";
$res = $conn->query($sql);
while ($row = $res->fetch_assoc()) {
    $sql2 = "SELECT * FROM gastroplan WHERE idUser = " . $row["idUser"] . " AND idDepartment = " . $row["Department"];
    $res2 = $conn->query($sql2);
    if ($res2->num_rows == 0) {
        $sql2 = "INSERT INTO gastroplan (idUser, idDepartment) VALUES (" . $row["idUser"] . ", " . $row["Department"] . ")";
        $res2 = $conn->query($sql2);
    }
}

$conn->close();
?>