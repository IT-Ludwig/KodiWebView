<?php							
								if(($_GET["s_value"] == "") && (($_GET["criteria"] == "") || ($_GET["criteria"] == "leer")))
								{ ?>
									
									<div class="main">
										<!-- content -->
										<section class="content">
											<!-- post -->
											<div class="post">
												<!-- post-inner -->
												<div class="post-inner">
													<?=$lang['empty_form']?>
												</div>
											<!-- end of post -->
										</section><?php
								} else {
								$_SESSION['history'] = link_history($_GET['area'], @$_GET['criteria'], $_GET['s_value'], @$_GET['counter'], @$_GET['sort'], @$_GET['way']);	

								if($_GET['criteria'] == "actor-all")
								{
									$search_list_m = builSearchThumbList($_GET['area'], 'm-'.$_GET['criteria'] , $_GET['s_value'], @$_GET['counter'], @$_GET['sort'], @$_GET['way']); 
								} else {
									$search_list_m = builSearchThumbList($_GET['area'], 'm-'.$_GET['criteria'] , $_GET['s_value'], @$_GET['counter'], @$_GET['sort'], @$_GET['way']); 
									$search_list_o = builSearchThumbList($_GET['area'], 'o-'.$_GET['criteria'] , $_GET['s_value'], @$_GET['counter'], @$_GET['sort'], @$_GET['way']);
									if(($_GET['criteria'] != "country") || ($_GET['criteria'] != "sets"))
									{
										$search_list_s = builSearchThumbList($_GET['area'], 's-'.$_GET['criteria'] , $_GET['s_value'], @$_GET['counter'], @$_GET['sort'], @$_GET['way']);
									}
									$count_m = calc_unseen_seen('m-'.$_GET['criteria'] ,"m-seen-".$_GET['criteria'], $_GET['s_value']);
									$count_o = calc_unseen_seen('o-'.$_GET['criteria'] ,"o-seen-".$_GET['criteria'], $_GET['s_value']);	
									
										$countM= $count_m['count'].$lang['cou-1'].$count_m['seen'].$lang['seen'].', '.$count_m['unseen'].$lang['not_seen'];	
										$countO = $count_o['count'].$lang['cou-1'].$count_o['seen'].$lang['seen'].', '.$count_o['unseen'].$lang['not_seen'];
										if(($_GET['criteria'] == "country") || ($_GET['criteria'] == "sets"))
										{ $countS = ""; } else {
											$countS = getCount('s-'.$_GET['criteria'], $_GET['s_value']).$lang['serie'].$lang['find'];
										}									
									
									
									
								}
														

												
								$head1 = $lang['search_for']." : ";
								$head2 = $_GET['s_value'];
								?>
				<!-- main -->
				<div class="main">
					<!-- content -->
					<section class="content">
						<!-- post -->
						<div class="post">
							<!-- post-inner -->
							<div class="post-inner">
								<header>
									<h2><?php echo $head1.$head2; ?></h2>								
								</header ></br>
								<table width="100%">
									<tr>
										<td valign="top">
											<table><tr><td><?=$lang['got_to']?></td><td>
											<div class='pagination'>
												<ul>
													<li><a href="#movie_kodi"><b><?=$lang['movie']?> Kodi</b></a></li>
													<li><a href="#movie_original"><b><?=$lang['movie'].$lang['original']?></b></a></li>
													<li><a href="#serie_kodi"><b><?=$lang['serie']?> Kodi</b></a></li>
												</ul>
											</div>
											</td></tr></table>
											<table><tr><td><?=$lang['sort']?> </td><td>
											<div class='pagination'>
												<ul>
													<li><a href="./index.php?area=<?=$_GET['area']?>&s_value=<?=$_GET['s_value']?>&sort=date&way=<?=way(@$_GET['way'])?>"><b><?=$lang['m_added']?></b></a></li>
													<li><a href="./index.php?area=<?=$_GET['area']?>&s_value=<?=$_GET['s_value']?>&sort=title&way=<?=way(@$_GET['way'])?>"><b><?=$lang['m_Titel']?></b></a></li>
													<li><a href="./index.php?area=<?=$_GET['area']?>&s_value=<?=$_GET['s_value']?>&sort=rating&way=<?=way(@$_GET['way'])?>"><b><?=$lang['Rate']?></b></a></li>
												</ul>
											</div>
											</td></tr></table></br>	
										</td>
										<td align="right" width="150px"><?php
											if(($_GET['criteria'] == "actor") || ($_GET['criteria'] == "writer") || ($_GET['criteria'] == "director"))
											{	
												if(is_file ("./thumb/144x210/persona/".@$_GET["s_value"].".jpg"))
												{ ?>
												<img src="./thumb/144x210/persona/<?=$_GET["s_value"]?>.jpg" width="100"><?php 
												}
											} ?>
										</td>
									</table>	
								<?php
								if(($_GET["criteria"] == "actor-all"))
								{	
								//print_r($search_list_m);
									  
									echo "<div class='img-holder'><table width='100%'><tr><td><h3 id='persona_kodi'>{$lang['persona']} </h3></td></table></div>";									
									include($tf.'thumbnail_list_header.tpl');									
									$cur_movie = 1;
										foreach ($search_list_m as $movie) 
										{
											PersoListData();
											include($tf."PersonaThumb.tpl");
											if ($cur_movie++ == $ShowsPerRow)
											{
												echo $RowDivider;
												$cur_movie = 1;
											}
										}
																				
									include($tf.'thumbnail_list_footer_search.tpl');
								}								
								if(($_GET["criteria"] != "actor-all"))
								{	
									$_GET['area'] = 'movie';
									echo "<div class='img-holder'><table width='100%'><tr><td><h3 id='movie_kodi'>{$lang['movie']}Kodi</h3></td><td><p class='tags'>$countM</p></td></tr></table></div>";
									include($tf.'thumbnail_list_header.tpl');
										$cur_movie = 1;
								
										foreach ($search_list_m as $movie) 
										{
											MovieListData();
											include($tf."movieListThumb.tpl");
											if ($cur_movie++ == $ShowsPerRow)
											{
												echo $RowDivider;
												$cur_movie = 1;
											}
										}
										
									include($tf.'thumbnail_list_footer_search.tpl');							

									$_GET['area'] = 'originals';
									echo "<div class='img-holder'><table width='100%'><tr><td><h3 id='movie_original'>{$lang['movie']}{$lang['original']}</h3></td><td><p class='tags'>$countO</p></td></tr></table></div>";
									include($tf.'thumbnail_list_header.tpl');
										$cur_movie = 1;
										
										foreach ($search_list_o as $originals) 
										{
											OriginalsListData();
											include($tf."originalsListThumb.tpl");
											if ($cur_movie++ == $ShowsPerRow)
											{
												echo $RowDivider;
												$cur_movie = 1;
											}
										}
									include($tf.'thumbnail_list_footer_search.tpl'); 
									
									if(($_GET['criteria'] == "country") || ($_GET['criteria'] == "sets"))
									{ } else {
									$_GET['area'] = 'serie';
									echo "<div class='img-holder'><table width='100%'><tr><td><h3 id='serie_kodi'>{$lang['serie']} Kodi</h3></td><td><p class='tags'>$countS</p></td></tr></table></div>";								
									include($tf.'thumbnail_list_header.tpl');									
										$cur_movie = 1;

										foreach ($search_list_s as $serie) 
										{
											if (($_GET['criteria'] == "director") || ($_GET['criteria'] == "writer"))
											{
												$serie['epi'] = "1";
											} else {
												$serie['epi'] = "0";
											}	
											SerieListData();
											include($tf."serieListThumb.tpl");
											if ($cur_movie++ == $SeriePerRow)
											{
												echo $RowDivider;
												$cur_movie = 1;
											}
										}								
									include($tf.'thumbnail_list_footer_search.tpl'); 
									}
								
							}	
									?>													
						</div>
						<!-- end of post -->
					</section>
					<!-- end of content -->
								<?php } ?>