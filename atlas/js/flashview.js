function ShowFlash(url, width, height){
		document.write('<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="' + width + '" height="' + height + '"id=wow_flash VIEWASTEXT id=wow_flash >');
	document.write('<param name="movie" value="' + url + '">');
	document.write('<param name="allowScriptAccess" value="always" />');
	document.write('<param name="quality" value="high">');
	document.write('<PARAM NAME=wmode VALUE=transparent>');
	document.write('<embed src="' + url + '" quality="high" allowScriptAccess="always" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="' + width + '" height="' + height + '"></embed>');
	document.write('</object>');
}