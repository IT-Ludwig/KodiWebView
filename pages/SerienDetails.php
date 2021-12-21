	<div class='bar'><center>
	<table border="0" width="98%">
		<tr>
			<td align="center"><img src="<?php echo $thumb; ?>" alt="<?php echo $SerieDetail[0]["c00"]; ?>"></td>
		</tr>
				<tr>
			<td valign="top"><table width="100%"><tr>
									<td valign="top" nowrap><?php if (!empty($SerieDetail[0]['strPath'])) { echo "<b>{$lang['dir']} : </b></br>{$SerieDetail[0]['strPath']}"; } ?></td>
									<td width="11px"></td>
									<td valign="top" align="right"><?php if (!empty($SerieDetail[0]['dateAdded'])) { echo "<b>{$lang['m_added']} {$lang['am']} </b></br>".convertDate($SerieDetail[0]['dateAdded']); } ?></td>										
			</tr></table></td>
		</tr>
		<tr>												
			<td valign="middle"></br><div class="img-holder"><table width="100%"><tr><td width="50%"><b><font size="+2"><?=$lang['seriedetails']?></font></b></td><td width="50%" align="right"><?=$count?></td></tr></table></div></td>
		</tr>
		<tr>
			<td>
				<table width="100%">
					<tr>
						<td><b><?=$lang['Rate']?> : </b></br><?=round($SerieDetail[0]["c04"], 2 )?> </td>
						<td><b><?=$lang['first_play']?> : </b></br><?=str_replace ( $string_cover_old, $string_cover_new, $tag_year)?></td>
						<td><b><?=$lang['anzahl'].$lang['seasons']?> : </b></br><?php echo $SerieDetail[0]["totalSeasons"]; ?></td>
					</tr>
					<tr>
						<td><b><?=$lang['network']?>  : </b></br><?=str_replace ( $string_cover_old, $string_cover_new, $tag_studio)?></td>						
						<td><b><?=$lang['genre']?> : </b></br><?=str_replace ( $string_cover_old, $string_cover_new, $tag_genre)?></td>
						<td><b><?=$lang['Rating']?></b></br><?=str_replace ( $string_cover_old, $string_cover_new, $tag_fsk)?></td>
					</tr>
				</table>			
			</td>
		</tr>
		<tr>
			<td>
				<table width="100%">
					<tr>						
						<td><b><?=$lang['actor']?> : </b></br><?=str_replace ( $string_cover_old, $string_cover_new, $SerieDetail[0]['actors'])?> </td>
					</tr>
				</table>			
			</td>
		</tr>
		<tr>
			<td><div class="img-holder"></div><b><?=$lang['m_plot']?> : </b></br><?php echo $SerieDetail[0]["c01"]; ?></br></td>
		</tr>
		<tr>
			<td></br><div class="img-holder"><b><font size="+2"><?=$lang['serienguide']?></font></b></div></td>
		</tr>
		<tr>
			<td>		
				<div class="pagination">
					<ul><?php
						for ( $x = 1; $x <= $SerieDetail[0]["totalSeasons"]; $x++ )
						{ ?>

							<?php if (@$_GET['s'] == $x ) { $active = "class='active'"; } else { $active = ""; } ?>
							<li <?=$active?>><a href='./index.php?area=<?=$_GET['area']?>&criteria=<?=$_GET['criteria']?>&value=<?=$_GET['value']?>&s=<?=$x?>'><?=$lang['seasons']?> <?=$x?></a></li><?php
						} ?>
					</ul>
				</div>
			</td>
		</tr>
