<?php
require_once("kernel/config.php");
require_once("lang/$language.php");
require_once("kernel/fonctions.php");

echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html>
	<head>
		<title>$titre</title>
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=$site_encoding\" />
		<script type=\"text/javascript\"src=\"scripts/vote.js\"></script>
		<link rel=\"stylesheet\" href=\"themes/$theme/style.css\" type=\"text/css\" />
		<link rel=\"SHORTCUT ICON\" href=\"images/icon/wow.ico\" />
		<link rel=\"stylesheet\" href=\"themes/menu.css\" type=\"text/css\" />\n
		<link rel=\"stylesheet\" href=\"style/instances.css\" type=\"text/css\" />
		<script type=\"text/javascript\"src=\"scripts/instances.js\"></script>
	</head>\n
	<body>
		<div id=\"main\">
		<div id=\"menu\">
			<div id=\"centre\">";
			include("menu.php");
			echo "</div>
		</div>
		<div id=\"logo\"></div>
		<br /><br />";
?>
<map name="attunement_mask_Map_1">
	<area shape="rect" alt="" coords="811,602,920,666" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(BloodFurnace);">
	<area shape="rect" alt="" coords="571,603,680,667" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(ShatteredHalls);">
	<area shape="rect" alt="" coords="451,442,560,506" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(BotanicaH);">
	<area shape="rect" alt="" coords="571,443,680,507" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(MechanarH);">
	<area shape="rect" alt="" coords="630,365,739,429" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(OldHillsBradH);">
	<area shape="rect" alt="" coords="1051,602,1160,666" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(SlavePens);">
	<area shape="rect" alt="" coords="931,602,1040,666" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(Underbog);">
	<area shape="rect" alt="" coords="692,603,801,667" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(OldHillsbrad);">
	<area shape="rect" alt="" coords="451,603,560,667" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(Botanica);">
	<area shape="rect" alt="" coords="329,603,438,667" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(Mechanar);">
	<area shape="rect" alt="" coords="210,602,319,666" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(Sethekkhalls);">
	<area shape="rect" alt="" coords="992,523,1101,587" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(AuchenaiCrypts);">
	<area shape="rect" alt="" coords="871,523,980,587" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(ManaTombs);">
	<area shape="rect" alt="" coords="750,523,859,587" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(Ramparts);">
	<area shape="rect" alt="" coords="630,523,739,587" onMouseOver="showPath([0]); showTip(BlackMorass);" onMouseOut="hidePath(); hideTip();" onClick="toggleLock([0]);">
	<area shape="rect" alt="" coords="510,523,619,587" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(SteamVaults);">
	<area shape="rect" alt="" coords="389,524,498,588" onMouseOver="showPath([3]); showTip(Arcatraz);" onMouseOut="hidePath(); hideTip();" onClick="toggleLock([3]);">
	<area shape="rect" alt="" coords="271,523,380,587" onMouseOver="showPath([2]); showTip(shadowLabyrinth);" onMouseOut="hidePath(); hideTip();" onClick="toggleLock([2]);">
	<area shape="rect" alt="" coords="1051,442,1160,506" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(SlavePensH);">
	<area shape="rect" alt="" coords="932,442,1041,506" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(UnderbogH);">
	<area shape="rect" alt="" coords="811,442,920,506" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(BloodFurnaceH);">
	<area shape="rect" alt="" coords="692,443,801,507" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(RampartsH);">
	<area shape="rect" alt="" coords="330,443,439,507" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(ArcatrazH);">
	<area shape="rect" alt="" coords="211,443,320,507" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(SteamVaultsH);">
	<area shape="rect" alt="" coords="991,366,1100,430" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(AuchenaiCryptsH);">
	<area shape="rect" alt="" coords="871,366,980,430" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(ManaTombsH);">
	<area shape="rect" alt="" coords="751,366,860,430" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(BlackMorassH);">
	<area shape="rect" alt="" coords="511,366,620,430" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(SethekkHallsH);">
	<area shape="rect" alt="" coords="388,367,497,431" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(ShatteredHallsH);">
	<area shape="rect" alt="" coords="270,366,379,430" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(ShadowLabyrinthH);">
	<area shape="rect" alt="" coords="931,265,1040,329" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(GruulsLair);">
	<area shape="rect" alt="" coords="631,266,740,330" onMouseOver="showPath([0,1,2,3]); showTip(Karazhan);" onMouseOut="hidePath(); hideTip();" onClick="toggleLock([1,3,2,0]);">
	<area shape="rect" alt="" coords="332,265,441,329" onMouseOut="hidePath(); hideTip();" onMouseOver="showTip(MagtheridonsLair);">
	<area shape="rect" alt="" coords="780,146,889,210" onMouseOver="showTip(SerpentShrineCavern);" onMouseOut="hidePath(); hideTip();">
	<area shape="rect" alt="" coords="481,145,590,209" onMouseOver="showTip(TempestKeep);" onMouseOut="hidePath(); hideTip();">
	<area shape="rect" alt="" coords="571,35,680,99" onMouseOver="showPath([6]); showTip(Hyjal);" onMouseOut="hidePath(); hideTip();" onClick="toggleLock([6]);">
	<area shape="rect" alt="" coords="692,35,801,99" onMouseOver="showPath([6,7]); showTip(BlackTemple);" onMouseOut="hidePath(); hideTip();" onClick="toggleLock([7,6]);">
