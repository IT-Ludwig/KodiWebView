				<!-- main -->
				<div class="main">
					<!-- content -->
					<section class="content">
						<!-- post -->
						<div class="post">
							<!-- post-inner -->
								<div class="post-inner">
								<header>
									<h2><?=$lang['Statistik']?></h2>
									<p class="tags"></p>
									</br>
								</header>
								<div class='pagination'>
									<ul>
										<li><a href="./index.php?area=stats&stat=cGenre"><?=$lang['anzahl'].$lang['_nach_'].$lang['genre']?></b></a></li>
										<li><a href="./index.php?area=stats&stat=cAll"><?=$lang['anzahl'].$lang['sum']?></b></a></li>
										<li><a href="./index.php?area=stats&stat=runtime"><?=$lang['runtimes']?></b></a></li>
										<li><a href="./index.php?area=stats&stat=rental"><?=$lang['rental']?> </b></a></li>
									</ul>
								</div></br></br>
								<div class="img-holder"></div><?php 
									if (isset($_GET['stat']))
									{
										switch ($_GET['stat'])
										{
											case 'cGenre':								
												$genre = getGenre (); 
												foreach($genre as $key)
												{
														$count_genre_m = getCount('m-genre', $key);
														$count_genre_s = getCount('s-genre', $key);
														$count_genre_o = getCount('o-genre', $key);
													$getCountGenreM[] = "$count_genre_m";
													$getCountGenreS[] = "$count_genre_s";
													$getCountGenreO[] = "$count_genre_o";
												
													$getGenres_x[] = "'$key'";
												} 

												$countGenreM = '['.implode (",",$getCountGenreM).']';
												$countGenreS = '['.implode (",",$getCountGenreS).']';
												$countGenreO = '['.implode (",",$getCountGenreO).']';
												$genres_x = '['.implode (",",$getGenres_x).']';

												include ('./include/highcharts/genre.php');		
											break;
											case 'cAll':
												$count_m = calc_unseen_seen('m-all' ,"m-seen-all" , '');
												if($count_m['count'] != 0)
												{											
													$mSeen = round ((100/$count_m['count']) * $count_m['seen'], 2);
													$mUSeen = round ((100/$count_m['count']) * $count_m['unseen'], 2);
													$mGes = "{$count_m['count']}{$lang['movie']}<br>{$lang['_in_']}Kodi";		
												}
												$count_o = calc_unseen_seen('o-all' ,"o-seen-all" , '');
												if($count_o['count'] != 0)
												{	
													$oSeen = round ((100/$count_o['count']) * $count_o['seen'], 2);
													$oUSeen = round ((100/$count_o['count']) * $count_o['unseen'], 2);
													$oGes = "{$count_o['count']}{$lang['movie']}<br>{$lang['original']}";	
												}
												$count_s = getCount_serie ('s-all', 'totalCount', 'watchedcount');
												if($count_s['count'] != 0)
												{	
													$count = getCount('s-all' , '');
													$sSeen = round ((100/$count_s['count']) * $count_s['seen'], 2);
													$sUSeen = round ((100/$count_s['count']) * $count_s['unseen'], 2);
													$sGes = "$count {$lang['serie']}<br>mit {$count_s['count']} {$lang['epi']}<br>{$lang['_in_']} Kodi";
												}	
												include ('./include/highcharts/see.php');
											break;	
											case 'runtime':
												$mRuntime = getRuntime ('m-all', @$value);
												$oRuntime = getRuntime ('o-all', @$value);
												echo "<h3>{$lang['sum']}{$lang['runtime']} {$lang['movie']} Kodi</h3>". zeitformat($mRuntime).'</br></br>';
												echo "<h3>{$lang['sum']}{$lang['runtime']} {$lang['movie']} {$lang['original']}</h3>". zeitformat($oRuntime);
											break;
											case 'rental':
												$title = array(); $perso = array(); 
												$getData =  getSelfDB()->query("SELECT `start_date`, `stop_date` FROM $tb_rental WHERE stop_date IS NOT NULL");
													while( $row = $getData->fetch())
													{
														$date1 = new DateTime($row[0]);
														$start = $date1->getTimestamp();	
														$date2 = new DateTime($row[1]);
														$stop = $date2->getTimestamp();	
														$cent[] = $stop-$start;
													}	
													$anz = count($cent);
													$sum = array_sum($cent);
													$seconds = $sum / $anz;
													$min = min($cent);
													$max = max($cent);
													echo "<h3>{$lang['average']} {$lang['rental']}".strtolower($lang['duration'])." </h3>". zeitformat($seconds)."</br></br>";
													echo "<h3>{$lang['mind']} {$lang['rental']}".strtolower($lang['duration'])."</h3>". zeitformat($min)."</br></br>";
													echo "<h3>{$lang['max']} {$lang['rental']}".strtolower($lang['duration'])."</h3>". zeitformat($max)."</br></br>";

													$getData2 =  getSelfDB()->query("SELECT count(person) as count, person FROM $tb_rental group by person");
													while( $row2 = $getData2->fetch())
													{
														$perso[] = "{name: '{$row2[1]}', y: {$row2[0]} }";
													}
														$line_1 = @implode (",",@$perso);
													echo "<center><h3>{$lang['anzahl']} {$lang['per']} {$lang['persona'] }</h3></center>";
													include ('./include/highcharts/rental_pP.php');
													
													$getData3 =  getSelfDB()->query("SELECT count(uniqueid_value) as count, uniqueid_value FROM $tb_rental group by uniqueid_value");
													while( $row3 = $getData3->fetch())
													{
														$tit = getTitleByID ($tb_originals, $row3[1]);
														$title[] = "{name: '$tit', y: {$row3[0]} }";
														
													}
														$line_2 = @implode (",",@$title);
													echo "</br><center><h3>{$lang['anzahl']} {$lang['per']} {$lang['m_Titel'] }</h3></center>";
													include ('./include/highcharts/rental_pT.php');													
													
													
													
											break;	
										}
									}
									
									?>									
								</div>	
							
						</div>


						<!-- end of post -->
					</section>