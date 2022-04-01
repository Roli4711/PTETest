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
//phpinfo();

$server = "127.0.0.1";
$user = "root";
$pwd = "Roli4711";

$dbname = "infoprot_citypub";

$conn = mysqli_connect($server, $user, $pwd, "$dbname");
if (!$conn)
    die("Connection failed: " . mysqli_connect_error());
$conn->set_charset("utf8");

$delUser = "";

$sql = "SELECT * FROM user WHERE idUser > 0";
$res = $conn->query($sql);
while ($row = $res->fetch_assoc()) {
    $idu = $row["idUser"];
    $notfound = true;
    $sqla = "SELECT * FROM activity WHERE idUser = $idu";
    $resa = $conn->query($sqla);
    while ($rowa = $resa->fetch_assoc()) {
        $dept = $rowa["Department"];
        $von = $rowa["Start"];
        $bis = $rowa["End"];
        $ida = $rowa["idActivity"];
        if ($von == null || trim($von) == "")
            $von = "1970-01-01";
        if ($bis == null || trim($bis) == "")
            $bis = "2099-12-31";
        $b = new DateTime($bis);
        $b = $b->add(new DateInterval("P1D"));
        $vontr = $von . " 06:00:00";
        $bistr = $b->format("Y-m-d") . " 05:59:59";

        if ($dept != 88 && $dept != 89 && $dept != 93) {
            if ($rowa["ActivityLevel"] == 0) {
                $conn->query("DELETE FROM timerec WHERE idUser = $idu AND Start <= '$bistr' AND End >= '$vontr'");
                $conn->query("DELETE FROM timerecperweek WHERE idUser = $idu AND Date >= '$von' AND Date <= '$bis'");
                $conn->query("DELETE FROM timerecpermonth WHERE idUser = $idu AND Date >= '$von' AND Date = '$bis'");
                $conn->query("DELETE FROM timerecperweek WHERE idUser = $idu AND Start <= '$bis' AND End >= '$von'");
                $conn->query("DELETE FROM vacancies WHERE idUser = $idu AND Start <= '$bis' AND End >= '$von'");
                $conn->query("DELETE FROM absences WHERE idUser = $idu AND Start <= '$bis' AND End >= '$von'");
                $conn->query("DELETE FROM gastrofreeday WHERE idUser = $idu AND Date <= '$von' AND Date <= '$bis'");
                $conn->query("DELETE FROM gastrotime WHERE idUser = $idu AND Date <= '$von' AND Date <= '$bis'");
                $conn->query("DELETE FROM pauses WHERE idUser = $idu AND Date <= '$von' AND Date <= '$bis'");
            }
            $conn->query("DELETE FROM activity WHERE idActivity = $ida");
        }
        else
            $notfound = false;
    }
echo "<br>Id/Name: $idu, " . $row["Name"] . " " . $row["Firstname"];
    if ($notfound) {
        $conn->query("DELETE FROM timerec WHERE idUser = $idu");
        $conn->query("DELETE FROM timerecperweek WHERE idUser = $idu");
        $conn->query("DELETE FROM timerecpermonth WHERE idUser = $idu");
        $conn->query("DELETE FROM timerecperweek WHERE idUser = $idu");
        $conn->query("DELETE FROM vacancies WHERE idUser = $idu");
        $conn->query("DELETE FROM absences WHERE idUser = $idu");
        $conn->query("DELETE FROM gastrofreeday WHERE idUser = $idu");
        $conn->query("DELETE FROM gastrotime WHERE idUser = $idu");
        $conn->query("DELETE FROM pauses WHERE idUser = $idu");
        $conn->query("DELETE FROM initvacancy WHERE idUser = $idu");
        $conn->query("DELETE FROM activity WHERE idUser = $idu");
//        $conn->query("DELETE FROM user WHERE idUser = $idu");
        $conn->query("DELETE FROM customertable WHERE fieldname = 'EXPUSER-$idu'");
        $conn->query("DELETE FROM customertable WHERE fieldname LIKE 'KA%-$idu'");
        if (trim($delUser) == "")
            $delUser = $idu;
        else
            $delUser .= ",$idu";
        echo " ==> DELETED";
    }
}
echo "<p>DELETE FROM user WHERE idUser IN ($delUser)";
$conn->query("DELETE FROM finance WHERE idUser IN ($delUser)");
$conn->query("DELETE FROM user WHERE idUser IN ($delUser)");
/*
$sql = "SELECT * FROM licencetable WHERE type LIKE 'KA%'";
$res = $conn->query($sql);
while ($row = $res->fetch_assoc()) {
    $type = $row["type"];
    $ilt = $row["idLicenceTable"];
    if (strpos($type, "-88") === false && strpos($type, "-89") === false && strpos($type, "-90") === false)
        $conn->query("DELETE FROM licencetable WHERE idLicenceTable = $ilt");
}
*/

$conn->query("DELETE FROM code WHERE category = 'DEPARTMENT' AND idCode NOT IN (88, 89, 93)");
$conn->query("DELETE FROM logdata WHERE Date < '2022-04-01'");

$conn->close();
?>
