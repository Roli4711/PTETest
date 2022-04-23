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
echo "Start<br>";
//phpinfo();

$server = "127.0.0.1";
$user = "root";
$pwd = "Roli4711";

/*
$server = "infoprot.mysql.db.hostpoint.ch";
$user = "infoprot_pt";
$pwd = "Roli4711*";
*/

$dbname = "infoprot_beispiel";
include("connect/dbname.php");

$conn = mysqli_connect($server, $user, $pwd, "$dbname");
// Check connection
if (!$conn)
    die("Connection failed: " . mysqli_connect_error());
$conn->set_charset("utf8");

echo "<br>$dbname<p></p>";

$name = array("Obrist", "Ammann", "Meier", "Meyer", "Müller", "Himmelberger", "Schärli", "Hanselmann", "Zellweger", "Egger", "Eichmüller", "Giagon", "Oberst", "Stern", "Blum", "Dietrich",
    "Zeller", "Grüter", "Hofer", "Hoffmann", "Ulmann", "Thaler", "Eberli", "Castagliani", "Pejovic", "Wenk", "Baumann", "Sturzenegger", "Lenz", "Huber", "Fischer", "Steiner", "Gerber",
    "Schneider", "Weber", "Keller", "Schmid", "Schmied", "Brunner", "Frei", "Zimmermann", "Moser", "Widmer", "Wyss", "Graf", "Roth", "Aebi", "Amann", "von Arx", "Balmer", "Balzli",
    "Bänziger", "Beeler", "Berner", "Beutler", "Bichsel", "Binder", "Blatter", "Bollinger", "Brechbühl", "Bucher", "Bührer", "Bundi", "Burger", "Burkart", "Bussmann", "Camenzind",
    "Dinkelmann", "Cavelti", "Egli", "Dutli", "Egloff", "Eggimann", "Ehrensperger", "Federer", "Fehr", "Frey", "Gloor", "Ganz", "Gabathuler", "Gessner", "Gfeller", "Geiser", "Glauser",
    "Gotthelf", "Grab", "Hänni", "Haller", "Halter", "Hartmann", "Hasler", "Heer", "Hess", "Hässli", "Hohl", "Honegger", "Hürlimann", "Hutter", "Imfeld", "Jäggi", "Jenny", "Knellwolf",
    "Koch", "Kolb", "Kuhn", "Lang", "Lauber", "Lehner", "Leutenegger", "Loosli", "Mächler", "Mangold", "Mannhart", "Marty", "Merz", "Mettler", "Minder", "Morgenthaler", "Nägeli",
    "Niederhauser", "Oberholzer", "Oberlin", "Odermatt", "Pedretti", "Räber", "Ramseier", "Reber", "Reichlin", "Reinhart", "Rinderknecht", "Hunkeler", "Ryser", "Schaad", "Schaffner",
    "Schaub", "Schenker", "Schmidli", "Schnider", "Schubiger", "Schwager", "Sommer", "Späth", "Stalder", "Stamm", "Steiger", "Steinmann", "Steinemann", "Suzler", "Sulser", "Sutter", "Suter",
    "Tobler", "Vetsch", "Vogel", "Vögeli", "Vogt", "Waser", "Wehrli", "Widmer", "Wirz", "Zehnder", "Zollinger", "Zwicky", "Hanselmann", "Fritsche", "Hagmann", "Kürsteiner", "Fitze", "Franz",
    "Hubacher", "Pfister", "Brunner", "Burger", "Heeb", "Graf", "Faller", "Haller", "Andreoli", "Andres", "Becker", "Romer", "Hager", "Kreis", "Antenen", "Andermatten", "Kalbermatten", 
    "Hübscher", "Klarer", "Fust", "Wenk", "Metzger", "Gmür", "Nef", "Näf", "Neff", "Buschor", "Mutti", "Zoller", "Aepli", "Schär", "Maurer", "von Gunten", "Lamprecht", "Manser", "Zellweger",
    "Schmied", "Schmitt", "Burkhalter", "Contini", "Wanner", "Fuchs", "Fisch", "Forrer", "Abderhalden", "Gruber");
    