</map>

<center>
<div style="position:relative; width:1227px; height:736px; margin-top:50px; background:url(http://www.wow-europe.com/shared/wow-com/images/basics/bcattunement/fr/chart-bt.jpg);">
	<div style="position:absolute; left:-10px; top:-35px;"><img src="http://www.wow-europe.com/shared/wow-com/images/basics/bcattunement/fr/header.png" class="tpng"></div>
	<div id="kara" name="pathDiv" style="position:absolute; left:159px; top:314px; background:url(http://www.wow-europe.com/shared/wow-com/images/basics/bcattunement/fr/karazhan.gif); width:601px; height:268px; visibility:hidden;"></div>
	<div id="eye" name="pathDiv" style="position:absolute; left:88px; top:163px; background:url(http://www.wow-europe.com/shared/wow-com/images/basics/bcattunement/fr/theeye.gif); width:414px; height:360px; visibility:hidden;"></div>
	<div id="ssc" name="pathDiv" style="position:absolute; left:453px; top:196px; background:url(http://www.wow-europe.com/shared/wow-com/images/basics/bcattunement/fr/serpentshrinecavern.gif); width:540px; height:322px; visibility:hidden;"></div>
	<div id="bm" name="pathDiv" style="position:absolute; left:673px; top:570px; background:url(http://www.wow-europe.com/shared/wow-com/images/basics/bcattunement/fr/blackmorass.gif); width:251px; height:103px; visibility:hidden;"></div>
	<div id="arc" name="pathDiv" style="position:absolute; left:372px; top:573px; background:url(http://www.wow-europe.com/shared/wow-com/images/basics/bcattunement/fr/arcatraz.gif); width:313px; height:111px; visibility:hidden;"></div>
	<div id="hyj" name="pathDiv" style="position:absolute; left:526px; top:86px; background:url(http://www.wow-europe.com/shared/wow-com/images/basics/bcattunement/fr/hyjal-bt.gif); width:317px; height:151px; visibility:hidden;"></div>
	<div id="blt" name="pathDiv" style="position:absolute; left:416px; top:37px; background:url(http://www.wow-europe.com/shared/wow-com/images/basics/bcattunement/fr/blacktemple.gif); width:296px; height:66px; visibility:hidden;"></div>
	<div id="slab" name="pathDiv" style="position:absolute; left:257px; top:573px; background:url(http://www.wow-europe.com/shared/wow-com/images/basics/bcattunement/shadowlabyrinth.gif); width:81px; height:37px; visibility:hidden;"></div>
	<div style="position:absolute; top:0; left:0; z-index:5;"><img id="mapPixel" src="http://www.wow-europe.com/shared/wow-com/images/layout/pixel.gif" width="1226" height="701" border="0" usemap="#attunement_mask_Map_1"/></div>
	<div id="cover_1" name="coverDiv" class="coverDivStyle1" style="left:624px; top:360px;"></div>
	<div id="cover_2" name="coverDiv" class="coverDivStyle1" style="left:566px; top:437px;" onMouseOver="showTip(NitebaneQ);" onMouseOut="hideTip();"></div>
	<div id="cover_3" name="coverDiv" class="coverDivStyle1" style="left:445px; top:437px;"></div>
	<div id="cover_4" name="coverDiv" class="coverDivStyle1" style="left:806px; top:595px;" onMouseOver="showTip(OldHillsbradQ);" onMouseOut="hideTip();"></div>
	<div id="cover_5" name="coverDiv" class="coverDivStyle1" style="left:565px; top:596px;" onMouseOver="showTip(ArcatrazQ);" onMouseOut="hideTip();"></div>
	<div id="cover_6" name="coverDiv" class="coverDivStyle2" style="left:161px; top:528px;" onMouseOver="showTip(KarazhanQ);" onMouseOut="hideTip();"></div>
	<div id="cover_7" name="coverDiv" class="coverDivStyle2" style="left:97px; top:447px;" onMouseOver="showTip(TKeyQ);" onMouseOut="hideTip();"></div>
	<div id="cover_8" name="coverDiv" class="coverDivStyle2" style="left:639px; top:187px;" onMouseOver="showTip(VoEQ);" onMouseOut="hideTip();"></div>
	<div id="cover_9" name="coverDiv" class="coverDivStyle2" style="left:792px; top:310px;" onMouseOver="showTip(MoVQ);" onMouseOut="hideTip();"></div>
	<div id="cover_10" name="coverDiv" class="coverDivStyle2" style="left:416px; top:40px;" onMouseOver="showTip(EiBTQ);" onMouseOut="hideTip();"></div>
</div>
</div>
<br />
<?php
include("footer_simple.php");
?>