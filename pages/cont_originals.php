				<!-- main -->
				<div class="main">
					<!-- content -->
					<section class="content">
						<!-- post -->
						<div class="post">
							<!-- post-inner -->
<?php
if (@$_GET['area'] == "originals" )
{
	if (@$_GET['criteria'] == "o-genre" )
	{ $_SESSION['history'] = link_history($_GET['area'], $_GET['criteria'], $_GET['value'], @$_GET['counter'], @$_GET['sort'], @$_GET['way']);
		$head1 = $lang['genre']." -> "; 		
		$head2 =  @$_GET['value'];

		$originals_list = buildMovieThumbList($_GET['criteria'], $_GET['value'], @$_GET['counter'], @$_GET['sort'], @$_GET['way'], @$_GET['area']);
		$page = buildPageLinks ($_GET['area'], $_GET['criteria'], $_GET['value'], @$_GET['counter'], @$_GET['sort'], @$_GET['way']);
			$count_m = calc_unseen_seen($_GET['criteria'] ,"o-seen-genre" , $_GET['value']);
			$count = "<b>{$count_m['count']}</b> {$lang['cou-1']} <b> {$count_m['seen']} </b> {$lang['seen']}, <b>{$count_m['unseen']}</b> {$lang['not_seen']}."; ?>
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
										<li><a href="./index.php?area=<?=$_GET['area']?>&criteria=<?=$_GET['criteria']?>&value=<?=$_GET['value']?>&sort=title&way=<?=way(@$_GET['way'])?>"> <b><?=$lang['m_Titel']?></b></a></li>
										<li><a href="./index.php?area=<?=$_GET['area']?>&criteria=<?=$_GET['criteria']?>&value=<?=$_GET['value']?>&sort=rating&way=<?=way(@$_GET['way'])?>"> <b><?=$lang['Rate']?></b></a></li>
									</ul>
								</div>
								</td></tr></table>
								<div class="img-holder"></div><?php
						
								include($tf.'thumbnail_list_header.tpl');								
								$cur_movie = 1;
								foreach ($originals_list as $originals) 
								{
									OriginalsListData();
									include($tf."originalsListThumb.tpl");
								if ($cur_movie++ == $ShowsPerRow)
								{
									echo $RowDivider;
									$cur_movie = 1;
								}
							}
									include($tf.'thumbnail_list_footer.tpl'); 
	}
	if (@$_GET['criteria'] == "o-details" )
	{ 
			$MovieDetail = getOriginalsDetails ($_GET['criteria'], $_GET['value']);
			
					 if (is_file ($thumbFolder.$t300x424.'cover/'.$MovieDetail["c09"].".jpg"))
					 {
						$thumb = $thumbFolder.$t300x424.'cover/'.$MovieDetail["c09"].".jpg";
					 } else {
						$thumb = "./gfx/css/images/nix.jpg"; 
					 }
			$head1 = $lang['moviedetails']; 	
			$tag_genre = buildTags ("search", "genre" , $MovieDetail["c14"], "s_value");	
			$tag_writer = buildTags ("search", "writer" , $MovieDetail['c06'], "s_value");
			$tag_director = buildTags ("search", "director" , $MovieDetail["c15"], "s_value");
			$tag_country = buildTags ("search", "country" , $MovieDetail["c21"], "s_value");
			$tag_studio = buildTags ("search", "studio" , $MovieDetail["c18"], "s_value");
			$tag_fsk = buildTags ("search", "fsk" , $MovieDetail["c12"], "s_value");
			$tag_year = buildTags ("search", "year" , $MovieDetail["c07"], "s_value"); ?> 
							<div class="post-inner">
								<header>
									<div class="pagination"><ul><li><a href='<?=$_SESSION['history']?>'><font size="+1">Zur&uuml;ck</font></a></li></ul></div>
									<h2> <?php echo $head1; ?></h2>
									<p class="tags"><a href="">movieID : <b><?php echo $MovieDetail["idMovie"]; ?></b></a> <a href="">IMDB : <b><?php echo $MovieDetail["c09"]; ?></b></a></p>
									</br>
								</header>
								<div class="img-holder"></div><?php
									include ('./pages/MovieDetails.php');
	
	}

	if (@$_GET['criteria'] == "o-all" )
	{ $_SESSION['history'] = link_history($_GET['area'], $_GET['criteria'], $_GET['value'], @$_GET['counter'], @$_GET['sort'], @$_GET['way']);
		$head1 = $lang['all_'].$lang['original'];		
		$head2 =  @$_GET['value'];

		$originals_list = buildMovieThumbList($_GET['criteria'], @$_GET['value'], @$_GET['counter'], @$_GET['sort'], @$_GET['way'], @$_GET['area']);
		$page = buildPageLinks ($_GET['area'], $_GET['criteria'], @$_GET['value'], @$_GET['counter'], @$_GET['sort'], @$_GET['way']);
			$count_m = calc_unseen_seen($_GET['criteria'] ,"o-seen-all" , $_GET['value']);
			$count = "<b>{$count_m['count']}</b> {$lang['cou-1']} <b> {$count_m['seen']} </b> {$lang['seen']}, <b>{$count_m['unseen']}</b> {$lang['not_seen']}.";
?>

							<div class="post-inner">
								<header>
									<h2><?php echo $head1.$head2; ?></h2>
									<p class="tags"><?php echo $count; ?></p>
									</br>
								</header>
								<table width="100%"><tr><td><?=$lang['sort']?> </td><td>
								<div class='pagination'>
									<ul>
										<li><a href="./index.php?area=<?=$_GET['area']?>&criteria=<?=$_GET['criteria']?>&value=<?=$_GET['value']?>&sort=date&way=<?=way(@$_GET['way'])?>"><b><?=$lang['m_added']?></b></a></li>
										<li><a href="./index.php?area=<?=$_GET['area']?>&criteria=<?=$_GET['criteria']?>&value=<?=$_GET['value']?>&sort=title&way=<?=way(@$_GET['way'])?>"> <b><?=$lang['m_Titel']?></b></a></li>
										<li><a href="./index.php?area=<?=$_GET['area']?>&criteria=<?=$_GET['criteria']?>&value=<?=$_GET['value']?>&sort=rating&way=<?=way(@$_GET['way'])?>"> <b><?=$lang['Rate']?></b></a></li>
									</ul>
								</div>
								</td>
								<td class="doRight">
									<ul>
											<p><form action="./index.php?area=originals&criteria=o-all-unseen&value=" method="post">
											<input type="submit" value="<?=$lang['all_'].$lang['not_seen3'].$lang['original']; ?>">
											</form></p>
									</ul>
								</td>
								</tr></table>
								<div class="img-holder"></div>
								<?php

						
								include($tf.'thumbnail_list_header.tpl');
									
								$cur_movie = 1;

								foreach ($originals_list as $originals) 
								{
									OriginalsListData();
									include($tf."originalsListThumb.tpl");
								if ($cur_movie++ == $ShowsPerRow)
								{
									echo $RowDivider;
									$cur_movie = 1;
								}

							}
									include($tf.'thumbnail_list_footer.tpl'); 
	}

if (@$_GET['criteria'] == "o-all-unseen" )
	{ $_SESSION['history'] = link_history($_GET['area'], $_GET['criteria'], $_GET['value'], @$_GET['counter'], @$_GET['sort'], @$_GET['way']);
		$head1 = $lang['all_'].$lang['not_seen3'].$lang['original'];		
		$head2 =  @$_GET['value'];

		$originals_list = buildMovieThumbList($_GET['criteria'], @$_GET['value'], @$_GET['counter'], @$_GET['sort'], @$_GET['way'], @$_GET['area']);
		$page = buildPageLinks ($_GET['area'], $_GET['criteria'], @$_GET['value'], @$_GET['counter'], @$_GET['sort'], @$_GET['way']);
				$count_o = calc_unseen_seen("o-all" ,"o-seen-all" , $_GET['value']);
				$count = "<b>{$count_o['unseen']}</b> {$lang['movie']} {$lang['not_seen2']}.";
?>

							<div class="post-inner">
								<header>
									<h2><?php echo $head1.$head2; ?></h2>
									<p class="tags"><?php echo $count; ?></p>
									</br>
								</header>
								<table width="100%"><tr><td><?=$lang['sort']?> </td><td>
								<div class='pagination'>
									<ul>
										<li><a href="./index.php?area=<?=$_GET['area']?>&criteria=<?=$_GET['criteria']?>&value=<?=$_GET['value']?>&sort=date&way=<?=way(@$_GET['way'])?>"><b><?=$lang['m_added']?></b></a></li>
										<li><a href="./index.php?area=<?=$_GET['area']?>&criteria=<?=$_GET['criteria']?>&value=<?=$_GET['value']?>&sort=title&way=<?=way(@$_GET['way'])?>"> <b><?=$lang['m_Titel']?></b></a></li>
										<li><a href="./index.php?area=<?=$_GET['area']?>&criteria=<?=$_GET['criteria']?>&value=<?=$_GET['value']?>&sort=rating&way=<?=way(@$_GET['way'])?>"> <b><?=$lang['Rate']?></b></a></li>
									</ul>
								</div>
								</td>
								<td class="doRight">
									<ul>
											<p><form action="./index.php?area=originals&criteria=o-all&value=" method="post">
											<input type="submit" value="<?=$lang['all_'].$lang['seen'].$lang['original']; ?>">
											</form></p>
									</ul>
								</td>								
								</tr></table>
								<div class="img-holder"></div>
								<?php

						
								include($tf.'thumbnail_list_header.tpl');
									
								$cur_movie = 1;

								foreach ($originals_list as $originals) 
								{
									OriginalsListData();
									include($tf."originalsListThumb.tpl");
								if ($cur_movie++ == $ShowsPerRow)
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