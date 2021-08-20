function TK_genericMark(elem)
{
	elem.className = "M" + this.PalType;
}

function TK_genericUnmark(elem)
{
	elem.className = this.PalType;
}

function TK_genericDraw(idx)
{
	this.PaletteIndex = idx;
	document.write ("<TABLE CELLPADDING=0 CELLSPACING=0>\n");
	for (var loop = 0; loop < this.ColorCount; loop++)
	{
		if (loop % this.HorizontalButtons == 0)
		{
			document.write ("<TR>");
		}
		document.write ("<TD><DIV ID='P" + this.PaletteIndex + "_" + loop + "' CLASS='" + this.PalType + "' STYLE='background-color: #" + this.ColorTable[loop] + "' ONMOUSEDOWN='TK_selectColor (" + this.PaletteIndex + ", " + loop + ");'></DIV></TD>");
		if (loop % this.HorizontalButtons == this.HorizontalButtons - 1)
		{
			document.write ("</TR>\n");
		}
	}

	if (this.ColorCount % this.HorizontalButtons)
	{
		document.write ("</TR>\n");
	}

	document.write ("</TABLE>\n");
}

function TK_genericColorTuple(n)
{
	return this.ColorTable[n];
}

function TK_toAlpha(n)
{
	var alpha = [ 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',
		'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T' ];

	return alpha [n];
}

function TK_genericColorName(n)
{
	var name = Math.floor (n / this.Shades) + 1;

	name = name + TK_toAlpha (this.Shades - (n % this.Shades) - 1);
	return name;
}

function TK_Leather12ColorName(n)
{
	var name = Math.floor (n / this.Shades) + 1;

	if (name & 1)
		name = name + TK_toAlpha (this.Shades - (n % this.Shades) - 1);
	else
		name = name + TK_toAlpha (n % this.Shades);
	return name;
}

function TK_ClothColorName(n)
{
	var shades = [ 'R', 'O', 'Y', 'G', 'B', 'P' ];
	var extrashades = [ 'P', 'R', 'O', 'Y' ];
	var name = Math.floor (n / 42) + 1;

	if (name > 6)
		return name + extrashades[n % 42];
	name = name + shades[Math.floor (n / 7) % 6];
	name = name + TK_toAlpha (6 - (n % 7));
	return name;
}

function TK_LongFJColorName(n)
{
	return n + 1;
}

