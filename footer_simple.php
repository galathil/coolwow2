<?php
$date = date("Y");
		echo "<div id=\"footer\">
			Optimisé pour Mozilla Firefox avec une résolution de 1280 x 1024.<br /><br />
			Copyright ©2007-$date, <a class=\"footer\" href=\"http://www.coolxp.fr\">CiRvEnT</a><br /><br />
			Les images sont propriétées de ©Blizzard Entertainment.<br /><br />";
			if($_SESSION['auth'] == "yes" AND $_SESSION['gmlevel'] >= $news)
			{
				echo "<a href='admin/index.php'><img src='images/login.gif' /></a></p><br />";
			}
			else
			{
				echo "</p><br />";
			} 
		echo "</div>
	</body>
</html>";
?>