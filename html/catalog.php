<?php
error_reporting(-1);

function enhanced_desc()
{
	$ret = "";
	$enhancements = array();
	$enhancements = tissue_add ($enhancements, "tissueC");
	$enhancements = tissue_add ($enhancements, "tissue1");
	$enhancements = tissue_add ($enhancements, "tissue2");
	$enhancements = tissue_add ($enhancements, "tissue3");
	$enhancements = tissue_add ($enhancements, "tissue4");
	foreach ($enhancements as $type => $value)
	{
		if ($value > 25)
			$value = 25;
		$ret .= "+".$value." ".$type."<br>\n";
	}

	return $ret;
}

function extra_desc()
{
	$ret = "";

	if ($_REQUEST["new"])
		$ret .= "... are new<br>\n";

	$racelist = array();
	if ($_REQUEST["wookiee"])
		$racelist[] = "Wookiee";
	if ($_REQUEST["twilek"])
		$racelist[] = "Twi'lek";
	if ($_REQUEST["trandoshan"])
		$racelist[] = "Trandoshan";
	if ($_REQUEST["ithorian"])
		$racelist[] = "Ithorian";
	if ($_REQUEST["other"])
		$racelist[] = "Human";

	if (count ($racelist))
	{
		$ret .= "... can be worn by ";
		$lastrace = array_pop($racelist);
		if (count($racelist))
			$ret .= implode (", ", $racelist) . " and ";
		$ret .= $lastrace . "<br>\n";
	}

	if (has_tissue ())
	{
		$ret .= "... can be enhanced<br>\n";
	}

	if ($_REQUEST["male"] && $_REQUEST["female"])
		$ret .= "... can be worn by either gender<br>\n";
	else if ($_REQUEST["male"])
		$ret .= "... can be worn by men<br>\n";
	else if ($_REQUEST["female"])
		$ret .= "... can be worn by women<br>\n";

	if ($_REQUEST["mincost"] && $_REQUEST["maxcost"])
		$ret .= "... costs between " . $_REQUEST["mincost"] . " and " . $_REQUEST["maxcost"] . " credits<br>\n";
	else if ($_REQUEST["mincost"])
		$ret .= "... costs at least " . $_REQUEST["mincost"] . " credits<br>\n";
	else if ($_REQUEST["maxcost"])
		$ret .= "... costs at most " . $_REQUEST["maxcost"] . " credits<br>\n";

	$coverlist = array();
	$nocoverlist = array();
	if ($_REQUEST["chead"])
		$coverlist[] = "head";
	else if ($_REQUEST["cnohead"])
		$nocoverlist[] = "head";
	if ($_REQUEST["cshirt"])
		$coverlist[] = "shirt";
	else if ($_REQUEST["cnoshirt"])
		$nocoverlist[] = "shirt";
	if ($_REQUEST["cjacket"])
		$coverlist[] = "jacket";
	else if ($_REQUEST["cnojacket"])
		$nocoverlist[] = "jacket";
	if ($_REQUEST["carms"])
		$coverlist[] = "arms";
	else if ($_REQUEST["cnoarms"])
		$nocoverlist[] = "arms";
	if ($_REQUEST["chands"])
		$coverlist[] = "hands";
	else if ($_REQUEST["cnohands"])
		$nocoverlist[] = "hands";
	if ($_REQUEST["clegs"])
		$coverlist[] = "legs";
	else if ($_REQUEST["cnolegs"])
		$nocoverlist[] = "legs";
	if ($_REQUEST["cfeet"])
		$coverlist[] = "feet";
	else if ($_REQUEST["cnofeet"])
		$nocoverlist[] = "feet";
	if ($_REQUEST["cwrists1"])
		$coverlist[] = "left wrist";
	else if ($_REQUEST["cnowrists1"])
		$nocoverlist[] = "left wrist";
	if ($_REQUEST["cwrists2"])
		$coverlist[] = "right wrist";
	else if ($_REQUEST["cnowrists2"])
		$nocoverlist[] = "right wrist";
	if ($_REQUEST["cnecklace"])
		$coverlist[] = "neck";
	else if ($_REQUEST["cnonecklace"])
		$nocoverlist[] = "neck";
	if ($_REQUEST["cback"])
		$coverlist[] = "back";
	else if ($_REQUEST["cnoback"])
		$nocoverlist[] = "back";
	if ($_REQUEST["cwaist"])
		$coverlist[] = "waist";
	else if ($_REQUEST["cnowaist"])
		$nocoverlist[] = "waist";

	if (count ($coverlist))
	{
		$last = array_pop ($coverlist);
		$ret .= "... are worn on the ";
		if (count ($coverlist))
			$ret .= implode ($coverlist, ", ") . " and ";
		$ret .= $last . "<br>\n";
	}
	if (count ($nocoverlist))
	{
		$last = array_pop ($nocoverlist);
		$ret .= "... are not worn on the ";
		if (count ($nocoverlist))
			$ret .= implode ($nocoverlist, ", ") . " or ";
		$ret .= $last . "<br>\n";
	}

	return $ret;
}