function TK_ClothPalette()
{
	this.unmarkSelected = TK_genericUnmark;
	this.markSelected = TK_genericMark;
	this.drawPalette = TK_genericDraw;
	this.colorTuple = TK_genericColorTuple;
	this.colorName = TK_ClothColorName;
	this.PalType= "Cloth";
	this.HorizontalButtons = 14;
	this.PixelWidth = 14 * 12;
	this.ColorCount = 255;
	this.PixelHeight = Math.ceil (255 / 14) * 12;
	this.ColorTable = [
	"b1b1b1", "a0a59b", "8c9187", "797d74", "656961", "51554e", "3d403a", 
	"caabab", "b59999", "9f8686", "8a7474", "756161", "5f4e4e", "4a3b3b", 
	"bcb1a5", "aca296", "9c9388", "8c8379", "7c7269", "6d655b", "5c544c", 
	"b7b4a0", "a7a593", "969583", "888676", "777567", "676659", "57564a", 
	"b5bbad", "a5ab9d", "959b8e", "81877a", "777a71", "656a60", "565a52", 
	"b2b1b0", "a5a8ab", "94969a", "84868a", "73757a", "63656a", "525559", 
	"d4d4d4", "cccccc", "c4c4c4", "bcbcbc", "b4b4b4", "acacac", "a4a4a4", 
	"ccb4bb", "bea4ac", "b0949c", "a2848d", "93747d", "85656e", "76545f", 
	"ccc3af", "bcb29e", "aba28c", "9b927b", "8a826b", "776e56", "696148", 
	"caccae", "b7b89c", "a5a58c", "92937a", "7f8069", "6c6c58", "5a5947", 
	"bccebc", "aabcaa", "99aa99", "889988", "778677", "657465", "536153", 
	"bfc9cf", "adb8be", "9ba5ac", "89959b", "778489", "657379", "536268", 
	"8f8f8f", "838383", "777777", "6b6b6b", "5f5f5f", "535353", "474747", 
	"c7b197", "b8a288", "a9937a", "9a846b", "8b755c", "7c674d", "6d583e", 
	"cece96", "bbbb86", "a9a977", "969667", "838356", "717146", "5f5f37", 
	"c3b6b4", "b1a2a1", "a08f8f", "8e7d7c", "7b6968", "6a5656", "584343", 
	"bed3d4", "aabbbe", "96a6ac", "82929c", "6e7d89", "5a6877", "465366", 
	"beb7c3", "aea7b3", "9e96a2", "8d8593", "7d7482", "6d6471", "5c5361", 
	"cfaebd", "be9ba8", "ae8893", "9c717d", "8b5f68", "7b4c55", "6b3940", 
	"c3a272", "b39469", "a3845f", "937655", "83674b", "745941", "634937", 
	"c8c28f", "b4af80", "a19c6f", "8e895f", "87804d", "6c6637", "524b21", 
	"dbf8e8", "bbdfcd", "a1c3b1", "84aa96", "668f79", "4a765e", "2d5b43", 
	"afdaf0", "9ac0d9", "85a6c3", "708bac", "5b7195", "46577e", "313d6b", 
	"d4bed4", "c0abc0", "ae97ae", "9a849a", "867186", "745d74", "604960", 
	"d499aa", "c88598", "bc7186", "b05d74", "a34962", "973551", "8b213f", 
	"d49877", "b88e77", "ab8068", "9d735b", "8f654d", "81583f", "744a31", 
	"c5c080", "b3ae74", "a19c67", "8e895a", "7b764d", "686340", "565134", 
	"b2ca9e", "9fb78d", "8ca47b", "7a916b", "687d59", "556a47", "425737", 
	"a5adcc", "9399bd", "8086ae", "6e749f", "5c6290", "4a4f81", "383d72", 
	"c5b1ce", "b6a0c0", "a68fb1", "977da3", "876c94", "855e97", "704784", 
	"f5c9d6", "e9adb8", "dd8e97", "d17379", "c5565b", "b93a3c", "ad1d1d", 
	"fbca86", "f0b470", "e49d5a", "d88645", "cd6f2d", "c15818", "b64203", 
	"c5c47d", "bcb96f", "b4ae62", "aba453", "a39946", "9a8f37", "92842a", 
	"79c49e", "6bb58a", "5ca677", "4e9763", "40884f", "317a3c", "236b28", 
	"7fb5c5", "74a3bd", "6790b5", "5b7dae", "4e6ba5", "42589d", "364696", 
	"b49bca", "a68abf", "997ab4", "8b69a8", "7d599d", "704892", "623786", 
	"9b47a2", "b12525", "c26e23" ];
}

