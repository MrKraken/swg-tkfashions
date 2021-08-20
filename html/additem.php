<?php

function boolstr($val)
{
	$val = $_REQUEST["$val"];
	if ($val)
		return ",1";
	return ",0";
}

function stringstr($val)
{
	$val = $_REQUEST["$val"];
	return ",'" . mysql_escape_string($val) . "'";
}

function numstr($val)
{
	$val = $_REQUEST["$val"];
	if (!$val)
		$val = 0;
	return "," . $val;
}

function additem()
{
	include 'config.php';
	$link = mysql_connect($db_host, $db_username, $db_password)
		or die("Connection failed: " . mysql_error());
	mysql_select_db($db_name)
		or die("Database selection failed [$db_name]: " . mysql_error());

	$req = "INSERT INTO tk_tailorschematics VALUES (0";
	$req .= stringstr ("name");
	$req .= stringstr ("picname");
	$req .= numstr ("cost");
	$req .= boolstr ("covershead");
	$req .= boolstr ("coversshirt");
	$req .= boolstr ("coverswaist");
	$req .= boolstr ("coversjacket");
	$req .= boolstr ("coversback");
	$req .= boolstr ("covershands");
	$req .= boolstr ("coverslegs");
	$req .= boolstr ("coversfeet");
	$req .= boolstr ("coverswrists1");
	$req .= boolstr ("coverswrists2");
	$req .= boolstr ("coversnecklace");

	$req .= boolstr ("male");
	$req .= boolstr ("female");
	$req .= boolstr ("wookiee");
	$req .= boolstr ("twileks");
	$req .= boolstr ("other");
	$req .= stringstr ("catalogdescription");
	$req .= stringstr ("category");
	$req .= boolstr ("new");
	$req .= stringstr ("color1loc");
	$req .= stringstr ("color2loc");
	$req .= stringstr ("color3loc");
	$req .= stringstr ("color4loc");

	$req .= stringstr ("palette1");
	$req .= stringstr ("palette2");
	$req .= stringstr ("palette3");
	$req .= stringstr ("palette4");
	$req .= numstr ("defaultcolor1");
	$req .= numstr ("defaultcolor2");
	$req .= numstr ("defaultcolor3");
	$req .= numstr ("defaultcolor4");
	$req .= numstr ("rfp");
	$req .= numstr ("synth1");
	$req .= numstr ("synth2");
	$req .= numstr ("synth3");
	$req .= numstr ("synth4");
	$req .= boolstr ("ithorian");
	$req .= boolstr ("coversarms");

	$req .= ")";
	$result = mysql_query($req)
		or die("Query failed: <b>" . mysql_error(). "</b><br><i>" . $req . "</i>");
}

if ($_REQUEST["name"])
	additem();

?>
<HTML> 
<BODY BACKGROUND=gen_background.jpg><BR>
<H1> Add an item to the catalog </H1>
<FORM ACTION=additem.php METHOD=post>
Item name: <INPUT NAME="name" TYPE=TEXT SIZE=64><BR>
Picture name: <INPUT NAME="picname" TYPE=TEXT SIZE=64><BR>
Cost: <INPUT NAME="cost" TYPE=TEXT SIZE=32><BR>
Covers Head? <INPUT NAME="covershead" TYPE=CHECKBOX> <BR>
Covers Shirt? <INPUT NAME="coversshirt" TYPE=CHECKBOX> <BR>
Covers Waist? <INPUT NAME="coverswaist" TYPE=CHECKBOX> <BR>
Covers Chest? <INPUT NAME="coversjacket" TYPE=CHECKBOX> <BR>
Covers Arms? <INPUT NAME="coversarms" TYPE=CHECKBOX> <BR>
Covers Pack? <INPUT NAME="coversback" TYPE=CHECKBOX> <BR>
Covers Hands? <INPUT NAME="covershands" TYPE=CHECKBOX> <BR>
Covers Legs? <INPUT NAME="coverslegs" TYPE=CHECKBOX> <BR>
Covers Feet? <INPUT NAME="coversfeet" TYPE=CHECKBOX> <BR>
Covers Wrist1? <INPUT NAME="coverswrists1" TYPE=CHECKBOX> <BR>
Covers Wrist2? <INPUT NAME="coverswrists2" TYPE=CHECKBOX> <BR>
Covers Necklace? <INPUT NAME="coversnecklace" TYPE=CHECKBOX> <BR>
Men can wear? <INPUT NAME="male" TYPE=CHECKBOX> <BR>
Women can wear? <INPUT NAME="female" TYPE=CHECKBOX> <BR>
Wookiees can wear? <INPUT NAME="wookiee" TYPE=CHECKBOX> <BR>
Ithorian can wear? <INPUT NAME="ithorian" TYPE=CHECKBOX> <BR>
Twilek can wear? <INPUT NAME="twileks" TYPE=CHECKBOX> <BR>
Human can wear? <INPUT NAME="other" TYPE=CHECKBOX> <BR>
Description <TEXTAREA ROWS=10 COLS=20 NAME="catalogdescription"></TEXTAREA><BR>
Category? <INPUT NAME="category" TYPE=TEXT SIZE=32> <BR>
New? <INPUT NAME="new" TYPE=CHECKBOX CHECKED> <BR>
Color1 location: <INPUT NAME="color1loc" TYPE=TEXT SIZE=32><BR>
Color2 location: <INPUT NAME="color2loc" TYPE=TEXT SIZE=32><BR>
Color3 location: <INPUT NAME="color3loc" TYPE=TEXT SIZE=32><BR>
Color4 location: <INPUT NAME="color4loc" TYPE=TEXT SIZE=32><BR>
Color1 palette: <INPUT NAME="palette1" TYPE=TEXT SIZE=32><BR>
Color2 palette: <INPUT NAME="palette2" TYPE=TEXT SIZE=32><BR>
Color3 palette: <INPUT NAME="palette3" TYPE=TEXT SIZE=32><BR>
Color4 palette: <INPUT NAME="palette4" TYPE=TEXT SIZE=32><BR>
Color1 default: <INPUT NAME="defaultcolor1" TYPE=TEXT SIZE=32><BR>
Color2 default: <INPUT NAME="defaultcolor2" TYPE=TEXT SIZE=32><BR>
Color3 default: <INPUT NAME="defaultcolor3" TYPE=TEXT SIZE=32><BR>
Color4 default: <INPUT NAME="defaultcolor4" TYPE=TEXT SIZE=32><BR>
RFP?: <INPUT NAME="rfp" TYPE=TEXT SIZE=32><BR>
Synthetic cloth?: <INPUT NAME="synth1" TYPE=TEXT SIZE=32><BR>
Synthetic cloth?: <INPUT NAME="synth2" TYPE=TEXT SIZE=32><BR>
Synthetic cloth?: <INPUT NAME="synth3" TYPE=TEXT SIZE=32><BR>
Synthetic cloth?: <INPUT NAME="synth4" TYPE=TEXT SIZE=32><BR>
<INPUT TYPE="submit" NAME="submit" VALUE="submit">
</FORM>

</BODY>
</HTML>
