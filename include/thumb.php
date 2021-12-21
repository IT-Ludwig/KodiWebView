<?php
include('image.class.php');
include('enviroment.php');
		if ( is_dir ('../'.$thumbFolder ) ) { $pre = '../'; } 
		if ( is_dir ('./'.$thumbFolder ) )  { $pre = './'; }
$source_folder = $pre.$thumbFolder.$toriginal;
$dest_folder_300x424 = $pre.$thumbFolder.$t300x424;
$dest_folder_144x210 = $pre.$thumbFolder.$t144x210;


    $source = scandir ( $source_folder );
    $source_count = count ( $source );
        for ( $y = 0; $y < $source_count; $y++ )
        {
			if ($source[$y] != "." && $source[$y] != ".." && $source[$y] != "banner")
            { 
                $source_folder_2_dir = $source_folder . $source[$y] . '/';
				$source_folder_2 = scandir ( $source_folder . '/' . $source[$y] . '/');
                $source_folder_2_count = count ( $source_folder_2 );
					for ( $z = 0; $z < $source_folder_2_count; $z++ )
                	{
						if ($source_folder_2[$z] != "." && $source_folder_2[$z] != ".." && $source_folder_2[$z] != "@eaDir")
                        {															
								if((!is_file($dest_folder_300x424.$source[$y].'/'.$source_folder_2[$z])) || (!is_file($dest_folder_144x210.$source[$y].'/'.$source_folder_2[$z])))
								{	
									echo $source_folder_2_dir.$source_folder_2[$z]." => ";
									$blubb = 1;
								} else { $blubb = 0; }							
								if(!is_file($dest_folder_300x424.$source[$y].'/'.$source_folder_2[$z]))
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
									$img->GenerateThumbFile($source_folder_2_dir . $source_folder_2[$z], $dest_folder_300x424.$source[$y].'/'.$source_folder_2[$z]);
									echo "( ".$dest_folder_300x424." => ". $source_folder_2[$z].' )'; 
								
									unset($save_to_file); unset($image_quality); unset($image_type); unset($max_x); unset($max_y);
									unset($cut_x); unset($cut_y); unset($source_folder); 
								}
								
								if(!is_file($dest_folder_144x210.$source[$y].'/'.$source_folder_2[$z]))
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
									$img->GenerateThumbFile($source_folder_2_dir . $source_folder_2[$z], $dest_folder_144x210.$source[$y].'/'.$source_folder_2[$z]);
									echo "( ".$dest_folder_144x210." => ".$source_folder_2[$z].' )'; 
								
									unset($save_to_file); unset($image_quality); unset($image_type); unset($max_x); unset($max_y);
									unset($cut_x); unset($cut_y); unset($source_folder); 
								} 
								
								if($blubb == 1)
								{	
									echo "</br>";	
								}	
							
						}	
					}					
			}
		}


?>
