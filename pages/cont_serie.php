				<!-- main -->
				<div class="main">
					<!-- content -->
					<section class="content">
						<!-- post -->
						<div class="post">
							<!-- post-inner -->
<?php
if (@$_GET['area'] == "serie" )
{
	if (@$_GET['criteria'] == "s-genre" )
	{ $_SESSION['history'] = link_history($_GET['area'], $_GET['criteria'], $_GET['value'], @$_GET['counter'], @$_GET['sort'], @$_GET['way']);
		$head1 = $lang['genre']." -> "; 			
		$head2 =  @$_GET['value'];

		$series_list = buildSerieThumbList($_GET['criteria'], $_GET['value'], @$_GET['counter'], @$_GET['sort'], @$_GET['way']);
		$page = buildPageLinks ($_GET['area'], $_GET['criteria'], $_GET['value'], @$_GET['counter'], @$_GET['sort'], @$_GET['way']);
			$count = getCount($_GET['criteria'] , $_GET['value']).' Serien';

?>

							<div class="post-inner">
								<header>
									<h2><?php echo $head1.$head2; ?></h2>
									<p class="tags"><?php echo $count; ?></p>
									</br>
								</header>
								<table><tr><td><?=$lang['sort']?> </td><td>
								<div class='pagination'>
									<ul>
										<li><a href="./index.php?area=<?=$_GET['area']?>&criteria=<?=$_GET['criteria']?>&value=<?=$_GET['value']?>&sort=date&way=<?=way(@$_GET['way'])?>"><b><?=$lang['m_added']?></b></a></li>
										<li><a href="./index.php?area=<?=$_GET['area']?>&criteria=<?=$_GET['criteria']?>&value=<?=$_GET['value']?>&sort=title&way=<?=way(@$_GET['way'])?>"><b><?=$lang['m_Titel']?></b></a></li>
										<li><a href="./index.php?area=<?=$_GET['area']?>&criteria=<?=$_GET['criteria']?>&value=<?=$_GET['value']?>&sort=rating-serie&way=<?=way(@$_GET['way'])?>"><b><?=$lang['Rate']?></b></a></li>
									</ul>
								</div>
								</td></tr></table>
								<div class="img-holder"></div>
								<?php

						
								include($tf.'thumbnail_list_header.tpl');
									
								$cur_movie = 1;

								foreach ($series_list as $serie) 
								{
									SerieListData();
									include($tf."serieListThumb.tpl");
									if ($cur_movie++ == $SeriePerRow)
									{
										echo $RowDivider;
										$cur_movie = 1;
									}
								}	
									include($tf.'thumbnail_list_footer.tpl'); 
	}	
	
	if (@$_GET['criteria'] == "s-details" )
	{ 
			$SerieDetail = getSerienDetails ($_GET['criteria'], $_GET['value']);
						$count_epi = calc_unseen_seen_serie("s-seen-epi" , $_GET['value']);
						$count = '<b>'.$count_epi['count'].'</b> Folgen davon <b>'.$count_epi['seen'].'</b> gesehen, <b>'.$count_epi['unseen'].'</b> nicht gesehen';
			
					 if (is_file ($thumbFolder.$toriginal.'banner/'.$SerieDetail[0]["c12"].".jpg"))
					 {
						$thumb = $thumbFolder.$toriginal .'banner/'.$SerieDetail[0]["c12"].".jpg";
					 } else {
						$thumb = "./gfx/css/images/nix.jpg"; 
					 }
			$head1 = $lang['seriedetails']; 	
			$tag_genre = buildTags ('search', "genre" , $SerieDetail[0]["c08"], 's_value');
			$tag_studio = buildTags ('search', "studio" , $SerieDetail[0]["c14"], 's_value');
			$tag_year = buildTags ('search', "year" , $SerieDetail[0]["c05"], 's_value');
			$tag_fsk = buildTags ('search', "fsk" , $SerieDetail[0]["c13"], 's_value');
		?>

							<div class="post-inner">
								<header>
									<div class="pagination"><ul><li><a href='<?=$_SESSION['history']?>'><font size="+1">Zur&uuml;ck</font></a></li></ul></div>
									<h2> <?php echo $head1; ?></h2>
									<p class="tags"><a href="">idShow : <b><?php echo $SerieDetail[0]["idShow"]; ?></b></a> <a href="">TheTVDB : <b><?php echo $SerieDetail[0]["c12"]; ?></b></a></p>
									</br>
								</header>
								<div class="img-holder"></div><?php
									include ('./pages/SerienDetails.php');
	
		}
		
		if (@$_GET['criteria'] == "s-all" )
		{ $_SESSION['history'] = link_history($_GET['area'], $_GET['criteria'], $_GET['value'], @$_GET['counter'], @$_GET['sort'], @$_GET['way']);
			$head1 = $lang['all_'].$lang['serie']; 			
			$head2 =  @$_GET['value'];

			$series_list = buildSerieThumbList($_GET['criteria'], @$_GET['value'], @$_GET['counter'], @$_GET['sort'], @$_GET['way']);
			$page = buildPageLinks ($_GET['area'], $_GET['criteria'], @$_GET['value'], @$_GET['counter'], @$_GET['sort'], @$_GET['way']);
			$count = getCount($_GET['criteria'] , $_GET['value']).' Serien';
?>
							<div class="post-inner">
								<header>
									<h2><?php echo $head1.$head2; ?></h2>
									<p class="tags"><?php echo $count; ?></p>
									</br>
								</header>
								<table><tr><td><?=$lang['sort']?> </td><td>
								<div class='pagination'>
									<ul>
										<li><a href="./index.php?area=<?=$_GET['area']?>&criteria=<?=$_GET['criteria']?>&value=<?=$_GET['value']?>&sort=date&way=<?=way(@$_GET['way'])?>"><b><?=$lang['m_added']?></b></a></li>
										<li><a href="./index.php?area=<?=$_GET['area']?>&criteria=<?=$_GET['criteria']?>&value=<?=$_GET['value']?>&sort=title&way=<?=way(@$_GET['way'])?>"><b><?=$lang['m_Titel']?></b></a></li>
										<li><a href="./index.php?area=<?=$_GET['area']?>&criteria=<?=$_GET['criteria']?>&value=<?=$_GET['value']?>&sort=rating-serie&way=<?=way(@$_GET['way'])?>"><b><?=$lang['Rate']?></b></a></li>
									</ul>
								</div>
								</td></tr></table>
								<div class="img-holder"></div>
								<?php

						
								include($tf.'thumbnail_list_header.tpl');
									
								$cur_movie = 1;

								foreach ($series_list as $serie) 
								{
									SerieListData();
									include($tf."serieListThumb.tpl");
									if ($cur_movie++ == $SeriePerRow)
									{
										echo $RowDivider;
										$cur_movie = 1;
									}
								}	
									include($tf.'thumbnail_list_footer.tpl'); 
		}	
}		
						?>
							</div>

						</div>
						<!-- end of post -->
					</section>
					<!-- end of content -->
