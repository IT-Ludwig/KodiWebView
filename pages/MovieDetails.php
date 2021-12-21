<center>
<div class='bar'>

	<table border="0" width="100%">
		<tr>
				<td valign="top" colspan="5" ><b><font style="font-size: 40px; "><?php echo $MovieDetail['c00']?></font></b></td>
				<td width="100px" valign="top" align="right"><?php // seen status						
									if($MovieDetail['playCount'] > 0) 
									{ 
										if (is_file("./gfx/css/images/seen.fw.png")) { echo "<img src='./gfx/css/images/seen.fw.png' border='0' title='Bereits gesehen'> "; } 
									}
							// VIDEO 
								// 3D ?
									if(!empty($MovieDetail['strStereoMode'])) 
									{ 
										if (is_file("./gfx/video/3d.png")) { echo "<img src='./gfx/video/3d.png' border='0'> "; } 
									}
									?></td>
		</tr>
		<tr>
				<td rowspan="7" valign="top" width="300" align="left">
				<div class="container">
					<img src="<?=$thumb; ?>" height="424" width="300" border="0" ><?php
						if ((isset($_SESSION['site_admin'])) && ($_SESSION['site_admin'] == "1")) 
						{ ?><button class="btn" onclick="FensterOeffnen('./pages/MovieDetails.cover.php?imdbid=<?=$_GET['value']?>', '500','150','300','300')"><?=$lang['changeCover']?></button><?php } ?>
					</div> 
					<font size="+2"><?=$lang['m_mediainfo']?></font></b></br></br>
				
											<?php if($_GET['area'] == "originals") 
											{ ?>
												<font size="+1"><u><b><?=$lang['m_bild']?></b></u></font></br>
												<table width="100%" border="0">
													<tr>
														<td><b><?=$lang['m_mediatype']?></b></td>
														<td></td>
														<td><b><?=$lang['resolu']?></b></td>							
													</tr>
													<tr>
															<td><?php $video_c = strtolower($MovieDetail['videocodec']).'.png'; if (is_file("./gfx/video/$video_c")) { echo "<img src='./gfx/video/$video_c' border='0' height='32px' title='{$MovieDetail['videocodec']}'>  "; } else { echo "{$MovieDetail['videocodec']}"; }?></td>
															<td class="doMiddle"><?php													
															if ( $MovieDetail['width'] < 1280 ) 
															{ 
																if (is_file("./gfx/video/{$MovieDetail['height']}.png")) { echo "<img src='./gfx/video/{$MovieDetail['height']}.png' border='0' height='32px'>  "; } else { echo "<img src='./gfx/video/sd.png' border='0' height='32px'>"; }
															} else 
															if (($MovieDetail['width'] >= 1280) AND ($MovieDetail['width'] < 1920))
															{ 
																if (is_file("./gfx/video/720.png")) { echo "<img src='./gfx/video/720.png' border='0' height='32px'>  "; }
															} else 
															if (($MovieDetail['width'] >= 1920) AND ($MovieDetail['width'] < 2048))
															{ 
																if (is_file("./gfx/video/1080.png")) { echo "<img src='./gfx/video/1080.png' border='0' height='32px'>  "; }
															} else 
															if (($MovieDetail['width'] >= 2048) AND ($MovieDetail['width'] < 3840))
															{ 
																if (is_file("./gfx/video/2k.png")) { echo "<img src='./gfx/video/2k.png' border='0' height='32px'>  "; }
															} else 
															if (($MovieDetail['width'] >= 3840)  AND ($MovieDetail['width'] < 7680))
															{ 
																if (is_file("./gfx/video/4k.png")) { echo "<img src='./gfx/video/4k.png' border='0' height='32px'>  "; }
															} else 
															if ($MovieDetail['width'] >= 7680) 
															{ 
																if (is_file("./gfx/video/8k.png")) { echo "<img src='./gfx/video/8k.png' border='0' height='32px'>  "; }
															}?>
														</td>
														<td class="doMiddle"><?php $aspect = @round($MovieDetail['width'] / $MovieDetail['height'], 2).'.png'; if (is_file("./gfx/aspectratio/$aspect")) { echo "<img src='./gfx/aspectratio/$aspect' title='{$MovieDetail['width']}x{$MovieDetail['height']}' border='0' height='32px'>  "; } else { echo "{$MovieDetail['width']}x{$MovieDetail['height']}"; } ?></td>											
													</tr>
												</table>
												<div class="img-holder"></div>
												<font size="+1"><u><b><?=$lang['m_Audio']?></b></u></font></b></br>
													<table width="100%" border="0">
														<tr>
															<td><b><?=$lang['Codec']?></b></td>
															<td><b><?=$lang['m_audio_channels']?></b></td>
														</tr>
														<tr>
															<td><?php $audio_c = strtolower($MovieDetail['audiocodec']).'.png'; if (is_file("./gfx/audio/$audio_c")) { echo "<img src='./gfx/audio/$audio_c' border='0' height='32px' title='{$MovieDetail['audiocodec']}'>  "; } else { echo "{$MovieDetail['audiocodec']}"; }?></td>													 
															<td><?php $audio_p = strtolower($MovieDetail['channels']).'.png'; if (is_file("./gfx/audiochannel/$audio_p")) { echo "<img src='./gfx/audiochannel/$audio_p' border='0' height='32px' title='{$MovieDetail['channels']}'> "; } else { echo "{$MovieDetail['channels']}"; }?></td>	
														</tr>
													</table></br><?php
											} 
											if($_GET['area'] == "movie") 
											{ ?>
												<font size="+1"><u><b><?=$lang['m_bild']?></b></u></font></br>
												<table width="100%" border="0">
													<tr>
														<td><b></b></td>
														<td><b></b></td>
														<td><b><?=$lang['Codec']?></b></td>
														<td><b><?=$lang['m_mediatype']?></b></td>
													</tr>
														<tr>
															<td class="doMiddle"><?php													
															if ( $MovieDetail['width'] < 1280 ) 
															{ 
																if (is_file("./gfx/video/{$MovieDetail['height']}.png")) { echo "<img src='./gfx/video/{$MovieDetail['height']}.png' border='0' height='32px'>  "; } else { echo "<img src='./gfx/video/sd.png' border='0' height='32px'>"; }
															} else 
															if (($MovieDetail['width'] >= 1280) AND ($MovieDetail['width'] < 1920))
															{ 
																if (is_file("./gfx/video/720.png")) { echo "<img src='./gfx/video/720.png' border='0' height='32px'>  "; }
															} else 
															if (($MovieDetail['width'] >= 1920) AND ($MovieDetail['width'] < 2048))
															{ 
																if (is_file("./gfx/video/1080.png")) { echo "<img src='./gfx/video/1080.png' border='0' height='32px'>  "; }
															} else 
															if (($MovieDetail['width'] >= 2048) AND ($MovieDetail['width'] < 3840))
															{ 
																if (is_file("./gfx/video/2k.png")) { echo "<img src='./gfx/video/2k.png' border='0' height='32px'>  "; }
															} else 
															if (($MovieDetail['width'] >= 3840)  AND ($MovieDetail['width'] < 7680))
															{ 
																if (is_file("./gfx/video/4k.png")) { echo "<img src='./gfx/video/4k.png' border='0' height='32px'>  "; }
															} else 
															if ($MovieDetail['width'] >= 7680) 
															{ 
																if (is_file("./gfx/video/8k.png")) { echo "<img src='./gfx/video/8k.png' border='0' height='32px'>  "; }
															}?>
															</td>
															<td class="doMiddle"><?php $aspect = @round($MovieDetail['width'] / $MovieDetail['height'], 2).'.png'; if (is_file("./gfx/aspectratio/$aspect")) { echo "<img src='./gfx/aspectratio/$aspect' border='0' height='32px' title='{$MovieDetail['width']}x{$MovieDetail['height']}'>  "; }  else { echo "{$MovieDetail['width']}x{$MovieDetail['height']}"; }?></td>
															<td class="doMiddle"><?php $video_p = strtolower($MovieDetail['videocodec']).'.png'; if (is_file("./gfx/video/$video_p")) { echo "<img src='./gfx/video/$video_p' border='0' title='{$MovieDetail['videocodec']}' height='32px'> "; } else { echo "{$MovieDetail['videocodec']}"; }?></td>													 
															<td class="doMiddle"><?php $video_f = strtolower($MovieDetail['strFileName']).'.png'; if (is_file("./gfx/video/$video_f")) { echo "<img src='./gfx/video/$video_f' border='0' title='{$MovieDetail['strFileName']}' height='32px'> "; } else { echo "{$MovieDetail['strFileName']}"; }?></td>	
																								
														</tr>
												</table>
												<div class="img-holder"></div>
												<font size="+1"><u><b><?=$lang['m_Audio']?></b></u></font></b></br>
													<table width="100%" border="0">
													<tr>
														<td></td>
														<td><b><?=$lang['Codec']?></b></td>
														<td><b><?=$lang['m_audio_channels']?></b></td>
														<td><b><?=$lang['lang']?></b></td>
													</tr><?php
													
														foreach($MovieDetail['channels'] as $tonspur)
														{ ?>

														<tr>
															<td class="doMiddle"><?=$lang['tonspur'].' '.$sp?></td>
															<td class="doMiddle"><?php $audio_c = strtolower($tonspur[1]).'.png'; if (is_file("./gfx/audio/$audio_c")) { echo "<img src='./gfx/audio/$audio_c' border='0' height='32px' title='{$tonspur[1]}'>  "; } else { echo "{$tonspur[1]}"; }?></td>													 
															<td class="doMiddle"><?php $audio_p = strtolower($tonspur[0]).'.png'; if (is_file("./gfx/audiochannel/$audio_p")) { echo "<img src='./gfx/audiochannel/$audio_p' border='0' height='32px' title='{$tonspur[0]}'> "; } else { echo "{$tonspur[0]}"; }?></td>	
															<td class="doMiddle"><?php $lang_a = strtolower($tonspur[2]).'.png'; if (is_file("./gfx/lang/$lang_a")) { echo "<img src='./gfx/lang/$lang_a' border='0' height='32px' title='{$tonspur[2]}'> "; } else { echo "{$tonspur[2]}"; }?></td>
														</tr><?php
													$sp++;	
														}	?></table></br><?php
														
														if (!empty($MovieDetail['subtitle'])) 
														{ ?><div class="img-holder"></div>
														<font size="+1"><u><b><?=$lang['subtitle']?></b></u></font></br><?php
															foreach($MovieDetail['subs'] as $subtitles)
															{
																if (is_file("./gfx/lang/$subtitles.png")) { echo "<img src='./gfx/lang/$subtitles.png' border='0' height='32px' title='{$subtitles}'> "; } else { echo "$subtitles "; } 
															}
														} echo "</br>";

											}							
											if($_GET['area'] == "originals") 
											{ ?>										
												<div class="img-holder"><?=$lang['rental']?></div><?php
														$LastRentalStat = getLastRentalStat ($_GET["value"]);
														if ($LastRentalStat['stat'] == 'n')
														{
															echo "<b>{$lang['verliehen']} : </b>{$lang[$LastRentalStat['stat']]}";
														} else {
															echo "<b>{$lang['verliehen']} : </b>{$lang[$LastRentalStat['stat']]} {$lang['an']} {$LastRentalStat['person']} {$lang['seit']} ".convertDate($LastRentalStat['start_date']);

														} ?>
												</br>
												<?php
												echo "<b>".$lang['last_rent']." 3 ".$lang['rental'].":</b>";
												$lastRental = getLastRentals ($_GET["value"]);
												if ($lastRental != 0)
												{
													echo "<table rules='rows' width='100%'>";
														echo "<tr>";
															echo "<td>{$lang['persona_1']}</td>";
															echo "<td>{$lang['date']} {$lang['date_start']}</td>";
															echo "<td>{$lang['date']} {$lang['date_stop']}</td>";
														echo "</tr>";
													for ( $x = 0 ; $x < count($lastRental); $x++ )
													{
														echo "<tr>";
															echo "<td>{$lastRental[$x]['person']}</td>";
															echo "<td>".convertDate($lastRental[$x]['start_date'])."</td>";
															echo "<td>".convertDate($lastRental[$x]['stop_date'])."</td>";
														echo "</tr>";
													}													
														echo "</tr>";
													echo "</table>";
												} 
												if ((isset($_SESSION['site_admin'])) && ($_SESSION['site_admin'] == "1") && ($LastRentalStat['stat'] == 'n')) 
												{ ?></br><b><?=$lang['new_1']?> <?=$lang['rental']?></b>
													<form action="./index.php?area=<?=$_GET["area"]?>&criteria=<?=$_GET["criteria"]?>&value=<?=$_GET["value"]?>&options=rNew" method="POST">
													<table width="100%" border="0">
														<tr>
															<td nowrap><?=$lang['persona_1']?> :</td>
															<td><input type="text" name="person" value="" size="17" required></td>
														</tr>	
														<tr>
															<td nowrap><?=$lang['date']?> :</td>
															<td><input type="text" name="start_date" value="" size="17" id="calendar" required></td>
														</tr>
													</table>
													<input type="Submit" name="submit" value="<?=$lang['new_entry_1']?>">
													</form>
												<?php }
											}

											if ((isset($_SESSION['site_admin'])) && ($_SESSION['site_admin'] == "1")) 
											{											?>
												</br><div class="img-holder"><?=$lang['optiones']?></div><?php
												echo "<div class='pagination'><ul>";
												if(($MovieDetail['playCount'] < 1) || ($MovieDetail['playCount'] == ""))
												{ 
													echo "<li><a href='./index.php?area={$_GET["area"]}&criteria={$_GET["criteria"]}&value={$_GET["value"]}&options=setSeen'>{$lang['seen']} {$lang['set']}</a></li>";
												}
												if($_GET['area'] == "originals") 
												{ 
													if ($LastRentalStat['stat'] == 'y')
													{
														echo "</br></br></br><li><a href='./index.php?area={$_GET["area"]}&criteria={$_GET["criteria"]}&value={$_GET["value"]}&rID={$LastRentalStat['id']}&options=rBack'>{$lang['rental']} {$lang['h_back']}</a></li>";	
													}
												}	
												echo "</ul></div>";	 												
											}
											if ((isset($_SESSION['site_admin'])) && ($_SESSION['site_admin'] == "1")) 
											{	
												if($db_version >= 116)
												{ 
													if($_GET['area'] == "movie") 
													{ ?>
														</br>
														<div class='pagination'><ul>														
															</br><li><a href='#' onclick="check = confirm('<?=$lang['loeschen_confirm']?>');     if (check == true) { window.location.href = './index.php?area=<?=$_GET["area"]?>&criteria=<?=$_GET["criteria"]?>&value=<?=$_GET["value"]?>&options=removeKodiMovie&idFile=<?=$MovieDetail['idFile']?>&idMovie=<?=$MovieDetail['idMovie']?>'; }" ><?=$lang['loeschen']?></a></li>															
														</ul></div>
														
														</br>
														<div class='pagination'><ul>														
															</br><li><a href='./index.php?area=<?=$_GET["area"]?>&criteria=<?=$_GET["criteria"]?>-edit&value=<?=$_GET["value"]?>'><?=$lang['edit']?></a></li>															
														</ul></div>
														
														</br>
														<div class='pagination'><ul>														
															</br><li><a href='./index.php?area=admin&modul=originale&kodi2original=1&value=<?=$_GET["value"]?>'>Kodi 2<?=$lang['original']?></a></li>															
														</ul></div>														
														</br></br><?php
													}		
												} 
												?>
													<form action="./index.php?area=<?=$_GET["area"]?>&criteria=<?=$_GET["criteria"]?>&value=<?=$_GET["value"]?>&options=changeSet" method="POST">												
														<select size="1" name="idSet" style="width: 220px">
														<option value='' selected><?=$lang['m_set_ohne']?></option><?php   	
																
															$set = getSets ();
															foreach ($set as $key => $value) 
															{ if($key ==  $MovieDetail['idSet']) { $selected1 = "selected"; } else { $selected1 = ""; }?>									
																<option value='<?=$key?>' <?=$selected1?>><?=$value?></option><?php
															} ?>	
														</select>	
														<input type="hidden" name="idMovie" value="<?=$MovieDetail['idMovie']?>">
														<input type="Submit" name="submit" value="<?=$lang['anpassen']?>">
													</form><?php												
											} ?>													
				</td>
				<td rowspan="8" width="5px"></td>

			<td colspan="5" valign="top"><table width="100%"><tr>
									<td valign="top" nowrap><?php if (!empty($MovieDetail['strPath'])) { echo "<b>{$lang['dir']} : </b></br>{$MovieDetail['strPath']}"; } ?></td>
									<td valign="top" nowrap><?php if (!empty($MovieDetail['edition'])) { echo "<b>{$lang['m_Edition']} : </b></br>{$MovieDetail['edition']}"; } ?></td>
									</tr><tr>
									<td valign="bottom" height="50px"><?php if (!empty($MovieDetail['dateAdded'])) { echo "<b>{$lang['m_added']} {$lang['am']} </b></br>".convertDate($MovieDetail['dateAdded']); } ?></td>										
									</tr></table></td>
		</tr>
		<tr>												
			<td colspan="5" valign="middle"><div class="img-holder"><b><font size="+2"><?=$lang['moviedetails']?></font></b></div></td>
		</tr>
		<tr>
			<td colspan="5" valign="top"><table width="100%"><tr>
									<td valign="top" nowrap><b><?=$lang['year']?> : </b></br><?=str_replace ( $string_cover_old, $string_cover_new, $tag_year)?></td>
									<td valign="top" nowrap><b><?=$lang['runtime']?> : </b></br><?php $MovieDetail['c11'] = $MovieDetail['c11'] / 60; echo round($MovieDetail['c11'] , 2 ); ?> min</td>
									<td valign="top" nowrap><b><?=$lang['Rating']?> : </b></br><?=str_replace ( $string_cover_old, $string_cover_new, $tag_fsk)?></td>
									<td valign="top"><b><?=$lang['studio']?> : </b></br><?=str_replace ( $string_cover_old, $string_cover_new, $tag_studio)?></td>
			</tr></table></td>
		</tr>
		<tr>
			<td colspan="5" valign="top"><div class="img-holder"></div><table width="100%"><tr>
									<td valign="top" width="50%"><b><?=$lang['Drehbuch']?> : </b></br> <?=str_replace ( $string_cover_old, $string_cover_new, $tag_writer)?></td>
									<td valign="top" width="50%"><b><?=$lang['Regisseur']?> : </b></br><?=str_replace ( $string_cover_old, $string_cover_new, $tag_director)?></td>
		</tr></table></td>
		</tr>
		<tr>
			<td colspan="5" valign="top"><div class="img-holder"></div><table width="100%" border="0"><tr>
											<td valign="top" width="25%"><b>IMDB-Rating : </b></br><?=round($MovieDetail['c05'], 1 )?> ( <?=@number_format($MovieDetail['c04'])?> Bewertungen ) </td>
											<td valign="top" width="25%"><?php if ((isset($_SESSION['site_admin'])) && ($_SESSION['site_admin'] == "1")) { ?>
																					<form action="./index.php?area=<?=$_GET["area"]?>&criteria=<?=$_GET["criteria"]?>&value=<?=$_GET["value"]?>&options=SnglUpdateRating" method="POST">												
																						<input type="hidden" name="idMovie" value="<?=$MovieDetail['idMovie']?>">
																						<input type="Submit" name="submit" value="<?=$lang['Update']?>">
																					</form><?php } ?>
											</td>
											<td valign="top" colspan="3" width="50%"><b><?=$lang['Land']?> : </b></br><?=$tag_country?></td>
										</tr><tr>
											<td valign="top" colspan="3" width="50%"><b><?=$lang['genre']?> : </b></br><?=$tag_genre?></br></br></td>
										</tr><tr>
											<td valign="top" colspan="3" width="50%"><b><?=$lang['actor']?> : </b></br><?=str_replace ( $string_cover_old, $string_cover_new, $MovieDetail['actors'])?></td>
			</tr></table></td>
		</tr>
		<tr>
			<td colspan="5" valign="top"><div class="img-holder"></div><table width="100%" border="0"><tr>
										<td valign="top"><b><?=$lang['m_plot']?> :</b></br><b><font color="<?=$HighlightColor?>"><?=$MovieDetail['c03']?></b></font></br><?=$MovieDetail['c01']?></br></br></td>
										<td width="10px"></td>

										<td valign="top" align="left" nowrap><b><?=$lang['links']?>  :</b></br>																													
																					<a href="https://www.youtube.com/results?search_query=<?php echo $MovieDetail['c00']; ?> German Trailer" target="_blank"><img src="./gfx/css/images/yt.png" alt="YouTube" border="0"></a>
																					<a href="http://www.imdb.com/title/<?php echo $MovieDetail['c09']; ?>/" target="_blank"><img src="./gfx/css/images/imdb.png" alt="YouTube" border="0" ></a>
																					<form action="http://www.xrel.to/search.html" method="post" target="_blank" style="display:inline;">
																						<input type="hidden" name="mode" value="full">
																						<input type="hidden" name="extsearch" value="1">
																						<input type="hidden" name="t_extinfo" value="on">
																						<input type="hidden" name="xrel_search_query" value="<?php echo $MovieDetail['c00']; ?>">
																						<input type="image" src="./gfx/css/images/xrel.png" alt="Xrel">
																					</form></br></br>	
																					<?php if (!empty($MovieDetail['set'])) { echo $MovieDetail['set']; } ?></br>	
										</td>
										</tr></table><td>
									</tr>
	</table>
	</div>