$vnameM = array("Hans", "Peter", "Walter", "Daniel", "Werner", "Thomas", "Josef", "Ernst", "Christian", "Martin", "Paul", "Markus", "René", "Bruno", "Kurt", "Andreas", "Fritz", "Urs", "Marcel",
    "Roland", "Jörg", "Alex", "Marcel", "Alain", "Karl", "Noah", "Lukas", "Luca", "Hanspeter", "Hansjürg", "Erich", "Pascal", "Lorenz", "Bernhard", "Benny", "Roman", "Frank", "Urs", "Max",
    "Tom", "Stefan", "Stephan", "Erich", "Patrick", "Sascha", "Fridolin", "Sepp", "Maximilian", "Reto", "Christoph", "Werner", "Jürg", "Toni", "Anton", "Alfred", "Tino", "Harald", "Karl", "Yves");
    
$vnameF = array("Anita", "Claudia", "Rita", "Margrith", "Frieda", "Erika", "Daniela", "Paula", "Bettina", "Yvonne", "Manuela", "Michaela", "Laura", "Lara", "Nicole", "Brigitte", "Bea",
    "Anna", "Anne", "Emma", "Vreni", "Verena", "Anette", "Annemarie", "Elisabeth", "Esther", "Estelle", "Barbara", "Nina", "Ursula", "Jolanda", "Uschi", "Sofia", "Silvia", "Sybille", "Tamara",
    "Veronika", "Michelle", "Eliane", "Sascha", "Eveline", "Evy", "Kathrin", "Karin", "Odette", "Franziska", "Doris", "Dora", "Priska", "Yvette");
    
$strasse = array("Bahnhofstrasse", "Hauptstrasse", "Dorfstrasse", "Industriestrasse", "Schulstrasse", "Oberdorfstrasse", "Poststrasse", "Schulhausstrasse", "Kirchweg", "Birkenweg", "Kirchgasse",
    "Kirchstrasse", "Bergstrasse", "Bahnhofplatz", "Unterdorfstrasse", "Gartenstrasse", "Rosenweg", "Bachstrasse", "Ringstrasse", "Lettenstrasse", "Grund", "Windeggstrasse", "Friedbergstrasse",
    "Bergstrasse", "Kasernenstrasse", "Tal", "Zürcher Strasse", "Rorschacher Strasse", "Schöntalstrasse", "Neuschöntalstrasse", "Blumenbergstrasse", "Eichenstrasse", "Meisenstrasse",
    "Feldweg", "Feldstrasse", "Fontanastrasse", "Hinterberg", "Fürstenlandstrasse", "Appenzellerstrasse", "Oberstrasse", "Wassergasse", "Lettenstrasse", "Espenmoosstrasse", "Im Hinterdorf",
    "Oberdorf", "Unterdorf", "Chubelboden", "Aeschstrasse", "Kanalweg", "Dammweg", "Dammstrasse", "Rheinstrasse", "Gamserweg", "Meisenstrasse", "Möwenstrasse", "Amselweg", "Amriswiler Strasse",
    "Höhenstrasse", "Höhenweg", "Im Chropf", "Sattelstrasse", "Freibergstrasse");
    
$orte = array("St.Gallen", "St.Gallen", "St.Gallen", "St.Gallen", "St.Gallen", "Herisau", "Gossau", "Wittenbach", "Abtwil", "Teufen", "Degersheim", "Dicken", "Altstätten", "Appenzell", "Gonten",
    "Wil", "Niederuzwil", "Uzwil", "Zuzwil", "Flawil", "Stein AR", "Trogen", "Rorschach", "Staad", "Muolen", "Waldkirch", "Arnegg", "Waldstatt", "Urnäsch", "Hundwil", "Rheineck", "Thal");
