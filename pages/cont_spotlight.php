				<!-- main -->
				<div class="main">
					<!-- content -->
					<section class="content">
						<?php if (is_dir('./install')){ ?>
						<!-- post -->
						<div class="post">
							<!-- post-inner -->
							<div class="post-inner">
								<header>
									<h2><a href="#"><?=$lang['inst_dist']?></a></h2>
									<div class="cl">&nbsp;</div>
								</header>
								<div class="img-holder"></div>
								<!-- post-cnt -->
								<div class="post-cnt">
								<?=$lang['inst_dist_att']?></br>
								</div>
								<!-- end of post-cnt -->
							</div>
							<!-- post-inner -->
						</div>
						<!-- end of post -->
										
						<?php } 					
							$count_m = getCount ("m-all", "");
							$count_s = getCount ("s-all", "");
							$count_o = getCount ("o-all", "");
							
							if((!empty($count_m)) || ($count_m > 0))
							{
								if (@$show_spotlight_movie_kodi == "1")
								{ 
								  $id = (randEntry ('m-all', $mID));
								  $crit_link = "m-details"; $area_link = "movie"; ?>
									<!-- post -->
									<div class="post">
										<!-- post-inner -->
										<div class="post-inner">
											<header>
												<h2><a href="#"><?=$lang['spot_m_r']?></a></h2>
												<p class="tags"><a href="./index.php?area=<?=$area_link?>&criteria=<?=$crit_link?>&value=<?=$id?>"><?=$lang['details']?></a></p>
												<div class="cl">&nbsp;</div>
											</header>
											<div class="img-holder"></div>
											<!-- post-cnt -->
											<div class="post-cnt"><?php 
											$spot_movie = getDataFromID ('m-all', $mRate, $mID, 'c14', $id, $mID);
											$tag_genre = buildTags ('search', "genre" , $spot_movie["genre"], "s_value");
											$rate = round(@$spot_movie["rating"]);
												$spot_movie["RATING_IMAGES_small"] = str_repeat('<img src="' . $tf . '/' . $RatingImageSmall . '"  border="0">', $rate).str_repeat('<img src="' . $tf . '/' . $NoRatingImage . '"  border="0">', 10-$rate);
												if (is_file ($thumbFolder.$t300x424.'cover/'.$spot_movie["id"].".jpg"))
												{
													$thumb = $thumbFolder.$t300x424.'cover/'.$spot_movie["id"].".jpg";
												} else {
													$thumb = "./gfx/css/images/nix.jpg"; 
												}
												include("./pages/SpotMovie.php");
												?>
											</div>
											<!-- end of post-cnt -->
										</div>
										<!-- post-inner -->
									</div>
									<!-- end of post --><?php 
								}
								if (@$show_newest_movie_kodi == "1")
								{ ?>
									<!-- post -->
									<div class="post">
										<!-- post-inner -->
										<div class="post-inner">
											<header>
												<h2><a href="#"><?=$lang['spot_m_n']?></a></h2>
												<p class="tags"><a href="./index.php?area=movie&criteria=m-all&value=&sort=date&way=DESC"><?=$lang['more']?></a></p>
												<div class="cl">&nbsp;</div>
											</header>
											<div class="img-holder"></div>
											<!-- post-cnt -->
											<div class="post-cnt"><?php 
												$movies_list = newestFive ('m-all', 'date'); 
												$_GET['area'] = "movie"; $_GET['criteria'] = "m-details";
												include($tf.'thumbnail_list_header.tpl');
												
												$cur_movie = 1;

												foreach ($movies_list as $movie) 
												{
													MovieListData();
													include($tf."startContent.tpl");
													if ($cur_movie++ == $ShowsPerRow)
													{
														echo $RowDivider;
														$cur_movie = 1;
													}
												}
												
												include($tf.'NewestThumbnail_list_footer.tpl'); 
												
												?>
											</div>
											<!-- end of post-cnt -->
										</div>
										<!-- post-inner -->
									</div>
									<!-- end of post --><?php 
								} 
								if (@$show_best_movie_kodi == "1")
								{ ?>
									<!-- post -->
									<div class="post">
										<!-- post-inner -->
										<div class="post-inner">
											<header>
												<h2><a href="#"><?=$lang['spot_m_b']?></a></h2>
												<p class="tags"><a href="./index.php?area=movie&criteria=m-all&value=&sort=rating&way=DESC"><?=$lang['more']?></a></p>
												<div class="cl">&nbsp;</div>
											</header>
											<div class="img-holder"></div>
											<!-- post-cnt -->
											<div class="post-cnt"><?php 
												$movies_list = newestFive ('m-all', 'rating'); 
												$_GET['area'] = "movie"; $_GET['criteria'] = "m-details";
												include($tf.'thumbnail_list_header.tpl');
												
												$cur_movie = 1;

												foreach ($movies_list as $movie) 
												{
													MovieListData();
													include($tf."startContent.tpl");
													if ($cur_movie++ == $ShowsPerRow)
													{
														echo $RowDivider;
														$cur_movie = 1;
													}
												}
												
												include($tf.'NewestThumbnail_list_footer.tpl'); 
												
												?>
											</div>
											<!-- end of post-cnt -->
										</div>
										<!-- post-inner -->
									</div>
									<!-- end of post --><?php 
								} 
							}
							if((!empty($count_o)) || ($count_o > 0))
							{
								if (@$show_spotlight_movie_original == "1")
								{ 
								  $id = (randEntry ('o-all', $mID));
								  $crit_link = "o-details"; $area_link = "originals";?>
									<!-- post -->
									<div class="post">
										<!-- post-inner -->
										<div class="post-inner">
											<header>
												<h2><a href="#"><?=$lang['spot_o_r']?></a></h2>
												<p class="tags"><a href="./index.php?area=<?=$area_link?>&criteria=<?=$crit_link?>&value=<?=$id?>"><?=$lang['details']?></a></p>
												<div class="cl">&nbsp;</div>
											</header>
											<div class="img-holder"></div>
											<!-- post-cnt -->
											<div class="post-cnt"><?php 
											$spot_movie = getDataFromID ('o-all', $mRate, $mID, 'c14', $id, $mID);
											$tag_genre = buildTags ('search', "genre" , $spot_movie["genre"], "s_value");
											$rate = round(@$spot_movie["rating"]);
												$spot_movie["RATING_IMAGES_small"] = str_repeat('<img src="' . $tf . '/' . $RatingImageSmall . '"  border="0">', $rate).str_repeat('<img src="' . $tf . '/' . $NoRatingImage . '"  border="0">', 10-$rate);
												if (is_file ($thumbFolder.$t300x424.'cover/'.$spot_movie["id"].".jpg"))
												{
													$thumb = $thumbFolder.$t300x424.'cover/'.$spot_movie["id"].".jpg";
												} else {
													$thumb = "./gfx/css/images/nix.jpg"; 
												}
												include("./pages/SpotMovie.php");
												?>
											</div>
											<!-- end of post-cnt -->
										</div>
										<!-- post-inner -->
									</div>
									<!-- end of post --><?php 
								} 
								if (@$show_newest_movie_original == "1")
								{ ?>
									<!-- post -->
									<div class="post">
										<!-- post-inner -->
										<div class="post-inner">
											<header>
												<h2><a href="#"><?=$lang['spot_o_n']?></a></h2>
												<p class="tags"><a href="./index.php?area=originals&criteria=o-all&value=&sort=date&way=DESC"><?=$lang['more']?></a></p>
												<div class="cl">&nbsp;</div>
											</header>
											<div class="img-holder"></div>
											<!-- post-cnt -->
											<div class="post-cnt"><?php
												$movies_list = newestFive ('o-all', 'date'); 
												$_GET['area'] = "originals"; $_GET['criteria'] = "o-details";
												include($tf.'thumbnail_list_header.tpl');
												
												$cur_movie = 1;

												foreach ($movies_list as $movie) 
												{
													MovieListData();
													include($tf."startContent.tpl");
													if ($cur_movie++ == $ShowsPerRow)
													{
														echo $RowDivider;
														$cur_movie = 1;
													}
												}							
												include($tf.'NewestThumbnail_list_footer.tpl'); 									
												?>
											</div>
											<!-- end of post-cnt -->
										</div>
										<!-- post-inner -->
									</div>
									<!-- end of post --><?php
								} 
								if (@$show_best_movie_original == "1")
								{ ?>
									<!-- post -->
									<div class="post">
										<!-- post-inner -->
										<div class="post-inner">
											<header>
												<h2><a href="#"><?=$lang['spot_o_b']?></a></h2>
												<p class="tags"><a href="./index.php?area=originals&criteria=o-all&value=&sort=rating&way=DESC"><?=$lang['more']?></a></p>
												<div class="cl">&nbsp;</div>
											</header>
											<div class="img-holder"></div>
											<!-- post-cnt -->
											<div class="post-cnt"><?php
												$movies_list = newestFive ('o-all', 'rating'); 
												$_GET['area'] = "originals"; $_GET['criteria'] = "o-details";
												include($tf.'thumbnail_list_header.tpl');
												
												$cur_movie = 1;

												foreach ($movies_list as $movie) 
												{
													MovieListData();
													include($tf."startContent.tpl");
													if ($cur_movie++ == $ShowsPerRow)
													{
														echo $RowDivider;
														$cur_movie = 1;
													}
												}							
												include($tf.'NewestThumbnail_list_footer.tpl'); 									
												?>
											</div>
											<!-- end of post-cnt -->
										</div>
										<!-- post-inner -->
									</div>
									<!-- end of post --><?php 
								} 
							}
							if((!empty($count_s)) || ($count_s > 0))
							{
								if (@$show_spotlight_serie_kodi == "1")
								{ 
								  $id = (randEntry ('s-all', 'idShow'));
								  $crit_link = "s-details"; $area_link = "serie";?>
									<!-- post -->
									<div class="post">
										<!-- post-inner -->
										<div class="post-inner">
											<header>
												<h2><a href="#"><?=$lang['spot_s_r']?></a></h2>
												<p class="tags"><a href="./index.php?area=<?=$area_link?>&criteria=<?=$crit_link?>&value=<?=$id?>"><?=$lang['details']?></a></p>
												<div class="cl">&nbsp;</div>
											</header>
											<div class="img-holder"></div>
											<!-- post-cnt -->
											<div class="post-cnt"><?php 
											$spot_movie = getDataFromID ('s-all', $mRate, $mID, 'c08', $id, 'idShow');
											$tag_genre = buildTags ('serie', "s-genre" , $spot_movie["genre"], "value");
											$rate = round(@$spot_movie["rating"]);
												$spot_movie["RATING_IMAGES_small"] = str_repeat('<img src="' . $tf . '/' . $RatingImageSmall . '"  border="0">', $rate).str_repeat('<img src="' . $tf . '/' . $NoRatingImage . '"  border="0">', 10-$rate);
												if (is_file ($thumbFolder.$t300x424.'cover/'.$spot_movie["id"].".jpg"))
												{
													$thumb = $thumbFolder.$t300x424.'cover/'.$spot_movie["id"].".jpg";
												} else {
													$thumb = "./gfx/css/images/nix.jpg"; 
												}
												include("./pages/SpotMovie.php");
												?>
											</div>
											<!-- end of post-cnt -->
										</div>
										<!-- post-inner -->
									</div>
									<!-- end of post --><?php 
								} 
								if (@$show_newest_serie_kodi == "1")
								{ ?>
									<!-- post -->
									<div class="post">
										<!-- post-inner -->
										<div class="post-inner">
											<header>
												<h2><a href="#"><?=$lang['spot_s_n']?></a></h2>
												<p class="tags"><a href="./index.php?area=serie&criteria=s-all&value=&sort=date&way=DESC"><?=$lang['more']?></a></p>
												<div class="cl">&nbsp;</div>
											</header>
											<div class="img-holder"></div>
											<!-- post-cnt -->
											<div class="post-cnt"><?php
												$movies_list = newestFive_serie ('s-all', 'date'); 
												$_GET['area'] = "serie"; $_GET['criteria'] = "s-details";
												include($tf.'thumbnail_list_header.tpl');
												
												$cur_movie = 1;

												foreach ($movies_list as $movie) 
												{
													SerieListData_2();
													include($tf."startContent.tpl");
													if ($cur_movie++ == $ShowsPerRow)
													{
														echo $RowDivider;
														$cur_movie = 1;
													}
												}							
												include($tf.'NewestThumbnail_list_footer.tpl'); 									
												?>
											</div>
											<!-- end of post-cnt -->
										</div>
										<!-- post-inner -->
									</div>
									<!-- end of post --><?php 
								} 
								if (@$show_best_serie_kodi == "1")
								{ ?>
									<!-- post -->
									<div class="post">
										<!-- post-inner -->
										<div class="post-inner">
											<header>
												<h2><a href="#"><?=$lang['spot_s_b']?></a></h2>
												<p class="tags"><a href="./index.php?area=serie&criteria=s-all&value=&sort=rating&way=DESC"><?=$lang['more']?></a></p>
												<div class="cl">&nbsp;</div>
											</header>
											<div class="img-holder"></div>
											<!-- post-cnt -->
											<div class="post-cnt"><?php
												$movies_list = newestFive_serie ('s-all', 'rating-serie'); 
												$_GET['area'] = "originals"; $_GET['criteria'] = "o-details";
												include($tf.'thumbnail_list_header.tpl');
												
												$cur_movie = 1;

												foreach ($movies_list as $movie) 
												{
													SerieListData_2();
													include($tf."startContent.tpl");
													if ($cur_movie++ == $ShowsPerRow)
													{
														echo $RowDivider;
														$cur_movie = 1;
													}
												}							
												include($tf.'NewestThumbnail_list_footer.tpl'); 									
												?>
											</div>
											<!-- end of post-cnt -->
										</div>
										<!-- post-inner -->
									</div>
									<!-- end of post --><?php 
								} 
								if (@$show_newest_epi_kodi == "1")
								{ ?>
									<!-- post -->
									<div class="post">
										<!-- post-inner -->
										<div class="post-inner">
											<header>
												<h2><a href="#"><?=$lang['spot_e_n']?></a></h2>

												<div class="cl">&nbsp;</div>
											</header>
											<div class="img-holder"></div>
											<!-- post-cnt -->
											<div class="post-cnt"><?php
												$epi_list = newestFive_epi ('epi-all', 'date-epi'); 
												$_GET['area'] = "serie"; $_GET['criteria'] = "s-details";
												include($tf.'thumbnail_list_header.tpl');
												$cur_movie = 1;

												foreach ($epi_list as $epi) 
												{
													EpiListData();
													include($tf."startContent.tpl");
													if ($cur_movie++ == $ShowsPerRow)
													{
														echo $RowDivider;
														$cur_movie = 1;
													}
												}
												
												include($tf.'NewestThumbnail_list_footer.tpl'); 
												
												?>
											</div>
											<!-- end of post-cnt -->
										</div>
										<!-- post-inner -->
									</div>
									<!-- end of post --><?php 
								} 
								if (@$show_best_epi_kodi == "1")
								{ ?>
									<!-- post -->
									<div class="post">
										<!-- post-inner -->
										<div class="post-inner">
											<header>
												<h2><a href="#"><?=$lang['spot_e_b']?></a></h2>

												<div class="cl">&nbsp;</div>
											</header>
											<div class="img-holder"></div>
											<!-- post-cnt -->
											<div class="post-cnt"><?php
												$epi_list = newestFive_epi ('epi-all', 'rating-epi'); 
												$_GET['area'] = "serie"; $_GET['criteria'] = "s-details";
												include($tf.'thumbnail_list_header.tpl');
												
												$cur_movie = 1;

												foreach ($epi_list as $epi) 
												{
													EpiListData();
													include($tf."startContent.tpl");
													if ($cur_movie++ == $ShowsPerRow)
													{
														echo $RowDivider;
														$cur_movie = 1;
													}
												}
												
												include($tf.'NewestThumbnail_list_footer.tpl'); 
												
												?>
											</div>
											<!-- end of post-cnt -->
										</div>
										<!-- post-inner -->
									</div>
									<!-- end of post --><?php 
								} 
							}?>

						
					</section>
					<!-- end of content -->