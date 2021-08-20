<?php
include "catalog.php";

$result = query_item ($item);
$itemname = $result[name];
$defcolors = $result[colors];
$palettes = $result[palettes];

?>
<HTML><head>
<LINK rel="stylesheet" href="palettes.css" type="text/css">
<SCRIPT language=JavaScript src=palettes.js></SCRIPT>
<SCRIPT language=JavaScript>
<?php

echo ("document.TK_TargetColors = [ " . implode (",", $defcolors) . " ];\n");
echo ("document.TK_Item = '" . $item . "';\n");
echo ("document.TK_ItemName = '" . mysql_escape_string ($itemname) . "';\n");
echo ("document.TK_Palettes = [ new TK_" . implode ("Palette, new TK_", $palettes) . "Palette ];\n");
echo ("document.TK_ColorNames = [ '" . implode ("', '", $result[colornames]) . "' ];\n");
?>

document.write ('<TITLE>Select a Color For ' + document.TK_ItemName + '</title>');
</SCRIPT>
<SCRIPT language=JavaScript src=colorselect.js></SCRIPT>
</SCRIPT>
</HEAD><BODY onload="TK_markDefaults ();">
<SCRIPT language=JavaScript><!--
document.write ('<DIV class=Title>' + document.TK_ItemName + '</DIV>');
TK_drawPalettes ();
// --></SCRIPT>
</BODY></HTML>