$cant = array("SG", "SG", "SG", "SG", "SG", "AR", "SG", "SG", "SG", "AR", "SG", "SG", "SG", "AI", "AI", "SG", "SG", "SG", "SG", "SG", "AR", "AR", "SG", "SG", "SG", "SG", "SG", "AR", "AR", "AR", "SG", "SG");
$plz = array("9000", "9008", "9016", "9014", "9012", "9100", "9200", "9300", "9030", "9053", "9113", "9115", "9450", "9050", "9108", "9500", "9244", "9240", "9524", "9230", "9063", "9043",
    "9430", "9422", "9313", "9205", "9212", "9104", "9107", "9064", "9424", "9425");

$bank = array("Raiffeisen", "UBS", "CreditSuisse", "Kantonalbank", "PostFinance");

$sex = null;
$sql = "SELECT * FROM code WHERE Category = 'SEX' AND (Code = 'M' OR Code = 'W') ORDER BY idCode";
echo "<br>$sql";

//$sql = "SELECT * FROM code WHERE Category = 'SEX' AND Code = 'M' ORDER BY idCode";
$res = $conn->query($sql);
while ($row = $res->fetch_assoc()) {
    $sexarr[] = array("id" => $row["idCode"], "sex" => $row["Code"]);
}

$sql = "SELECT * FROM code WHERE Category = 'COUNTRY' AND Code = 'CH'";
$res = $conn->query($sql);
$row = $res->fetch_assoc();
$cntry = $row["idCode"];

$sql = "SELECT * FROM code WHERE Category = 'LANG' AND Code = 'D'";
$res = $conn->query($sql);
$row = $res->fetch_assoc();
$lang = $row["idCode"];

$sql = "SELECT * FROM code WHERE Category = 'KANTON' AND Code = 'SG'";
$res = $conn->query($sql);
$row = $res->fetch_assoc();
$kant = $row["idCode"];

$sql = "SELECT * FROM user WHERE idUser > 0";
$res = $conn->query($sql);