function extra_request()
{
	$ret = "";
	if ($_REQUEST["new"])
		$ret .= "&new=1";
	if ($_REQUEST["wookiee"])
		$ret .= "&wookiee=1";
	if ($_REQUEST["ithorian"])
		$ret .= "&ithorian=1";
	if ($_REQUEST["twilek"])
		$ret .= "&twilek=1";
	if ($_REQUEST["trandoshan"])
		$ret .= "&trandoshan=1";
	if ($_REQUEST["other"])
		$ret .= "&other=1";
	if ($_REQUEST["male"])
		$ret .= "&male=1";
	if ($_REQUEST["female"])
		$ret .= "&female=1 ";
	if ($_REQUEST["tissueC"])
		$ret .= "&tissueC=" . $_REQUEST["tissueC"];
	if ($_REQUEST["tissue1"])
		$ret .= "&tissue1=" . $_REQUEST["tissue1"];
	if ($_REQUEST["tissue2"])
		$ret .= "&tissue2=" . $_REQUEST["tissue2"];
	if ($_REQUEST["tissue3"])
		$ret .= "&tissue3=" . $_REQUEST["tissue3"];
	if ($_REQUEST["tissue4"])
		$ret .= "&tissue4=" . $_REQUEST["tissue4"];
	if ($_REQUEST["mincost"] == "tax")
		$ret .= "&tax=" . $_REQUEST["maxcost"];
	else
	{
		if ($_REQUEST["mincost"])
			$ret .= "&mincost=".$_REQUEST["mincost"];
		if ($_REQUEST["maxcost"])
			$ret .= "&maxcost=".$_REQUEST["maxcost"];
	}
	if ($_REQUEST["chead"])
		$ret .= "&chead=1";
	else if ($_REQUEST["cnohead"])
		$ret .= "&cnohead=1";
	if ($_REQUEST["cshirt"])
		$ret .= "&cshirt=1";
	else if ($_REQUEST["cnoshirt"])
		$ret .= "&cnoshirt=1";
	if ($_REQUEST["cjacket"])
		$ret .= "&cjacket=1";
	else if ($_REQUEST["cnojacket"])
		$ret .= "&cnojacket=1";
	if ($_REQUEST["carms"])
		$ret .= "&carms=1";
	else if ($_REQUEST["cnoarms"])
		$ret .= "&cnoarms=1";
	if ($_REQUEST["chands"])
		$ret .= "&chands=1";
	else if ($_REQUEST["cnohands"])
		$ret .= "&cnohands=1";
	if ($_REQUEST["clegs"])
		$ret .= "&clegs=1";
	else if ($_REQUEST["cnolegs"])
		$ret .= "&cnolegs=1";
	if ($_REQUEST["cfeet"])
		$ret .= "&cfeet=1";
	else if ($_REQUEST["cnofeet"])
		$ret .= "&cnofeet=1";
	if ($_REQUEST["cwrists1"])
		$ret .= "&cwrists=1";
	else if ($_REQUEST["cnowrists1"])
		$ret .= "&cnowrists1=1";
	if ($_REQUEST["cwrists2"])
		$ret .= "&cwrists2=1";
	else if ($_REQUEST["cnowrists2"])
		$ret .= "&cnowrists2=1";
	if ($_REQUEST["cnecklace"])
		$ret .= "&cnecklace=1";
	else if ($_REQUEST["cnonecklace"])
		$ret .= "&cnonecklace=1";
	if ($_REQUEST["cback"])
		$ret .= "&cback=1";
	else if ($_REQUEST["cnoback"])
		$ret .= "&cnoback=1";
	if ($_REQUEST["cwaist"])
		$ret .= "&cwaist=1";
	else if ($_REQUEST["cnowaist"])
		$ret .= "&cnowaist=1";

	return $ret;
}