function TK_DressRPalette()
{
	this.unmarkSelected = TK_genericUnmark;
	this.markSelected = TK_genericMark;
	this.drawPalette = TK_genericDraw;
	this.colorTuple = TK_genericColorTuple;
	this.colorName = TK_genericColorName;
	this.PalType= "DressR";
	this.HorizontalButtons = 16;
	this.PixelWidth = 16 * 12;
	this.ColorCount = 255;
	this.PixelHeight = Math.ceil (255 / 16) * 12;
	this.Shades = 16;
	this.ColorTable = [
	"917d62", "fefefe", "fecfc3", "eec2b7", "deb5ab", "cea89e", "bf9b92", "af8e86",
	"9f817a", "8f746d", "7f6761", "6f5a55", "604d49", "50403c", "403330", "302624",
	"f3cfb7", "e7c5ae", "dbbba5", "cfb09c", "c3a693", "b79c8a", "ab9281", "9f8878",
	"947d6f", "887366", "7c695d", "705f54", "64554b", "584a42", "4c4039", "403630",
	"aa9273", "a28b6d", "9a8468", "917d62", "89765d", "816f57", "796852", "71614c",
	"685947", "605241", "584b3c", "504436", "483d31", "3f362b", "372f26", "2f2820",
	"cbae7d", "c1a577", "b79d70", "ad946a", "a28b64", "98835e", "8e7a57", "847151",
	"7a694b", "706045", "66573e", "5c4f38", "514632", "473d2c", "3d3525", "332c1f",
	"b18a72", "a8836c", "a07d67", "977661", "8f6f5c", "866956", "7e6251", "755b4b",
	"6d5546", "644e40", "5c473b", "534135", "4b3a30", "42332a", "3a2d25", "31261f",
	"cd6265", "c45d5f", "bb575a", "b25254", "a94c4f", "a04749", "974244", "8e3c3e",
	"863739", "7d3133", "742c2e", "6b2728", "622123", "591c1d", "501618", "471112",
	"c38265", "b97b60", "b0755b", "a66e56", "9c6851", "92614c", "895b47", "7f5442",
	"754e3c", "6b4737", "624132", "583a2d", "4e3428", "442d23", "3b271e", "312019",
	"e8e478", "ddd972", "d2ce6c", "c7c367", "bbb861", "b0ad5b", "a5a255", "9a974f",
	"8f8d4a", "848244", "79773e", "6e6c38", "626132", "57562d", "4c4b27", "414021",
	"e2a162", "d7995d", "cd9259", "c28a54", "b7824f", "ac7b4b", "a27346", "976b41",
	"8c643d", "815c38", "775433", "6c4d2f", "61452a", "563d25", "4c3621", "412e1c",
	"d6edb5", "cce2ac", "c2d7a4", "b8cc9b", "aec093", "a4b58a", "9aaa82", "909f79",
	"859471", "7b8968", "717e60", "677357", "5d674f", "535c46", "49513e", "3f4635",
	"b9e0b5", "b0d5ac", "a6caa3", "9dbe9a", "94b391", "8ba888", "819d7f", "789276",
	"6f866c", "667b63", "5c705a", "536551", "4a5a48", "414e3f", "374336", "2e382d",
	"fee2b6", "f1d6ac", "e3caa3", "d6be99", "c9b390", "bba786", "ae9b7c", "a18f73",
	"938369", "867760", "796b56", "6b5f4c", "5e5443", "514839", "433c30", "363026",
	"bccffe", "b1c4f5", "a6baeb", "9bafe2", "8fa4d8", "849acf", "798fc6", "6e84bc",
	"637ab3", "586fa9", "4d64a0", "425a97", "364f8d", "2b4484", "203a7a", "152f71",
	"d9c7e7", "cebcdd", "c4b1d3", "b9a6c9", "af9bbf", "a490b5", "9a85ab", "8f7aa1",
	"856e96", "7a638c", "705882", "654d78", "5b426e", "503764", "462c5a", "3b2150",
	"edc5e4", "e2bad8", "d7aecc", "cda3c0", "c298b4", "b78ca8", "ac819c", "a17690",
	"976a84", "8c5f78", "81546c", "764860", "6b3d54", "613248", "56263c", "4b1b30",
	"fefafa", "f0eded", "e3dfdf", "d5d2d2", "c8c4c4", "bab7b7", "acaaaa", "9f9c9c",
	"918f8f", "848181", "767474", "686767", "5b5959", "4d4c4c", "403e3e"
	];
}