$arrmkz = null;
echo "<br>Start user";
while ($row = $res->fetch_assoc()) {

    if ($row["Sex"] == null) {
        $rndsex = rand(0, 1);
        $sex = $sexarr[$rndsex]["id"];
        $sexcode = $sexarr[$rndsex]["sex"];
    }
    else {
        $sex = $row["Sex"];
        if ($sexarr[0]["id"] == $sex)
            $sexcode = $sexarr[0]["sex"];
        else
            $sexcode = $sexarr[1]["sex"];
    }

    $rndName = rand(0, count($name) - 1);
    $rndMVName = rand(0, count($vnameM) - 1);
    $rndFVName = rand(0, count($vnameF) - 1);
    $rndStr = rand(0, count($strasse) - 1);
    $rndStrNr = rand(1, 100);
    $rndOrte = rand(0, count($orte) - 1);

    
    $hlpname = $name[$rndName];
    if ($sexcode == "M")
        $hlpvname = $vnameM[$rndMVName];
    else
        $hlpvname = $vnameF[$rndFVName];
    $hlpstr = utf8_encode($strasse[$rndStr] . " " . $rndStrNr);
    $hlport = utf8_encode($orte[$rndOrte]);
    $hlpplz = $plz[$rndOrte];
    $hlpkant = $cant[$rndOrte];
    $hlpcntry = $cntry;
    
    $start = $row["Start"];
    if ($start == null)
        $start = '2015-01-01';

    $birth = $row["Birthdate"];

    if ($birth == null)
        $birth = rand(1955, 1995) . "-" . rand(1,12) . "-" . rand(1,28);

echo "<br>$hlpname - $hlpvname: $birth";
    $mail = umlaute("$hlpvname.$hlpname@protimer.ch");
    
    $mkzname = umlaute($hlpname);
    $mkzvnam = umlaute($hlpvname);
    
    $mkz = substr($mkzname, 0, 2) . substr($mkzvnam, 0, 2);
    echo "<br>$mkz";
    if ($arrmkz != null && count($arrmkz) > 0) {
        echo "<br>CNT: " . count($arrmkz);
        for ($i = 0; $i < count($arrmkz); $i++) {
            if ($arrmkz[$i] == $mkz) {
                $mkz = $mkz . $i;
                $i = 0;
            }
        }
    }
    echo "<br>$mkz";
    $arrmkz[] = array($mkz);
    echo "<br>$mkz";
    $telnr = "011 " . rand(100, 999) . " " . rand(10, 99) . " " . rand(10, 99);
    $mobnr = "015 " . rand(100, 999) . " " . rand(10, 99) . " " . rand(10, 99);
    
    $hlpvname = utf8_encode($hlpvname);
    $hlpname = utf8_encode($hlpname);

    $ahv = "";
    for ($j = 0; $j < 3; $j++) {
        $n = rand(1, 9);
        $ahv .= "$n";
    }
    $ahv .= ".";
    for ($j = 0; $j < 4; $j++) {
        $n = rand(1, 9);
        $ahv .= "$n";
    }
    $ahv .= ".";
    for ($j = 0; $j < 4; $j++) {
        $n = rand(1, 9);
        $ahv .= "$n";
    }
    $ahv .= ".";
    for ($j = 0; $j < 2; $j++) {
        $n = rand(1, 9);
        $ahv .= "$n";
    }

    $sql1 = "SELECT * FROM user WHERE MKZ = '$mkz'";
    $res1 = $conn->query($sql1);
    if ($res1->num_rows > 0) {
        $mkz = $mkz . rand(1, 20);
    }
    echo "<br>$mkz";
    $upd = "UPDATE user SET MKZ = '$mkz', Name = '$hlpname', Firstname = '$hlpvname', Sex = $sex, Address1 = '$hlpstr', Country = $hlpcntry, ZIP = '$hlpplz', City = '$hlport', Language = $lang, " .
        "TelNr = '$telnr', MobileNr = '$mobnr', Start = '$start', LocationCanton = $kant, LocationPLZ = '', Birthdate = '$birth', Mail = '$mail', Code = '1111', AHVNr = '$ahv' WHERE idUser = " . $row["idUser"];
    echo $upd . "<br>";
    $resupd = $conn->query($upd);

    $kanton = null;
    $sqlcant = "SELECT * FROM code WHERE Category = 'KANTON' AND Code = '$hlpkant'";
    $rescant = $conn->query($sqlcant);
    $rowcant = $rescant->fetch_assoc();
    if ($rowcant && $rescant->num_rows > 0)
        $kanton = $rowcant["idCode"];
    $upd = "UPDATE activity SET LivingCanton = '$hlpkant', LivingGemeinde = '$hlport', LocationPLZ = '$hlpplz'" . ($kanton != null?", LocationCanton = $kanton":"") . " WHERE idUser = " . $row["idUser"];
    echo $upd . "<br>";
    $resupd = $conn->query($upd);

    $fnd = "SELECT * FROM finance WHERE idUser = " . $row["idUser"];
    $resf = $conn->query($fnd);
    $rowf = $resf->fetch_assoc();
    if ($rowf && $resf->num_rows > 0) {
        if (trim($rowf["IBANNo"]) != "") {
            $iban = "CH52 0483 5012 3456 7100 0";
            $rndBankname = rand(0, count($bank) - 1);
            $hlpbankname = $bank[$rndBankname];
            $upd = "UPDATE finance SET BankName = '$hlpbankname', IBANNo = '$iban', ClearingNo = '', BankZIP = '$hlpplz', BankCity = '$hlport' WHERE idUser = " . $row["idUser"];
            $conn->query($upd);
        }
    }
}

