<center>
<div class='bar'>

	<table border="0" width="100%">
		<tr>
				<td colspan="3"><b><font style="font-size: 40px; "><?php echo $spot_movie['title']?></font></b></td>
		</tr>
		<tr>
				<td rowspan="5" valign="top" width="300" align="left"><a href="./index.php?area=<?=$area_link?>&criteria=<?=$crit_link?>&value=<?=$id?>"><img src="<?=$thumb; ?>" height="424" width="300" border="0" ></a>
					</br><?=$lang['Rate']?> : <img src="<?=$tf?>css/images/blank1x1.png" width="1" height="12"><?=$spot_movie["RATING_IMAGES_small"]?>
				</td>																	
				<td rowspan="5" width="5px" align="left"></td>
				<td valign="top"></td>
		</tr>
		<tr>												
			<td valign="top"><div class="img-holder"><b><font size="+2"><?=$lang['m_plot']?></font></b></div></td>
		</tr>
		<tr>
			<td valign="top"><?=$spot_movie['plot']?></td>

		</tr>
		<tr>
			<td valign="top"><div class="img-holder"><b><?=$lang['genre']?></b></div><?=$tag_genre?></br></td>
		</tr>
		<tr>
			<td valign="top"><div class="img-holder"><b><?=$lang['links']?></b></div>																											
							<a href="https://www.youtube.com/results?search_query=<?php echo $spot_movie['title']; ?> German Trailer" target="_blank"><img src="./gfx/css/images/yt.png" alt="YouTube" border="0"></a>
							<?php if(!is_numeric($spot_movie['id'])) { ?><a href="http://www.imdb.com/title/<?php echo $spot_movie['id']; ?>/" target="_blank"><img src="./gfx/css/images/imdb.png" alt="YouTube" border="0"></a><?php } ?>
									<form action="http://www.xrel.to/search.html" method="post" target="_blank" style="display:inline;">
										<input type="hidden" name="mode" value="full">
										<input type="hidden" name="extsearch" value="1">
										<input type="hidden" name="t_extinfo" value="on">
										<input type="hidden" name="xrel_search_query" value="<?php echo $spot_movie['title']; ?>">
										<input type="image" src="./gfx/css/images/xrel.png" alt="Xrel">
									</form>	
			</td>
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