function TK_Leather12Palette()
{
	this.unmarkSelected = TK_genericUnmark;
	this.markSelected = TK_genericMark;
	this.drawPalette = TK_genericDraw;
	this.colorTuple = TK_genericColorTuple;
	this.colorName = TK_Leather12ColorName;
	this.PalType= "Leather12";
	this.HorizontalButtons = 8;
	this.PixelWidth = 8 * 20;
	this.ColorCount = 48;
	this.PixelHeight = Math.ceil (48 / 8) * 20;
	this.Shades = 4;
	this.ColorTable = [
	"cecece", "9f9f9f", "717171", "424242",
	"53463e", "74645b", "988478", "b99f90",
	"92806a", "7c6d5b", "665b4c", "51483e",
	"53463d", "685950", "7d6b5f", "947e71",
	"9f6e70", "876263", "6f5051", "593b3c",
	"564137", "705245", "8a6352", "a47560",
	"b6a469", "938157", "706345", "4e4433",
	"494e3c", "687055", "848f6b", "a6b18c",
	"a1b69f", "829281", "597156", "404a3f",
	"534c3c", "7d6f4e", "a19168", "c5b282",
	"a89497", "8e7d80", "736869", "595153",
	"5b5754", "6d6a62", "7f7d70", "91907d"
	];
}

function TK_Leather24Palette()
{
	this.unmarkSelected = TK_genericUnmark;
	this.markSelected = TK_genericMark;
	this.drawPalette = TK_genericDraw;
	this.colorTuple = TK_genericColorTuple;
	this.colorName = TK_genericColorName;
	this.PalType= "Leather24";
	this.HorizontalButtons = 12;
	this.PixelWidth = 12 * 18;
	this.ColorCount = 96;
	this.PixelHeight = Math.ceil(96 / 12) * 18;
	this.Shades = 4;
	this.ColorTable = [
	"beb9a2", "b4ab96", "a39987", "8f8171",
	"b9a99d", "a99381", "8d7b6e", "7e6858",
	"948b76", "817967", "6c6559", "5f5446",
	"a39489", "8f8178", "7b6e66", "675b54",
	"cac39d", "aea88a", "938c78", "777165",
	"bca385", "a48f78", "8b7c69", "73695c",
	"a3a37e", "8d8f6f", "757b60", "5f6752",
	"858679", "6c6d64", "535450", "3a3a3a",
	"baacab", "a19392", "887a78", "6e605e",
	"b5a377", "9e906c", "887c60", "716955",
	"99a683", "889475", "778167", "666f58",
	"cfcfcf", "b8bbbb", "a2a7a8", "8f9394",
	"acae8a", "969879", "808267", "6a6c57",
	"b6948e", "997d79", "7d6763", "60514e",
	"a4b3b6", "8d9a9d", "768183", "5f6869",
	"c3c16d", "a59e60", "867b52", "685945",
	"c1948d", "a47e78", "886864", "6c524f",
	"90acae", "788f91", "607373", "485657",
	"8dab99", "758f7f", "5c7265", "44554b",
	"ada4ab", "938a91", "7a7177", "60575d",
	"bc98ac", "a28394", "876e7c", "6c5964",
	"949dbc", "7f86a2", "697189", "545a70",
	"b9a67e", "9a8669", "7a6653", "5b463e",
	"bec169", "9ba15b", "77814d", "53613e"
	];
}

function TK_LongFJPalette()
{
	this.unmarkSelected = TK_genericUnmark;
	this.markSelected = TK_genericMark;
	this.drawPalette = TK_genericDraw;
	this.colorTuple = TK_genericColorTuple;
	this.colorName = TK_LongFJColorName;
	this.PalType= "LongFJ";
	this.HorizontalButtons = 4;
	this.PixelWidth = 4 * 40;
	this.ColorCount = 24;
	this.PixelHeight = Math.ceil (24 / 4) * 40;
	this.ColorTable = [
	"b0aba9", "b0a5a7", "a09ca3", "98989e", "98989e", "918d8a",
	"84847e", "8c8587", "7f787b", "b29982", "a48d79", "9b8874",
	"9b8373", "9b8373", "9b8373", "9b8373", "272727", "2e2e2e",
	"333333", "444444", "545454", "5f5f5f", "636364", "737374"
	];
}