$ii = 0;
$sql = "SELECT * FROM lohnfirmenstamm";
$res = $conn->query($sql);
while ($row = $res->fetch_assoc()) {
    $ii++;
    $hlpname = "Muster $ii AG";

    $rndStr = rand(0, count($strasse) - 1);
    $rndStrNr = rand(1, 100);
    $rndOrte = rand(0, count($orte) - 1);

    $hlpstr = utf8_encode($strasse[$rndStr] . " " . $rndStrNr);
    $hlport = utf8_encode($orte[$rndOrte]);
    $hlpplz = $plz[$rndOrte];

    $rndStr = rand(0, count($strasse) - 1);
    $rndStrNr = rand(1, 100);
    $rndOrte = rand(0, count($orte) - 1);

    $bstr = utf8_encode($strasse[$rndStr] . " " . $rndStrNr);
    $bort = utf8_encode($orte[$rndOrte]);
    $bplz = $plz[$rndOrte];

    $iban = "CH52 0483 5012 3456 7100 0";

    $sql1 = "UPDATE lohnfirmenstamm SET Name = '$hlpname', Strasse = '$hlpstr', PLZ = '$hlpplz', Ort = '$hlport', AbrNrAHV = '99.999', BankName = 'Raiffeisenbank', " .
        "BankStrasse = '$bstr', BankPLZ = '$bplz', BankOrt = '$bort', IBANNr = '$iban', QSTSSL = 'SSL 999999', TelNr = '079 000 11 22', " .
        "AHVKasse1 = 'SVA', Address1 = 'Musterstrasse 1', PLZOrt = '9000 St.Gallen', BVGYes = 1, BVGName = 'BVG Company AG, St.Gallen'";
    $conn->query($sql1);

}

$sbName = rand(0, count($name) - 1);
$sbMVName = rand(0, count($vnameM) - 1);
$sbFVName = rand(0, count($vnameF) - 1);

$ii = 0;
$sql = "SELECT * FROM licencetable WHERE type LIKE 'KA%'";
$res = $conn->query($sql);
while ($row = $res->fetch_assoc()) {
    $ii++;
    $hlpname = "Muster $ii AG";

    $rndStr = rand(0, count($strasse) - 1);
    $rndStrNr = rand(1, 100);
    $rndOrte = rand(0, count($orte) - 1);

    $hlpstr = utf8_encode($strasse[$rndStr] . " " . $rndStrNr);
    $hlport = utf8_encode($orte[$rndOrte]);
    $hlpplz = $plz[$rndOrte];

    $rndStr = rand(0, count($strasse) - 1);
    $rndStrNr = rand(1, 100);
    $rndOrte = rand(0, count($orte) - 1);

    $bstr = utf8_encode($strasse[$rndStr] . " " . $rndStrNr);
    $bort = utf8_encode($orte[$rndOrte]);
    $bplz = $plz[$rndOrte];

    $iban = "CH52 0483 5012 3456 7100 0";
    $tel = "079 123 45 67";
    $ahvnam = "Kantonale Arbeitslosenkasse";
    $ahvstr = "Musterstrasse 1";
    $ahvort = "9000 St.Gallen";
    $kasb = utf8_encode((rand(0, 10) < 7?$vnameF[$sbFVName]:$vnameM[$sbMVName]) . " " . $name[$sbName]);

    if (strpos($row["type"], "KAADRNAME") > -1) {
        $sql2 = "UPDATE licencetable SET value = '$hlpname' WHERE idLicenceTable = " . $row["idLicenceTable"];
        $conn->query($sql2);
    }
    else if (strpos($row["type"], "KAADRSTR") > -1) {
        $sql2 = "UPDATE licencetable SET value = '$hlpstr' WHERE idLicenceTable = " . $row["idLicenceTable"];
        $conn->query($sql2);
    }
    else if (strpos($row["type"], "KAADRPLZORT") > -1) {
        $sql2 = "UPDATE licencetable SET value = '$hlpplz $hlport' WHERE idLicenceTable = " . $row["idLicenceTable"];
        $conn->query($sql2);
    }
    else if (strpos($row["type"], "KASACHB") > -1) {
        $sql2 = "UPDATE licencetable SET value = '$kasb' WHERE idLicenceTable = " . $row["idLicenceTable"];
        $conn->query($sql2);
    }
    else if (strpos($row["type"], "KAALKNAME") > -1) {
        $sql2 = "UPDATE licencetable SET value = '$ahvnam' WHERE idLicenceTable = " . $row["idLicenceTable"];
        $conn->query($sql2);
    }
    else if (strpos($row["type"], "KAALKSTR") > -1) {
        $sql2 = "UPDATE licencetable SET value = '$ahvstr' WHERE idLicenceTable = " . $row["idLicenceTable"];
        $conn->query($sql2);
    }
    else if (strpos($row["type"], "KAALKPLZORT") > -1) {
        $sql2 = "UPDATE licencetable SET value = '$ahvort' WHERE idLicenceTable = " . $row["idLicenceTable"];
        $conn->query($sql2);
    }
    else if (strpos($row["type"], "KABURABT") > -1) {
        $sql2 = "UPDATE licencetable SET value = '633.333 / 00.000' WHERE idLicenceTable = " . $row["idLicenceTable"];
        $conn->query($sql2);
    }
    else if (strpos($row["type"], "KATEL") > -1) {
        $sql2 = "UPDATE licencetable SET value = '$tel' WHERE idLicenceTable = " . $row["idLicenceTable"];
        $conn->query($sql2);
    }
    else if (strpos($row["type"], "KAIBAN") > -1) {
        $sql2 = "UPDATE licencetable SET value = '$iban' WHERE idLicenceTable = " . $row["idLicenceTable"];
        $conn->query($sql2);
    }
    else if (strpos($row["type"], "KAMAIL") > -1) {
        $sql2 = "UPDATE licencetable SET value = 'info@protimer.ch' WHERE idLicenceTable = " . $row["idLicenceTable"];
        $conn->query($sql2);
    }
}