function extra_query ()
{
	$rfp = 0;
	$synth = 0;
	if ($_REQUEST["tissueC"])
		$rfp++;
	if ($_REQUEST["tissue1"])
		$synth++;
	if ($_REQUEST["tissue2"])
		$synth++;
	if ($_REQUEST["tissue3"])
		$synth++;
	if ($_REQUEST["tissue4"])
		$synth++;
	$ret = "";
	if ($_REQUEST["wookiee"])
		$ret .= "and wookiee = 1 ";
	if ($_REQUEST["twilek"])
		$ret .= "and twileks = 1 ";
	if ($_REQUEST["trandoshan"])
		$ret .= "and trandoshan = 1 ";
	if ($_REQUEST["ithorian"])
		$ret .= "and ithorian = 1 ";
	if ($_REQUEST["other"])
		$ret .= "and other = 1 ";
	if ($_REQUEST["male"])
		$ret .= "and male = 1 ";
	if ($_REQUEST["female"])
		$ret .= "and female = 1 ";
	if ($rfp)
		$ret .= "and rfp > 0 ";
	if ($synth)
	{
		for ($loop = 0; $loop < 4 && $loop < $synth; $loop++)
		{
			$ret .= "and synth".($loop + 1)." > 0 ";
		}
	}
	if ($_REQUEST["mincost"] != "tax")
	{
		if ($_REQUEST["mincost"])
			$ret .= "and cost >= '".mysql_real_escape_string($_REQUEST["mincost"])."' ";
		if ($_REQUEST["maxcost"])
			$ret .= "and cost <= '".mysql_real_escape_string($_REQUEST["maxcost"])."' ";
	}
	if ($_REQUEST['new'] == 1)
		$ret .= "and new = 1 ";
	if ($_REQUEST["chead"])
		$ret .= "and covershead = 1 ";
	else if ($_REQUEST["cnohead"])
		$ret .= "and covershead != 1 ";
	if ($_REQUEST["cshirt"])
		$ret .= "and coversshirt = 1 ";
	else if ($_REQUEST["cnoshirt"])
		$ret .= "and coversshirt != 1 ";
	if ($_REQUEST["carms"])
		$ret .= "and coversarms = 1 ";
	else if ($_REQUEST["cnoarms"])
		$ret .= "and coversarms != 1 ";
	if ($_REQUEST["cjacket"])
		$ret .= "and coversjacket = 1 ";
	else if ($_REQUEST["cnojacket"])
		$ret .= "and coversjacket != 1 ";
	if ($_REQUEST["chands"])
		$ret .= "and covershands = 1 ";
	else if ($_REQUEST["cnohands"])
		$ret .= "and covershands != 1 ";
	if ($_REQUEST["clegs"])
		$ret .= "and coverslegs = 1 ";
	else if ($_REQUEST["cnolegs"])
		$ret .= "and coverslegs != 1 ";
	if ($_REQUEST["cfeet"])
		$ret .= "and coversfeet = 1 ";
	else if ($_REQUEST["cnofeet"])
		$ret .= "and coversfeet != 1 ";
	if ($_REQUEST["cwrists1"])
		$ret .= "and coverswrists1 = 1 ";
	else if ($_REQUEST["cnowrists1"])
		$ret .= "and coverswrists1 != 1 ";
	if ($_REQUEST["cwrists2"])
		$ret .= "and coverswrists2 = 1 ";
	else if ($_REQUEST["cnowrists2"])
		$ret .= "and coverswrists2 != 1 ";
	if ($_REQUEST["cnecklace"])
		$ret .= "and coversnecklace = 1 ";
	else if ($_REQUEST["cnonecklace"])
		$ret .= "and coversnecklace != 1 ";
	if ($_REQUEST["cback"])
		$ret .= "and coversback = 1 ";
	else if ($_REQUEST["cnoback"])
		$ret .= "and coversback != 1 ";
	if ($_REQUEST["cwaist"])
		$ret .= "and coverswaist = 1 ";
	else if ($_REQUEST["cnowaist"])
		$ret .= "and coverswaist != 1 ";

	return $ret;
}