function TK_MetalPalette()
{
	this.unmarkSelected = TK_genericUnmark;
	this.markSelected = TK_genericMark;
	this.drawPalette = TK_genericDraw;
	this.colorTuple = TK_genericColorTuple;
	this.colorName = TK_genericColorName;
	this.PalType= "Metal";
	this.HorizontalButtons = 16;
	this.PixelWidth = 16 * 12;
	this.ColorCount = 144;
	this.PixelHeight = Math.ceil (144 / 16) * 12;
	this.Shades = 8;
	this.ColorTable = [
	"b5babc", "adb1b1", "a4a7a6", "9b9e9a", "92958e", "8a8c83", "808278", "78796d",
	"bdbcb1", "b1b2a9", "a6a8a0", "9a9e98", "8f948f", "838a87", "78807e", "6c7676",
	"acaeb5", "a1a4ac", "969aa2", "8b9099", "808690", "757c87", "6a727d", "5f6874",
	"abb3b2", "a2a9a9", "98a09f", "8f9696", "868d8d", "7d8384", "737a7a", "6a7071",
	"a09c86", "9b957d", "978d74", "92866b", "8d7f61", "887858", "84704f", "7f6946",
	"919097", "88878e", "807f84", "77767b", "6e6d71", "656468", "5d5c5e", "545355",
	"c4c4c4", "b3b3b3", "a3a3a3", "929292", "818181", "707070", "606060", "4f4f4f",
	"a7a38e", "9d987c", "938d6a", "898258", "7f7845", "756d33", "6b6221", "61570f",
	"bbc7bf", "b2c0b7", "a9b9af", "a0b2a7", "98aa9e", "8fa396", "869c8e", "7d9586",
	"a0a89c", "97a092", "8e9889", "85907f", "7c8976", "73816c", "6a7963", "617159",
	"c7beb2", "c6baaa", "c5b6a2", "c4b29a", "c2ad92", "c1a98a", "c0a582", "bfa17a",
	"b8aba3", "b5a49a", "b39e91", "b09788", "ae917e", "ab8a75", "a9846c", "a67d63",
	"94888a", "8d7f82", "867779", "7f6e71", "796568", "725c60", "6b5457", "644b4f",
	"9dacad", "93a7a9", "89a2a4", "7f9da0", "74999c", "6a9498", "608f93", "568a8f",
	"b07d7d", "b07272", "b06868", "b05d5d", "b05252", "b04747", "b03d3d", "b03232",
	"737986", "6b7281", "636b7d", "5b6478", "535d73", "4b566e", "434f6a", "3b4865",
	"816464", "7d5c5c", "7a5555", "764d4d", "724545", "6e3d3d", "6b3636", "672e2e",
	"a3b092", "97a584", "8a9a76", "7e8f68", "718359", "65784b", "586d3d", "4c622f"
	];
}