$rndsex = rand(0, 1);

$sex = $sexarr[$rndsex]["id"];
$sexcode = $sexarr[$rndsex]["sex"];

//echo "$rndsex -- $sex - $sexcode<br>";
$rndName = rand(0, count($name) - 1);
$rndMVName = rand(0, count($vnameM) - 1);
$rndFVName = rand(0, count($vnameF) - 1);
$rndStr = rand(0, count($strasse) - 1);
$rndStrNr = rand(1, 100);
$rndOrte = rand(0, count($orte) - 1);

$hlpname = $name[$rndName];
if ($sexcode == "M")
    $hlpvname = $vnameM[$rndMVName];
else
    $hlpvname = $vnameF[$rndFVName];
$hlpstr = utf8_encode($strasse[$rndStr] . " " . $rndStrNr);
$hlport = utf8_encode($orte[$rndOrte]);
$hlpplz = $plz[$rndOrte];
$hlpcntry = $cntry;

$start = '2015-01-01';
    
$birth = rand(1955, 1995) . "-" . rand(1,12) . "-" . rand(1,28);
    
$mail = "info@protimer.ch";

$hlpvname = utf8_encode($hlpvname);
$hlpname = utf8_encode($hlpname);

    $telnr = "011 " . rand(100, 999) . " " . rand(10, 99) . " " . rand(10, 99);
    $mobnr = "015 " . rand(100, 999) . " " . rand(10, 99) . " " . rand(10, 99);


$sql = "INSERT INTO user (MKZ, Name, Firstname, Sex, Address1, Country, ZIP, City, Language, TelNr, MobileNr, Start, LocationCanton, LocationPLZ, Birthdate, Mail, Code, Password) VALUES (" .
    "'ben', '$hlpname', '$hlpvname', $sex, '$hlpstr', $hlpcntry, '$hlpplz', '$hlport', $lang, '$telnr', '$mobnr', '$start', $kant, '9000', '$birth', '$mail', '1111', '" . MD5('benutzer'). "')";
echo $sql . "<BR>";
$res = $conn->query($sql);

$sql = "DELETE FROM timerec WHERE Active = 1";
$res = $conn->query($sql);
$sql = "DELETE FROM prjtimes WHERE Active = 1";
$res = $conn->query($sql);

