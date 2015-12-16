<?php
echo "<div>";
echo "<p class=\"footer\">";
include("kernel/connectes.php");
echo "</p>";
if (empty($_GET['module']))
{
	echo "<center><object type=\"application/x-shockwave-flash\" data=\"player_mp3.swf\" width=\"150\" height=\"20\">
    <param name=\"movie\" value=\"player_mp3.swf\" />
    <param name=\"bgcolor\" value=\"#000000\" />
    <param name=\"FlashVars\" value=\"mp3=sons/1.mp3&amp;loop=1&amp;autoplay=1&amp;volume=25\" />
	</object></center><br />";
}
else
{
	echo "";
}
$date = date("Y");
			echo "<div id=\"footer\">
				Optimisé pour Mozilla Firefox avec une résolution de 1280 x 1024.<br /><br />
				Copyright ©2007-$date, <a class=\"footer\" href=\"http://www.coolxp.fr\">CiRvEnT</a><br /><br />
				Les images sont la propriété de ©Blizzard Entertainment.<br /><br />";
				if($_SESSION['auth'] == "yes" AND $_SESSION['gmlevel'] >= $news)
				{
					echo "<a href='admin/index.php'><img src='images/login.gif' /></a></p><br />";
				}
				else
				{
					echo "</p><br />";
				} 
			echo "</div>
		</div>
	</body>
</html>";
?>