function TK_TwoBPalette()
{
	this.unmarkSelected = TK_genericUnmark;
	this.markSelected = TK_genericMark;
	this.drawPalette = TK_genericDraw;
	this.colorTuple = TK_genericColorTuple;
	this.colorName = TK_genericColorName;
	this.PalType= "TwoB";
	this.HorizontalButtons = 16;
	this.PixelWidth = 16 * 12;
	this.ColorCount = 255;
	this.PixelHeight = Math.ceil (255 / 16) * 12;
	this.Shades = 8;
	this.ColorTable = [
	"e1b6ae", "d8aba2", "cc9388", "c38275", "b07970", "93645d", "72503c", "653d36",
	"f0c1b6", "e0b4a5", "d1a694", "c19983", "b18b72", "916658", "785143", "623d31",
	"d6ae9c", "d0ab94", "c99e82", "bb8d6e", "a7795b", "8d644b", "72503c", "604334",
	"cb9d86", "ba8f7a", "aa826e", "997462", "896756", "78594a", "684c3e", "573e32",
	"e4ab8b", "d09b7d", "bd8c70", "a97c62", "966c55", "825c47", "6f4d3a", "5b3d2c",
	"d4b7a8", "c0a395", "ab9081", "977c6e", "83685b", "6f5448", "5a4134", "462d21",
	"cba8a0", "d2afa6", "cca8a1", "c4a198", "b69992", "ab9389", "9e8c82", "988a80",
	"bead9d", "c0b09c", "baa894", "b5a38a", "b39c85", "ac9480", "a48a7c", "9c7f74",
	"ae8b84", "b3908b", "ac8986", "a3827e", "957b78", "8c7771", "7f7269", "7a6f67",
	"9d9181", "9f937f", "998c76", "97866e", "948167", "8f7864", "896e5f", "82645a",
	"c39994", "cb9fa0", "c3989d", "b79194", "a5898d", "9a8786", "8e837e", "88837c",
	"ada796", "aeaa92", "aaa385", "ab9d7c", "ac9876", "a58d71", "9f7e6c", "966f66",
	"c69f99", "cda5a1", "c69f9c", "bb9893", "ad8f8c", "a08b84", "94857d", "8d837b",
	"b4a797", "b6ab95", "b0a38a", "ae9d81", "ad977c", "a58d76", "9d8470", "98766c",
	"ad8681", "b38b89", "ac8585", "a07e7d", "917677", "86736f", "7b6f68", "756d66",
	"97907f", "99937c", "968c72", "958568", "958064", "8f775f", "866c58", "826156",
	"b89086", "c09890", "b98f8b", "a7887d", "967c75", "8e7a72", "87796b", "807869",
	"9f9683", "a19880", "9d9075", "9f886b", "a48569", "9c7a61", "9b7061", "93645d",
	"c89f9a", "d7aaa7", "cea3a2", "c19b97", "b0918f", "a48d88", "968981", "91887e",
	"baad9c", "bcb098", "b7a98c", "b5a283", "b49c7c", "ad9077", "a3876f", "9f7a6f",
	"8f6d68", "967472", "906e6e", "886868", "7b6362", "72605c", "695c56", "635b54",
	"80796a", "827b69", "7f765e", "7d7056", "7e6a52", "78644d", "715949", "6f5248",
	"c08c7e", "c89489", "c08984", "ae8677", "9b7970", "92776d", "8b7866", "837865",
	"a3987f", "a5997b", "a3916e", "a78963", "ad845f", "a57957", "a36b58", "9b5e55",
	"e5b2af", "f2bbbb", "eeb8bb", "ddb5ac", "cda7a9", "bda4a0", "ae9e98", "a79d93",
	"d6cdb7", "dbceb1", "d4c6a2", "d3c097", "d2b78c", "c6a985", "c19880", "b6857a",
	"825854", "8d5e5e", "825859", "71554c", "664c4c", "5b4946", "4f463f", "49423b",
	"6c6354", "6f6751", "6a6048", "69593f", "685439", "614b35", "5b4033", "55352e",
	"c88776", "d08f81", "c8837d", "b58370", "a1766b", "977669", "907962", "877a62",
	"a89a7b", "ab9c76", "aa9468", "b08b5b", "b88557", "b48057", "b6745d", "b06b5f",
	"fee7dc", "feebea", "fee1e3", "fedfd8", "fcd5cd", "ead3c2", "d5c8ba", "cec6b8",
	"fef9e9", "fef8da", "feebc8", "fee0ba", "fed3b2", "f9c2aa", "edb2a5"
	];
}

