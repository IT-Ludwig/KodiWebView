<?php
				function getSelfDB() 
				{
					include ('conf.php');
						if(is_dir('./include'))
						{
							$dbh = new PDO('sqlite:./include/'.$db_file);
						} elseif(is_dir('../include')){
							$dbh = new PDO('sqlite:../include/'.$db_file);
						} else {							
							
							$dbh = new PDO('sqlite:./'.$db_file);
						}
					$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					return $dbh;																								
				}
				
				function getConnected($db, $path = '') 
				{
					include ('conf.php');
				
					if($use_kodi_db_file == 1)
					{
						$dbh = new PDO("sqlite:{$path}MyVideos{$db_version}.db");
					}	
					if($use_kodi_db_file == 0)
					{	
						$conn_mysql = "mysql:host=$conn_mysql_host;dbname=$db;port=$conn_mysql_port";
						$dbh = new PDO($conn_mysql, $conn_mysql_user, $conn_mysql_pass ,
						array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));														
					}
					$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					return $dbh;																								
				}		
				
	///////////////////////////////////////////////////			

				function Criteria($criteria, $value) 
				{	
					include ('conf.php');
					if (isset($criteria))
					{		
							switch (strtolower($criteria)) 
							{	
								case 'm-studio':
									$criteriasql = " FROM $tb_movie  WHERE `c18` LIKE '%$value%'";
									$specialsql = " $tb_movie  WHERE `c18` LIKE '%$value%'";
									break;	
								case 'o-studio':
									$criteriasql = " FROM $tb_originals  WHERE `c18` LIKE '%$value%'";
									$specialsql = " $tb_originals  WHERE `c18` LIKE '%$value%'";
									break;	
								case 's-studio':
									$criteriasql = " FROM $tb_seriesView  WHERE `c14` LIKE '%$value%'";
									$specialsql = " $tb_seriesView  WHERE `c14` LIKE '%$value%'";
									break;	
								case 'm-fsk':
									$criteriasql = " FROM $tb_movie  WHERE `c12` LIKE '%$value%'";
									$specialsql = " $tb_movie  WHERE `c12` LIKE '%$value%'";
									break;	
								case 'o-fsk':
									$criteriasql = " FROM $tb_originals  WHERE `c12` LIKE '%$value%'";
									$specialsql = " $tb_originals  WHERE `c12` LIKE '%$value%'";
									break;	
								case 's-fsk':
									$criteriasql = " FROM $tb_seriesView  WHERE `c13` LIKE '%$value%'";
									$specialsql = " $tb_seriesView  WHERE `c13` LIKE '%$value%'";
									break;								
								case 'm-genre':
									$criteriasql = " FROM $tb_movie  WHERE `c14` LIKE '%$value%'";
									$specialsql = " $tb_movie  WHERE `c14` LIKE '%$value%'";
									break;
								case 's-genre':
									$criteriasql = " FROM $tb_seriesView  WHERE `c08` LIKE '%$value%'";
									$specialsql = " $tb_seriesView  WHERE `c08` LIKE '%$value%'";
									break;
								case 'o-genre':
									$criteriasql = " FROM $tb_originals  WHERE `c14` LIKE '%$value%'";
									$specialsql = " $tb_originals  WHERE `c14` LIKE '%$value%'";
									break;
								case 'm-writer':
									$criteriasql = " FROM $tb_movie  WHERE `c06` LIKE '%$value%'";
									$specialsql = " $tb_movie  WHERE `c06` LIKE '%$value%'";
									break;	
								case 'o-writer':
									$criteriasql = " FROM $tb_originals  WHERE `c06` LIKE '%$value%'";
									$specialsql = " $tb_originals  WHERE `c06` LIKE '%$value%'";
									break;	
								case 's-writer':
									$criteriasql = " FROM $tb_episodesView Inner Join $tb_seriesView On $tb_seriesView.idShow = $tb_episodesView.idShow WHERE $tb_episodesView.c04 LIKE '%$value%'";
									$specialsql = " $tb_episodesView Inner Join $tb_seriesView On $tb_seriesView.idShow = $tb_episodesView.idShow WHERE $tb_episodesView.c04 LIKE '%$value%'";
									break;										
								case 'm-director':
									$criteriasql = " FROM $tb_movie  WHERE `c15` LIKE '%$value%'";
									$specialsql = " $tb_movie  WHERE `c15` LIKE '%$value%'";
									break;	
								case 'o-director':
									$criteriasql = " FROM $tb_originals  WHERE `c15` LIKE '%$value%'";
									$specialsql = " $tb_originals  WHERE `c15` LIKE '%$value%'";
									break;
								case 's-director':
									$criteriasql = " FROM $tb_episodesView Inner Join $tb_seriesView On $tb_seriesView.idShow = $tb_episodesView.idShow WHERE $tb_episodesView.c10 LIKE '%$value%'";
									$specialsql = " $tb_episodesView Inner Join $tb_seriesView On $tb_seriesView.idShow = $tb_episodesView.idShow WHERE $tb_episodesView.c10 LIKE '%$value%'";
									break;		
								case 'm-year':
									$criteriasql = " FROM $tb_movie  WHERE `c07` LIKE '%$value%'";
									$specialsql = " $tb_movie  WHERE `c07` LIKE '%$value%'";
									break;	
								case 'o-year':
									$criteriasql = " FROM $tb_originals  WHERE `c07` LIKE '%$value%'";
									$specialsql = " $tb_originals  WHERE `c07` LIKE '%$value%'";
									break;
								case 's-year':
									$criteriasql = " FROM $tb_seriesView  WHERE `c05` LIKE '%$value%'";
									$specialsql = " $tb_seriesView  WHERE `c05` LIKE '%$value%'";
									break;
								case 'm-country':
									$criteriasql = " FROM $tb_movie  WHERE `c21` LIKE '%$value%'";
									$specialsql = " $tb_movie  WHERE `c21` LIKE '%$value%'";
									break;	
								case 'o-country':
									$criteriasql = " FROM $tb_originals  WHERE `c21` LIKE '%$value%'";
									$specialsql = " $tb_originals  WHERE `c21` LIKE '%$value%'";
									break;	
								case 'm-actor':
									$criteriasql = " From $tb_actors Inner Join $tb_actorlinkmovie On $tb_actors.$tb_actors_id = $tb_actorlinkmovie.$tb_actors_id Inner Join $tb_movie On $tb_movie.idMovie = $tb_actorlinkmovie.$tb_actorlinkmovie_movieID Where $tb_actorlinkmovie.media_type = 'movie' AND $tb_actors.$tb_actors_name = '$value'";
									$specialsql = " $tb_actors Inner Join $tb_actorlinkmovie On $tb_actors.$tb_actors_id = $tb_actorlinkmovie.$tb_actors_id Inner Join $tb_movie On $tb_movie.idMovie = $tb_actorlinkmovie.$tb_actorlinkmovie_movieID Where $tb_actorlinkmovie.media_type = 'movie' AND $tb_actors.$tb_actors_name like '%$value%'";
									break;
								case 'm-actor-search':
									$criteriasql = "";
									$specialsql = " $tb_actors Inner Join $tb_actorlinkmovie On $tb_actors.$tb_actors_id = $tb_actorlinkmovie.$tb_actors_id Inner Join $tb_movie On $tb_movie.idMovie = $tb_actorlinkmovie.$tb_actorlinkmovie_movieID Where $tb_actors.$tb_actors_name like '%$value%' GROUP BY name";
									break;									
								case 'o-actor':
									$criteriasql = " FROM $tb_originals  WHERE `actors` LIKE '%$value%'";
									$specialsql = " $tb_originals  WHERE `actors` LIKE '%$value%'";
									break;	
								case 's-actor':
									$criteriasql = " From $tb_actors Inner Join $tb_actorlinkmovie On $tb_actors.$tb_actors_id = $tb_actorlinkmovie.$tb_actors_id Inner Join $tb_seriesView On $tb_seriesView.idShow = $tb_actorlinkmovie.$tb_actorlinkmovie_movieID Where $tb_actorlinkmovie.media_type = 'tvshow' AND $tb_actors.$tb_actors_name = '$value'";
									$specialsql = " $tb_actors Inner Join $tb_actorlinkmovie On $tb_actors.$tb_actors_id = $tb_actorlinkmovie.$tb_actors_id Inner Join $tb_seriesView On $tb_seriesView.idShow = $tb_actorlinkmovie.$tb_actorlinkmovie_movieID Where $tb_actorlinkmovie.media_type = 'tvshow' AND $tb_actors.$tb_actors_name like '%$value%'";
									break;										
								case 'm-all':
									$criteriasql = " FROM $tb_movie";
									$specialsql = " $tb_movie WHERE c00 LIKE '%$value%'";
									break;
								case 'm-all-unseen':
									$criteriasql = " FROM $tb_movie WHERE playCount IS NULL";
									$specialsql = " $tb_movie WHERE c00 LIKE '%$value%' AND playCount IS NULL";
									break;									
								case 'o-all-unseen':
									$criteriasql = " FROM $tb_originals WHERE playCount != 1";
									$specialsql = " $tb_originals WHERE c00 LIKE '%$value%'";
									break;	
								case 'o-all':
									$criteriasql = " FROM $tb_originals";
									$specialsql = " $tb_originals WHERE c00 LIKE '%$value%'";
									break;	
								case 'm-movieid':
									$criteriasql = " FROM $tb_movie";
									$specialsql = " $tb_movie WHERE `idMovie` = '$value'";
									break;
								case 'o-movieid':
									$criteriasql = " FROM $tb_originals";
									$specialsql = " $tb_originals WHERE `idMovie` = '$value'";
									break;										
								case 's-all':
									$criteriasql = " FROM $tb_seriesView";
									$specialsql = " $tb_seriesView WHERE c00 LIKE '%$value%'";
									break;
								case 'epi-all':
									$criteriasql = " FROM  $tb_episodesView Inner Join $tb_seriesView On $tb_seriesView.idShow = $tb_episodesView.idShow";
									$specialsql = " $tb_episodesView WHERE c00 LIKE '%$value%'";
									break;
								case 'm-details':
									$criteriasql = " FROM $tb_movie WHERE `$mID` = '$value'";
									$specialsql = "";
									break;
								case 'o-details':
									$criteriasql = " FROM $tb_originals WHERE `$mID` = '$value'";
									$specialsql = "";
									break;
								case 's-details':
									$criteriasql = " FROM $tb_seriesView WHERE `idShow` = '$value'";
									$specialsql = "";
									break;
								case 'rental-away':
									$criteriasql = " FROM $tb_rental";
									$specialsql = " FROM $tb_rental WHERE stop_date IS NULL";
									break;	
								case 'rental-back':
									$criteriasql = " FROM $tb_rental";
									$specialsql = " FROM $tb_rental WHERE stop_date != ''";
									break;										
								case 'date':
									$criteriasql = " ORDER BY `dateAdded` $value";
									$specialsql = " ORDER BY `dateAdded` $value";
									break;
								case 'date-epi':
									$criteriasql = " ORDER BY $tb_episodesView.dateAdded $value";
									$specialsql = " ORDER BY $tb_episodesView.dateAdded $value";
									break;	
								case 'rating-epi':
									$criteriasql = " ORDER BY `c03` $value";
									$specialsql = " ORDER BY `c03` $value";
									break;		
								case 'title':
									$criteriasql = " ORDER BY `c00` $value";
									$specialsql = " ORDER BY `c00` $value";
									break;
								case 'rating':
									$criteriasql = " ORDER BY `c05` $value";
									$specialsql = " ORDER BY `c05` $value";
									break;		
								case 'rating-serie':
									$criteriasql = " ORDER BY `c04` $value";
									$specialsql = " ORDER BY `c04` $value";
									break;										
								case 'm-seen-all':
									$criteriasql = " FROM $tb_movie WHERE `playCount` > '0'";
									$specialsql = " $tb_movie WHERE `c00` LIKE '%$value%' AND `playCount` > '0' ";
									break;									
								case 'o-seen-all':
									$criteriasql = " FROM $tb_originals WHERE `playCount` > '0'";
									$specialsql = " $tb_originals WHERE `c00` LIKE '%$value%' AND `playCount` > '0' ";
									break;
								case 'm-seen-genre':
									$criteriasql = " FROM $tb_movie WHERE `c14` LIKE '%$value%' AND `playCount` > '0'";
									$specialsql = " $tb_movie WHERE `c14` LIKE '%$value%' AND `playCount` > '0'";
									break;
								case 'o-seen-genre':
									$criteriasql = " FROM $tb_originals  WHERE `c14` LIKE '%$value%' AND `playCount` > '0'";
									$specialsql = " $tb_originals  WHERE `c14` LIKE '%$value%' AND `playCount` > '0'";
									break;
								case 's-seen-fsk':
									$criteriasql = " FROM $tb_seriesView WHERE `c13` LIKE '%$value%' AND `playCount` > '0'";
									$specialsql = " $tb_seriesView WHERE `c13` LIKE '%$value%' AND `playCount` > '0'";
									break;
								case 'm-seen-fsk':
									$criteriasql = " FROM $tb_movie WHERE `c12` LIKE '%$value%' AND `playCount` > '0'";
									$specialsql = " $tb_movie WHERE `c12` LIKE '%$value%' AND `playCount` > '0'";
									break;
								case 'o-seen-fsk':
									$criteriasql = " FROM $tb_originals  WHERE `c12` LIKE '%$value%' AND `playCount` > '0'";
									$specialsql = " $tb_originals  WHERE `c12` LIKE '%$value%' AND `playCount` > '0'";
									break;								
								case 'm-seen-writer':
									$criteriasql = " FROM $tb_movie  WHERE `c06` LIKE '%$value%' AND `playCount` > '0'";
									$specialsql = " $tb_movie  WHERE `c06` LIKE '%$value%' AND `playCount` > '0'";
									break;	
								case 'o-seen-writer':
									$criteriasql = " FROM $tb_originals  WHERE `c06` LIKE '%$value%' AND `playCount` > '0'";
									$specialsql = " $tb_originals  WHERE `c06` LIKE '%$value%' AND `playCount` > '0'";
									break;	
								case 'm-seen-director':
									$criteriasql = " FROM $tb_movie  WHERE `c15` LIKE '%$value%' AND `playCount` > '0'";
									$specialsql = " $tb_movie  WHERE `c15` LIKE '%$value%' AND `playCount` > '0'";
									break;	
								case 'o-seen-director':
									$criteriasql = " FROM $tb_originals  WHERE `c15` LIKE '%$value%' AND `playCount` > '0'";
									$specialsql = " $tb_originals  WHERE `c15` LIKE '%$value%' AND `playCount` > '0'";
									break;
								case 'm-seen-country':
									$criteriasql = " FROM $tb_movie  WHERE `c21` LIKE '%$value%' AND `playCount` > '0'";
									$specialsql = " $tb_movie  WHERE `c21` LIKE '%$value%' AND `playCount` > '0'";
									break;	
								case 'o-seen-country':
									$criteriasql = " FROM $tb_originals  WHERE `c21` LIKE '%$value%' AND `playCount` > '0'";
									$specialsql = " $tb_originals  WHERE `c21` LIKE '%$value%' AND `playCount` > '0'";
									break;
								case 'm-seen-year':
									$criteriasql = " FROM $tb_movie  WHERE `c07` LIKE '%$value%' AND `playCount` > '0'";
									$specialsql = " $tb_movie  WHERE `c07` LIKE '%$value%' AND `playCount` > '0'";
									break;	
								case 'o-seen-year':
									$criteriasql = " FROM $tb_originals  WHERE `c07` LIKE '%$value%' AND `playCount` > '0'";
									$specialsql = " $tb_originals  WHERE `c07` LIKE '%$value%' AND `playCount` > '0'";
									break;		
								case 'm-seen-actor':
									$criteriasql = " From $tb_actors Inner Join $tb_actorlinkmovie On $tb_actors.$tb_actors_id = $tb_actorlinkmovie.$tb_actors_id Inner Join $tb_movie On $tb_movie.idMovie = $tb_actorlinkmovie.$tb_actorlinkmovie_movieID Where $tb_actors.$tb_actors_name = '$value' AND $tb_movie.playCount = '1'";
									$specialsql = " $tb_actors Inner Join $tb_actorlinkmovie On $tb_actors.$tb_actors_id = $tb_actorlinkmovie.$tb_actors_id Inner Join $tb_movie On $tb_movie.idMovie = $tb_actorlinkmovie.$tb_actorlinkmovie_movieID Where $tb_actors.$tb_actors_name = '$value' AND $tb_movie.playCount = '1'";
									break;	
								case 'o-seen-actor':
									$criteriasql = " FROM $tb_originals  WHERE `actors` LIKE '%$value%' AND `playCount` > '0'";
									$specialsql = " $tb_originals  WHERE `actors` LIKE '%$value%' AND `playCount` > '0'";
									break;		
								case 's-seen-epi':
									$criteriasql = " FROM $tb_seriesView WHERE `idShow` = '$value'";
									$specialsql = " $tb_seriesView WHERE `idShow` = '$value'";
									break;	
									
								case 'm-sets':
									$criteriasql = " FROM $tb_movie";
									$specialsql = " $tb_movie WHERE idSet = '$value'";
									break;
								case 'o-sets':
									$criteriasql = " FROM $tb_originals";
									$specialsql = " $tb_originals WHERE idSet LIKE '$value'";
									break;	
								case 'm-seen-sets':
									$criteriasql = " FROM $tb_movie  WHERE `idSet` = '$value' AND `playCount` > '0'";
									$specialsql = " $tb_movie  WHERE `idSet` LIKE '$value' AND `playCount` > '0'";
									break;	
								case 'o-seen-sets':
									$criteriasql = " FROM $tb_originals  WHERE `idSet` = '$value' AND `playCount` > '0'";
									$specialsql = " $tb_originals  WHERE `idSet` LIKE '$value' AND `playCount` > '0'";
									break;	
							}
					} else { //Starting setup is Latest added shows
						$value = "";
						$specialsql = "";
						$criteriasql = "";
					}
					$criteriaReturn[] = @$criteriasql;
					$criteriaReturn[] = @$specialsql;
						return $criteriaReturn;
				}

				function siteVars() 
				{
					include ('conf.php');
					foreach (getSelfDB() -> query("SELECT * FROM $tb_settings") as $getSiteVars) 
					{
						 $GLOBALS[$getSiteVars[0]] = $getSiteVars[1];
					}
				}
				
				function getMovieDetails ($criteria, $value)
				{
					global $language;
				    include ("./include/lang/$language.php");
					include ('conf.php');
					
					$sql = Criteria($criteria, $value);				
					$getMovieDetails =  getConnected($conn_mysql_db1)->query('SELECT `idFile`,`idMovie`, `c00`, `c01`, `c03`, `'.$mVote.'` as c04, `'.$mRate.'` as c05, `c06`, `'.$premiered.'` as c07, `'.$mID.'` as c09, `c11`, `c12`, `c14`, `c15`, `c18`, `c21`, `idSet`, `strSet`, `strFileName`, `strPath`, `playCount`, `dateAdded`, `c05` as ratingId '.$sql[0])->fetchAll(PDO::FETCH_ASSOC);	
										
						$exp_date1 = explode (" ", $getMovieDetails[0]['c07'] );
						$exp_date = explode ("-", $exp_date1[0]);
					 $getMovieDetails[0]['c07'] = 	$exp_date[0];					
					
					//getActors 
					$act_2 = "";	
					$act_1 = "<div class='pagination'><ul>";				
					foreach (getConnected($conn_mysql_db1) -> query("Select `$tb_actors_name`, `role` From $tb_actors Inner Join $tb_actorlinkmovie On $tb_actors.$tb_actors_id = $tb_actorlinkmovie.$tb_actors_id Where media_type = 'movie' AND $tb_actorlinkmovie_movieID = '{$getMovieDetails[0]['idMovie']}'") as $actors_ist) 
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
					$getMovieDetails[0]['actors'] = $act_1.$act_2.$act_3;	
					$getMovieDetails[0]['c07'] = convertPreDate($getMovieDetails[0]['c07']);
					
					// get extension
						$getExtension = @explode ('.', $getMovieDetails[0]['strFileName']);
						$getMovieDetails[0]['strFileName'] = end($getExtension);
					
					// get Sets
						if 	(!empty($getMovieDetails[0]['idSet']))
						{
						$str3 = "";	
						$str2 = "";	
							
							$str1 = "<b>{$lang['see_to']} : </b></br><div class='pagination'><ul>";
						
							foreach (getConnected($conn_mysql_db1) -> query("SELECT `c00`, `$mID` as c09 FROM $tb_movie WHERE `idSet` = '{$getMovieDetails[0]['idSet']}' ORDER BY c07 ASC") as $setKodi) 
							{
								$str22 = "<li><a href='./index.php?area=movie&criteria=m-details&value=$setKodi[1]'>$setKodi[0]</a></li></br></br></br>";
								$str2 .= $str22;
							}						
							foreach (getSelfDB() -> query("SELECT `c00`, `$mID` as c09 FROM $tb_originals WHERE `idSet` = '{$getMovieDetails[0]['idSet']}' ORDER BY c07 ASC") as $setOriginal) 
							{
								$str33 = "<li><a href='./index.php?area=originals&criteria=o-details&value=$setOriginal[1]'>$setOriginal[0]</a></li></br></br></br>";
								$str3 .= $str33;
							}
							$str4 = "</ul></div>";		 
							$getMovieDetails[0]['set'] = $str1.$str2.$str3.$str4;			
															
						}
					
					$getMediaInfo = getMediaInfo ( $getMovieDetails[0]['idFile']);
					
					$MovieDetails = array_merge($getMovieDetails[0],$getMediaInfo);
						return $MovieDetails;
				}	
				
				function MovieListData() 
				{
					global $movie;
					
					include ('conf.php');
					include ('enviroment.php');
					foreach ($movie as $key => $value) 
					{
						if ($value == '' ) 
						{
							@$movie[$key] = $language["unknown"];
						} else {
							$movie[$key] = str_replace(chr(39),"`",$movie[$key]);
							$movie[$key] = $movie[$key];
						}
					} 
					$movie["title"] = @$movie["c00"];
					$rate = round(@$movie["c05"]);
					
					$movie["RATING_IMAGES_small"] = str_repeat('<img src="' . $tf . '/' . $RatingImageSmall . '"  border="0" title="'.$rate.'">', $rate).str_repeat('<img src="' . $tf . '/' . $NoRatingImage . '"  border="0">', 10-$rate);
										
					if (is_file ($thumbFolder.$t144x210."cover/".$movie["c09"].".jpg"))
					{
						$movie["THUMBNAIL"] = $thumbFolder.$t144x210."cover/".$movie["c09"].".jpg";						
					} else {
						$movie["THUMBNAIL"] = "./gfx/css/images/nix.jpg"; 
					} 
					 					 
					 if (@$movie["playCount"] > 0 )
					 {
						$movie["SEE_THUMBNAIL"] = "<img src='./gfx/css/images/seen1.png'>"; 
					 } else {
						$movie["SEE_THUMBNAIL"] = "<img src='./gfx/css/images/seen0.png'>";  
					 }
				}
				
				function SerieListData() 
				{
					global $serie;
					global $language;
				    include ("./include/lang/$language.php");
					
					include ('conf.php');
					include ('enviroment.php');
					
					foreach ($serie as $key => $value) 
					{
						if ($value == '' ) 
						{
							$serie[$key] = $lang["unknown"];
						} else {
							$serie[$key] = str_replace(chr(39),"`",$serie[$key]);
							$serie[$key] = $serie[$key];
						}
					}
					if(@$serie["epi"] == "1")
					{
						$serie["title"] = $serie["strTitle"].'</br>S'.$serie["c121"].'E'.$serie["c13"].' - '.$serie["c00"];
					} else {
						$serie["title"] = $serie["c00"];
					}
					 
					 
					
					 $rate = round(@$serie["c04"]);
					 $serie["RATING_IMAGES_small"] = str_repeat('<img src="' . $tf . '/' . $RatingImageSmall . '"  border="0" title="'.$rate.'">', $rate).str_repeat('<img src="' . $tf . '/' . $NoRatingImage . '"  border="0">', 10-$rate);
					 
					 if ($GLOBALS['show_cover_instead_of_banner'] == "0")
					 {
						if (is_file ($thumbFolder.$toriginal."banner/".$serie["c12"].".jpg"))
						{
							$serie["THUMBNAIL"] = $thumbFolder.$toriginal."/banner/".$serie["c12"].".jpg";
						} else {
							$serie["THUMBNAIL"] = "./gfx/css/images/nix.jpg"; 
						}
					 } else {
						if (is_file ($thumbFolder.$t144x210."cover/".$serie["c12"].".jpg"))
						{
							$serie["THUMBNAIL"] = $thumbFolder.$t144x210."cover/".$serie["c12"].".jpg";
						} else {
							$serie["THUMBNAIL"] = "./gfx/css/images/nix.jpg"; 	
						}	
					 }
					
					if(@$serie["epi"] == "1")
					{
						@$playCount = @$serie['playCount'];
							 if (@$playCount > 0 )
							 {
								$serie["SEE_THUMBNAIL"] = "<img src='./gfx/css/images/seen1.png'>"; 
							 } else {
								$serie["SEE_THUMBNAIL"] = "<img src='./gfx/css/images/seen0.png'>";  
							 }							
					} else {
						 @$playCount = @$serie['totalCount'] - @$serie['watchedcount'];
							 if (@$playCount < 1 )
							 {
								$serie["SEE_THUMBNAIL"] = "<img src='./gfx/css/images/seen1.png'>"; 
							 } else {
								$serie["SEE_THUMBNAIL"] = "<img src='./gfx/css/images/seen0.png'>";  
							 }							 
					}	
				 
				}
					
				function getMediaInfo ( $fileID ) 
				{
					include ('conf.php');
				$VideoSpecs =  getConnected($conn_mysql_db1) -> query('SELECT `iVideoWidth`, `iVideoHeight`, `strVideoCodec`, `strStereoMode` FROM `streamdetails` WHERE `iStreamType` = 0 AND `idFile` = "'.$fileID.'"')->fetch();
					$mediaInfo['width'] = $VideoSpecs[0];
					$mediaInfo['height'] = $VideoSpecs[1]; 
					$mediaInfo['videocodec'] = $VideoSpecs[2];
					if (($VideoSpecs[3] == "top_bottom") || ($VideoSpecs[3] == "left_right")) { $mediaInfo['strStereoMode'] = "1"; } else { $mediaInfo['strStereoMode'] = ""; }
								
				$AudioSpecs =  getConnected($conn_mysql_db1) -> query('SELECT `iAudioChannels`, `strAudioCodec`, `strAudioLanguage` FROM `streamdetails` WHERE `iStreamType` = 1 AND `idFile` = "'.$fileID.'"');	
               					
					while( $Audiorow = $AudioSpecs->fetch())
                    {
						$mediaInfo['channels'][] = array($Audiorow[0], $Audiorow[1], $Audiorow[2]);
                    }	
				$SubSpecs =  getConnected($conn_mysql_db1) -> query('SELECT `strSubtitleLanguage` FROM `streamdetails` WHERE `iStreamType` = 2 AND `idFile` = "'.$fileID.'"');	
               					
					while( $Subrow = $SubSpecs->fetch())
                    {
						$mediaInfo['subs'][] = $Subrow[0];
                    }
					
				//print_r($mediaInfo['strAudioLanguage']);
				return $mediaInfo;									
				}
				
				function buildMovieThumbList ($criteria, $value, $GetCounter, $sort, $way, $area)
				{
					include ('conf.php');
					
					if (isset($GetCounter)) 
					{
						if($GetCounter == "") { $GetCounter = 0; }
						$counter = $GetCounter * $GLOBALS['ShowsPerPage'];
					} else {
						$counter = 0;
					}
					if (isset($sort)) 
					{
						$sort = Criteria($sort, $way);
						$sort = $sort[0];
					} else {
						$sort = "";
					}
					$sql = Criteria($criteria, $value);

				
							$countersql = " LIMIT " . $counter . "," . $GLOBALS['ShowsPerPage'];
							$sql =  $sql[0] . $sort . $countersql ;
							if($area == "originals"){	$movies_list =  getSelfDB() ->query("SELECT `$title` as c00, `$mRate` as c05, `$mID` as c09, `playCount` $sql")->fetchAll(PDO::FETCH_ASSOC); }	
							if($area == "movie")	{	$movies_list =  getConnected($conn_mysql_db1)->query("SELECT `$title` as c00, `$mRate` as c05, `$mID` as c09, `playCount` $sql")->fetchAll(PDO::FETCH_ASSOC); }
							
								return $movies_list;
				}	

				function buildSerieThumbList ($criteria, $value, $GetCounter, $sort, $way)
				{
					include ('conf.php');
					
					if (isset($GetCounter)) 
					{
						if($GetCounter == "") { $GetCounter = 0; }
						$counter = $GetCounter * $GLOBALS['SeriePerPage'];
					} else {
						$counter = 0;
					}
					if (isset($sort)) 
					{
						$sort = Criteria($sort, $way);
						$sort = $sort[1];
					} else {
						$sort = "";
					}
					$sql = Criteria($criteria, $value);
					
				
							$countersql = " LIMIT " . $counter . "," . $GLOBALS['SeriePerPage'];
							$sql =  $sql[0] . $sort . $countersql;
							$serie_list =  getConnected($conn_mysql_db1)->query("SELECT `idShow`, `c00`, `$mRate` as c04, `$mID` as c12, `totalCount`, `watchedcount` $sql")->fetchAll(PDO::FETCH_ASSOC);	
								return $serie_list;
				}
				
				function buildPageLinks ($area, $criteria, $value, $GetCounter, $sort = '', $way= '')
				{
					include ('conf.php');
					
				if ($area == "serie")
				{
					$GLOBALS['ShowsPerPage'] = $GLOBALS['SeriePerPage']; 
				}
				
				$sql = Criteria($criteria, $value);
					
				if (isset($GetCounter)) 
				{
						$page["page"] = $GetCounter;
				} else {
						$page["page"] = 0;
				}					
										
						if($area == "originals"){ $menge = getSelfDB()->query('SELECT COUNT(*) AS COUNT FROM '. $sql[1])->fetch(); }
						if($area == "movie")	{ $menge = getConnected($conn_mysql_db1)->query('SELECT COUNT(*) AS COUNT FROM '. $sql[1])->fetch(); }
						if($area == "serie")	{ $menge = getConnected($conn_mysql_db1)->query('SELECT COUNT(*) AS COUNT FROM '. $sql[1])->fetch(); }
						
						$page["ShowCount"] = $menge[0];
						if ($page["ShowCount"] > $GLOBALS['ShowsPerPage'])
						{
							$page["NumberOfPages"] = ceil($page["ShowCount"] / $GLOBALS['ShowsPerPage']);
								if ($page["page"] == $page["NumberOfPages"] -1) {
									$page["PrevPage"] = $page["page"] - 1;
									$page["NextPage"] = 0;
								} elseif ($page["page"] == 0) {
									$page["PrevPage"] = $page["NumberOfPages"] - 1;
									$page["NextPage"] = 1;
									} else {
										$page["PrevPage"] = $page["page"] - 1;
										$page["NextPage"] = $page["page"] + 1;
									}
								if ($page["NumberOfPages"] == 1) 
								{
									$page["PrevPage"] = 0;
									$page["NextPage"] = 0;
								}
									$page["PrevPageLink"] = '?area='.$area.'&criteria='.$criteria.'&value='.@$value.'&sort='.@$sort.'&way='.@$way.'&counter='.$page["PrevPage"];
									$page["NextPageLink"] = '?area='.$area.'&criteria='.$criteria.'&value='.@$value.'&sort='.@$sort.'&way='.@$way.'&counter='.$page["NextPage"];
									$page["PageLink"] = '?area='.$area.'&criteria='.$criteria.'&value='.@$value.'&sort='.@$sort.'&way='.@$way.'&counter=';
						}
						//print_r($page);
						return $page;
				}
				
				function getGenre ()
				{
					include ('conf.php');
					$genres_list = array();
					
					$genresList = getConnected($conn_mysql_db1)->query("SELECT `$tb_genre_name` FROM $tb_genre");	
					while( $row = $genresList->fetch())
                    {
                        $genres_list[] =  $row[0];
                    }
					return $genres_list;
				}

				function getCount ($criteria, $value)
				{
					include ('conf.php');
					$sql = Criteria($criteria, $value);
					$o = explode("-", $criteria);
					if($o[0] == "o")
					{
						$menge = getSelfDB()->query('SELECT COUNT(*) AS COUNT FROM '. $sql[1])->fetch();
					} else { 
						$menge = getConnected($conn_mysql_db1)->query('SELECT COUNT(*) AS COUNT FROM '. $sql[1])->fetch();
					}
					
					
					return $menge[0];					
				}
				function getCount_serie ($criteria, $value1,$value2)
				{
					include ('conf.php');
					$sql = Criteria($criteria, '');
					$menge1 = getConnected($conn_mysql_db1)->query("SELECT SUM($value1) AS COUNT ". $sql[0])->fetch();
					$menge2 = getConnected($conn_mysql_db1)->query("SELECT SUM($value2) AS COUNT ". $sql[0])->fetch();
						$unseen = $menge1[0] - $menge2[0];
						$view['count'] = $menge1[0];
						$view['unseen'] = $unseen;
						$view['seen'] = $menge2[0];
					return $view;					
				}
				
				function getRuntime ($criteria, $value)
				{
					include ('conf.php');
					$sql = Criteria($criteria, $value);
					$o = explode("-", $criteria);
					if($o[0] == "o")
					{
						$menge = getSelfDB()->query('SELECT SUM(c11) AS COUNT FROM '. $sql[1])->fetch();
					} else { 
						$menge = getConnected($conn_mysql_db1)->query('SELECT SUM(c11) AS COUNT FROM '. $sql[1])->fetch();
					}
					return $menge[0];					
				}				
				
				function convertPreDate ($value)
				{
					$goo21 = @explode ( '-', $value);
					if(!empty($goo21[1]))
					{
						$goo3 = $goo21[2].'.'.$goo21[1].'.'.$goo21[0];
					} else { $goo3 = $value;
					}
					return $goo3;			
				}

				function getOnlyAviGenre ($tb)
				{
					include ('conf.php');
					$genre = getGenre ();
					
					$genres_list = array();
					
					foreach($genre as $key)
					{
						$count_genre = getCount($tb, $key);
						if($count_genre > 0 )
						{
							$genres_list[$key] = "[$count_genre]";
						}
					}

					return $genres_list;
				}				
				
				
				function zeitformat($Sekundenzahl)
				{
					global $language;
				    include ("./include/lang/$language.php");
					
					$Sekundenzahl = abs($Sekundenzahl); // Ganzzahlwert bilden

					return sprintf("%d {$lang['tage']} %02d {$lang['std']} %02d {$lang['min']} %02d {$lang['sec']}",
						$Sekundenzahl/60/60/24,($Sekundenzahl/60/60)%24,($Sekundenzahl/60)%60,$Sekundenzahl%60);
				}

				function calc_unseen_seen_serie ($criteria, $value)
				{
					include ('conf.php');
					$sql = Criteria($criteria, $value);
					$menge = getConnected($conn_mysql_db1)->query('SELECT `totalCount`, `watchedcount` FROM '. $sql[1])->fetchAll(PDO::FETCH_ASSOC);
						$unseen = $menge[0]['totalCount'] - $menge[0]['watchedcount'];
						$view['count'] = $menge[0]['totalCount'];
						$view['unseen'] = $unseen;
						$view['seen'] = $menge[0]['watchedcount'];
					return $view;					
				}
				
				function calc_unseen_seen($criteria1, $criteria2 , $value)
				{
					$count = getCount ($criteria1, $value);	
					$seen = getCount ($criteria2, $value);
						$unseen = $count - $seen;
						$view['count'] = $count;
						$view['unseen'] = $unseen;
						$view['seen'] = $seen;
						return $view;
				}
				
				function buildTags ($area, $criteria , $List, $val_var )
				{					
					include ('enviroment.php');
					
					$sepGenre = explode (' / ', $List);
					$list_2 = "";	
					$list_1 = "<div class='pagination'><ul>";
					if (!empty($List))
					{
					foreach ($sepGenre as $buildList)  
					{	$mouseOn = "";
						if (($criteria == "m-writer") || ($criteria == "m-director") || ($criteria == "o-writer") || ($criteria == "o-director") || ($criteria == "m-actor") || ($criteria == "o-actor"))
						{							
							if (is_file ("./thumb/144x210/persona/".@$buildList.".jpg"))
							{
								
								$mouseOn = "onmouseover=&quot;Tip('<img src=\'./thumb/144x210/persona/$buildList.jpg\'  width=\'144\'>',ABOVE, true, BGCOLOR, '#414141',BORDERCOLOR, '#414141')&quot; onmouseout='UnTip()'";
							} else { $mouseOn = ""; }
						}							
								$list_22 = "<li><a $mouseOn href='./index.php?area=$area&criteria=$criteria&$val_var=$buildList'>$buildList</a></li>";
								$list_2 .= $list_22;
					}
					$list_3 = "</ul></div>";
					$strGenres = $list_1.$list_2.$list_3;	
					
						return $strGenres;
					} else { return ""; }
				}
				
				function getSerienDetails ($criteria, $value)
				{
					include ('conf.php');
					global $language;
				    include ("./include/lang/$language.php");
					
					$sql = Criteria($criteria, $value);
					$getSerienDetails =  getConnected($conn_mysql_db1)->query('SELECT `idShow`, `c00`, `c01`, `c02`, `'.$mRate.'` as c04, c05, `c08`, `'.$mID.'` as c12, `c14`, `strPath`, `dateAdded`, `totalCount`, `watchedcount`,`totalSeasons`,`c13`'.$sql[0])->fetchAll(PDO::FETCH_ASSOC);	
						
						$exp_date1 = explode (" ", $getSerienDetails[0]['c05'] );
						$exp_date = explode ("-", $exp_date1[0]);
					 $getSerienDetails[0]['c05'] = 	$exp_date[0];				
				
				$act_2 = "";	
					$act_1 = "<div class='pagination'><ul>";

					foreach (getConnected($conn_mysql_db1) -> query("Select `$tb_actors_name`, `role` From $tb_actors Inner Join $tb_actorlinkmovie On $tb_actors.$tb_actors_id = $tb_actorlinkmovie.$tb_actors_id Where media_type = 'tvshow' AND $tb_actorlinkmovie_movieID = '{$getSerienDetails[0]['idShow']}'") as $actors_ist) 
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
					
					$getSerienDetails[0]['actors'] = $act_1.$act_2.$act_3;						
						
						
						
						
						return $getSerienDetails;
				}
				
				function getSeasonDetails ($idShow, $season)
				{
					include ('conf.php');
					$getSeasonDetails =  getConnected($conn_mysql_db1)->query("SELECT `c13`, `c00`, `c01`, `$sRate` as c03, `c04`, `c05`, `c10`, `playCount`, `dateAdded`, `idEpisode` FROM $tb_episodesView WHERE idShow = '$idShow' AND c12 = '$season'")->fetchAll(PDO::FETCH_ASSOC);	
							//print_r($getSeasonDetails);
						return $getSeasonDetails;
				}
				
				function link_history($area, $criteria, $value, $counter, $sort, $way)
				{
						$criteria_h = "&criteria=$criteria";
						if($area == "search")
						{
							$value_h = "&s_value=$value";
						} else {
							$value_h = "&value=$value";
						}

						$session_history = "./index.php?area=".$area.$criteria_h.$value_h."&sort=".@$sort."&way=".@$way."&counter=".@$counter;
				
					return $session_history;
				}
				
				function builSearchThumbList($area, $criteria, $value, $GetCounter, $sort, $way)
				{
					include ('conf.php');
					
	
						if (isset($sort)) 
						{
							$sort1 = Criteria($sort, $way);
							$sort = $sort1[0];
						} else {
							$sort = "";
						}
												
						if ($criteria == "m-actor-all")
						{							
							$sSql = "SELECT `name` FROM";
							$sql = Criteria("m-actor-search", $value);	
								$sql_e =  $sql[1] . $sort;
								$search_list =  getConnected($conn_mysql_db1)->query($sSql.$sql_e)->fetchAll(PDO::FETCH_ASSOC);	
						}
						
						if (($criteria == "m-all") || ($criteria == "m-writer") || ($criteria == "m-country") || ($criteria == "m-actor") || ($criteria == "m-fsk") ||
							($criteria == "m-director") || ($criteria == "m-genre") || ($criteria == "m-year") || ($criteria == "m-sets") || ($criteria == "m-studio"))
						{							
							$sSql = "SELECT `c00`, `$mRate` as c05, `$mID` as c09, `playCount` FROM";
							$sql = Criteria($criteria, $value);	
								$sql_e =  $sql[1] . $sort;
								$search_list =  getConnected($conn_mysql_db1)->query($sSql.$sql_e)->fetchAll(PDO::FETCH_ASSOC);	
						}
						
						if (($criteria == "s-all") || ($criteria == "s-genre") || ($criteria == "s-actor") || ($criteria == "s-fsk") || ($criteria == "s-studio") ||
							($criteria == "s-year"))
						{
							$sSql = "SELECT `idShow`, `c00`, `$mRate` as c04, `$mID` as c12, `watchedcount`, `totalCount` FROM";
							$sql = Criteria($criteria, $value);
									$sql_e =  $sql[1] . $sort;
									$search_list =  getConnected($conn_mysql_db1)->query($sSql.$sql_e)->fetchAll(PDO::FETCH_ASSOC);	
						}
						
						if (($criteria == "s-director") || ($criteria == "s-writer"))
						{
							$sSql = "SELECT $tb_episodesView.idShow As `idShow`, $tb_episodesView.c00 as `c00`, $tb_episodesView.$mRate as c04, $tb_episodesView.c12 as c121, $tb_episodesView.c13 as c13, $tb_episodesView.strTitle as strTitle, $tb_seriesView.$mID as c12, $tb_episodesView.playCount as playCount FROM";
							$sql = Criteria($criteria, $value);
									$sql_e =  $sql[1] . $sort;
									$search_list =  getConnected($conn_mysql_db1)->query($sSql.$sql_e)->fetchAll(PDO::FETCH_ASSOC);	
						}
						
						if (($criteria == "o-all") || ($criteria == "o-writer") || ($criteria == "o-country") || ($criteria == "o-actor") || ($criteria == "o-fsk") ||
						($criteria == "o-director") || ($criteria == "o-genre") || ($criteria == "o-year") || ($criteria == "o-sets") || ($criteria == "o-studio"))
						{
							$sSql = "SELECT `c00`, `$mRate` as c05, `$mID` as c09, `playCount` FROM";
							$sql = Criteria($criteria, $value);	
							 	$sql_e =  $sql[1] . $sort;
								$search_list =  getSelfDB()->query($sSql.$sql_e)->fetchAll(PDO::FETCH_ASSOC);					
						}
							

								return $search_list;
				}
				
				function getSets ()
				{
					include ('conf.php');
					$setList = getConnected($conn_mysql_db1)->query("SELECT * FROM $tb_idSet");	
					while( $row = $setList->fetch())
                    {
                        $set_list[$row[0]] =  $row[1].' ('.$row[0].')';
                    }
					return $set_list;
				}
				
				function getSetsAdmin ()
				{
					include ('conf.php');
					$setList = getConnected($conn_mysql_db1)->query("SELECT * FROM $tb_idSet");	
										
					while( $row = $setList->fetch())
                    {
						$setList1 = getConnected($conn_mysql_db1)->query("SELECT count(idMovie) FROM $tb_movieSNGL WHERE idSet = '{$row[0]}'");	
							$row2 = $setList1->fetch();
						$setList2 = getSelfDB()->query("SELECT count(idMovie) FROM $tb_originals WHERE idSet = '{$row[0]}'");	
							$row3 = $setList2->fetch();	
					   $set_list[$row[0]] =  array($row[1],$row[2], $row2[0], $row3[0]);
                    }
					return $set_list;
				}
				
				function delSet ($idSet)				
				{
						include ('conf.php');
						$delSet = getConnected($conn_mysql_db1)->exec("DELETE FROM $tb_idSet WHERE `idSet` = '$idSet'");
						if ($delSet) { return "1"; } else { return "2"; }					
				}
				
				function setSetsAdmin ($idSet, $strSet, $strOverview)
				{
					include ('conf.php');
						$query = getConnected($conn_mysql_db1)->exec("UPDATE $tb_idSet SET `strSet` = '$strSet', `strOverview` = '$strOverview' WHERE `idSet` = '$idSet'");
							if ($query) { return "1"; } else { return "2"; }
				}
				function newSetsAdmin ($strSet, $strOverview)
				{
					include ('conf.php');
						$query = getConnected($conn_mysql_db1)->exec("INSERT INTO $tb_idSet (`strSet`, `strOverview`) VALUES ('$strSet', '$strOverview')");	

							if ($query) { return "1"; } else { return "2"; }
				}
				
				function new_Original ($c00, $c09, $c01, $videocodec, $idSet, $width, $height, $channels, $audiocodec, $dateAdded, $edition, $strStereoMode, $type, $imdb_old)
				{
				include ('conf.php');
				include ('enviroment.php');
					 $c00 = str_replace ( $strings_alt, $strings_new, $c00); 
					if ($type == "new")
					{																			
						$inserOriginal = getSelfDB()->exec("INSERT INTO $tb_originals 
																			(c00, $mID, c01, videocodec, idSet, width, height, channels, audiocodec, dateAdded, edition, strStereoMode) 
																				VALUES 
																			('$c00', '$c09', '$c01', '$videocodec', '$idSet', '$width', '$height', '$channels', '$audiocodec', '$dateAdded', '$edition', '$strStereoMode')");	
					}
					if ($type == "update")
					{																			
						$inserOriginal = getSelfDB()->exec("UPDATE $tb_originals SET
																			c00 = '$c00',
																			$mID = '$c09',
																			c01 = '$c01',
																			videocodec = '$videocodec',
																			idSet = '$idSet',
																			width = '$width',
																			height = '$height',
																			channels = '$channels',
																			audiocodec = '$audiocodec',
																			dateAdded = '$dateAdded',
																			edition = '$edition',
																			strStereoMode  = '$strStereoMode'
																				 WHERE $mID = '$imdb_old'");	
					}
						if ($inserOriginal)
                         {
                                 return "1";

                         } else {
                                return "2";							
                         }
					
				}

				function getOriginalsAdmin ()
				{
					include ('conf.php');
					
					$sql = Criteria("o-all", @$value);
							$originalsAdmin = getSelfDB()->query("SELECT * $sql[0] ORDER BY c00 ASC")->fetchAll(PDO::FETCH_ASSOC);						
								return $originalsAdmin;
				}		
				
			   function getUsersAdmin ()
				{
					include ('conf.php');

							$usersAdmin = getSelfDB()->query("SELECT * FROM $tb_users ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);						
								return $usersAdmin;
				}
				
				function getSiteAdmin() 
				{
					include ('conf.php');
						$siteAdmin = getSelfDB()->query("SELECT * FROM $tb_settings ORDER BY name ASC")->fetchAll(PDO::FETCH_ASSOC);

							//print_r($siteAdmin);
							return $siteAdmin;
				}
	
				function del_Original ($id)
				{
					include ('conf.php');
					if (!empty($id))
					{
						$query = getSelfDB()->exec("DELETE FROM $tb_originals WHERE `c09` = '$id'");
						if ($query)
						{ return "1"; } else { return "2"; }
					} else { return "0"; }
				}
				
				function OriginalsListData() 
				{
					global $originals;

					include ('conf.php');
					include ('enviroment.php');
					
					foreach ($originals as $key => $value) 
					{
						if ($value == '' ) 
						{
							$originals[$key] = @$language["unknown"];
						} else {
							$originals[$key] = str_replace(chr(39),"`",$originals[$key]);
							$originals[$key] = $originals[$key];
						}
					}
					 $originals["title"] = @$originals["c00"];
					 $rate = round(@$originals["c05"]);
					 $originals["RATING_IMAGES_small"] = str_repeat('<img src="' . $tf . '/' . $RatingImageSmall . '"  border="0" title="'.$rate.'">', $rate).str_repeat('<img src="' . $tf . '/' . $NoRatingImage . '"  border="0">', 10-$rate);
					 if (is_file ($thumbFolder.$t144x210."cover/".@$originals["c09"].".jpg"))
					 {
						$originals["THUMBNAIL"] = $thumbFolder.$t144x210."cover/".$originals["c09"].".jpg";
					 } else {
						$originals["THUMBNAIL"] = "./gfx/css/images/nix.jpg"; 
					 }
		 		 					 								 
					 if ($originals["playCount"] > 0 )
					 {
						$originals["SEE_THUMBNAIL"] = "<img src='./gfx/css/images/seen1.png'>"; 
					 } else {
						$originals["SEE_THUMBNAIL"] = "<img src='./gfx/css/images/seen0.png'>";  
					 }
				}
				
				function getOriginalsDetails ($criteria, $value)
				{
					global $language;
					include ('conf.php');															
				    include ("./include/lang/$language.php");
					
					$sql = Criteria($criteria, $value);
					$getMovieDetails =  getSelfDB()->query('SELECT `c00`, `c01`, `c04`, `'.$mRate.'` as c05, `c06`, `c07`, `'.$mID.'` as c09, `c11`, `c12`, `c14`, `c15`, `c18`, `c21`, `idSet`, `playCount`, `videocodec`, `width`, `height`, `channels`, `audiocodec`, `actors`, `dateAdded`, `videocodec` AS `strPath`, `edition`, `strStereoMode`, `idMovie` '.$sql[0])->fetchAll(PDO::FETCH_ASSOC);	
					$getMovieDetails[0]['c03'] = "";
					$getMovieDetails[0]['actors'] = buildTags ('search', 'actor' , $getMovieDetails[0]['actors'], "s_value" );
					$getMovieDetails[0]['strPath'] = 'Original '.$getMovieDetails[0]['strPath'];
					// get Sets
						if 	(!empty($getMovieDetails[0]['idSet']))
						{
						$str3 = "";	
						$str2 = "";	
							
							$str1 = "<b>{$lang['see_to']} : </b></br><div class='pagination'><ul>";					
							foreach (getConnected($conn_mysql_db1) -> query("SELECT `c00`, `$mID` as c09 FROM $tb_movie WHERE `idSet` = '{$getMovieDetails[0]['idSet']}' ORDER BY c07 ASC") as $setKodi) 
							{
								$str22 = "<li><a href='./index.php?area=movie&criteria=m-details&value=$setKodi[1]'>$setKodi[0]</a></li></br></br></br>";
								$str2 .= $str22;
							}						
							foreach (getSelfDB() -> query("SELECT `c00`, `$mID` as c09  FROM $tb_originals WHERE `idSet` = '{$getMovieDetails[0]['idSet']}' ORDER BY c07 ASC") as $setOriginal) 
							{
								$str33 = "<li><a href='./index.php?area=originals&criteria=o-details&value=$setOriginal[1]'>$setOriginal[0]</a></li></br></br></br>";
								$str3 .= $str33;
							}
							$str4 = "</ul></div>";		 
							$getMovieDetails[0]['set'] = $str1.$str2.$str3.$str4;			
															
						}		
						return $getMovieDetails[0];
				}	
				function way ( $curr )
				{
					if (isset($curr))
					{
						if (!empty($curr))
						{
							switch ($curr) 
							{
								case 'ASC':
									echo "DESC";
									break;	
								case 'DESC':
									echo "ASC";
									break;			
							}
					} else { //Starting DESC
						echo "DESC";
					}
					} else { //Starting DESC
						echo "DESC";
					}
				}
				function convertDate($date)
				{
					$goo2 =  explode ( ' ', $date);
					$goo21 = explode ( '-', $goo2[0]);
					$goo3 = $goo21[2].'.'.$goo21[1].'.'.$goo21[0];
					if (isset($goo2[1]))
					{
						$goo4 = $goo3.' um '.$goo2[1].' Uhr';
					} else {
						$goo4 = $goo3;
					}
						return $goo4;
				}
							
				function setSeen ($id, $area)
				{
					include ('conf.php');
					if (!empty($id))
					{
						if (!empty($area))
						{
							if ($area == "originals" ) { $query = getSelfDB()->exec("UPDATE $tb_originals SET `playCount` = '1' WHERE `$mID` = '$id'");}
							if ($area == "movie" ) {	 $query = getConnected($conn_mysql_db1)->exec("UPDATE $tb_movie SET `playCount` = '1' WHERE `$mID` = '$id'");}
							
							if ($query) { return "1"; } else { return "2"; }
						} else { return "0"; }
					} else { return "0"; }
				}   
				
				function User_setAdmin ($user, $admin)
				{
					include ('conf.php');
						$query = getConnected($conn_mysql_db1)->exec("UPDATE $tb_users SET `admin` = '$admin' WHERE `name` = '$user'");
					if ($query) { return "1"; } else { return "0"; }
				}
				
				function newestFive ($criteria, $value)
				{
						include ('conf.php');											
						if (!empty($criteria))
						{
							
						$sort = Criteria($value, 'DESC');
						$sort = $sort[0];
					
							$sql = Criteria($criteria, '');
							$limit = " LIMIT 5";
				
							$sql =  $sql[0] . $sort . $limit ;
								if($criteria == "o-all")
								{
									$newest_five_list =  getSelfDB()->query("SELECT `c00`, `$mRate` as c05, `$mID` as c09, `playCount` $sql")->fetchAll(PDO::FETCH_ASSOC);		
								} else {
									$newest_five_list =  getConnected($conn_mysql_db1)->query("SELECT `c00`, `$mRate` as c05, `$mID` as c09, `playCount` $sql")->fetchAll(PDO::FETCH_ASSOC);
								}
								
								return $newest_five_list;
						}						
				}
				function newestFive_serie ($criteria, $value)
				{
						include ('conf.php');											
						if (!empty($criteria))
						{
							
						$sort = Criteria($value, 'DESC');
						$sort = $sort[0];
					
							$sql = Criteria($criteria, '');
							$limit = " LIMIT 5";
				
							$sql =  $sql[0] . $sort . $limit ;
							$newest_five_list =  getConnected($conn_mysql_db1)->query("SELECT `idShow`, `c00`, `$mRate` as c04, `$mID` as c12  $sql")->fetchAll(PDO::FETCH_ASSOC);	
								return $newest_five_list;
						}						
				}
				function newestFive_epi ($criteria, $value)
				{
						include ('conf.php');											
						if (!empty($criteria))
						{
							
						$sort = Criteria($value, 'DESC');
						$sort = $sort[0];
					
							$sql = Criteria($criteria, '');
							$limit = " LIMIT 5";
				
							$sql =  $sql[0] . $sort . $limit ;
							$newest_five_epi_list =  getConnected($conn_mysql_db1)->query("SELECT $tb_episodesView.c00 as c00 , $tb_episodesView.idShow as idShow, $tb_episodesView.$mRate as c03, $tb_episodesView.c12 as c12, $tb_episodesView.c13 as c13, $tb_episodesView.strTitle as strTitle, $tb_episodesView.playCount as playCount, $tb_seriesView.$mID As c121 $sql")->fetchAll(PDO::FETCH_ASSOC);									
								return $newest_five_epi_list;
						}						
				}
				function SerieListData_2() 
				{
					global $movie;
					
					include ('conf.php');
					include ('enviroment.php');
					
					foreach ($movie as $key => $value) 
					{
						if ($value == '' ) 
						{
							$movie[$key] = @$language["unknown"];
						} else {
							$movie[$key] = str_replace(chr(39),"`",$movie[$key]);
							$movie[$key] = $movie[$key];
						}
					}
					 $movie["c09"] = $movie["idShow"];
					 $movie["title"] = $movie["c00"];
					 $rate = round(@$movie["c04"]);
					 $movie["RATING_IMAGES_small"] = str_repeat('<img src="' . $tf . '/' . $RatingImageSmall . '"  border="0" title="'.$rate.'">', $rate).str_repeat('<img src="' . $tf . '/' . $NoRatingImage . '"  border="0">', 10-$rate);
					 
					 if (is_file ($thumbFolder.$t144x210."cover/".$movie["c12"].".jpg"))
					 {
						$movie["THUMBNAIL"] = $thumbFolder.$t144x210."cover/".$movie["c12"].".jpg";
					 } else {
						$movie["THUMBNAIL"] = "./gfx/css/images/nix.jpg"; 
					 }
					 
				}
				
				function EpiListData() 
				{
					global $epi, $movie;
					
					include ('conf.php');
					include ('enviroment.php');
					
					foreach ($epi as $key => $value) 
					{
						if ($value == '' ) 
						{
							$epi[$key] = @$language["unknown"];
						} else {
							$epi[$key] = str_replace(chr(39),"`",$epi[$key]);
							$epi[$key] = $epi[$key];
						}
					}
					 $movie["c09"] = $epi["idShow"];
					 $movie["title"] = $epi["strTitle"].'</br>S'.$epi["c12"].'E'.$epi["c13"].' - '.$epi["c00"];
					 $rate = round(@$epi["c03"]);
					 $movie["RATING_IMAGES_small"] = str_repeat('<img src="' . $tf . '/' . $RatingImageSmall . '"  border="0" title="'.$rate.'">', $rate).str_repeat('<img src="' . $tf . '/' . $NoRatingImage . '"  border="0">', 10-$rate);
					 
					 if (is_file ($thumbFolder.$t144x210."cover/".$epi["c121"].".jpg"))
					 {
						$movie["THUMBNAIL"] = $thumbFolder.$t144x210."cover/".$epi["c121"].".jpg";
					 } else {
						$movie["THUMBNAIL"] = "./gfx/css/images/nix.jpg"; 
					 }
					 
					 if ($epi["playCount"] > 0 )
					 {
						$movie["SEE_THUMBNAIL"] = "<img src='./gfx/css/images/seen1.png'>"; 
					 } else {
						$movie["SEE_THUMBNAIL"] = "<img src='./gfx/css/images/seen0.png'>";  
					 }
				}
				function randEntry ($criteria, $col)
				{	include ('conf.php');
					$sql = Criteria($criteria, '');
					$sql =  $sql[0];
					
					if($criteria == "o-all")
					{
						$entries =  getSelfDB()->query("SELECT `$col`  $sql")->fetchAll(PDO::FETCH_NUM);	
					} else {
						$entries =  getConnected($conn_mysql_db1)->query("SELECT `$col`  $sql")->fetchAll(PDO::FETCH_NUM);	
					}
					$counts = count($entries)-1;
					//print_r($entries);
					$entry = mt_rand(0, $counts);
					  return $entries[$entry][0];					
				}
				
				function getDataFromID ($criteria, $rat, $scr, $genr, $id, $where)
				{	include ('conf.php');				
					$sql = Criteria($criteria, '');
					$sql =  $sql[0];
					if($criteria == "o-all")
					{
						$getData =  getSelfDB()->query("SELECT c00 as title, c01 as plot, $rat as rating, $scr as id, $genr as genre  $sql WHERE $where = '$id'")->fetchAll(PDO::FETCH_ASSOC);						
					} else {
						$getData =  getConnected($conn_mysql_db1)->query("SELECT c00 as title, c01 as plot, $rat as rating, $scr as id, $genr as genre  $sql WHERE $where = '$id'")->fetchAll(PDO::FETCH_ASSOC);
					}
					
						return $getData[0];
				}
				
				function siteLogin ($user, $pass)
				{		 
				include ('conf.php');
			
					$result = getSelfDB()->query('SELECT COUNT(*) AS COUNT FROM ' .$tb_users. ' WHERE name= \'' . $user .'\'  AND pw= \''. $pass .'\'')->fetchAll(PDO::FETCH_ASSOC);				
					if ($result[0]['COUNT'] > 0)
					{
						 $get = getSelfDB()->query('SELECT * FROM ' .$tb_users. ' WHERE name= \'' . $user .'\'  AND pw= \''. $pass .'\'')->fetchAll(PDO::FETCH_ASSOC);
                         $id = session_id();
                         $_SESSION['site_id'] = $id;
                         $_SESSION['site_user'] =   $get[0]['name'];
                         $_SESSION['site_admin'] =  $get[0]['admin'];								
                         return "1";
                    } else { return "0"; 
					}
				}
         function User_del ($name)
         {
				include ('conf.php');

				 $user_del_list = getSelfDB()->exec("DELETE FROM $tb_users WHERE `name` = '$name'");
                        if ($user_del_list)
                        {
                            return "1";
                        } else {
                            return "0";
                        }
         }

         function User_new ($name, $pass1, $pass2, $admin)
         {
			include ('conf.php');

                         $pass1 = $_POST['pass1'];
                         $pass2 = $_POST['pass2'];
                         if ($pass1 == $pass2)
                         {
							 
							  $pass = md5($pass1);
							  $check_sql = getSelfDB()->query('SELECT COUNT(*) AS COUNT FROM ' . $tb_users . ' WHERE name ="'.$name.'"')->fetchAll(PDO::FETCH_ASSOC);
							  if ($check_sql[0]['COUNT'] > 0)
							  {
                                 return "0";
                              } else {
                              // Neuen User Anlegen
										$sql = getSelfDB()->exec("INSERT INTO $tb_users (`name`, `pw`, `admin`)" . " VALUES ('$name', '$pass', '$admin')");
                                         if ($sql)
                                         {
                                                 return "11";
                                         } else {
                                                echo 'Fehler:</br></br>' . mysql_error();
                                                return "10";
                                         }
                              }
						 } else {
							return "1";
						 }
        }

                function User_newPW ($name, $pass1, $pass2)
                {
					include ('conf.php');
						
						if ($pass1 == $pass2)
						{
								$pass = md5($pass1);
								$sql = getSelfDB()->exec("UPDATE $tb_users SET pw = '$pass' WHERE name = '$name'");

								if ($sql)
								{
									return "1";
								} else {
									return "0";
								}

						} else {
							return "11";
						}

                }
				
				function changeVar ($value)
                {
					include ('conf.php');
						//print_r($value);

						
					    foreach ($value as $key => $val)
                        {
								
								$updateRights = getSelfDB()->exec("UPDATE $tb_settings SET wert = '$val' WHERE name = '$key'");

                        }
						if ($updateRights){ return "1"; } else { return "0"; }
				}
				
				function check_lang ()
                {
				include ('conf.php');

					$o = scandir ("./include/lang");
					$ao = count ( $o );
						for ( $x = 0 ; $x < $ao; $x++ )
                        {
							if ( $o[$x] != '.' &&  $o[$x] != '..' && $o[$x] != 'Desktop.ini')
                            {
								$array = explode ( '.', $o[$x] );
                                $langVars[$array[0]] = $array[0];
							}
                        }
                        return $langVars;
                 }
				
				function PersoListData() 
				{
					global $movie;
					
					include ('conf.php');
					include ('enviroment.php');
					foreach ($movie as $key => $value) 
					{
						if ($value == '' ) 
						{
							@$movie[$key] = $language["unknown"];
						} else {
							$movie[$key] = str_replace(chr(39),"`",$movie[$key]);
							$movie[$key] = $movie[$key];
						}
					}
					 $movie["title"] = @$movie["name"];

						if (is_file ($thumbFolder.$t144x210."persona/".@$movie["name"].".jpg"))
						{
							$movie["THUMBNAIL"] = $thumbFolder.$t144x210."persona/".$movie["name"].".jpg";
						} else {
							$movie["THUMBNAIL"] = "./gfx/css/images/nix.jpg"; 
						}
					 
				}
				
				function getLastRentalStat ($uniqueid_value)
				{	include ('conf.php');				
					
					$getData =  getSelfDB()->query("SELECT * FROM $tb_rental WHERE uniqueid_value = '$uniqueid_value' ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
					if (count($getData) > 0 )
					{
						if (empty($getData[0]["stop_date"])) 
						{ 
							$array0 = array('stat'			=> "y",
											'person' 		=> $getData[0]["person"],
											'start_date'	=> $getData[0]["start_date"],
											'id' 			=> $getData[0]["id"]);
						return $array0;
						} else { 
							$array0 = array('stat'			=> "n",
											'person' 		=> '',
											'start_date'	=> '',
											'id' 			=> '');
						return $array0; 
						}
					} else { 
							$array0 = array('stat'			=> "n",
											'person' 		=> '',
											'start_date'	=> '',
											'id' 			=> '');
						return $array0; 
					}
				}
				
				function getLastRentals ($uniqueid_value)
				{	include ('conf.php');				
					
					$getData =  getSelfDB()->query("SELECT * FROM $tb_rental WHERE uniqueid_value = '$uniqueid_value' AND stop_date != '' ORDER BY id DESC LIMIT 3")->fetchAll(PDO::FETCH_ASSOC);
					if (count($getData) > 0 )
					{
						return $getData;
					} else {  return 0; }
				}
				
				function rBack ($id)
				{
					include ('conf.php');
					if (!empty($id))
					{
							$date = date("Y-m-d");
							$query = getSelfDB()->exec("UPDATE $tb_rental SET `stop_date` = '$date' WHERE `id` = '$id'");
							if ($query) { return "1"; } else { return "2"; }
					} else { return "0"; }
				} 
				
				function getCountV ()
				{
					include ('conf.php');
					$menge = getSelfDB()->query("SELECT COUNT(*) AS COUNT FROM $tb_rental WHERE stop_date IS NULL")->fetch();
					return $menge[0];					
				} 	
				
				function rNew ($person, $start_date, $value)
				{
					include ('conf.php'); 
					$insertR = getSelfDB()->exec("INSERT INTO $tb_rental (`uniqueid_value`, `person`, `start_date`) 
																				VALUES 
																			('$value', '$person', '$start_date')");	
					if ($insertR) { return "1"; } else { return "2"; }
				}
				
				function getAccRentals ()
				{
					include ('conf.php');
				
					$sql = Criteria("rental-away", @$value);
					$AccRentals = getSelfDB()->query("SELECT * $sql[1] ORDER BY start_date ASC")->fetchAll(PDO::FETCH_ASSOC);						
						return $AccRentals;
				}

				function getFinRentals ()
				{
					include ('conf.php');
				
					$sql = Criteria("rental-back", @$value);
					$FinRentals = getSelfDB()->query("SELECT * $sql[1] ORDER BY stop_date ASC")->fetchAll(PDO::FETCH_ASSOC);						
						return $FinRentals;
				}					

				function getTitleByID ($tb, $value)
				{
				include ('conf.php');
						if($tb == $tb_originals )
						{
							$Titles = getSelfDB()->query("SELECT `c00` FROM $tb WHERE `uniqueid_value` = '$value'")->fetch();	
						} else {
							$Titles = getConnected($conn_mysql_db1)->query("SELECT `c00` FROM $tb WHERE `uniqueid_value` = '$value'")->fetch();	
						}
						
											
						return $Titles[0];
				}				
				 				
				function removeKodiMovie_compl($idFile, $idMovie)
				{				 
					include ('conf.php');
					
						$getPath = getConnected($conn_mysql_db1)->query("SELECT `idPath` FROM $tb_files WHERE idFile = '$idFile}'")->fetchAll(PDO::FETCH_ASSOC);
						$getStrPath = getConnected($conn_mysql_db1)->query("SELECT `strPath` FROM $tb_path WHERE idPath = '{$getPath[0]['idPath']}'")->fetchAll(PDO::FETCH_ASSOC);
							if(!empty($getStrPath[0]['strPath']))
							{
							
								$strPathNew1 = substr ( $getStrPath[0]['strPath'], $strL );
								$strPathNew = substr ( $strPathNew1, 0, -1 );	
								
									$delPath = getConnected($conn_mysql_db1)->exec("DELETE FROM $tb_path WHERE `idPath` = '{$getPath[0]['idPath']}'");
									$delStreamdetails = getConnected($conn_mysql_db1)->exec("DELETE FROM $tb_streamdetails WHERE `idFile` = '$idFile'");
									$delFiles = getConnected($conn_mysql_db1)->exec("DELETE FROM $tb_files WHERE `idFile` = '$idFile'");
									$delMovie = getConnected($conn_mysql_db1)->exec("DELETE FROM $tb_movieSNGL WHERE `idMovie` = '$idMovie'");
										if(($delPath) && ($delStreamdetails) && ($delFiles) && ($delMovie))
										{
											$end = rrmdirr($path_to_movie.$strPathNew);
											if($end == 1) { return 1; } else { return 2; }						 
										}
							} else { echo "Folder not found. Abort."; }			
				}
				
						function rrmdirr($dir) 
						{
							if (is_dir($dir)) 
							{              
								$objects = scandir($dir);               
								foreach ($objects as $object) 
								{
									if ($object != "." && $object != "..") 
									{
										if (filetype($dir."/".$object) == "dir")
										{
											rrmdirr($dir."/".$object);
										} else {
											unlink($dir."/".$object);
										}
									}
								}
								reset($objects);
								$end = rmdir($dir);
								if(!is_dir($dir))
								{
									return 1; 
								} else {
								    return 2; 
									 } 
							    
							}	
							
						}
						
				function removeCorps() 
				{				 
					include ('conf.php');
					$i = 0;
					$search_list =  getConnected($conn_mysql_db1)->query("SELECT `c00`, `strPath`, `idMovie`, `idFile` FROM $tb_movie")->fetchAll(PDO::FETCH_ASSOC);				
					
					foreach ($search_list as $movie) 
					{
						$strPath = substr ( $movie['strPath'], $strL );

							if(!is_dir($path_to_movie.$strPath))
							{
									$i++;
									echo "</br><b>".$movie['c00'] ." Folder not found</b></br>";
									echo "Path: <b>$strPath</b> | ";
									echo "idMovie: <b>{$movie['idMovie']}</b> | ";
									echo "idFile: <b>{$movie['idFile']}</b> | ";
									
									$getPath = getConnected($conn_mysql_db1)->query("SELECT `idPath` FROM $tb_files WHERE idFile = '{$movie['idFile']}'")->fetchAll(PDO::FETCH_ASSOC);
									echo "idPath: {$getPath[0]['idPath']}</br>";
									
									//echo $path_to_movie.$strPath;
									$delPath = getConnected($conn_mysql_db1)->exec("DELETE FROM $tb_path WHERE `idPath` = '{$getPath[0]['idPath']}'");
										if ($delPath) { echo "Table path entry deleted | "; } else { echo "Table path entry not found  | "; }
									$delStreamdetails = getConnected($conn_mysql_db1)->exec("DELETE FROM $tb_streamdetails WHERE `idFile` = '{$movie['idFile']}'");
										if ($delStreamdetails) { echo "Table streamdetails entry deleted  | "; } else { echo "Table streamdetails entry not found  | "; }
									$delFiles = getConnected($conn_mysql_db1)->exec("DELETE FROM $tb_files WHERE `idFile` = '{$movie['idFile']}'");
										if ($delFiles) { echo "Table files entry deleted | "; } else { echo "Table files entry not found  | "; }
									$delMovie = getConnected($conn_mysql_db1)->exec("DELETE FROM $tb_movieSNGL WHERE `idMovie` = '{$movie['idMovie']}'");
										if ($delMovie) { echo "Table movie entry deleted</br></br></br>"; } else { echo "Table movie entry not found</br></br></br>"; }												
							}
					}			 
					return "$i";
				}	
				
				function removeCorps_test() 
				{				 
					include ('conf.php');
					$i = 0;
					$search_list =  getConnected($conn_mysql_db1)->query("SELECT `c00`, `strPath`, `idMovie`, `idFile` FROM $tb_movie")->fetchAll(PDO::FETCH_ASSOC);				
					
					foreach ($search_list as $movie) 
					{
						$strPath = substr ( $movie['strPath'], $strL );	
							if(!is_dir($path_to_movie.$strPath))
							{
									$i++;
									echo "</br><b>".$movie['c00'] ." Folder not found</b></br>";
									echo "Path: <b>$path_to_movie.$strPath</b> | ";
									echo "idMovie: <b>{$movie['idMovie']}</b> | ";
									echo "idFile: <b>{$movie['idFile']}</b> | ";
									
									$getPath = getConnected($conn_mysql_db1)->query("SELECT `idPath` FROM $tb_files WHERE idFile = '{$movie['idFile']}'")->fetchAll(PDO::FETCH_ASSOC);
									echo "idPath: {$getPath[0]['idPath']}</br>";								
							}
						}			 
					return "$i";
				}
				function removeKodiMovie_compl_test($idMovie)
				{				 
					include ('conf.php');
					
						$getidFile= getConnected($conn_mysql_db1)->query("SELECT `idFile` FROM $tb_movieSNGL WHERE idMovie = '$idMovie}'")->fetchAll(PDO::FETCH_ASSOC);
						$idFile = $getidFile[0]['idFile'];
						$getPath = getConnected($conn_mysql_db1)->query("SELECT `idPath` FROM $tb_files WHERE idFile = '$idFile}'")->fetchAll(PDO::FETCH_ASSOC);
						$getStrPath = getConnected($conn_mysql_db1)->query("SELECT `strPath` FROM $tb_path WHERE idPath = '{$getPath[0]['idPath']}'")->fetchAll(PDO::FETCH_ASSOC);
							if(!empty($getStrPath[0]['strPath']))
							{
								$strPathNew1 = substr ( $getStrPath[0]['strPath'], $strL );
								$strPathNew = substr ( $strPathNew1, 0, -1 );	
						
								echo "DELETE FROM $tb_path WHERE `idPath` = '{$getPath[0]['idPath']}'</br>";
								echo "DELETE FROM $tb_streamdetails WHERE `idFile` = '$idFile'</br>";
								echo "DELETE FROM $tb_files WHERE `idFile` = '$idFile'</br>";
								echo "DELETE FROM $tb_movieSNGL WHERE `idMovie` = '$idMovie'</br>";	
						
								$end = rrmdirr_test($path_to_movie.$strPathNew);
							} else { echo "Folder not found. Abort."; }
				}
				
				function rrmdirr_test($dir) 
				{
					if (is_dir($dir)) 
					{              
						$objects = scandir($dir);               
						foreach ($objects as $object) 
						{
							if ($object != "." && $object != "..") 
							{
								if (filetype($dir."/".$object) == "dir")
								{
									echo "$dir/$object</br>";
								} else {
									echo "$dir/$object</br>";
								}
							}
						}
							reset($objects);
							echo "$dir</br>";	
					}	
				}
				
				function changeSet ($idSet, $idMovie, $area)
				{
					include ('conf.php');
					if (!empty($idMovie))
					{
						if (!empty($area))
						{

							if((empty($idSet)) || ($idSet == "")) { $idSet1 = "NULL"; } else { $idSet1 = "'$idSet'"; } 

							if ($area == "originals" ) { $query = getSelfDB()->exec("UPDATE $tb_originals SET `idSet` = $idSet1 WHERE `idMovie` = '$idMovie'");}
							if ($area == "movie" ) {	 $query = getConnected($conn_mysql_db1)->exec("UPDATE $tb_movieSNGL SET `idSet` = $idSet1 WHERE `idMovie` = '$idMovie'");}

							if ($query) { return "1"; } else { return "2"; }
						} else { return "0"; }
					} else { return "0"; }
				}	
				
				function MassUpdateRating ($area)
				{
					include ('conf.php');
					include ('imdb.class.php');

						if (!empty($area))
						{																	 
							if ($area == "originals" ) {$criteria = "o-movieid";}
							if ($area == "movie" ) {	$criteria = "m-movieid";}
								
								$sql = Criteria($criteria, '');
									
									$limit = " LIMIT 250";
									$sort = " ORDER BY idMovie DESC ";
									$sql2 =  $sql[0] . $sort . $limit ;
									
									if ($area == "originals" ) { $getMovies = getSelfDB()->query("SELECT `idMovie`, `uniqueid_value` $sql2")->fetchAll(PDO::FETCH_ASSOC);}
									if ($area == "movie" ) {	 $getMovies = getConnected($conn_mysql_db1)->query("SELECT `idMovie`, `uniqueid_value` , `uniqueid_type` $sql2")->fetchAll(PDO::FETCH_ASSOC);}
																				
										$m = 1;

										foreach ( $getMovies as $idMovie)
										{   if ($area == "originals" ) { $idMovie['uniqueid_type'] = "imdb"; $mVote = "c04"; }
																		
											if($idMovie['uniqueid_type'] == "imdb")
											{
												$oIMDB = new IMDB("https://www.imdb.com/title/{$idMovie['uniqueid_value']}/");
												if ($oIMDB->isReady) 
												{
													$movie['imdbRating'] = $oIMDB->getRating();
													$movie['imdbVotes'] = $oIMDB->getVotes();
													$movie['imdbVotes'] = str_replace ( ',', '', $movie['imdbVotes']); 
													if($movie['imdbRating'] == "") { $movie['imdbRating'] = 0; }
																							
												if ($area == "originals" ) { $query = getSelfDB()->exec("UPDATE $tb_originals SET `$mRate` = '{$movie['imdbRating']}', `$mVote` = '{$movie['imdbVotes']}' WHERE `idMovie` = '{$idMovie['idMovie']}'");}
												if ($area == "movie" ) {	 $query = getConnected($conn_mysql_db1)->exec("UPDATE $tb_movie SET `$mRate` = '{$movie['imdbRating']}', `$mVote` = '{$movie['imdbVotes']}' WHERE `idMovie` = '{$idMovie['idMovie']}'");}													
													
													$m = $m +1;
												}
												unset($movie);
											} else { 
												echo $idMovie['uniqueid_value'] . " no IMDB-ID</br>";
											}
										}	
								return $m;		
							
						} else { 
							echo "No Area selected";
						}	
				}
				
				function SnglUpdateRating ($area, $idMovie)
				{
					include ('conf.php');
					include ('imdb.class.php');

						if (!empty($area))
						{																	 
							if ($area == "originals" ) { $criteria = "o-movieid"; $uniqueid_type_kodi = ""; }
							if ($area == "movie" ) { $criteria = "m-movieid";  $uniqueid_type_kodi = ", `uniqueid_type`"; }
							$movie = array();	
								$sql = Criteria($criteria, $idMovie);
								
								if ($area == "originals" ) { $getMovies = getSelfDB()->query("SELECT `idMovie`, `uniqueid_value` $uniqueid_type_kodi FROM {$sql[1]}")->fetch(PDO::FETCH_ASSOC);}
								if ($area == "movie" ) 	{	 $getMovies = getConnected($conn_mysql_db1)->query("SELECT `c05`, `idMovie`, `uniqueid_value` $uniqueid_type_kodi FROM {$sql[1]}")->fetch(PDO::FETCH_ASSOC);}			
									
									if ($area == "originals" ) { $getMovies['uniqueid_type'] = "imdb"; $mVote = "c04"; }
							
										if($getMovies['uniqueid_type'] == "imdb")
										{
											$oIMDB = new IMDB("https://www.imdb.com/title/{$getMovies['uniqueid_value']}/");
											if ($oIMDB->isReady) 
											{
												$movie['imdbRating'] = $oIMDB->getRating();
												$movie['imdbVotes'] = $oIMDB->getVotes();
												$movie['imdbVotes'] = str_replace ( ',', '', $movie['imdbVotes']); 
													if($movie['imdbRating'] == "") { $movie['imdbRating'] = 0; }
													
													if ($area == "originals" ) { $getMovies = getSelfDB()->exec("UPDATE $tb_originals SET `$mRate` = '{$movie['imdbRating']}', `$mVote` = '{$movie['imdbVotes']}' WHERE `idMovie` = '{$getMovies['idMovie']}'");}
													if ($area == "movie" ) {	 $getMovies = getConnected($conn_mysql_db1)->exec("UPDATE $mRate SET `$mRate` = '{$movie['imdbRating']}', `$mVote` = '{$movie['imdbVotes']}' WHERE `rating_id` = '{$getMovies['c05']}'");}			
													
													return "1";
											}
										} else { 
											echo $getMovies['uniqueid_value'] . " no IMDB-ID</br>";
										}								
						} else { 
							echo "No Area selected";
						}	
				}
				
				function removeByMovieID($movieID) 
				{				 
					include ('conf.php');
					$i = 0;
					$search_list =  getConnected($conn_mysql_db1)->query("SELECT `idMovie`, `idFile` FROM $tb_movie WHERE idMovie = '$movieID' ")->fetchAll(PDO::FETCH_ASSOC);				
					
					foreach ($search_list as $movie) 
					{
									$i++;
									echo "idMovie: <b>{$movie['idMovie']}</b> | ";
									echo "idFile: <b>{$movie['idFile']}</b> | ";
									
									$getPath = getConnected($conn_mysql_db1)->query("SELECT `idPath` FROM $tb_files WHERE idFile = '{$movie['idFile']}'")->fetchAll(PDO::FETCH_ASSOC);
									echo "idPath: {$getPath[0]['idPath']}</br>";
	
									$delPath = getConnected($conn_mysql_db1)->exec("DELETE FROM $tb_path WHERE `idPath` = '{$getPath[0]['idPath']}'");
										if ($delPath) { echo "Table path entry deleted | "; } else { echo "Table path entry not found  | "; }
									$delStreamdetails = getConnected($conn_mysql_db1)->exec("DELETE FROM $tb_streamdetails WHERE `idFile` = '{$movie['idFile']}'");
										if ($delStreamdetails) { echo "Table streamdetails entry deleted  | "; } else { echo "Table streamdetails entry not found  | "; }
									$delFiles = getConnected($conn_mysql_db1)->exec("DELETE FROM $tb_files WHERE `idFile` = '{$movie['idFile']}'");
										if ($delFiles) { echo "Table files entry deleted | "; } else { echo "Table files entry not found  | "; }
									$delMovie = getConnected($conn_mysql_db1)->exec("DELETE FROM $tb_movieSNGL WHERE `idMovie` = '{$movie['idMovie']}'");
										if ($delMovie) { echo "Table movie entry deleted</br></br></br>"; } else { echo "Table movie entry not found</br></br></br>"; }	
						}			 
					return "$i";
				}
				
				function editMovie ($area, $rows, $idMovie, $rate, $ratingId)
				{
					include ('conf.php');	
							$rows['c14'] = convertSlash ($rows['c14'], "implode");
							
							//var_dump($rows);
							foreach($rows as $key => $val)			
							{
								if($key == "idSet")
								{
									if((empty($val)) || ($val == "")) { $val1 = "NULL"; } else { $val1 = '"'.$val.'"'; } 
								} else {
									$val1 = '"'.$val.'"';
								}														
									if ($area == "originals" ) { $movieUpdate = getSelfDB()->exec("UPDATE $tb_originals SET `$key` = $val1 WHERE idMovie = '$idMovie'"); }
									if ($area == "movie" ) 	{	 $movieUpdate = getConnected($conn_mysql_db1)->exec("UPDATE '$tb_movieSNGL' SET `$key` = $val1 WHERE idMovie = '$idMovie'"); }			
							}						
									if ($area == "movie" ) {	 $getMovies = getConnected($conn_mysql_db1)->exec("UPDATE $mRate SET `$mRate` = '{$rate['rating']}', `$mVote` = '{$rate['votes']}' WHERE `rating_id` = '$ratingId'");}	
							if ($movieUpdate)
							{
								return "1";
							} else {
								return "2";
							}
				}
		
			function copyMYSQLtoSQLI()
			{
				include ('conf.php');
				$getAll = getConnected($conn_mysql_db1) -> query("SELECT * FROM $tb_originals")->fetchAll(PDO::FETCH_ASSOC);
				$c = 0;
				foreach($getAll as $value)
				{
					$val = arrayReplace (array_values($value));
					$tbles = implode("` , `", array_keys($value));
					$values = implode("', '", array_values($val));
					$inserOriginal = getSelfDB()->query("INSERT INTO $tb_originals (`$tbles`) "."  VALUES ('$values')");
					$c++;
				}
				return $c;
			}
			
			function arrayReplace ($arDestination, $bTarget = TRUE)
			{
			include ('enviroment.php');
				$arModified = array ();
					foreach ( $arDestination as $strKey => $strValue )
					{
						if ( $bTarget ) // In Array-Werten suchen und ersetzen.
						{
							$strValue = str_replace ( $strings_alt, $strings_new, $strValue );
						} else {
							$strKey = str_replace ( $strings_alt, $strings_new, $strKey );
						}
					$arModified[$strKey] = $strValue;
					}
			return $arModified;
			} 
			
		function uploadCover ($file, $imdb)
		{
        include ("../include/conf.php"); 
		include ('../include/enviroment.php');
           $check = explode('.', $file['name']);
           $extension = end ($check);

                 if ($file['name'] != "")
                 {
                         if (($extension == "jpg") || ($extension == "jpeg") || ($extension == "png"))
                         {
                                 if (move_uploaded_file($file['tmp_name'], '../'.$thumbFolder.$toriginal.'cover/'.$imdb.'.'.$extension))
                                 {	include ('../include/image.class.php'); 
									
												$save_to_file = true;
												$image_quality = 100;
												$image_type = 2;

													$max_x = 300;
													$max_y = 424;

													$cut_x = 0;
													$cut_y = 0;									
																				
												$img = new Zubrag_image;
												$img->max_x        = $max_x;
												$img->max_y        = $max_y;
												$img->cut_x        = $cut_x;
												$img->cut_y        = $cut_y;
												$img->quality      = $image_quality;
												$img->save_to_file = $save_to_file;
												$img->image_type   = $image_type;
												$img->GenerateThumbFile('../'.$thumbFolder.$toriginal.'cover/'.$imdb.'.'.$extension, '../'.$thumbFolder.$t300x424.'cover/'.$imdb.'.jpg');
												
												unset($save_to_file); unset($image_quality); unset($image_type); unset($max_x); unset($max_y);
												unset($cut_x); unset($cut_y);
																				
												$save_to_file = true;
												$image_quality = 100;
												$image_type = 2;

													$max_x = 144;
													$max_y = 210;

													$cut_x = 0;
													$cut_y = 0;									
																				
												$img = new Zubrag_image;
												$img->max_x        = $max_x;
												$img->max_y        = $max_y;
												$img->cut_x        = $cut_x;
												$img->cut_y        = $cut_y;
												$img->quality      = $image_quality;
												$img->save_to_file = $save_to_file;
												$img->image_type   = $image_type;
												$img->GenerateThumbFile('../'.$thumbFolder.$toriginal.'cover/'.$imdb.'.'.$extension, '../'.$thumbFolder.$t144x210.'cover/'.$imdb.'.jpg');												
											
												unset($save_to_file); unset($image_quality); unset($image_type); unset($max_x); unset($max_y);
												unset($cut_x); unset($cut_y);
												return "1";

                                 } else {
                                         return "3";
                                 }
                         } else {
                                 return "2";
                         }
                 } else {
                         return "0";
                 }
		}

		function convertSlash ($var, $option)
		{
			if($option == "explode")
			{
				$sep = explode (' / ', $var);	
			}
			if($option == "implode")
			{
				$sep = implode (' / ', $var);	
			}	
			return $sep;	
		}
		
		function kodi2original ($criteria, $value)
		{
					global $language;
				    include ("./include/lang/$language.php");
					include ('conf.php');
					
					$sql = Criteria($criteria, $value);				
					$getMovieDetails =  getConnected($conn_mysql_db1)->query('SELECT `c00`, `c01`, `'.$mID.'` as c09, `idSet` '.$sql[0])->fetchAll(PDO::FETCH_ASSOC);	
															
					return $getMovieDetails[0];
		}	
		

						?>	