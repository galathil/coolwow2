<?php
switch ($_GET['ext'])
{
	case 'classic':
		switch ($_GET['name'])
		{
			case 'blackwing-lair':
				include("instance/wow/blackwing-lair.htm");
			break;
			case "ruins-of-ahn-qiraj":
				include("instance/wow/ruins-of-ahn-qiraj.htm");
			break;
			case "molten-core":
				include("instance/wow/molten-core.htm");
			break;
			case "onyxias-lair":
				include("instance/wow/onyxias-lair.htm");
			break;
			case "zul-gurub":
				include("instance/wow/zul-gurub.htm");
			break;
			case "temple-of-ahn-qiraj":
				include("instance/wow/temple-of-ahn-qiraj.htm");
			break;
			case "naxxramas":
				include("instance/wow/naxxramas.htm");
			break;
			default:
			break;
		}
	break;
	case 'bc':
		switch ($_GET['name'])
		{
			case 'caverns-of-time':
				include("instance/bc/caverns-of-time.htm");
			break;
			case 'karazhan':
				include("instance/bc/karazhan.htm");
			break;
			case 'doom-lord-kazzak':
				include("instance/bc/doom-lord-kazzak.htm");
			break;
			case 'doomwalker':
				include("instance/bc/doomwalker.htm");
			break;
			case 'tempest-keep':
				include("instance/bc/tempest-keep.htm");
			break;
			case 'gruuls-lair':
				include("instance/bc/gruuls-lair.htm");
			break;
			case 'hellfire-citadel':
				include("instance/bc/hellfire-citadel.htm");
			break;
			case 'coilfang-reservoir':
				include("instance/bc/coilfang-reservoir.htm");
			break;
			case 'black-temple':
				include("instance/bc/black-temple.htm");
			break;
			case 'zulaman':
				include("instance/bc/zulaman.htm");
			break;
			default:
			break;
		}
	break;
	case 'woltk':
		switch ($_GET['name'])
		{
			case 'naxxramas':
				include("instance/woltk/naxxramas.htm");
			break;
			case 'nexus':
				include("instance/woltk/nexus.htm");
			break;
			case 'ulduar':
				include("instance/woltk/ulduar.htm");
			break;
			default:
			break;
		}
	break;
	default:
	break;
}
?>