function dbconnect ()
{
	include 'config.php';
	$link = mysql_connect($db_host, $db_username, $db_password)
		or die("Connection failed: " . mysql_error());
	mysql_select_db($db_name)
		or die("Database selection failed [$db_name]: " . mysql_error())
;

	return $link;
}

function has_tissue ()
{
	return $_REQUEST["tissueC"] || $_REQUEST["tissue1"] || $_REQUEST["tissue2"] || $_REQUEST["tissue3"] || $_REQUEST["tissue4"];
}

function tissue_add ($array, $type)
{
	if (!$_REQUEST[$type])
		return $array;

	$sql = "SELECT * from tk_tailortissue WHERE ID = '".mysql_real_escape_string($_REQUEST[$type])."'";

	$result = mysql_query($sql)
		or die("Query <b>".$sql."</b> failed: <i>" . mysql_error()."</i>");

	while ($row = mysql_fetch_array($result)) {
		$array[$row[bonus1]] += $row[bonus1val];
		if ($row[bonus2val])
			$array[$row[bonus2]] += $row[bonus2val];
	}

	return $array;
}

function tissue_cost ($sid)
{
	$cost = 0;
	$tissue = 0;
	$slist = "SELECT 1000 * (0";
	$flist = ") AS cost FROM tk_tailorschematics as S";
	$wlist = " WHERE S.ID = ".$sid;

	if ($_REQUEST["tissue1"])
	{
		$tissue++;
		$slist .= " + GREATEST(T".$tissue.".bonus1val, T".$tissue.".bonus2val) * S.synth".$tissue;
		$flist .= ", tk_tailortissue as T".$tissue;
		$wlist .= " and T".$tissue.".ID = '".mysql_real_escape_string($_REQUEST["tissue1"])."'";
	}
	if ($_REQUEST["tissue2"])
	{
		$tissue++;
		$slist .= " + GREATEST(T".$tissue.".bonus1val, T".$tissue.".bonus2val) * S.synth".$tissue;
		$flist .= ", tk_tailortissue as T".$tissue;
		$wlist .= " and T".$tissue.".ID = '".mysql_real_escape_string($_REQUEST["tissue2"])."'";
	}
	if ($_REQUEST["tissue3"])
	{
		$tissue++;
		$slist .= " + GREATEST(T".$tissue.".bonus1val, T".$tissue.".bonus2val) * S.synth".$tissue;
		$flist .= ", tk_tailortissue as T".$tissue;
		$wlist .= " and T".$tissue.".ID = '".mysql_real_escape_string($_REQUEST["tissue3"])."'";
	}
	if ($_REQUEST["tissue4"])
	{
		$tissue++;
		$slist .= " + GREATEST(T".$tissue.".bonus1val, T".$tissue.".bonus2val) * S.synth".$tissue;
		$flist .= ", tk_tailortissue as T".$tissue;
		$wlist .= " and T".$tissue.".ID = '".mysql_real_escape_string($_REQUEST["tissue4"])."'";
	}
	if ($_REQUEST["tissueC"])
	{
		$tissue++;
		$slist .= " + GREATEST(T".$tissue.".bonus1val, T".$tissue.".bonus2val) * S.rfp";
		$flist .= ", tk_tailortissue as T".$tissue;
		$wlist .= " and T".$tissue.".ID = '".mysql_real_escape_string($_REQUEST["tissueC"])."'";
	}

	$result = mysql_query($slist . $flist . $wlist)
		or die("Query <b>".$slist.$flist.$wlist."</b> failed: <i>" . mysql_error()."</i>");

	while ($row = mysql_fetch_array($result)) {
		$cost = $row[cost];
	}

	return $cost;
}

