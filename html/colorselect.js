function TK_markColor (m, n)
{
	var box = document.getElementById ("P" + m + "_" + n);

	document.TK_Palettes[m].markSelected (box);
}

function TK_unmarkColor (m, n)
{
	var box = document.getElementById ("P" + m + "_" + n);

	document.TK_Palettes[m].unmarkSelected (box);
}

function TK_selectColor (m, n)
{
	if (document.TK_TargetColors[m] == n)
		return;

	TK_unmarkColor (m, document.TK_TargetColors[m]);
	TK_markColor (m, n);

	document.TK_TargetColors[m] = n;

	TK_refreshImage ();
}

function TK_markDefaults ()
{
	if (window.opener)
	{
		var img = window.opener.document.getElementById (document.TK_Item);
		document.TK_TargetImg = img;
		document.TK_TargetLoading = window.opener.document.getElementById ('L' + document.TK_Item);

		if (img)
		{
			TK_copyColors (document.TK_TargetColors, img);
		}
	} else {
		alert ("Unable to establish communication with main window.");
	}
	var iter = 0;

	for (iter = 0; iter < document.TK_Palettes.length; iter++)
	{
		TK_markColor (iter, document.TK_TargetColors[iter]);
	}
}

function TK_drawPalettes()
{
	var iter = 0;
	var width = 0;
	var maxheight = 0;

	document.write ("<TABLE CELLSPACING=10 CELLSPACING=0><TR>");
	for (iter = 0; iter < document.TK_Palettes.length; iter++)
	{
		width += document.TK_Palettes[iter].PixelWidth + 10;
		if (document.TK_Palettes[iter].PixelHeight > maxheight)
			maxheight = document.TK_Palettes[iter].PixelHeight;
		document.write ("<TD><DIV class=colorlabel>" + document.TK_ColorNames[iter] + "</DIV>");
		document.TK_Palettes[iter].drawPalette (iter);
		document.write ("</TD>");
	}
	document.write ("</TR></TABLE>");

	window.resizeTo (width + 26, maxheight + 100);
}

function TK_copyColors(dst, src)
{
	if (dst.tagName)
	{
		for (var iter = 0; iter < src.length; iter++)
		{
			dst["TK_Color" + iter] = src[iter];
		}
		return;
	}
	if (src.TK_Color0 || src.TK_Color0 == "0")
	{
		for (var iter = 0; iter < dst.length; iter++)
		{
			dst[iter] = src["TK_Color" + iter];
		}
	}
}

function TK_refreshImage()
{
	var iter;
	var imgname = '/clothespics/' + document.TK_Item;

	for (iter = 0; iter < document.TK_Palettes.length; iter++)
	{
		imgname = imgname + '-' + document.TK_Palettes[iter].colorTuple (document.TK_TargetColors[iter]);
	}

	if (document.TK_TargetImg)
	{
		var newImg = document.TK_TargetImg.ownerDocument.createElement ("IMG");
		var theParent = document.TK_TargetImg.parentNode;
		newImg.id = document.TK_TargetImg.id;
		newImg.TK_ColorNameDiv = document.TK_TargetImg.TK_ColorNameDiv;
		theParent.removeChild (document.TK_TargetImg);

		if (theParent.TK_ieimg)
		{
			theParent.className = "hidden";
		}
		document.TK_TargetImg = newImg;
		document.TK_TargetImg.className = "hidden";
		document.TK_TargetLoading.className = "loading";
		document.TK_TargetImg.onload = TK_imageLoaded;
		document.TK_TargetImg.onerror = TK_imageError;
		document.TK_TargetImg.TK_TargetLoading = document.TK_TargetLoading;
		TK_copyColors (document.TK_TargetImg, document.TK_TargetColors);

		document.TK_TargetImg.src = imgname + ".png";
		theParent.appendChild (document.TK_TargetImg);
		if (document.TK_TargetImg.complete) document.TK_TargetImg.onload ();

		TK_ShowColorName ();
	}
}

function TK_ShowColorName ()
{
	var colorname = '';

	for (var iter = 0; iter < document.TK_Palettes.length; iter++)
	{
		colorname += document.TK_Palettes[iter].colorName (Number (document.TK_TargetColors[iter]));
	}

	if (!document.TK_TargetImg.TK_ColorNameDiv)
	{
		document.TK_TargetImg.TK_ColorNameDiv = document.TK_TargetImg.ownerDocument.createElement ('DIV');

		var ColorCell = document.TK_TargetImg.ownerDocument.
			getElementById ('A' + document.TK_Item);

		ColorCell.appendChild (document.TK_TargetImg.TK_ColorNameDiv);
	}

	document.TK_TargetImg.TK_ColorNameDiv.innerHTML =
		"<I>TK Color Code</I>: " + colorname;
}

function TK_fixIETransparency (elem)
{
	var newDiv = elem.ownerDocument.createElement ("DIV");
	newDiv.TK_ieimg = 1;
	newDiv.className = "previewimgpng";
	newDiv.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + elem.src + "')"; 
	elem.parentNode.appendChild (newDiv);
	elem.parentNode.removeChild (elem);
	newDiv.appendChild (elem);
}

function TK_imageLoaded ()
{
	if (!this.parentNode || this.TK_Loaded)
		return;
	this.TK_Loaded = 1;
	this.TK_TargetLoading.className = "hidden";
	if (this.filters)
	{
		if (!this.parentNode.TK_ieimg)
		{
			TK_fixIETransparency (this);
		}
		else
		{
			this.parentNode.filters["DXImageTransform.Microsoft.AlphaImageLoader"].src = this.src;
			this.parentNode.className = 'previewimgpng';
		}
	}
	else
	{
		this.className = "previewimgpng";
	}
}

function TK_imageError ()
{
	this.onerror = '';
	if (window.TK_errTimeout)
		window.clearTimeout (window.TK_errTimeout);

	window.TK_errTimeout = 0;
	window.TK_errImg = this;
	window.TK_errTimeout = window.setTimeout ("window.TK_errTimeout = 0; window.TK_errImg.src = window.TK_errImg.src + '?retry'", 250);
}