</center>
<?php
	if (@$_REQUEST['options'] == 'setSeen')
	{
		$setSeen = setSeen ($_GET['value'], $_GET['area']);
			if ( $setSeen == "1" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=<?=$_GET["area"]?>&criteria=<?=$_GET["criteria"]?>&value=<?=$_GET["value"]?>&result=true"><?php }
			if ( $setSeen == "2" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=<?=$_GET["area"]?>&criteria=<?=$_GET["criteria"]?>&value=<?=$_GET["value"]?>"><?php }
			if ( $setSeen == "0" ) { echo "Error setSeen</br>"; }
	}
	
	if (@$_REQUEST['options'] == 'rNew')
	{
		$rNew = rNew ($_POST['person'], $_POST['start_date'], $_GET['value']);
			if ( $rNew == "1" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=<?=$_GET["area"]?>&criteria=<?=$_GET["criteria"]?>&value=<?=$_GET["value"]?>&result=true"><?php }
			if ( $rNew == "2" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=<?=$_GET["area"]?>&criteria=<?=$_GET["criteria"]?>&value=<?=$_GET["value"]?>"><?php }
	}
	
	if (@$_REQUEST['options'] == 'rBack')
	{
		$rBack = rBack ($_GET['rID']);
			if ( $rBack == "1" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=<?=$_GET["area"]?>&criteria=<?=$_GET["criteria"]?>&value=<?=$_GET["value"]?>&result=true"><?php }
			if ( $rBack == "2" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=<?=$_GET["area"]?>&criteria=<?=$_GET["criteria"]?>&value=<?=$_GET["value"]?>"><?php }
			if ( $rBack == "0" ) { echo "Error setvBack</br>"; }
		if ( $remove == "1" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=<?=$_GET["area"]?>&criteria=<?=$_GET["criteria"]?>&result=true"><?php }
	}
	
	if (@$_REQUEST['options'] == 'removeKodiMovie')
	{
		$remove = removeKodiMovie_compl ($_GET['idFile'], $_GET['idMovie']);
			if ( $remove == "1" ) { ?><meta http-equiv="refresh" content="0; URL=<?=$_SESSION['history']?>&result=true"><?php }			
			if ( $remove == "2" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=<?=$_GET["area"]?>&criteria=<?=$_GET["criteria"]?>&value=<?=$_GET["value"]?>"><?php }
			if ( $remove == "0" ) { echo "Error removeMovie</br>"; }
	}
	
	if (@$_REQUEST['options'] == 'changeSet')
	{
		$changeSet = changeSet ($_POST['idSet'], $_POST['idMovie'], $_GET['area']);
			if ( $changeSet == "1" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=<?=$_GET["area"]?>&criteria=<?=$_GET["criteria"]?>&value=<?=$_GET["value"]?>&result=true"><?php }			
			if ( $changeSet == "2" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=<?=$_GET["area"]?>&criteria=<?=$_GET["criteria"]?>&value=<?=$_GET["value"]?>&result=false"><?php }
			if ( $changeSet == "0" ) { echo "Error setSet</br>"; }
	}
	
	if (@$_REQUEST['options'] == 'SnglUpdateRating')
	{	
		$SnglUpdateRating = SnglUpdateRating ($_GET['area'], $_POST['idMovie']);
			if ( $SnglUpdateRating == "1" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=<?=$_GET["area"]?>&criteria=<?=$_GET["criteria"]?>&value=<?=$_GET["value"]?>&result=true"><?php }			
			if ( $SnglUpdateRating == "2" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=<?=$_GET["area"]?>&criteria=<?=$_GET["criteria"]?>&value=<?=$_GET["value"]?>&result=false"><?php }
			if ( $SnglUpdateRating == "0" ) { echo "Error setSet</br>"; }
	}