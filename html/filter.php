<html>
<head>
<LINK rel="stylesheet" href="catalog.css" type="text/css">

<meta http-equiv="Content-Language" content="en-us">
<meta name="GENERATOR" content="VI">
<meta name="ProgId" content="VI">
<title>filters</title>
<style type="text/css">
TABLE {
	border-spacing: 0px;
	border-collapse: collapse;
}
TD {
	width: 48px;
	margin: 0px;
	padding: 0px;
}
TR:first-child TD:first-child {
	width: 90px;
}
TD.pricedisclaimer {
	width: 400px;
	padding-left: 5px;
}
</style>
<base target="contents"></head>

<body background="gen_background.jpg">

<H2><center>Limits</center></H2>

<form method=POST action='menu.php'>
New items only
<input type=checkbox name=new value=1<?php if ($_REQUEST['new']) echo " checked"?>>
<hr>
<table>
<tr><td></td><td>Men</td><td>Women</td><td>Twi'lek</td><td>Wookiee</td><td>Ithorian</td><td>Others</td></tr>
<?php

$table_row = "<tr><td class=label>Can be worn by</td>";
$table_row .= "<td><input type=checkbox name=male value=1";
if ($_REQUEST["male"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=female value=1";
if ($_REQUEST["female"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=twilek value=1";
if ($_REQUEST["twilek"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=wookiee value=1";
if ($_REQUEST["wookiee"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=ithorian value=1";
if ($_REQUEST["ithorian"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=other value=1";
if ($_REQUEST["other"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "</tr>";
echo ($table_row);

?>
</table>
<hr>
<table>
<tr><td></td><td>Shirt</td><td>Chest</td><td>Arms</td><td>Legs</td><td>Hands</td><td>Feet</td><td>Left<br>wrist</td><td>Right<br>wrist</td><td>Neck</td><td>Waist</td><td>Back</td></tr>
<?php

$table_row = "<tr><td class=label>Covers</td>";
$table_row .= "<td><input type=checkbox name=cshirt value=1";
if ($_REQUEST["cshirt"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=cjacket value=1";
if ($_REQUEST["cjacket"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=carms value=1";
if ($_REQUEST["carms"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=clegs value=1";
if ($_REQUEST["clegs"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=chands value=1";
if ($_REQUEST["chands"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=cfeet value=1";
if ($_REQUEST["cfeet"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=cwrists1 value=1";
if ($_REQUEST["cwrists1"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=cwrists2 value=1";
if ($_REQUEST["cwrists2"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=cneck value=1";
if ($_REQUEST["cneck"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=cwaist value=1";
if ($_REQUEST["cwaist"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=cback value=1";
if ($_REQUEST["cback"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "</tr>\n";
echo ($table_row);

$table_row = "<tr><td class=label>Does not cover</td>";
$table_row .= "<td><input type=checkbox name=cnoshirt value=1";
if ($_REQUEST["cnoshirt"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=cnojacket value=1";
if ($_REQUEST["cnojacket"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=cnoarms value=1";
if ($_REQUEST["cnoarms"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=cnolegs value=1";
if ($_REQUEST["cnolegs"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=cnohands value=1";
if ($_REQUEST["cnohands"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=cnofeet value=1";
if ($_REQUEST["cnofeet"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=cnowrists1 value=1";
if ($_REQUEST["cnowrists1"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=cnowrists2 value=1";
if ($_REQUEST["cnowrists2"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=cnoneck value=1";
if ($_REQUEST["cnoneck"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=cnowaist value=1";
if ($_REQUEST["cnowaist"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "<td><input type=checkbox name=cnoback value=1";
if ($_REQUEST["cnoback"])
	$table_row .= " checked";
$table_row .= "></td>";
$table_row .= "</tr>\n";
echo ($table_row);


?>
</table>
<hr>
<table>
<tr><td class=pricelabel>Minimum cost</td><td class=price><input type=text name=mincost value=<?php if ($_REQUEST["tax"]) echo "tax"; else echo ($_REQUEST["mincost"]) ?>></td><td class=pricedisclaimer>(Does not apply to enhanced clothes)</td></tr>
<tr><td class=pricelabel>Maximum cost</td><td class=price><input type=text name=maxcost value=<?php if ($_REQUEST["tax"]) echo $_REQUEST["tax"]; else echo ($_REQUEST["maxcost"]) ?>></td><td class=pricedisclaimer>(Does not apply to enhanced clothes)</td></tr>
</table>
<hr>
<H2><center>Enhancements</center></H2>
<?php

include "catalog.php";
list_enhancements ();

?>
<hr>
<input type=submit value="Limit">
<input type=reset value="Reset">
</form>

</body>
</html>
