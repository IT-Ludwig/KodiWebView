				<!-- main -->
				<div class="main">			
					<!-- content -->
					<section class="content">
<?php if ((isset($_SESSION['site_admin'])) && ($_SESSION['site_admin'] == "1")) { ?>						
						<!-- post -->
						<div class="post">
							<!-- post-inner -->
								<div class="post-inner">
								<header>
									<h2><?=$lang['admin'].$lang['_bereich']?></h2>								
								</header></br>
								<div class="img-holder"></div>
									<div class='pagination'>
										<ul>
											<li><a href="./index.php?area=admin&modul=seiteneinstellungen"><b><?=$lang['site_settings']?></b></a></li>
											<li><a href="./index.php?area=admin&modul=user"><b><?=$lang['user_settings']?></b></a></li>
											<li><a href="./index.php?area=admin&modul=thumbs"><b><?=$lang['thumbs_settings']?></b></a></li>
											<li><a href="./index.php?area=admin&modul=originale"><b><?=$lang['org_settings']?></b></a></li>
											<li><a href="./index.php?area=admin&modul=database"><b>Kodi <?=$lang['database']?> <?=$lang['edit']?></b></a></li>
										</ul>
									</div>	
									</br></br>
									<div class='pagination'>
										<ul>	
											<li><a href="./index.php?area=admin&modul=tools"><b><?=$lang['tools']?></b></a></li>											
										</ul>
									</div>
									</br></br>
								</div>								
							</div>
							<div class="post">
							<!-- post-inner -->
								<div class="post-inner">
								<header>
									<h2><?=$lang['security_1']?></h2>								
								</header></br>
									<b><?=$lang['security_2']?></b></br>
									<?=$lang['security_4']?> 
									<?=$lang['security_5']?></br></br>
									<?=$lang['security_3']?></br>
									<a target="_blank" href="https://bugtracker.it-ludwig.eu/index.php?do=tasklist&project=8">Bugtracker</a>
								</div>								
							</div><?php 
							if(@$_REQUEST["modul"] == 'seiteneinstellungen') 
							{ ?>
								<div class="post">
								<!-- post-inner -->
									<div class="post-inner">
									<header>
										<h2><?=$lang['site_settings']?></h2>
										</br>
									</header>
									<div class="img-holder"></div>
									<h3><?=$lang['startSite']?></h3><?php 
									$getSiteAdmin = getSiteAdmin ();	
									if ( $getSiteAdmin[7]['wert'] == "1" )  { $selc0 = "checked"; } else { $selc0  = ""; }
									if ( $getSiteAdmin[8]['wert'] == "1" )  { $selc1 = "checked"; } else { $selc1  = ""; }
									if ( $getSiteAdmin[9]['wert'] == "1" )  { $selc2 = "checked"; } else { $selc2  = ""; }
									if ( $getSiteAdmin[10]['wert'] == "1" )  { $selc3 = "checked"; } else { $selc3  = ""; }
									if ( $getSiteAdmin[12]['wert'] == "1" )  { $selc4 = "checked"; } else { $selc4  = ""; }
									if ( $getSiteAdmin[13]['wert'] == "1" )  { $selc5 = "checked"; } else { $selc5  = ""; }
									if ( $getSiteAdmin[14]['wert'] == "1" )  { $selc6 = "checked"; } else { $selc6  = ""; }
									if ( $getSiteAdmin[15]['wert'] == "1" )  { $selc7 = "checked"; } else { $selc7  = ""; }
									if ( $getSiteAdmin[16]['wert'] == "1" )  { $selc8 = "checked"; } else { $selc8  = ""; }
									if ( $getSiteAdmin[17]['wert'] == "1" )  { $selc9 = "checked"; } else { $selc9  = ""; }
									if ( $getSiteAdmin[18]['wert'] == "1" ) { $selc10 = "checked"; } else { $selc10  = ""; } 
									if ( $getSiteAdmin[6]['wert'] == "1" ) { $selc12 = "checked"; } else { $selc12  = ""; } 
									if ( $getSiteAdmin[11]['wert'] == "1" )  { $selc17 = "checked"; } else { $selc17 = ""; }?>
										<form action="./index.php?area=admin&action=changeVar&modul=seiteneinstellungen" method="post">
										<table rules="rows" width="55%" border="0">
											<tr align="left">
												<th><?=$lang['widget_name']?></th>
												<th><?=$lang['widget_show']?></th>
											</tr>
											<tr>
												<td valign="top"><?=$getSiteAdmin[7]['name']?></td>
												<td><input type="hidden" name="value[<?=$getSiteAdmin[7]['name']?>]" value="0"><input type="checkbox" name="value[<?=$getSiteAdmin[7]['name']?>]" value="1" <?php echo $selc0; ?>></td>
											</tr>
											<tr>
												<td valign="top"><?=$getSiteAdmin[8]['name']?></td>
												<td><input type="hidden" name="value[<?=$getSiteAdmin[8]['name']?>]" value="0"><input type="checkbox" name="value[<?=$getSiteAdmin[8]['name']?>]" value="1" <?php echo $selc1; ?>></td>
											</tr>
											<tr>
												<td valign="top"><?=$getSiteAdmin[9]['name']?></td>
												<td><input type="hidden" name="value[<?=$getSiteAdmin[9]['name']?>]" value="0"><input type="checkbox" name="value[<?=$getSiteAdmin[9]['name']?>]" value="1" <?php echo $selc2; ?>></td>
											</tr>
											<tr>
												<td valign="top"><?=$getSiteAdmin[10]['name']?></td>
												<td><input type="hidden" name="value[<?=$getSiteAdmin[10]['name']?>]" value="0"><input type="checkbox" name="value[<?=$getSiteAdmin[10]['name']?>]" value="1" <?php echo $selc3; ?>></td>
											</tr>
											<tr>
												<td valign="top"><?=$getSiteAdmin[12]['name']?></td>
												<td><input type="hidden" name="value[<?=$getSiteAdmin[12]['name']?>]" value="0"><input type="checkbox" name="value[<?=$getSiteAdmin[12]['name']?>]" value="1" <?php echo $selc4; ?>></td>
											</tr>
											<tr>
												<td valign="top"><?=$getSiteAdmin[13]['name']?></td>
												<td><input type="hidden" name="value[<?=$getSiteAdmin[13]['name']?>]" value="0"><input type="checkbox" name="value[<?=$getSiteAdmin[13]['name']?>]" value="1" <?php echo $selc5; ?>></td>
											</tr>
											<tr>
												<td valign="top"><?=$getSiteAdmin[14]['name']?></td>
												<td><input type="hidden" name="value[<?=$getSiteAdmin[14]['name']?>]" value="0"><input type="checkbox" name="value[<?=$getSiteAdmin[14]['name']?>]" value="1" <?php echo $selc6; ?>></td>
											</tr>
											<tr>
												<td valign="top"><?=$getSiteAdmin[15]['name']?></td>
												<td><input type="hidden" name="value[<?=$getSiteAdmin[15]['name']?>]" value="0"><input type="checkbox" name="value[<?=$getSiteAdmin[15]['name']?>]" value="1" <?php echo $selc7; ?>></td>
											</tr>
											<tr>
												<td valign="top"><?=$getSiteAdmin[16]['name']?></td>
												<td><input type="hidden" name="value[<?=$getSiteAdmin[16]['name']?>]" value="0"><input type="checkbox" name="value[<?=$getSiteAdmin[16]['name']?>]" value="1" <?php echo $selc8; ?>></td>
											</tr>
											<tr>
												<td valign="top"><?=$getSiteAdmin[17]['name']?></td>
												<td><input type="hidden" name="value[<?=$getSiteAdmin[17]['name']?>]" value="0"><input type="checkbox" name="value[<?=$getSiteAdmin[17]['name']?>]" value="1" <?php echo $selc9; ?>></td>
											</tr>
											<tr>
												<td valign="top"><?=$getSiteAdmin[18]['name']?></td>
												<td><input type="hidden" name="value[<?=$getSiteAdmin[18]['name']?>]" value="0"><input type="checkbox" name="value[<?=$getSiteAdmin[18]['name']?>]" value="1" <?php echo $selc10; ?>></td>
											</tr>								 
									</table>
									<input type="submit" value="<?=$lang['site']?> <?=$lang['anpassen']?>"></form>
									</br></br>
									<h3><?=$lang['general_settings']?></h3>
									<form action="./index.php?area=admin&action=changeVar&modul=seiteneinstellungen" method="post">
										<table rules="rows" width="66%" border="0">
											<tr align="left">
												<th><?=$lang['name']?></th>
												<th><?=$lang['value']?></th>
											</tr>									                                                                                                                                  
											<tr>
												<td valign="top"><?=$lang['name_of_site']?></td>
												<td><input type="text" name="value[<?=$getSiteAdmin[19]['name']?>]" value="<?=$getSiteAdmin[19]['wert']?>"></td>
											</tr>
											<tr>
												<td valign="top"><?=$lang['login_safed_site']?></td>
												<td><input type="hidden" name="value[<?=$getSiteAdmin[6]['name']?>]" value="0"><input type="checkbox" name="value[<?=$getSiteAdmin[6]['name']?>]" value="1" <?php echo $selc12; ?>></td>
											</tr>
											<tr>
												<td valign="top"><?=$lang['kodi_movie_per_site']?></td>
												<td><input type="text" name="value[<?=$getSiteAdmin[3]['name']?>]" value="<?=$getSiteAdmin[3]['wert']?>"></td>
											</tr>
											<tr>
												<td valign="top"><?=$lang['kodi_movie_per_row']?></td>
												<td><input type="text" name="value[<?=$getSiteAdmin[4]['name']?>]" value="<?=$getSiteAdmin[4]['wert']?>"></td>
											</tr>
											<tr>
												<td valign="top"><?=$lang['kodi_serie_per_site']?></td>
												<td><input type="text" name="value[<?=$getSiteAdmin[1]['name']?>]" value="<?=$getSiteAdmin[1]['wert']?>"></td>
											</tr>
											<tr>
												<td valign="top"><?=$lang['kodi_serie_per_row']?></td>
												<td><input type="text" name="value[<?=$getSiteAdmin[2]['name']?>]" value="<?=$getSiteAdmin[2]['wert']?>"></td>
											</tr>
											<tr>
												<td valign="top"><?=$lang['use_cover']?></td>
												<td><input type="hidden" name="value[<?=$getSiteAdmin[11]['name']?>]" value="0"><input type="checkbox" name="value[<?=$getSiteAdmin[11]['name']?>]" value="1" <?php echo $selc17; ?>></td>
											</tr>	
											<tr>
												<td valign="top"><?=$lang['Highlight_color']?></td>
												<td><input type="text" name="value[<?=@$getSiteAdmin[0]['name']?>]" value="<?=@$getSiteAdmin[0]['wert']?>"></td>
											</tr>	
											<tr>
											<td valign="top"><?=$lang['lang']?></td>
											<td><select size="1" name="value[<?=@$getSiteAdmin[5]['name']?>]"><?php
															 $secLang = check_lang ();
															 foreach( $secLang as $keys)
															 {
																	if ($keys == $getSiteAdmin[5]['wert'])
																	{	 
																		echo "<option value='$keys' style='width: 111px;' selected>$keys</option>";
																	} else {
																		echo "<option value='$keys' style='width: 111px;'>$keys</option>";
																	}
																	
															 } ?>
												
												
													</select></td>
											</tr>												
									</table>
									<input type="submit" value="<?=$lang['site']?> <?=$lang['anpassen']?>"></form>
									<?php	
									if(@$_REQUEST['action'] == "changeVar")
									{
										$changeVar = changeVar(@$_POST['value']);

										if ( $changeVar == "1" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&result=true&modul=seiteneinstellungen"><?php }						
										if ( $changeVar == "0" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&result=false&modul=seiteneinstellungen"><?php }
									}
									?>
									</div>								
								</div><?php 
							}
							
							if(@$_REQUEST["modul"] == 'user') 
							{ ?>
								<div class="post">
								<!-- post-inner -->
									<div class="post-inner">
									<header>
										<h2><?=$lang['user_settings']?></h2>
										</br>
											<div class='pagination'>
											<ul>
												<li><a onclick="setVisibility('newUser')"><b><?=$lang['new_User']?></b></a></li>											
											</ul>
									</div></br>							
									</header>
									<div class="img-holder"></div>
									<div style="visibility:hidden;display:none;" id="newUser">
									<form action="./index.php?area=admin&action=user_new&modul=user" method="post">
									<table>
										<tr>
											<td valign="top"><?=$lang['username']?> :</td>
											<td><input type="text" name="name" value="" required></td>
										</tr>
										<tr>
											<td valign="top"><?=$lang['password']?> :</td>
											<td><input type="password" name="pass1" value="" required></td>
										</tr>
										<tr>
											<td valign="top"><?=$lang['new_User'].$lang['_repeat']?> :</td>
											<td><input type="password" name="pass2" value="" required></td>
										</tr>
										<tr>
											<td valign="top"><?=$lang['admin']?> ? :</td>
											<td><input type="hidden" name="admin" value="0"><input type="checkbox" name="admin" value="1"></td>
										</tr>
										<tr>
											<td></td>
											<td><input type="submit" value="<?=$lang['make_acc']?>"></td>
										</tr>
									</table></br></br>
									</form>
									</div>
									
										<table rules="rows" width="100%">
											<tr align="left">
												<th><?=$lang['username']?></th>
												<th><?=$lang['password']?></th>
												<th><?=$lang['admin']?></th>
												<th></th>
										</tr><?php
											$getUsersAdmin = getUsersAdmin ();	  
										foreach ( $getUsersAdmin as $UsersAdmin)
										{  if ( $UsersAdmin['admin'] == "1" ) { $selc1 = "checked"; } else { $selc1  = ""; }?>
											<tr>
												<td><?php echo $UsersAdmin['name']; ?></td>
												<td><form style="display: inline" action="./index.php?area=admin&action=setNewPass&modul=user" method="post">
													<input type="hidden" name="name" value="<?=$UsersAdmin['name']?>">
													<input type="submit" name="setPW" value="<?=$lang['new_pw']?>">
												</form></td>
												<td><form style="display: inline" action="./index.php?area=admin&action=setAdmin&modul=user" method="post"> <input type="checkbox" name="admin" value="1" <?php echo $selc1; ?>></td>
												<td>
													<input type="hidden" name="name" value="<?=$UsersAdmin['name']?>">
													<input type="Submit" name="del_org" value="<?=$lang['change_right']?>">
													</form>
												
													<form style="display: inline" action="./index.php?area=admin&action=delUser&modul=user" method="post">
													<input type="hidden" name="name" value="<?=$UsersAdmin['name']?>">
													<input type="Submit" name="del_org" value="<?=$lang['del_usr']?>">
													</form></td>
											</tr><?php
										} ?>
									 
									</table>
									<?php
									if(@$_REQUEST['action'] == "setNewPass")
									{?>
										</br>
											<form action="./index.php?area=admin&action=setNewPass&save=pass&modul=user" method="post">
												<input type="hidden" name="name" value="<?php echo $_POST['name'] ?>">
									 
											 <h3><?=$lang['new_pw'].$lang['_for_']?> <b><?=$_POST['name']?></b></h3>
											 <table border="0" width="300"></b>
											 <tr>
												<td><?=$lang['password']?> : </td>
											 </tr>
											 <tr>
												<td><input type="password" name="pass1" required></td>
											 </tr>
											 <tr>
												<td><?=$lang['password'].$lang['_repeat']?> : </td>
											 </tr>
											 <tr>
												<td><input type="password" name="pass2" required></td>
											 </tr>	
											 <tr>                                        
												<td><input type="submit" name="change" value="<?=$lang['change']?>"></br></td>
											 </tr>
											</table><?php 
										if(@$_REQUEST['save'] == "pass")
										{
											$changePW = User_newPW ($_POST['name'], $_POST['pass1'], $_POST['pass2']);
												if ( $changePW == "1" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&result=true&modul=user"><?php  }
												if ( $changePW == "0" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&result=true&modul=user"><?php  }
												if ( $changePW == "11" ) { echo $lang['pw_ot_same'].'</br>'; }
										}
									}
									
									if (@$_REQUEST['action'] == "user_new")
									{

										$newUSer = User_new ($_POST['name'], $_POST['pass1'], $_POST['pass2'], $_POST['admin']);
											if ($newUSer == "0") {  echo $lang['usr_dubl'].'</br>'; }
											if ($newUSer == "1") {  echo $lang['pw_ot_same'].'</br>'; }
												if ($newUSer == "10") { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&result=true&modul=user"><?php  }
												if ($newUSer == "11") { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&result=false&modul=user"><?php }
									}
									
									if(@$_REQUEST['action'] == "delUser")
									{
										$delUser = User_del($_POST['name']);

										if ( $delUser == "1" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&result=true&modul=user"><?php }						
										if ( $delUser == "0" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&result=false&modul=user"><?php }
									}	
									
									if(@$_REQUEST['action'] == "setAdmin")
									{
										$setAdmin = User_setAdmin($_POST['name'],@$_POST['admin']);

										if ( $setAdmin == "1" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&result=true&modul=user"><?php }						
										if ( $setAdmin == "0" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&result=false&modul=user"><?php }
									}
									?></div>								
								</div><?php 
							}
							
							if(@$_REQUEST["modul"] == 'thumbs') 
							{ ?>													
								<div class="post">
								<!-- post-inner -->
									<div class="post-inner">
									<header>
										<h2><?=$lang['thumbs_settings']?></h2>
										<p class="tags"></p>
										</br>
									</header>
									<div class="img-holder"></div>
									<?php
										echo $lang['thumb1'];
										echo $lang['thumb2']; 
										echo $lang['thumb3'].ini_get('max_execution_time')." ".$lang['sec']."</br>"; 
										
										if($omdbapi == "")
										{ echo "</br></br>". $lang['no_omdb']; 
										} else { ?>
										<button onclick="FensterOeffnen ('./include/newest.php?req=page', '300','550','200','200')"><?=$lang['start_manu_scr']?></button></br></br>
										<!-- <button onclick="FensterOeffnen ('./include/thumb.php')">//$lang['start_manu_thum']</button></br></br> -->
										<?php } ?> 
									</div>								
								</div><?php 
							}
							
							if(@$_REQUEST["modul"] == 'originale') 
							{ 
								if ((isset($_GET["kodi2original"])) && (!empty($_GET['value'])))
								{	
									$getKodi = kodi2original ("m-details", $_GET["value"]);							 
								}
						?>													
								<div class="post">
								<!-- post-inner -->
									<div class="post-inner">
									<header>
										<h2><?=$lang['org_settings']?></h2>
										<p class="tags"></p>
										</br>
									</header>
									<div class="img-holder"></div>									
										<form action="./index.php?area=admin&action=newOriginal&modul=originale" method="POST">
										<input type="hidden" name="type" value="new">
											 <table width="100%" border="0">
												<tr>
													<td colspan="5" align="left"><h3><?=$lang['new_ori']?></h3></br></td>
												</tr>
												<tr>
													<td nowrap><?=$lang['m_Titel']?> :</td>
													<td><input type="text" name="c00" value="<?=@$getKodi['c00']?>" size="40" required></td>
													<td nowrap>IMDB  ID :</td>
													<td><input type="text" name="c09" value="<?=@$getKodi['c09']?>" size="40" required></td>
												</tr>
												<tr>
													<td valign="top" nowrap><?=$lang['m_plot']?> :</td>
													<td rowspan="8" valign="top"> <textarea name="c01" cols="36" rows="12"><?=@$getKodi['c01']?></textarea></td>											
													<td valign="top"><?=$lang['m_mediatype']?> :</td>
													<td nowrap><input type="text" name="videocodec" value="" size="40"> <?=$lang['m_mediatype_ex']?></td>
												</tr>
												<tr>	
														<td></td>
														<td valign="top" nowrap><?=$lang['m_Edition']?> : </td>
														<td><input type="text" name="edition" value="" size="17"> 3D : <input type="hidden" name="strStereoMode" value="0"><input type="checkbox" name="strStereoMode" value="1"></td>
												</tr>
												<tr>
													<td></td>	
													<td valign="top"><?=$lang['m_st_kodi']?> :</td>
													<td><select size="1" name="idSet">
															<option value='non' selected><?=$lang['m_set_own']?></option><?php   	
																
																$set = getSets ();
																foreach ($set as $key => $value) 
																{ 	if(@$getKodi['idSet'] == $key) { $sec5 = "selected"; } else { $sec5 = ""; }
																		
																		?>									
																	<option value='<?=$key?>' <?=$sec5?>><?=$value?></option><?php
																} ?>	
														</select>													
														<?=$lang['m_set_new']?> <input type="text" name="idSet_self" value="" size="11"></br><?=$lang['m_set_new_att']?>
													</td>
												</tr>
												<tr>	
														<td></td>
														<td valign="top" nowrap><?=$lang['m_Video_width']?> : </td>
														<td><input type="text" name="width" value="" size="17"> <?=$lang['m_Video_hight']?> : <input type="text" name="height" value="" size="16"></td>
												</tr>
												<tr>	
														<td></td>
														<td valign="top" nowrap><?=$lang['m_audio_channels']?> : </td>	
														<td><input type="text" name="channels" value="" size="53"> <?=$lang['m_audio_channels_att']?></td>
												</tr>
												<tr>	<td></td>
														<td valign="top" nowrap><?=$lang['m_Audio'].$lang['Codec']?> : </td>
														<td><input type="text" name="audiocodec" value="" size="53"> <?=$lang['m_Audio_Codec_att']?></td>											
												</tr>
												<tr>	
													 <td></td>
													 <td align="left" nowrap><?=$lang['Gekauft_am']?> : </br></br><input type="Submit" name="submit" value="<?=$lang['new_entry_1']?>"></td>
													 <td valign="top"><input type="text" name="dateAdded" id="calendar" value="" size="53"></td>
												</tr>
											 </table>
									 </form></br>
									 
									<table width="100%" border="0" rules="none">
										<tr align="left">
											<th style="border-width: 1px; border-bottom-style: solid;"><?=$lang['m_Titel']?></th>
											<th style="border-width: 1px; border-bottom-style: solid;">IMDB</th>
											<th style="border-width: 1px; border-bottom-style: solid;"><?=$lang['m_audio_channels']?></th>
											<th style="border-width: 1px; border-bottom-style: solid;"><?=$lang['m_Audio'].$lang['Codec']?></th>
											<th style="border-width: 1px; border-bottom-style: solid;">Video Res.</th>
											<th style="border-width: 1px; border-bottom-style: solid;"><?=$lang['m_mediatype']?></th>
											<th style="border-width: 1px; border-bottom-style: solid;">3D</th>
											<th style="border-width: 1px; border-bottom-style: solid;"><?=$lang['m_st_kodi']?></th>
											<th style="border-width: 1px; border-bottom-style: solid;"></th>
										</tr><?php
											$getOriginalsAdmin = getOriginalsAdmin (); $i = "0"; 	  
										foreach ( $getOriginalsAdmin as $OriginalsAdmin)
										{ 	if ( $OriginalsAdmin['strStereoMode'] == "1" )  { $selc0 = "checked"; } else { $selc0  = ""; }
											?><form action="./index.php?area=admin&action=newOriginal&modul=originale" method="POST">
											<input type="hidden" name="type" value="update">
											<input type="hidden" name="imdb_old" value="<?=$OriginalsAdmin['uniqueid_value']?>">									
											<tr class="row_<?=$i % 2?>">
												<td nowrap><input type="text" name="c00" value="<?=$OriginalsAdmin['c00']?>" size="40" required></td>
												<td nowrap><input type="text" name="c09" value="<?=$OriginalsAdmin['uniqueid_value']?>" size="12" required></td>
												<td nowrap><input type="text" name="channels" value="<?=$OriginalsAdmin['channels']?>" size="2"></td>
												<td nowrap><input type="text" name="audiocodec" value="<?=$OriginalsAdmin['audiocodec']?>" size="15"></td>
												<td nowrap><input type="text" name="width" value="<?=$OriginalsAdmin['width']?>" size="5"> x <input type="text" name="height" value="<?=$OriginalsAdmin['height']?>" size="5"></td>
												<td nowrap><input type="text" name="videocodec" value="<?=$OriginalsAdmin['videocodec']?>" size="15"></td>
												<td nowrap><input type="hidden" name="strStereoMode" value="0"><input type="checkbox" name="strStereoMode" value="1" <?=$selc0?>></td>
												<td nowrap><input type="text" name="idSet" value="<?=$OriginalsAdmin['idSet']?>" size="10"></td>
												<td nowrap><img src='./gfx/css/images/arrowdown-double.png' border='0' onclick="setVisibility('show_original_details<?=$OriginalsAdmin['uniqueid_value']?>')"></td>
											</tr>
											<tr class="row_<?=$i % 2?>">
												<td colspan="8" border="0"><div id="show_original_details<?php echo $OriginalsAdmin['uniqueid_value']; ?>" style="visibility:hidden;display:none;">
												<table width="100%" border="0" rules="none">
													<tr>
														<td width="50%"></br><b><?=$lang['m_added']?> : </b></br><input type="text" name="dateAdded" id="calendar" value="<?=$OriginalsAdmin['dateAdded']?>" size="53"></td>
														<td width="50%"></br><b><?=$lang['m_Edition']?> : </b></br><input type="text" name="edition" value="<?=$OriginalsAdmin['edition']?>" size="50"></td>
													</tr>
													<tr>
														<td width="50%"></br><b><?=$lang['Rate']?> : </b></br><?=$OriginalsAdmin['rating']?> ( <?=$OriginalsAdmin['c04']?> )</td>
														<td width="50%"></br><b><?=$lang['year']?> : </b></br><?=$OriginalsAdmin['c07']?></td>
													</tr>
													<tr>
														<td width="50%"></br><b><?=$lang['Drehbuch']?> : </b></br><?=$OriginalsAdmin['c06']?></td>
														<td width="50%"></br><b><?=$lang['Regisseur']?> : </b></br><?=$OriginalsAdmin['c15']?></td>
													</tr>
													<tr>
														<td width="50%"></br><b><?=$lang['runtime']?> : </b></br><?=round($OriginalsAdmin['c11'] , 1 ) / 60?> min</td>
														<td width="50%"></br><b><?=$lang['Rating']?> : </b></br><?=$OriginalsAdmin['c12']?></td>
													</tr>
													<tr>
														<td width="50%"></br><b><?=$lang['actor']?> : </b></br><?=$OriginalsAdmin['actors']?></td>
														<td width="50%"></br><b><?=$lang['Land']?> : </b></br><?php echo $OriginalsAdmin['c21']; ?></td>
													</tr>
													<tr>
														<td colspan="2" width="100%"></br><b><?=$lang['genre']?>  : </b></br><?=$OriginalsAdmin['c14']?></td>
													</tr>												
													<tr>
														<td colspan="2" width="100%"></br><b><?=$lang['m_plot']?>  : </b></br><textarea name="c01" cols="193" rows="12"><?=$OriginalsAdmin['c01']?></textarea></br>
														<input type="Submit" name="submit" value="Updaten"></form>
														<form style="display: inline" action="./index.php?area=admin&action=delOriginal&modul=thumbs" method="post">
															<input type="hidden" name="id" value="<?=@$OriginalsAdmin['c09']?>">
															<input type="Submit" name="del_org" value="<?=$lang['loeschen']?>">
														</form>	
														
														</td>
													</tr>
												</table>
												</div>											
												</td>
									
			
											<?php  $i++;
										} ?>
									</table>
									<?php								
									if (@$_REQUEST['action'] == 'newOriginal')
									{
										if ($_POST['idSet'] == "non") { $idSet = $_POST['idSet_self']; } else { $idSet = $_POST['idSet'];  }
										$c01 = str_replace ( $strings_alt, $strings_new, $_POST['c01'] );
										$newOriginal = new_Original (@$_POST['c00'], @$_POST['c09'],@$c01 , @$_POST['videocodec'], @$idSet, @$_POST['width'], @$_POST['height'], @$_POST['channels'], @$_POST['audiocodec'], @$_POST['dateAdded'],@$_POST['edition'], @$_POST['strStereoMode'], @$_POST['type'],@$_POST['imdb_old'] );
											if ( $newOriginal == "1" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&result=true&modul=originale"><?php }
											if ( $newOriginal == "2" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&result=false&modul=originale"><?php }
											if ( $newOriginal == "0" ) { echo "Error New</br>"; }
									}									
									if (@$_REQUEST['action'] == 'delOriginal')
									{
										$delOriginal = del_Original ($_POST['id']);
			 
										if ( $delOriginal == "1" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&result=true&modul=originale"><?php } 
										if ( $delOriginal == "2" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&result=false&modul=originale"><?php }
										if ( $delOriginal == "0" ) { echo "Error Del</br>"; }
									} ?>
									</div>								
								</div><?php 
							}
							
							if(@$_REQUEST["modul"] == 'tools') 
							{ 
								if($db_version >= 116)
								{ ?>
									<div class="post">
									<!-- post-inner -->
										<div class="post-inner">
										<header>
											<h2><?=$lang['tools']?></h2></br>
											<p class="tags"></p>
										</header>								
										<div class="img-holder"></div><?php								
												echo $lang['delCorps'];  ?>
												<form style="display: inline" action="./index.php?area=admin&action=delCorps&modul=tools" method="post">
													<input type="Submit" name="del_org" value="Start">
												</form><?php

													if (@$_REQUEST['action'] == 'delCorps')
													{	echo "</br></br>";
														$delCorps = removeCorps ();
														echo "<b>$delCorps {$lang['del2']}</b>";
													} 

												
												echo "</br>".$lang['updateRating'];  ?>
												<form style="display: inline" action="./index.php?area=admin&action=updateRating&modul=tools" method="post">
														<select size="1" name="area1">
															<option value='' selected><?=$lang['select']?></option>   	
															<option value='originals'><?=$lang['original']?></option>
															<option value='movie'>Kodi <?=$lang['movie']?></option>
														</select>
													<input type="Submit" name="updateRating" value="Start">
												</form>	
												
												<?php

													if (@$_REQUEST['action'] == 'updateRating')
													{	echo "</br></br>";
														$updateRating = MassUpdateRating ($_POST['area1']);
														echo "<b>$updateRating</b>";
													} 
												echo "</br>".$lang['delKodicompl'];  ?>
												
												<form style="display: inline" action="./index.php?area=admin&action=removeDoub&modul=tools" method="post">
													<input type="text" name="movieID" value=""  placeholder="movieID">
													<input type="Submit" name="removeDoub" value="Start">
												</form>	
												
												<?php
													if (@$_REQUEST['action'] == 'removeDoub')
													{	echo "</br></br>";
														$removeByMovieID = removeByMovieID ($_POST['movieID']);
														
													} 
												echo "</br>".$lang['copysql']; ?>	
													<form style="display: inline" action="./index.php?area=admin&action=copyMYSQLtoSQLI&modul=tools" method="post">
													<input type="Submit" name="copyMYSQLtoSQLI" value="Start">
													</form>	
												<?php
													if (@$_REQUEST['action'] == 'copyMYSQLtoSQLI')
													{	echo "</br></br>";
														$copyMYSQLtoSQLI = copyMYSQLtoSQLI ();
														echo "<b>$copyMYSQLtoSQLI</b> Entries copied";
													} 	
												?>	
								

													
										</div>							
									</div>
									
									<div class="post">
									<!-- post-inner -->
										<div class="post-inner">
										<header>
											<h2><?=$lang['maintenance']?></h2></br>
											<p class="tags"></p>
										</header>								
										<div class="img-holder"></div><?php								
												echo $lang['delCorps']."-Test ";  ?>
												<form style="display: inline" action="./index.php?area=admin&action=delCorpsTest&modul=tools" method="post">
													<input type="Submit" name="del_org" value="Start">
												</form>	
												</br><?php
												echo $lang['delKodicompl']."-Test ";  ?>
												<form style="display: inline" action="./index.php?area=admin&action=removeKodiMovieComplTest&modul=tools" method="post">
													<input type="text" name="movieID" value="" placeholder="movieID">
													<input type="Submit" name="del_org" value="Start">
												</form>	
												</br></br><?php
													if (@$_REQUEST['action'] == 'removeKodiMovieComplTest')
													{
														$delCorps = removeKodiMovie_compl_test ($_POST['movieID']);
													} 
 
													if (@$_REQUEST['action'] == 'delCorpsTest')
													{
														$delCorps = removeCorps_test ();
														echo "<b>$delCorps {$lang['del2']}</b>";
													} ?>	
										</div>
									</div>
									
									<div class="post">
										<div class="post-inner">
											<header>
												<h2><?=$lang['Update']?></h2>
												<p class="tags"></p>
												</br>
											</header>
											<div class="img-holder"></div><?php
												echo $lang['inst_ver']." : $ver</br>"; 
												include ('./include/update.php'); ?>
										</div>																
									</div><?php 
								} 
							} 

							if(@$_REQUEST["modul"] == 'database') 
							{ 
								if($db_version >= 116)
								{ ?>
									<div class="post">
									<!-- post-inner -->
										<div class="post-inner">
										<header>
											<h2>Kodi <?=$lang['database']?> <?=$lang['rootdatas']?> <?=$lang['edit']?></h2></br>
											<p class="tags"></p>
										</header>								
										<div class="img-holder"></div><?php								
												echo $lang['sets_load'];  ?>
												<form style="display: inline" action="./index.php?area=admin&do=getSets&modul=database" method="post">
													<input type="Submit" name="del_org" value="Start">
												</form><?php

													if (@$_REQUEST['do'] == 'getSets')
													{	
														$getSetsAdmin = getSetsAdmin ();
														?>
														<table width="100%" border="0" rules="none">
															<tr align="left">
																<th width="3%" style="border-width: 1px; border-bottom-style: solid;">idSet</th>
																<th width="2%" style="border-width: 1px; border-bottom-style: solid;"></th>
																<th width="2%" style="border-width: 1px; border-bottom-style: solid;">K</th>
																<th width="2%" style="border-width: 1px; border-bottom-style: solid;">O</th>
																<th width="33%" style="border-width: 1px; border-bottom-style: solid;"><?=$lang['name']?></th>
																<th style="border-width: 1px; border-bottom-style: solid;"><?=$lang['description']?></th>
																<th style="border-width: 1px; border-bottom-style: solid;"></th>
															</tr>
															<tr class="row_<?=$i % 2?>">
																<td valign="top" style="border-width: 1px; border-bottom-style: solid;" colspan="4"><form style="display: inline" action="./index.php?area=admin&do=getSets&action=newSetsAdmin&modul=database" method="post"><?=$lang['new_set']?></td>		
																<td valign="top" style="border-width: 1px; border-bottom-style: solid;" nowrap><input type="text" name="strSet" style="width:95%" value=""></td>
																<td valign="top" style="border-width: 1px; border-bottom-style: solid;"><textarea name="strOverview" style="width:100%"></textarea></td>					
																<td valign="top" style="border-width: 1px; border-bottom-style: solid;" align="center"><input type="Submit" name="del_org" value="Speichern"></form></td>
															</tr>	
															<?php
														foreach($getSetsAdmin as $SetsAdmin => $value)
														{ ?>
															<tr class="row_<?=$i % 2?>">
																<td valign="top" style="border-width: 1px; border-bottom-style: solid;"><form style="display: inline" action="./index.php?area=admin&do=getSets&action=setSetsAdmin&modul=database" method="post">
																		<input type="hidden" name="idSet" value="<?=$SetsAdmin?>"><a href="./index.php?area=search&s_value=<?=$SetsAdmin?>&criteria=sets"><?=$SetsAdmin?></a></td>
																<td valign="top" style="border-width: 1px; border-bottom-style: solid;" nowrap><a href="./index.php?area=admin&do=getSets&modul=database&action=delSet&idSet=<?=$SetsAdmin?>"><img src='./gfx/css/images/seen0.png' border='0'></a></td>		
																<td valign="top" style="border-width: 1px; border-bottom-style: solid;" nowrap><?=$value[2]?></td>
																<td valign="top" style="border-width: 1px; border-bottom-style: solid;" nowrap><?=$value[3]?></td>
																<td valign="top" style="border-width: 1px; border-bottom-style: solid;" nowrap><input type="text" name="strSet" style="width:95%" value="<?=$value[0]?>"></td>
																<td valign="top" style="border-width: 1px; border-bottom-style: solid;"><textarea name="strOverview" style="width:100%"><?=$value[1]?></textarea></td>					
																<td valign="top" style="border-width: 1px; border-bottom-style: solid;" align="center"><input type="Submit" name="del_org" value="Speichern"></form></td>
															</tr><?php 
														}
													
														echo "</table>";
														if (@$_REQUEST['action'] == 'newSetsAdmin')
														{
															$newSetsAdmin = newSetsAdmin ($_POST['strSet'], $_POST['strOverview']);
																if ( $newSetsAdmin == "1" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&do=getSets&action=getSets&result=true&modul=database"><?php } 
																if ( $newSetsAdmin == "2" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&do=getSets&action=getSets&result=false&modul=database"><?php }
																if ( $newSetsAdmin == "0" ) { echo "Error Update</br>"; }
														} 
														if (@$_REQUEST['action'] == 'setSetsAdmin')
														{
															$setSetsAdmin = setSetsAdmin ($_POST['idSet'], $_POST['strSet'], $_POST['strOverview']);
																if ( $setSetsAdmin == "1" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&do=getSets&action=getSets&result=true&modul=database"><?php } 
																if ( $setSetsAdmin == "2" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&do=getSets&action=getSets&result=false&modul=database"><?php }
																if ( $setSetsAdmin == "0" ) { echo "Error Update</br>"; }
														} 
														if (@$_REQUEST['action'] == 'delSet')
														{
															$delSet = delSet ($_GET['idSet']);
																if ( $delSet == "1" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&do=getSets&action=getSets&result=true&modul=database"><?php } 
																if ( $delSet == "2" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&do=getSets&action=getSets&result=false&modul=database"><?php }
																if ( $delSet == "0" ) { echo "Error Del</br>"; }
														} 
													} 	
														?>							
										</div>							
									</div>
									<?php 
								} 
							}



							
} else { ?>
							<div class="post">
							<!-- post-inner -->
								<div class="post-inner">
								<header>
									<h2><?=$lang['no_rights_1']?></h2>
									<p class="tags"></p>
									</br>
								</header>
								<div class="img-holder"></div>
								<?=$lang['no_rights_2']?>
								</div>								
							</div>
<?php } ?>
					</section>