function viewcategory ($cat)
{
	$link = dbconnect ();

	$sql = "SELECT (S.synth1 > 0) + (S.synth2 > 0) + (S.synth3 > 0) + (S.synth4 > 0) AS synth, S.rfp, S.ID, S.schematicname, S.picname, S.male, S.female, S.ithorian, S.wookiee, S.twileks, S.other, S.catalogdescription, S.covershead, S.coversback, S.coverswaist, S.coversarms, S.coversjacket, S.coversshirt, S.coverslegs, S.coversfeet, S.covershands, S.coverswrists1, S.coverswrists2, S.coversnecklace, S.coverswaist, S.cost, S.new, P1.rgb as rgb1, P2.rgb as rgb2, P3.rgb as rgb3, P4.rgb as rgb4 FROM tk_tailorschematics as S, tk_tailorcategories as C, tk_tailorpalettes as P1, tk_tailorpalettes as P2, tk_tailorpalettes as P3, tk_tailorpalettes as P4 WHERE (S.category = C.category1 or S.category = C.category2) and C.name = '".mysql_real_escape_string($cat)."' and S.palette1 = P1.palette and S.defaultcolor1 = P1.ID and S.palette2 = P2.palette and S.defaultcolor2 = P2.ID and S.palette3 = P3.palette and S.defaultcolor3 = P3.ID and S.palette4 = P4.palette and S.defaultcolor4 = P4.ID ".extra_query()."ORDER BY schematicname";
	$result = mysql_query($sql)
		or die("Query failed: " . mysql_error());

	while ($row = mysql_fetch_array($result)) {
// Begin Table
		echo "<TABLE class=catalogitem>\n";
// Begin Row 1
		$table_row =  "<TR>";
// Image
		$namet = $row[schematicname];
		$picid = $row[picname];
		$picname = $picid;
		if ($row[rgb1]) $picname = $picname . "-" . $row[rgb1];
		if ($row[rgb2]) $picname = $picname . "-" . $row[rgb2];
		if ($row[rgb3]) $picname = $picname . "-" . $row[rgb3];
		if ($row[rgb4]) $picname = $picname . "-" . $row[rgb4];
		$table_row .= "<TD class=preview>";
		$table_row .= "<DIV class=preview>";
		$table_row .= "<DIV ID='L" . $picid . "' class=hidden>Loading...</DIV>";
		$table_row .= "<IMG ID=" . $picid . " class=previewimg WIDTH=300 HEIGHT=300 SRC='clothespics/";
		$table_row .= $picname;
		$table_row .= ".jpg'>";
		$table_row .= "</div>";
// Description
		$table_row .= "<TD class=desc>";
		if ($row["new"])
		{
			$table_row .= "<img src='images/New.png'><br>";
		}
		$table_row .= $row[catalogdescription]."</TD>";
		$table_row .= "</TR>";
		echo "$table_row\n";
// Begin row 2
		$table_row =  "<TR>";
// Color 1 Area
		$table_row .= "<TD class=colors ID='A" . $picid . "'>";
		$table_row .= "<div class=name>".$row[schematicname]."</div>";
		$item_cost = 0;
		if (has_tissue())
		{
			$item_cost = tissue_cost($row[ID]);
			if ($row[cost] * 2 > $item_cost)
				$item_cost += $row[cost];
		}
		else if ($row[cost])
		{
			$item_cost = $row[cost];
		}
		if ($item_cost)
		{
			$table_row .= "<div class=cost>".$item_cost."cr</div>";
			if ($_REQUEST["tax"])
				$table_row .= "<div class=cost>".ceil ($item_cost * 100 / ($_REQUEST["tax"] + 100))."cr</div>";
		}
		if ($row[rgb1])
			$table_row .= "<a onclick='TK_selectColor (\"" . $picid . "\"); return false;' title='Choose Colors' href='#'>Select Colors</a>";
		$table_row .= "</TD>";
// Notes
		$table_row .= "<TD class=notes>";
		$notes = "";
		if ($row[covershead]==1)
			{
			$notes .="<br>Covers Head";
			}
		if ($row[coversshirt]==1)
			{
			$notes .="<br>Covers Shirt";
			}
		if ($row[coversarms]==1)
			{
			$notes .="<br>Covers Arms";
			}
		if ($row[coversjacket]==1)
			{
			$notes .="<br>Covers Chest";
			}
		if ($row[coversback]==1)
			{
			$notes .="<br>Covers Backpack";
			}
		if ($row[covershands]==1)
			{
			$notes .= "<br>Covers Hands";
			}
		if ($row[coverslegs]==1)
			{
			$notes .= "<br>Covers Legs";
			}
		if ($row[coversfeet]==1)
			{
			$notes .= "<br>Covers Feet";
			}
		if ($row[coverswrists1]==1)
			{
			$notes .= "<br>Covers Right Wrist";
			}
		if ($row[coverswrists2]==1)
			{
			$notes .= "<br>Covers Left Wrist";
			}
		if ($row[coversnecklace]==1)
			{
			$notes .= "<br>Covers Necklace";
			}
		if ($row[coverswaist]==1)
			{
			$notes .= "<br>Covers Waist";
			}
		if ($row[female]!=1)
			{
			$notes .= "<br>For Men Only";
			}
		if ($row[male]!=1)
			{
			$notes .= "<br>For Women Only";
			}
		if ($row[wookiee]==1 && $row[other]!=1)
			{
			$notes .= "<br>For Wookiees Only";
			}
		if ($row[ithorian]==1 && $row[other]!=1)
			{
			$notes .= "<br>For Ithorians Only";
			}
		if ($row[wookiee]==1 && $row[other]==1)
			{
			$notes .= "<br>Fits Wookiee";
			}
		if ($row[ithorian]==1 && $row[other]==1 && $_REQUEST["new"])
			{
			$notes .= "<br>Fits Ithorians";
			}
		if ($row[twileks]!=1 && $row[other]==1)
			{
			$notes .= "<br>Won't Fit Twi'lek";
			}
		if ($row[other]!=1 && $row[twileks]==1)
			{
			$notes .= "<br>For Twi'lek Only";
			}
		if ($row[rfp] > 0)
			{
			$notes .= "<br>Takes 1 Combat Enhancement";
			}
		if ($row[synth] > 0)
			{
			$notes .= "<br>Takes ".$row[synth]." Non-Combat Enhancement";
			if ($row[synth] > 1)
				$notes .= "s";
			}
		if ($notes)
			$table_row .= "<b>Notes:</b>" . $notes;
		$table_row .- "</TD>";		
		$table_row .= "<TR>";
// Output Row 2
		echo "$table_row\n";
	}
echo "</TABLE>\n";
}

