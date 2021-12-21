<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="../gfx/js/functions.js" type="text/javascript"></script>
</head>
<?php include ('./conf.php');
	  include ('./enviroment.php');
	  include ('./functions.php'); 
	  include ('./image.class.php');

//////////////////////////////////////////////////////////////////////////////////////////////////////

$thumb_c 						= 0;
$collectMissingMovieThumb 		= array();
$collectMissingOriginalThumb 	= array();
$collectMissingSeriesThumb 	= array();

 $complete_start = microtime(true); 

	// Movies
	  $getAllMovies = getConnected($conn_mysql_db1, '../')->query("SELECT `c00`,`$mID` as c09 FROM $tb_movie")->fetchAll(PDO::FETCH_ASSOC);
	foreach ( $getAllMovies as $checkMovieThumb)
	{ 
		if ( is_dir ('../'.$thumbFolder ) ) { $pre = '../'; } 
		if ( is_dir ('./'.$thumbFolder ) )  { $pre = './'; }

		if (!is_file($pre.$thumbFolder.$toriginal.'cover/'.$checkMovieThumb['c00'].'.jpg'))
		{
			if (!is_file($pre.$thumbFolder.$toriginal.'cover/'.$checkMovieThumb['c09'].'.jpg'))
			{		
				$collectMissingMovieThumb[$checkMovieThumb['c00']] = $checkMovieThumb['c09'];
			}
		}
    }
				$count_m = count($collectMissingMovieThumb);
				//get Poster
				if ($count_m > 0)
				{ $noDownloadsMovie = "0"; 
					foreach($collectMissingMovieThumb as $key => $value)
					{ 	
						if(($value != "") || (!empty($value)))
						{
							$getThumbs = getConnected($conn_mysql_db1, '../')->query("Select $tb_art.url FROM $tb_art, $uniqueid  WHERE $tb_art.media_id = $uniqueid.media_id AND $tb_art.media_type = 'movie' AND $tb_art.type = 'poster' AND $uniqueid.value = '$value'")->fetchAll(PDO::FETCH_ASSOC);
							if (false === @file_get_contents($getThumbs[0]['url']))
							{
								$api_output1 = file_get_contents("http://www.omdbapi.com/?i=$value&plot=short&r=json&apikey=$omdbapi");
								$needed_data1 = explode("\n", $api_output1);
								$needed_data1 = $needed_data1[0];
									$ThisRelease1 = json_decode($needed_data1, TRUE);
									$thumb = $ThisRelease1['Poster'];
										if ($thumb != "N/A")
										{
											$getThumb=file_get_contents($thumb);
											if (empty($value))
											{
												$ThumbString = utf8_decode("$key.jpg");
											} else {
												$ThumbString = "$value.jpg";
											}
											$savefile = fopen($pre.$thumbFolder.$toriginal.'cover/'.$ThumbString, "w");
											fwrite($savefile, $getThumb); fclose($savefile);	

											if(!is_file($pre.$thumbFolder.$t300x424.'cover/'.$ThumbString))
											{										
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
												$img->GenerateThumbFile($pre.$thumbFolder.$toriginal.'cover/'.$ThumbString, $pre.$thumbFolder.$t300x424.'cover/'.$ThumbString);
											
												unset($save_to_file); unset($image_quality); unset($image_type); unset($max_x); unset($max_y);
												unset($cut_x); unset($cut_y);
												
												$thumb_c = $thumb_c + 1; 
											}
											
											if(!is_file($pre.$thumbFolder.$t144x210.'cover/'.$ThumbString))
											{										
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
												$img->GenerateThumbFile($pre.$thumbFolder.$toriginal.'cover/'.$ThumbString, $pre.$thumbFolder.$t144x210.'cover/'.$ThumbString);
											
												unset($save_to_file); unset($image_quality); unset($image_type); unset($max_x); unset($max_y);
												unset($cut_x); unset($cut_y);
												
												$thumb_c = $thumb_c + 1; 
											} 

										} else { $kezz = $key.' ( '.$value.' ) '; $notFound_movie[$kezz] = "Return : ".$thumb; }
							} else {
								$getThumb=file_get_contents($getThumbs[0]['url']);

											if (empty($value))
											{
												$ThumbString = utf8_decode("$key.jpg");
											} else {
												$ThumbString = "$value.jpg";
											} 										
								$savefile = fopen($pre.$thumbFolder.$toriginal.'cover/'.$ThumbString, "w");									
								fwrite($savefile, $getThumb); fclose($savefile);	

											if(!is_file($pre.$thumbFolder.$t300x424.'cover/'.$ThumbString))
											{										
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
												$img->GenerateThumbFile($pre.$thumbFolder.$toriginal.'cover/'.$ThumbString, $pre.$thumbFolder.$t300x424.'cover/'.$ThumbString);
											
												unset($save_to_file); unset($image_quality); unset($image_type); unset($max_x); unset($max_y);
												unset($cut_x); unset($cut_y);
												
												$thumb_c = $thumb_c + 1; 
											}
											
											if(!is_file($pre.$thumbFolder.$t144x210.'cover/'.$ThumbString))
											{										
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
												$img->GenerateThumbFile($pre.$thumbFolder.$toriginal.'cover/'.$ThumbString, $pre.$thumbFolder.$t144x210.'cover/'.$ThumbString);
																							
												unset($save_to_file); unset($image_quality); unset($image_type); unset($max_x); unset($max_y);
												unset($cut_x); unset($cut_y);
												
												$thumb_c = $thumb_c + 1; 
											}							
							}

						} else {  $notIMDB_movie[$key] = $key;}
					} 
				} else { $noDownloadsMovie = "1"; }

	// Original
					$getOriginalsMeta = getOriginalsAdmin();
					foreach ( $getOriginalsMeta as $getOriginals)
					{ 
						$api_output8 = file_get_contents("http://www.omdbapi.com/?i=".$getOriginals[$mID]."&plot=short&r=json&apikey=$omdbapi");
						$needed_data8 = explode("\n", $api_output8);
						$needed_data8 = $needed_data8[0];
						$ThisRelease8 = json_decode($needed_data8, TRUE);
														
						$c04 = $ThisRelease8['imdbVotes']; 
                        $c05 = $ThisRelease8['imdbRating'];  
						$c07 = $ThisRelease8['Year'];
						$c11 = str_replace ( $strings_alt, $strings_new, $ThisRelease8['Runtime'])*60;
						$c12 = $ThisRelease8['Rated'];
						$c14 = str_replace ( $string_genre_old, $string_genre_new, $ThisRelease8['Genre']); 	
						$c21 = str_replace ( $string_genre_old, $string_genre_new, $ThisRelease8['Country']);
						$actors = str_replace ( $string_genre_old, $string_genre_new, $ThisRelease8['Actors']);
							$MovieContentWriters = str_replace ( $string_genre_old, $string_genre_new, $ThisRelease8['Writer']);
						$c06 = preg_replace("#\([^\)]*\)#", "", $MovieContentWriters );
						$c15 = str_replace ( $string_genre_old, $string_genre_new, $ThisRelease8['Director']);
						
						$query = getSelfDB()->exec('UPDATE '.$tb_originals.' set`'.$mRate.'` = "'.$c05.'", `c04` = "'.$c04.'", `c07` = "'.$c07.'", `c11` = "'.$c11.'", `c12` = "'.$c12.'", `c14` = "'.$c14.'", `c21` = "'.$c21.'", `actors` = "'.$actors.'", `c06` = "'.$c06.'", `c15` = "'.$c15.'" WHERE '.$mID.' = "'.$getOriginals[$mID].'"');																											
						if ( is_dir ('..'.$thumbFolder ) ) { $pre = '..'; } 
						if ( is_dir ('.'.$thumbFolder ) )  { $pre = '.'; }

							if (!is_file($pre.$thumbFolder.$toriginal.'cover/'.$getOriginals[$mID].'.jpg'))
							{				
								$collectMissingOriginalThumb[$getOriginals[$mID]] = $getOriginals[$mID];		
							}
					}
					$count_o = count(@$collectMissingOriginalThumb);
						//get Poster
							if ($count_o > 0)
							{ $noDownloadsOriginal = "0"; 
								foreach($collectMissingOriginalThumb as $key => $value)
								{ 	
									$api_output1 = file_get_contents("http://www.omdbapi.com/?i=$value&plot=short&r=json&apikey=$omdbapi");

									$needed_data1 = explode("\n", $api_output1);
									$needed_data1 = $needed_data1[0];
									$ThisRelease1 = json_decode($needed_data1, TRUE);
									$thumb = $ThisRelease1['Poster'];

										if ($thumb != "N/A")
										{
											$getThumb=file_get_contents($thumb);
											if (empty($value))
											{
												$ThumbString = utf8_decode("$key.jpg");
											} else {
												$ThumbString = "$value.jpg";
											}			
											$savefile = fopen($pre.$thumbFolder.$toriginal.'cover/'.$ThumbString, "w");
											fwrite($savefile, $getThumb); fclose($savefile);
											
											if(!is_file($pre.$thumbFolder.$t300x424.'cover/'.$ThumbString))
											{										
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
												$img->GenerateThumbFile($pre.$thumbFolder.$toriginal.'cover/'.$ThumbString, $pre.$thumbFolder.$t300x424.'cover/'.$ThumbString);
											
												unset($save_to_file); unset($image_quality); unset($image_type); unset($max_x); unset($max_y);
												unset($cut_x); unset($cut_y);
												
												$thumb_c = $thumb_c + 1; 
											}
											
											if(!is_file($pre.$thumbFolder.$t144x210.'cover/'.$ThumbString))
											{										
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
												$img->GenerateThumbFile($pre.$thumbFolder.$toriginal.'cover/'.$ThumbString, $pre.$thumbFolder.$t144x210.'cover/'.$ThumbString);
											
												unset($save_to_file); unset($image_quality); unset($image_type); unset($max_x); unset($max_y);
												unset($cut_x); unset($cut_y);
												
												$thumb_c = $thumb_c + 1; 
											}
											
										} else { $kezz = $key.' ( '.$value.' ) '; $notFound_original[$kezz] = "Return : ".$thumb; }

								}
							} else { $noDownloadsOriginal = "1"; }