function TK_FeatherPalette()
{
	this.unmarkSelected = TK_genericUnmark;
	this.markSelected = TK_genericMark;
	this.drawPalette = TK_genericDraw;
	this.colorTuple = TK_genericColorTuple;
	this.colorName = TK_LongFJColorName;
	this.PalType= "Feather";
	this.HorizontalButtons = 5;
	this.PixelWidth = 5 * 20;
	this.ColorCount = 31;
	this.PixelHeight = Math.ceil (31 / 5) * 20;
	this.ColorTable = [
	"363631", "4d3a26", "514423", "89845f", "d7d4ad", "e1e4b4", "e5e2a6",
	"ece28a", "eddd76", "e4d26f", "afdf76", "569845", "41857c", "449286",
	"82a046", "3d9548", "cecece", "b1b0a6", "8f8d83", "6e6b5a", "b48e78",
	"bd7059", "d275a9", "d15945", "b34b28", "b763b7", "6b61ac", "a7d7d6",
	"84bcbd", "5993c1", "5a70a0"
	];
}

function TK_Pet1Palette()
{
	this.unmarkSelected = TK_genericUnmark;
	this.markSelected = TK_genericMark;
	this.drawPalette = TK_genericDraw;
	this.colorTuple = TK_genericColorTuple;
	this.colorName = TK_genericColorName;
	this.PalType= "Pet1";
	this.HorizontalButtons = 8;
	this.PixelWidth = 8 * 20;
	this.ColorCount = 32;
	this.PixelHeight = Math.ceil (32 / 8) * 20;
	this.Shades = 8;
	this.ColorTable = [
	"2a4100", "425e07", "517801", "648915",
	"769b27", "88ac40", "a2be69", "bbd192",
	"655500", "917b01", "bc9e00", "ccaf09",
	"d8bd18", "e1c82f", "ead355", "f2db89",
	"5a4c39", "62482f", "674724", "6e471c",
	"764a1b", "84521d", "9c6022", "b47027",
	"3b0604", "591008", "701109", "891b10",
	"a62b1a", "b73823", "ca4b32", "dd6445",
	];
}

function TK_Pet2Palette()
{
	this.unmarkSelected = TK_genericUnmark;
	this.markSelected = TK_genericMark;
	this.drawPalette = TK_genericDraw;
	this.colorTuple = TK_genericColorTuple;
	this.colorName = TK_genericColorName;
	this.PalType= "Pet2";
	this.HorizontalButtons = 8;
	this.PixelWidth = 8 * 20;
	this.ColorCount = 32;
	this.PixelHeight = Math.ceil (32 / 8) * 20;
	this.Shades = 8;
	this.ColorTable = [
	"4f4f4f", "5f6261", "7a7c7b", "979998",
	"afb1b0", "c1c3c2", "d2d4d3", "e0e0e0",
	"543433", "62403f", "724e4e", "896161",
	"a17574", "b98b8b", "cf9d9c", "e2aead",
	"6d5e4f", "88735e", "ae9076", "d4ad8c",
	"efc6a2", "fcd6b5", "fee0c7", "fce7d4",
	"37312f", "504542", "635554", "786868",
	"9c8786", "b39a98", "cab1af", "ddc7c4",
	];
}

function TK_Pet3Palette()
{
	this.unmarkSelected = TK_genericUnmark;
	this.markSelected = TK_genericMark;
	this.drawPalette = TK_genericDraw;
	this.colorTuple = TK_genericColorTuple;
	this.colorName = TK_genericColorName;
	this.PalType= "Pet3";
	this.HorizontalButtons = 8;
	this.PixelWidth = 8 * 20;
	this.ColorCount = 32;
	this.PixelHeight = Math.ceil (32 / 8) * 20;
	this.Shades = 8;
	this.ColorTable = [
	"525252", "666867", "868686", "a5a7a6",
	"c2c2c2", "d5d5d5", "e6e7e5", "f4f2f1",
	"524c40", "635b4e", "7b705d", "978873",
	"ae9e87", "c3b39c", "dacab3", "eddec9",
	"5e472b", "745a37", "946c39", "b9884f",
	"d2a46b", "e4b279", "efc28d", "f8cc9b",
	"485156", "4f585d", "576269", "626f77",
	"707f86", "7e8c95", "8c9ea8", "a0b4bf",
	];
}