function listcategories ()
{
	$link = dbconnect ();

	$req = extra_request ();

	$count = 0;

	$sql = "SELECT DISTINCT C.name, C.description FROM tk_tailorcategories as C, tk_tailorschematics as S WHERE (S.category = C.category1 or S.category = C.category2) ".extra_query();
	$result = mysql_query($sql)
		or die("Query failed: " . mysql_error());
	while ($row = mysql_fetch_array($result)) {
		echo ("<a href='view.php?category=" . $row[name] . $req . "'>" . $row[description] . "</a><br>\n");
		$count++;
	}

	if (!$count)
	{
		echo ("No items within selected limits.");
	}

	$enhancedesc = enhanced_desc ();
	if ($enhancedesc)
	{
		echo ("<hr><P>Viewing items enhanced with...<BR>" . $enhancedesc . "</P>");
	}
	echo ("<hr>");
	$filterdesc = extra_desc ();
	if ($filterdesc)
	{
		echo ("<P>Viewing only items that...<BR>" . $filterdesc . "<a href='filter.php?" . $req . "'>Change Limits</a><BR><a href='menu.php' target='contents'>Clear Limit</a></P>");
	}
	else
	{
		echo ("<P>Viewing all items.<BR><a href='filter.php'>Limit Display</A></P>");
	}
	echo ("<hr>");
}


