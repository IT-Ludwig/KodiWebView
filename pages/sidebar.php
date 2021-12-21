
					<!-- sidebar -->		
					<aside class="sidebar">
						<div class="widget">
							<center><ul><?php 
							if (!isset($_SESSION['site_id'])) { ?>
							<h3 class="widgettitle"><?=$lang['Login']?></h3>
								<form action="./index.php?action=login" method="post" >
									<table border = "0" >
										<tr align="center" >
											<td align="right" nowrap><font style="font-size: 12px;"><?=$lang['username']?> : </font></td>
											<td align="left"><input type="text" name="user" value="" style="width:140px;"></td>
										</tr>
										<tr align="center" >
											<td align="right" nowrap><font style="font-size: 12px;"><?=$lang['password']?> : </font></td>
											<td align="left"><input type="password" name="pass" value="" style="width:140px;"></td>
										</tr>
										<tr align="center" >
											<td colspan="2" align="center"><input type="Submit" name="submit" value="<?=$lang['Login']?>"></br></td>
										</tr>
									</table>
								</form>
							<?php
							
							if (@$_REQUEST['action'] == 'login')
							{
								$user = htmlspecialchars($_POST['user'], ENT_QUOTES);
								$pass = md5(htmlspecialchars($_POST['pass'], ENT_QUOTES));
								$login = siteLogin($user, $pass);
									if ($login == "1")
									{
										?><meta http-equiv="refresh" content="0; URL=index.php"><?php
									} else {
										echo "<false>{$lang['e_login1']}</false></br>";
										//echo 'Fehler:</br></br>' . mysql_error();
									}
							} 
							} else { 
								echo "<h3 class='widgettitle'>{$lang['hello']} {$_SESSION['site_user']}</h3>";
								echo "<a href='logout.php'>{$lang['Logout']}</a></br>";
									if ((isset($_SESSION['site_admin'])) && ($_SESSION['site_admin'] == "1"))
									{
										echo "<a href='./index.php?area=admin'>Adminbereich</a>";
									}
							} ?>		
									</ul></center>
						</div>						
					</aside>
					<aside class="sidebar">
						<div class="widget">
							<h3 class="widgettitle"><?=$lang['search']?></h3>
							<ul><p>
									<center></br>
										<form action="index.php" method="get">
										<input type="hidden" name="area" value="search">
										<input type="text" name="s_value" required value="<?=@$_GET['s_value']?>" size="25"></br>
									<select size="1" name="criteria" style="width:90%;">
									<?php
											if(@$_GET['criteria'] == "all") { $checked1 = "selected"; } else { $checked1 = ""; } 
											if(@$_GET['criteria'] == "writer") { $checked2 = "selected"; } else { $checked2 = ""; }
											if(@$_GET['criteria'] == "director") { $checked3 = "selected"; } else { $checked3 = ""; }
											if(@$_GET['criteria'] == "country") { $checked4 = "selected"; } else { $checked4 = ""; }
											if(@$_GET['criteria'] == "actor-all") { $checked5 = "selected"; } else { $checked5 = ""; }
											if(@$_GET['criteria'] == "actor") { $checked6 = "selected"; } else { $checked6 = ""; }
											if(@$_GET['criteria'] == "genre") { $checked7 = "selected"; } else { $checked7 = ""; }
											if(@$_GET['criteria'] == "year") { $checked8 = "selected"; } else { $checked8 = ""; }
											if(@$_GET['criteria'] == "sets") { $checked9 = "selected"; } else { $checked9 = ""; }	
											if(@$_GET['criteria'] == "studio") { $checked10 = "selected"; } else { $checked10 = ""; }
											if(@$_GET['criteria'] == "fsk") { $checked11 = "selected"; } else { $checked11 = ""; }											?>
											<option value='all'		 <?=$checked1?>><?=$lang['all_']?></option>
											<option value='writer' 	 <?=$checked2?>><?=$lang['Drehbuch']?></option>
											<option value='director' <?=$checked3?>><?=$lang['Regisseur']?></option>
											<option value='country'  <?=$checked4?>><?=$lang['Land']?></option>
											<option value='actor-all'  <?=$checked5?>><?=$lang['actor']?> <?=$lang['all_']?></option>
											<option value='actor'  <?=$checked6?>><?=$lang['actor']?></option>
											<option value='genre'  <?=$checked7?>><?=$lang['genre']?></option>
											<option value='year'  <?=$checked8?>><?=$lang['year']?></option>
											<option value='sets'  <?=$checked9?>><?=$lang['m_st_kodi']?></option>
											<option value='sets'  <?=$checked10?>><?=$lang['studio']?></option>
											<option value='fsk'  <?=$checked11?>><?=$lang['Rating']?></option>
											
								</select>
										<input type="submit" value="Suchen"></form></br>
									</center>
									
							</p></ul>
						</div><?php
						if((!empty($menu_show_count_m)) || ($menu_show_count_m > 0))
						{	?>
						<div class="widget">
							<h3 class="widgettitle"><?=$lang['movie'].$lang['genre']?></h3>
							<ul><center></br><?php								
								$genre = getOnlyAviGenre ('m-genre'); ?>
								<select size="1" name="link" onchange="getGenre(this)">
									<option value="leer"><?=$lang['pls_selct']?></option><?php
									foreach($genre as $key => $val)
									{
										if((@$_GET['area'] == "movie") && (@$_GET['value'] == $key)) { $checked1 = "selected"; } else { $checked1 = ""; }
										echo "<option value='area=movie&criteria=m-genre&value=$key' $checked1>$key $val</option>";
									} ?>
								</select></br></br></center>
							</ul>
						</div><?php
						}
						
						if((!empty($menu_show_count_s)) || ($menu_show_count_s > 0))
						{	?>						
						<div class="widget">
							<h3 class="widgettitle"><?=$lang['serie'].$lang['genre']?></h3>
							<ul><center></br><?php								
								$genre = getOnlyAviGenre ('s-genre'); ?>
								<select size="1" name="link" onchange="getGenre(this)">
									<option value="leer"><?=$lang['pls_selct']?></option><?php
									foreach($genre as $key => $val)
									{
										if((@$_GET['area'] == "serie") && (@$_GET['value'] == $key)) { $checked2 = "selected"; } else { $checked2 = ""; }
										echo "<option value='area=serie&criteria=s-genre&value=$key' $checked2>$key $val</option>";
									} ?>
								</select></br></br></center>
							</ul>
						</div><?php
						}
						
						if((!empty($menu_show_count_o)) || ($menu_show_count_o > 0))
						{	?>								
						<div class="widget">
							<h3 class="widgettitle"><?=$lang['original'].$lang['genre']?></h3>
							<ul><center></br><?php								
								$genre = getOnlyAviGenre ('o-genre'); ?>
								<select size="1" name="link" onchange="getGenre(this)">
									<option value="leer"><?=$lang['pls_selct']?></option><?php
									foreach($genre as $key => $val)
									{
										if((@$_GET['area'] == "originals") && (@$_GET['value'] == $key)) { $checked3 = "selected"; } else { $checked3 = ""; }
										echo "<option value='area=originals&criteria=o-genre&value=$key' $checked3>$key $val</option>";
									} ?>
								</select></br></br></center>
							</ul>
						</div>	<?php
						} ?>
					</aside>
					<!-- end of sidebar -->
					