</table></br><?php
					if ((isset($_GET['s'])) && ($_GET['s'] != ""))	
					{ ?>					
						
				<table border="0" width="100%" >
					<tr>
							<td width="12px"></td>
						<td><?=$lang['m_Titel']?></td>
							<td width="11px"></td>
						<td><b><?=$lang['Rate']?></b></td>
							<td width="11px"></td>
						<td><b><?=$lang['first_play']?></b></td>
						<td></td>
					</tr>
					<?php 
					
					$getSeasonDetails  = getSeasonDetails($_GET['value'], $_GET['s']);
					foreach ( $getSeasonDetails as $EpisodeContent)
					{ 	
					$exp_date1 = explode (" ", $EpisodeContent['c05']);
					if(isset($exp_date1[1])) { $mm = ", ".$exp_date1[1]; } else { $mm = ""; }
					$exp_date = explode ("-", $exp_date1[0]);
					
						$date = "$exp_date[2].$exp_date[1].$exp_date[0] $mm";
					if ($EpisodeContent['c13'] < 10 ) { $EpisodeContent['c13'] = '0'.$EpisodeContent['c13']; }
					 if ($EpisodeContent["playCount"] > 0 )
					 {
						$seen = "<img src='./gfx/css/images/seen1.png'>"; 
					 } else {
						$seen = "<img src='./gfx/css/images/seen0.png'>";  
					 }
					$tag_writer = buildTags ('search', "writer" , $EpisodeContent['c04'], 's_value');
					$tag_director = buildTags ('search', "director" , $EpisodeContent['c10'], 's_value');
					//getActors 
					$act_2 = "";	
					$act_1 = "<div class='pagination'><ul>";				
					foreach (getConnected($conn_mysql_db1) -> query("Select `$tb_actors_name`, `role` From $tb_actors Inner Join $tb_actorlinkmovie On $tb_actors.$tb_actors_id = $tb_actorlinkmovie.$tb_actors_id Where media_type = 'episode' AND $tb_actorlinkmovie_movieID = '{$EpisodeContent['idEpisode']}'") as $actors_ist) 
					{
						$mouseOn = "";
							
							if (is_file ("./thumb/144x210/persona/".@$actors_ist[0].".jpg"))
							{
							$mouseOn = "onmouseover=&quot;Tip('<img src=\'./thumb/144x210/persona/$actors_ist[0].jpg\' width=\'144\'>',ABOVE, true, BGCOLOR, '#414141',BORDERCOLOR, '#414141')&quot; onmouseout='UnTip()'";
							} 
								$act_22 = "<li><a $mouseOn href='./index.php?area=search&criteria=actor&s_value=$actors_ist[0]'>{$actors_ist[0]} {$lang['as']} {$actors_ist[1]}</a></li>";
								$act_2 .= $act_22;
					}
					$act_3 = "</ul></div>";
					$EpisodeContent['actors'] = $act_1.$act_2.$act_3;
					
				?><tr  onclick="setVisibility('show_episode_details<?php echo $EpisodeContent['c13']; ?>')">
							    <td width="12px"><img src="./gfx/css/images/arrowdown-double.png" border="0"></td>
							<td><?php echo $EpisodeContent['c13'].' - '.$EpisodeContent['c00']; ?></td>
								<td width="11px"></td>
							<td><?php echo round($EpisodeContent['c03'], 2 ); ?></td>
								<td width="11px"></td>
							<td><?php echo $date; ?></td>
							<td><?php echo $seen; ?></td>
						</tr>					
						<tr>
							<td width="12px"></td>
							<td colspan="6" border="0"><div id="show_episode_details<?=$EpisodeContent['c13']?>" style="visibility:hidden;display:none;">
											<table width="100%" border="0" style="border-width: 1px; border-left-style: solid; border-bottom-style: solid;">
												<tr>
													<td colspan="3"></br><b><?=$lang['m_added'].$lang['am']?></b></br><?php echo convertDate($EpisodeContent['dateAdded']); ?></td>
												</tr>
												<tr>
													<td width="50%"></br><b><?=$lang['Drehbuch']?>  : </b></br><?php if(!empty($EpisodeContent['c04'])) { echo str_replace ( $string_cover_old, $string_cover_new, $tag_writer); } else { echo "N/A"; } ?></td>
													<td width="50%"></br><b><?=$lang['Regisseur']?>  : </b></br><?php if(!empty($EpisodeContent['c10'])) { echo str_replace ( $string_cover_old, $string_cover_new, $tag_director); } else { echo "N/A"; } ?></td>
												</tr>
												<tr>
													<td colspan="3"></br><b><?=$lang['actor']?>  : </b></br><?=str_replace ( $string_cover_old, $string_cover_new, $EpisodeContent['actors'])?> </td>
												</tr>												
												
												<tr>
													<td colspan="3"></br><b><?=$lang['m_plot']?>  : </b></br><?=$EpisodeContent['c01']?></td>
												</tr>
											</table>
											</div>
							</td>
						</tr><?php 
					} ?>
					
				</table><?php
					} ?>
				
			</td>
		</tr>
	</table>
	

</center></div>