function query_item ($item)
{
	$link = dbconnect ();

	$sql = "SELECT schematicname as name, palette1, palette2, palette3, palette4, defaultcolor1, defaultcolor2, defaultcolor3, defaultcolor4, color1loc, color2loc, color3loc, color4loc from tk_tailorschematics where picname = '" . mysql_real_escape_string($item) . "'";

	$result = mysql_query ($sql)
		or die("Query failed: " . mysql_error());

	$result = mysql_fetch_array($result);

	$result[palettes] = array (0 => $result[palette1]);
	$result[colors] = array (0 => $result[defaultcolor1]);
	$result[colornames] = array (0 => $result[color1loc]);
	if ($result[palette2]) {
		$result[palettes][1] = $result[palette2];
		$result[colors][1] = $result[defaultcolor2];
		$result[colornames][1] = $result[color2loc];
	}
	if ($result[palette3]) {
		$result[palettes][2] = $result[palette3];
		$result[colors][2] = $result[defaultcolor3];
		$result[colornames][2] = $result[color3loc];
	}
	if ($result[palette4]) {
		$result[palettes][3] = $result[palette4];
		$result[colors][3] = $result[defaultcolor4];
		$result[colornames][3] = $result[color4loc];
	}

	return $result;
}

function make_options($list, $default)
{
	echo "<OPTION VALUE=0>None</OPTION>";
	for ($loop = 0; $loop < count($list); $loop++)
	{
		if ($loop == $default)
			echo "<OPTION SELECTED " . $list[$loop];
		else
			echo "<OPTION " . $list[$loop];
	}
}

function list_enhancements()
{
	$link = dbconnect ();

	$sql = "SELECT ID, bonus1, bonus1val, bonus2, bonus2val, combat FROM tk_tailortissue ORDER BY bonus1, -bonus1val";
	$result = mysql_query ($sql)
		or die("Query failed: " . mysql_error());

	$default = 0;
	$default1 = 0;
	$default2 = 0;
	$default3 = 0;
	$default4 = 0;
	$combat = array("DISABLED VALUE=0>-- Combat Enhancement --</OPTION>");
	$noncombat = array("DISABLED VALUE=0>-- Non-combat Enhancement --</OPTION>");

	while ($row = mysql_fetch_array($result)) {
		if ($_REQUEST["tissueC"] == $row[ID])
			$default = count($combat);
		if ($_REQUEST["tissue1"] == $row[ID])
			$default1 = count($noncombat);
		if ($_REQUEST["tissue2"] == $row[ID])
			$default2 = count($noncombat);
		if ($_REQUEST["tissue3"] == $row[ID])
			$default3 = count($noncombat);
		if ($_REQUEST["tissue4"] == $row[ID])
			$default4 = count($noncombat);

		$label = $row[bonus1] . " +" . $row[bonus1val];
		if ($row[bonus2])
			$label .= "/" . $row[bonus2] . " +" . $row[bonus2val];

		$option = "VALUE=" . $row[ID] . ">" . $label . "</OPTION>";
		if ($row[combat])
			$combat[] = $option;
		else
			$noncombat[] = $option;
	}

	echo "<select name=tissueC>";
	make_options ($combat, $default);
	echo "</select><br>";
	echo "<select name=tissue1>";
	make_options ($noncombat, $default1);
	echo "</select>";
	echo "<select name=tissue2>";
	make_options ($noncombat, $default2);
	echo "</select>";
	echo "<select name=tissue3>";
	make_options ($noncombat, $default3);
	echo "</select>";
	echo "<select name=tissue4>";
	make_options ($noncombat, $default4);
	echo "</select><br>";
}

?>