function TK_Pet4Palette()
{
	this.unmarkSelected = TK_genericUnmark;
	this.markSelected = TK_genericMark;
	this.drawPalette = TK_genericDraw;
	this.colorTuple = TK_genericColorTuple;
	this.colorName = TK_genericColorName;
	this.PalType= "Pet4";
	this.HorizontalButtons = 8;
	this.PixelWidth = 8 * 20;
	this.ColorCount = 31;
	this.PixelHeight = Math.ceil (31 / 8) * 20;
	this.Shades = 8;
	this.ColorTable = [
	"4f3f3e", "5a4947", "685657", "7b6766",
	"917d7c", "a89493", "bea8a7", "d1bbba",
	"4d5757", "596265", "667173", "758084",
	"839194", "96a4a7", "abb9bc", "bdcbce",
	"9b5e1d", "855018", "6f4314", "633c13",
	"5c3812", "573a1a", "4a3d2b", "513b24",
	"dd6445", "ca4b32", "b73823", "a62b1a",
	"891b10", "701109", "591008",
	];
}

function TK_Pet5Palette()
{
	this.unmarkSelected = TK_genericUnmark;
	this.markSelected = TK_genericMark;
	this.drawPalette = TK_genericDraw;
	this.colorTuple = TK_genericColorTuple;
	this.colorName = TK_genericColorName;
	this.PalType= "Pet5";
	this.HorizontalButtons = 8;
	this.PixelWidth = 8 * 20;
	this.ColorCount = 32;
	this.PixelHeight = Math.ceil (31 / 8) * 20;
	this.Shades = 8;
	this.ColorTable = [
	"343d52", "41475d", "4c5069", "5a5a74",
	"67647d", "746e88", "807794", "8c819f",
	"412e0a", "4b380b", "554309", "604d07",
	"6a5806", "756206", "7f6c03", "8a7603",
	"680f00", "621708", "5f1f13", "59271c",
	"562e25", "50352f", "4d3e39", "474640",
	"304451", "31464d", "31474b", "314947",
	"304a45", "314c43", "2f4d3f", "304f3d",
	];
}

function TK_BrightsPalette()
{
	this.unmarkSelected = TK_genericUnmark;
	this.markSelected = TK_genericMark;
	this.drawPalette = TK_genericDraw;
	this.colorTuple = TK_genericColorTuple;
	this.colorName = TK_genericColorName;
	this.PalType= "Brights";
	this.HorizontalButtons = 8;
	this.PixelWidth = 8 * 20;
	this.ColorCount = 64;
	this.PixelHeight = Math.ceil (64 / 8) * 20;
	this.Shades = 4;
	this.ColorTable = [
	"cccccc", "b7b7b7", "a3a3a3", "8e8e8e",
	"922323", "841f1f", "771b1b", "691717",
	"656182", "545085", "443e89", "332d8c",
	"d4d647", "b8ba36", "9d9f26", "818315",
	"58a564", "459151", "317c3d", "1e682a",
	"dfb43e", "b9942f", "92731f", "6c5310",
	"71a5a5", "5b9595", "448686", "2e7676",
	"756176", "724d78", "6e387b", "6b247d",
	"7db0c0", "6995a3", "547b87", "40606a",
	"cd7a37", "a9642c", "844d21", "603716",
	"d48383", "a55e5e", "874242", "5f2d2d",
	"a28020", "93731b", "7c6018", "5a450e",
	"ddd8c0", "bdb9a4", "9e9a88", "7e7b6c",
	"916d6d", "765959", "5c4444", "413030",
	"756176", "6b4d6c", "603962", "562558",
	"a6c171", "8ea661", "778a50", "5f6f40"
	];
}