$nr = 0;
$sql = "SELECT * FROM code WHERE Category = 'DEPARTMENT'";
$res = $conn->query($sql);
while ($row = $res->fetch_assoc()) {
    $nr++;
    $hlpsql = "UPDATE code SET Code = '" . $nr . "ABT', Description = 'Abteilung $nr' WHERE idCode = " . $row["idCode"];
    $conn->query($hlpsql);
}

$nr = 0;
$sql = "SELECT * FROM terminals";
$res = $conn->query($sql);
while ($row = $res->fetch_assoc()) {
    $nr++;
    $hlpnr = $nr;
    if ($hlpnr < 10)
        $hlpnr = "0$nr";
    $hlpsql = "UPDATE terminals SET MacAdresse = '$hlpnr$hlpnr$hlpnr', Location = 'Tablet $hlpnr', Pwd = '2019', MailAddress = 'info@protimer.ch' WHERE idTerminals = " . $row["idTerminals"];
    $conn->query($hlpsql);
}

$conn->query("UPDATE licencetable SET value = '0' WHERE type = 'EXT-VAC'");
$conn->query("UPDATE licencetable SET value = '0' WHERE type = 'EXT-EXP'");
$conn->query("UPDATE licencetable SET value = '3' WHERE type = 'EXT-EXP-MAIL'");
$conn->query("UPDATE licencetable SET value = '3' WHERE type = 'EXT-VAC-MAIL'");
$conn->query("UPDATE licencetable SET value = 'info@protimer.ch' WHERE type = 'EXPZENTMAILADR'");
$conn->query("UPDATE licencetable SET value = 'info@protimer.ch' WHERE type = 'VACZENTMAILADR'");

$iPrjNr = 10000;

$badr = 0;
$sqladr = "SELECT * FROM address WHERE idAddress > 0";
$resadr = $conn->query($sqladr);
while ($rowadr = $resadr->fetch_assoc()) {
    $iPrjNr++;
    echo $rowadr["name"] . " - " . $rowadr["firstname"] . "<BR>";
    $badr = 1;
    $art = rand(1, 10);
    if ($art <= 2)
        $sex = 1;
    else if ($art <= 4)
        $sex = 2;
    else if ($art <= 7)
        $sex = 3;
    else if ($art <= 10)
        $sex = 4;
        
    $rndName = rand(0, count($name) - 1);
    $rndMVName = rand(0, count($vnameM) - 1);
    $rndFVName = rand(0, count($vnameF) - 1);
    
    $rndStr = rand(0, count($strasse) - 1);
    $rndStrNr = rand(1, 100);
    $rndOrte = rand(0, count($orte) - 1);
    
    $hlpvname = "";
    $hlpname = $name[$rndName];
    if ($sex == 1)
        $hlpvname = $vnameM[$rndMVName];
    else if ($sex == 2)
        $hlpvname = $vnameF[$rndFVName];
    else if ($sex == 3)
        $hlpvname = "AG";
    else if ($sex == 4)
        $hlpvname = "GmbH";

    $hlpname = $hlpname . " " . $hlpvname;
        
    $hlpstr = utf8_encode($strasse[$rndStr] . " " . $rndStrNr);
    $hlport = utf8_encode($orte[$rndOrte]);
    $hlpplz = $plz[$rndOrte];
    $hlpcntry = $cntry;
    $hlpname = trim(utf8_encode($hlpname));
    
    $sqlupd = "UPDATE address SET company = '$hlpname', name = '', name2 = '', firstname = '', street = '$hlpstr', zip = '$hlpplz', city = '$hlport' WHERE idAddress = " . $rowadr["idAddress"];
    echo $sqlupd . "<BR>";
    $resupd = $conn->query($sqlupd);
    echo "OK<BR>";

    $prjname = "$hlpname, $hlpstr, CH-$hlpplz $hlport";
    $prjnr = $iPrjNr; //strtoupper($hlpname."-".$hlpplz);
    echo "$prjname<br>";

    $sqlprj = "SELECT * FROM projects WHERE idAddr = " . $rowadr["idAddress"];
    echo $sqlprj . "<BR>";
    $resprj = $conn->query($sqlprj);
    while ($rowprj = $resprj->fetch_assoc()) {
        $updprj = "UPDATE projects SET PrjName = '$prjname' WHERE idProjects = " . $rowprj["idProjects"];
//        echo "$updprj<br>";
        $conn->query($updprj);
        $sqlprt = "SELECT * FROM prjtimes WHERE idPrj = " . $rowprj["idProjects"];
//        echo "$sqlprt<br>";
        $resprt = $conn->query($sqlprt);
        while ($rowprt = $resprt->fetch_assoc()) {
            $updprt = "UPDATE prjtimes SET PrjName = '$prjname' WHERE idPrjTimes = " . $rowprt["idPrjTimes"];
//            echo "$updprt<br>";
            $conn->query($updprt);
        }
    }

    echo "end<br>";
}