// Serien
	
	$getAllSeries = getConnected($conn_mysql_db1, '../')->query("SELECT `c00`, `$mID` as c12 FROM $tb_seriesView")->fetchAll(PDO::FETCH_ASSOC);
		foreach ( $getAllSeries as $checkSeriesThumb)
		{ 
			if ( is_dir ('..'.$thumbFolder ) ) { $pre = '..'; } 
			if ( is_dir ('.'.$thumbFolder ) )  { $pre = '.'; }

			if ((!is_file($pre.$thumbFolder.$toriginal.'cover/'.$checkSeriesThumb['c12'].'.jpg')) || (!is_file($pre.$thumbFolder.$t300x424.'cover/'.$checkSeriesThumb['c12'].'.jpg')) || (!is_file($pre.$thumbFolder.$t144x210.'cover/'.$checkSeriesThumb['c12'].'.jpg')))
			{				
				$collectMissingSeriesThumb[$checkSeriesThumb['c00']] = $checkSeriesThumb['c12'];		
			} 
		}
		$count_s = count(@$collectMissingSeriesThumb);
		//get Poster
		if ($count_s > 0)
		{	$noDownloadsSerien = "0";
			foreach($collectMissingSeriesThumb as $key => $value)
			{ 
						$getThumbs = getConnected($conn_mysql_db1, '../')->query("Select $tb_art.url FROM $tb_art, $uniqueid WHERE $tb_art.media_id = $uniqueid.media_id AND $tb_art.media_type = 'tvshow' AND  $tb_art.type = 'poster' AND $uniqueid.value = '$value'")->fetchAll(PDO::FETCH_ASSOC);
							if (false === @file_get_contents($getThumbs[0]['url']))
							{					
								$thumbLink = "http://thetvdb.com/banners/posters/".$value."-1.jpg";
								if (@file_get_contents($thumbLink) === false)								
								{ 
									$error = error_get_last();														
									
									$kezz = $key.' ( '.$value.' ) '; $notFound_serien[$kezz] = "Return : ".$thumbLink." - ".$error['message'];
								} else {
									$getThumb=file_get_contents($thumbLink);
									$ThumbString = "$value.jpg"; 
									$savefile = fopen($pre.$thumbFolder.$toriginal.'cover/'.$ThumbString, "w");
									fwrite($savefile, $getThumb); fclose($savefile);

											if(!is_file($pre.$thumbFolder.$t300x424.'cover/'.$ThumbString))
											{										
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
												$img->GenerateThumbFile($pre.$thumbFolder.$toriginal.'cover/'.$ThumbString, $pre.$thumbFolder.$t300x424.'cover/'.$ThumbString);
											
												unset($save_to_file); unset($image_quality); unset($image_type); unset($max_x); unset($max_y);
												unset($cut_x); unset($cut_y);
												
												$thumb_c = $thumb_c + 1; 
											}
											
											if(!is_file($pre.$thumbFolder.$t144x210.'cover/'.$ThumbString))
											{										
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
												$img->GenerateThumbFile($pre.$thumbFolder.$toriginal.'cover/'.$ThumbString, $pre.$thumbFolder.$t144x210.'cover/'.$ThumbString);
											
												unset($save_to_file); unset($image_quality); unset($image_type); unset($max_x); unset($max_y);
												unset($cut_x); unset($cut_y);
												
												$thumb_c = $thumb_c + 1; 
											}
									
								} 
							} else {
								$getThumb=file_get_contents($getThumbs[0]['url']);
								$ThumbString = "$value.jpg"; 			
								$savefile = fopen($pre.$thumbFolder.$toriginal.'cover/'.$ThumbString, "w");								
								fwrite($savefile, $getThumb); fclose($savefile);	
											
											if(!is_file($pre.$thumbFolder.$t300x424.'cover/'.$ThumbString))
											{										
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
												$img->GenerateThumbFile($pre.$thumbFolder.$toriginal.'cover/'.$ThumbString, $pre.$thumbFolder.$t300x424.'cover/'.$ThumbString);
											
												unset($save_to_file); unset($image_quality); unset($image_type); unset($max_x); unset($max_y);
												unset($cut_x); unset($cut_y);
												
												$thumb_c = $thumb_c + 1; 
											}
											
											if(!is_file($pre.$thumbFolder.$t144x210.'cover/'.$ThumbString))
											{										
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
												$img->GenerateThumbFile($pre.$thumbFolder.$toriginal.'cover/'.$ThumbString, $pre.$thumbFolder.$t144x210.'cover/'.$ThumbString);
											
												unset($save_to_file); unset($image_quality); unset($image_type); unset($max_x); unset($max_y);
												unset($cut_x); unset($cut_y);
												
												$thumb_c = $thumb_c + 1; 
											}								
							}	
						$getThumbs = getConnected($conn_mysql_db1, '../')->query("Select $tb_art.url FROM $tb_art, $uniqueid WHERE $tb_art.media_id = $uniqueid.media_id AND $tb_art.media_type = 'tvshow' AND $tb_art.type = 'banner' AND $uniqueid.value = '$value'")->fetchAll(PDO::FETCH_ASSOC);								
							if (false === @file_get_contents($getThumbs[0]['url']))
							{																
								$thumbLink = "http://thetvdb.com/banners/graphical/".$value."-g.jpg";
								if (@file_get_contents($thumbLink) === false)
								{
									$kezz = $key.' ( '.$value.' ) '; $notFound_serien[$kezz] = "Return : ".$thumbLink;
								} else {
									$getThumb=file_get_contents($thumbLink);
									$ThumbString = "$value.jpg"; 
									$savefile = fopen($pre.$thumbFolder.$toriginal.'banner/'.$ThumbString, "w");
									fwrite($savefile, $getThumb); fclose($savefile);
								}
							} else {
								$getThumb=file_get_contents($getThumbs[0]['url']);
								$ThumbString = "$value.jpg"; 			
								$savefile = fopen($pre.$thumbFolder.$toriginal.'banner/'.$ThumbString, "w");								
								fwrite($savefile, $getThumb); fclose($savefile);																																						
							}				
			}	
		} else { $noDownloadsSerien = "1"; }
		
