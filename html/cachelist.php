<html><head>
<LINK rel="stylesheet" href="catalog.css" type="text/css">

<base target="preview">
</head><body>
<table>
<tr><TD>Filename</TD><TD>Last hit</TD><TD>Rank</TD>
<TD>Raw lasthit</TD>
<TD>Current</TD>
<TD>45m</TD>
<TD>90m</TD>
<TD>3h</TD>
<TD>6h</TD>
<TD>12h</TD>
<TD>24h</TD>
<TD>48h</TD>
<TD>96h</TD>
<TD>96h</TD>
</TR>
<?php

include "catalog.php";

$link = dbconnect ();

$sql = 'select filename, FROM_UNIXTIME(lasthit * 60, "%y %M %D %h:%i") as hitdate, hits10 + hits9 + hits8 * 2 + hits7 * 3 + hits6 * 4 + hits5 * 5 + hits4 * 6 + hits3 * 7 + hits2 * 8 + hits1 * 10 as rank, lasthit, hits1, hits2, hits3, hits4, hits5, hits6, hits7, hits8, hits9, hits10 from tk_tailorcache where filename != "timestamp" order by rank DESC, lasthit';
$result = mysql_query($sql)
	or die("Query <b>".$sql."</b> failed: <i>" . mysql_error()."</i>");

$pics = array();

$count = 0;

while ($row = mysql_fetch_array($result))
{
	$count++;
	$name = explode ('-', $row[filename], 2);
	$initrow = 0;
	if (!$pics[$name[0]])
	{
		$pics[$name[0]] = 1;
		$initrow = 1;
	}
	if ($initrow)
		$table_row = "<tr style='background-color: #a0a0a0;'><td>";
	else
		$table_row = "<tr><td>";
	$table_row .= "<a href=clothespicsf/" . $row[filename] . ">";
	$table_row .= $row[filename];
	$table_row .= "</a></td><td>";
	$table_row .= $row[hitdate];
	$table_row .= "</td><td>";
	$table_row .= $row[rank];
	$table_row .= "</td><td>";
	$table_row .= $row[lasthit];
	$table_row .= "</td><td>";
	$table_row .= $row[hits1];
	$table_row .= "</td><td>";
	$table_row .= $row[hits2];
	$table_row .= "</td><td>";
	$table_row .= $row[hits3];
	$table_row .= "</td><td>";
	$table_row .= $row[hits4];
	$table_row .= "</td><td>";
	$table_row .= $row[hits5];
	$table_row .= "</td><td>";
	$table_row .= $row[hits6];
	$table_row .= "</td><td>";
	$table_row .= $row[hits7];
	$table_row .= "</td><td>";
	$table_row .= $row[hits8];
	$table_row .= "</td><td>";
	$table_row .= $row[hits9];
	$table_row .= "</td><td>";
	$table_row .= $row[hits10];
	$table_row .= "</td></tr>\n";
	echo $table_row;
}

?>
</table>
<?php echo "<P>".$count." total files" ?>
</body></html>