if ($badr == 0) {
    $sqlprj = "SELECT * FROM projects";
    $resprj = $conn->query($sqlprj);
    while ($rowprj = $resprj->fetch_assoc()) {
        $iPrjNr++;
        $rndName = rand(0, count($name) - 1);
        $rndMVName = rand(0, count($vnameM) - 1);
        $rndFVName = rand(0, count($vnameF) - 1);

        $rndStr = rand(0, count($strasse) - 1);
        $rndStrNr = rand(1, 100);
        $rndOrte = rand(0, count($orte) - 1);

        $hlpvname = "";
        $hlpname = $name[$rndName];

        $art = rand(1, 10);
        if ($art <= 4)
            $sex = 1;
        else if ($art <= 7)
            $sex = 3;
        else if ($art <= 10)
            $sex = 4;

        $art2 = rand(1, 20);

        if ($sex == 1)
            $hlpvname = $vnameM[$rndMVName];
        else if ($sex == 3)
            $hlpvname = "AG";
        else if ($sex == 4)
            $hlpvname = "GmbH";

        if ($sex >= 3) {
            if ($art2 >= 19)
                $hlpname = $vnameF[$rndFVName] . " " . $hlpname;
            else if ($art2 >= 12)
                $hlpname = $vnameM[$rndMVName] . " " . $hlpname;
        }

        $hlpname = $hlpname . " " . $hlpvname;

        $hlpstr = utf8_encode($strasse[$rndStr] . " " . $rndStrNr);
        $hlport = utf8_encode($orte[$rndOrte]);
        $hlpplz = $plz[$rndOrte];
        $hlpcntry = $cntry;
        $hlpname = trim(utf8_encode($hlpname));

        $prjname = "$hlpname, $hlpstr, CH-$hlpplz $hlport";
        $prjnr = "A-".$iPrjNr; //strtoupper($hlpname."-".$hlpplz);

        $updprj = "UPDATE projects SET PrjName = '$prjname', PrjNr = '$prjnr' WHERE idProjects = " . $rowprj["idProjects"];
        echo "$updprj<br>";
        $conn->query($updprj);
        $sqlprt = "SELECT * FROM prjtimes WHERE idPrj = " . $rowprj["idProjects"];
//        echo "$sqlprt<br>";
        $resprt = $conn->query($sqlprt);
        while ($rowprt = $resprt->fetch_assoc()) {
            $updprt = "UPDATE prjtimes SET PrjName = '$prjname', PrjNr = '$prjnr' WHERE idPrjTimes = " . $rowprt["idPrjTimes"];
//            echo "$updprt<br>";
            $conn->query($updprt);
        }
    }
}
$conn->close();

function umlaute($val) {
    $val = str_replace("ä", "ae", $val);
    $val = str_replace("ö", "oe", $val);
    $val = str_replace("ü", "ue", $val);
    $val = str_replace("é", "e", $val);
    $val = str_replace(" ", ".", $val);
    $val = strtolower($val);
    return $val;
} 
?>
	</body>
</html>