// Persona
	$getActors = getConnected($conn_mysql_db1, '../')->query("SELECT `name`,`art_urls` FROM $tb_actors WHERE `art_urls` != ''")->fetchAll(PDO::FETCH_ASSOC);
		foreach ( $getActors as $checkPersonaThumb)
		{ 
			if ( is_dir ('..'.$thumbFolder ) ) { $pre = '..'; } 
			if ( is_dir ('.'.$thumbFolder ) )  { $pre = '.'; }
			if (!is_file($pre.$thumbFolder.$toriginal.'persona/'.$checkPersonaThumb['name'].'.jpg'))
			{				
				$collectMissingPersonalThumb[$checkPersonaThumb['name']] = $checkPersonaThumb['art_urls'];		
			}
		}
		$count_a = @count(@$collectMissingPersonalThumb);
		//get Poster
		if ($count_a > 0)
		{	$noDownloadsPersona = "0";
					foreach($collectMissingPersonalThumb as $key => $value)
					{ 							
							$value = str_replace ( $strings_alt, $strings_new, $value);
							 
							if (false === @file_get_contents($value))
							{
								$notFound_actor[$key] = "Return : ".$value; 
							} else {
								$getThumb=file_get_contents($value);
								$ThumbString1 = "$key.jpg";
							
								$savefile = @fopen($pre.$thumbFolder.$toriginal.'persona/'.$ThumbString1, "w");
								if ($savefile)
								{
									fwrite($savefile, $getThumb); fclose($savefile);
								
											if(!is_file($pre.$thumbFolder.$t300x424.'persona/'.$ThumbString1))
											{										
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
												$img->GenerateThumbFile($pre.$thumbFolder.$toriginal.'persona/'.$ThumbString1, $pre.$thumbFolder.$t300x424.'persona/'.$ThumbString1);
											
												unset($save_to_file); unset($image_quality); unset($image_type); unset($max_x); unset($max_y);
												unset($cut_x); unset($cut_y);
												
												$thumb_c = $thumb_c + 1; 
											}
											
											if(!is_file($pre.$thumbFolder.$t144x210.'persona/'.$ThumbString1))
											{										
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
												$img->GenerateThumbFile($pre.$thumbFolder.$toriginal.'persona/'.$ThumbString1, $pre.$thumbFolder.$t144x210.'persona/'.$ThumbString1);
																							
												unset($save_to_file); unset($image_quality); unset($image_type); unset($max_x); unset($max_y);
												unset($cut_x); unset($cut_y);
												
												$thumb_c = $thumb_c + 1; 
											}								
								
								
								} else { $notFound_actor[$key] = "Return : ".$value;  }
							}

					}
				} else { $noDownloadsPersona = "1"; }	
		

	$complete_end = microtime(true);
	$complete = round($complete_end-$complete_start,2);
		echo "</br><b>Der Vorgang dauerte $complete Sekunden</br></b></br"; 
		
	if (@$_REQUEST['req'] == "page")
	{	echo"<b>Filme</b></br>";
			if ( $noDownloadsMovie == "1" )
			{ echo "Es m&uuml;ssen keine Bilder heruntergeladen werden</br>"; 
			} else {
				if((@isset($notFound_movie)) || (@$notFound_movie > 0 ))
				{
					echo " $count_m fehlenden Bilder. Davon ".count(@$notFound_movie)." fehlgeschlagen.</br>"; ?>									
					<a href="javascript:setVisibility('this1');"><u>Fehlgeschlagene anzeigen</br></u></a> 
					<div style="display: none; " id="this1"><?php											
						foreach($notFound_movie as $key1 => $value1)
						{
							echo "$key1 => $value1</br>";
						} ?>
					</div><?php
				}
				if((@isset($notIMDB_movie)) || (@$notIMDB_movie > 0 ))
				{
					echo count(@$notIMDB_movie)." ohne IMDB Eintrag.</br>"; ?>							
					<a href="javascript:setVisibility('this5');"><u>Fehlende anzeigen</br></u></a> 
					<div style="display: none; " id="this5"><?php											
						foreach($notIMDB_movie as $key5 => $value5)
						{
							echo "$key5</br>";
						} ?>
					</div><?php
				}
			}
		echo "</br></br><b>Originale</b></br>";
			if ( $noDownloadsOriginal == "1" )
			{ echo "Es m&uuml;ssen keine Bilder heruntergeladen werden</br>"; 
			} else {
				echo "$count_o fehlende Bilder. Davon ".count(@$notFound_original)." fehlgeschlagen.</br>"; ?>									
					<a href="javascript:setVisibility('this2');"><u>Fehlgeschlagene anzeigen</br></u></a> 
					<div style="display: none; " id="this2"><?php											
						foreach($notFound_original as $key2 => $value2)
						{
							echo "$key2 => $value2</br>";
						} ?>
					</div><?php
				}
				
				
		echo "</br></br><b>Serien</b></br>";
			if ( $noDownloadsSerien == "1" )
			{ echo "Es m&uuml;ssen keine Bilder heruntergeladen werden</br>"; 
			} else {
				echo "$count_s fehlenden Bilder. Davon ".count(@$notFound_serien)." fehlgeschlagen.</br>"; ?>										
					<a href="javascript:setVisibility('this3');"><u>Fehlgeschlagene anzeigen</br></u></a> 
					<div style="display: none; " id="this3"><?php											
						foreach($notFound_serien as $key3 => $value3)
						{
							echo "$key3 => $value3</br>";
						} ?>
					</div><?php				
			}
			
							
		echo "</br></br><b>Persona</b></br>";
			if ( $noDownloadsPersona == "1" )
			{ echo "Es m&uuml;ssen keine Bilder heruntergeladen werden</br>"; 
			} else {
				echo "$count_a fehlenden Bilder. Davon ".count(@$notFound_actor)." fehlgeschlagen.</br>"; ?>										
					<a href="javascript:setVisibility('this4');"><u>Fehlgeschlagene anzeigen</br></u></a> 
					<div style="display: none; " id="this4"><?php											
						foreach($notFound_actor as $key4 => $value4)
						{
							echo "$key4 => $value4</br>";
						} ?>
					</div><?php				
			}
		echo "</br></br><b>Thumbnailerstellung</b></br>";
			if ( $thumb_c == 0 )
			{ echo "Es mussten keine Thumbnails erstellt werden.</br>"; 
			} else {
				echo "$thumb_c Thumbnails wurden erstellt.</br>"; 			
			}			
	}


?>
