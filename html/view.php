<?php
$category = $_GET["category"];
include 'catalog.php';
?>
<HTML><HEAD>
<TITLE>View Category</TITLE>
<LINK rel="stylesheet" href="catalog.css" type="text/css">

<STYLE type="text/css">
DIV.preview {
	width: 335px;
	height: 303px;
	background-image: url("/clothesbg.png");
	position: relative;
}

DIV.previewimgpng, IMG.previewimgpng {
	position: absolute;
	width: 300px;
	height: 300px;
	top: 1px;
	left: 15px;
}

IMG.previewimg {
	position: absolute;
	width: 335px;
	height: 303px;
	top: 0px;
	left: 0px;
}

DIV.loading {
	position: absolute;
	font-size: 36pt;
	color: #204040;
	top: 120px;
        left: 0px;
	width: 335px;
}

TABLE.catalogitem {
	width: 600px;
	border-collapse: collapse;
	border-spacing: 0;
	empty-cells: show;
	border: 2px inset #808080;
	margin-bottom: 4px;
}

TD {
	vertical-align: top;
	border: 0px;
	text-align: center;
	padding: 0px;
	margin: 0px;
}

TD.desc, TD.notes {
	text-align: left;
	padding-top: 5px;
	padding-right: 5px;
}

TD.notes, TD.colors {
	padding-bottom: 5px;
}

TD.preview {
	width: 335px;
	padding-top: 5px;
	padding-left: 5px;
	padding-right: 5px;
}

DIV.name, DIV.cost {
	text-align: center;
}

TD.desc {
	vertical-align: middle;
	text-align: left;
}

.hidden {
	visibility: hidden;
}

IMG.hidden {
	filter:progid:DXImageTransform.Microsoft.Alpha(opacity=0);
}
</STYLE>
<SCRIPT language=JavaScript>
function TK_selectColor (item)
{
	if (document.TK_PickWindow && !document.TK_PickWindow.closed)
		document.TK_PickWindow.location = "colorselect.php?item=" + item;
	else
		document.TK_PickWindow = window.open ('colorselect.php?item=' + item,'TKSelectColor','width=200,height=200,top=0,left=0,resizable=1,location=0,menubar=0,scrollbars=0,status=0,toolbar=0');
	document.TK_PickWindow.focus();
}

function TK_closePicker ()
{
	if (document.TK_PickWindow && document.TK_PickWindow.close)
	{
		document.TK_PickWindow.close ();
	}
}

</SCRIPT>
<?php
echo "<HTML><HEAD><TITLE>View Category</TITLE></HEAD>\n";
echo "<BODY onunload='TK_closePicker();'>\n";
viewcategory ($category);
echo "</BODY></HTML>";

?>
</BODY></HTML>
