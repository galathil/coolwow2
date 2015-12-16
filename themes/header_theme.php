<?php
		echo "<div id=\"corps\">
			<table align=\"center\" width=\"$largeur\">
				<tr>";	
					if($bloc_left == 1)
					{
						include("bloc_left.php");
					}
					echo "<td width=\"100%\" valign=\"top\">
						<table width=\"100%\" align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\">
							<tr>
								<td>
								<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" >
									<tr>
									  <td width=\"21\"><img src=\"themes/$theme/hg.png\" width=\"21\" height=\"21\" alt=\"hg\" /></td>
									  <td class=\"hm\" width=\"100%\"></td>
									  <td width=\"21\"><img src=\"themes/$theme/hd.png\" width=\"21\" height=\"21\" alt=\"hd\" /></td>
									</tr>
								</table>
								<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
									<tr>
										<td class=\"mg\" width=\"12\"></td>
										<td>
											<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\">
												<tr>
													<td class=\"fond\" align=\"left\">";
?>