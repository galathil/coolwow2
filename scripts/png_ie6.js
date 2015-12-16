Nom = navigator.appName
Version = navigator.appVer

if (Nom == 'Microsoft Internet Explorer') {
if (navigator.platform == "Win32" && navigator.appName == "Microsoft Internet Explorer" && window.attachEvent) {
        window.attachEvent("onload", alphaBackgrounds);
       
        document.writeln('<style type="text/css">img { visibility:hidden; } </style>');
        window.attachEvent("onload", fnLoadPngs);
}
// Sleight Background
function alphaBackgrounds(){
        var rslt = navigator.appVersion.match(/MSIE (\d+\.\d+)/, '');
        var itsAllGood = (rslt != null && Number(rslt[1]) >= 5.5);
        for (i=0; i<document.all.length; i++){
                var bg = document.all[i].currentStyle.backgroundImage;
                if (itsAllGood && bg){
                        if (bg.match(/\.png/i) != null){
                                var mypng = bg.substring(5,bg.length-2);
                                document.all[i].style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+mypng+"', sizingMethod='scale')";
                                document.all[i].style.backgroundImage = "url('/assets/images/x.gif')";
                        }
                }
        }
}
// Sleight Simple
function fnLoadPngs()
{
        var rslt = navigator.appVersion.match(/MSIE (\d+\.\d+)/, '');
        var itsAllGood = (rslt != null && Number(rslt[1]) >= 5.5);

        for (var i = document.images.length - 1, img = null; (img = document.images[i]); i--)
        {
                if (itsAllGood && img.src.match(/\.png$/i) != null)
                {
                        var src = img.src;
                        var div = document.createElement("DIV");
                        div.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + src + "', sizing='scale')"
                        div.style.width = img.width + "px";
                        div.style.height = img.height + "px";
                        img.replaceNode(div);
                }
                img.style.visibility = "visible";
        }
}
}