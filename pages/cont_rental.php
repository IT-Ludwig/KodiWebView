
				<!-- main -->
				<div class="main">			
					<!-- content -->
					<section class="content">
						<div class="post">
							<!-- post-inner -->
								<div class="post-inner">
								<header>
									<h2><?=$lang['rental'].$lang['_bereich']?></h2>								
								</header></br>
								<div class="img-holder"></div>
									<div class='pagination'>
										<ul>
											<?php if ((isset($_SESSION['site_admin'])) && ($_SESSION['site_admin'] == "1")) { ?><li><a href="#newRental"><b><?=$lang['new_1']?> <?=$lang['rental']?></b></a></li><?php } ?>		
											<li><a href="#accRentals"><b><?=$lang['actually']?> <?=$lang['verliehen']?></b></a></li>
											<li><a href="#finRentals"><b><?=$lang['rental']?> <?=$lang['verlauf']?></b></a></li>			
										</ul>
									</div></br>
												
								</div>								
						</div>
						
					<?php if ((isset($_SESSION['site_admin'])) && ($_SESSION['site_admin'] == "1")) { ?>
					<div class="post">
							<!-- post-inner -->
								<div class="post-inner">
								<header>
									<h2 id='newRental'><?=$lang['new_1']?> <?=$lang['rental']?></h2>
									</br>					
								</header>
								<div class="img-holder"></div>
									<form action="./index.php?area=<?=$_GET["area"]?>&options=rNew" method="POST">
										<table width="100%" border="0">
											<tr>
												<td nowrap><?=$lang['movie_s']?> :</td>
												<td><input type="hidden" name="imdb" value="" id="getIMDB"><input type="text" name="film" value="" size="30" id="getMovie" required></td>
											</tr>	
											<tr>
												<td nowrap><?=$lang['persona_1']?> :</td>
												<td><input type="text" name="person" value="" size="30" required></td>
											</tr>	
											<tr>
												<td nowrap><?=$lang['date']?> :</td>
												<td><input type="text" name="start_date" value="" size="30" id="calendar" required></td>
											</tr>
										</table>
									<input type="Submit" name="submit" value="<?=$lang['new_entry_1']?>">
									</form>
								</div><?php
								
									if (@$_REQUEST['options'] == 'rNew')
									{
										$rNew = rNew ($_POST['person'], $_POST['start_date'], $_POST['imdb']);
											if ( $rNew == "1" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=<?=$_GET["area"]?>&criteria=<?=@$_GET["criteria"]?>&value=<?=@$_GET["value"]?>&result=true"><?php }
											if ( $rNew == "2" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=<?=$_GET["area"]?>&criteria=<?=@$_GET["criteria"]?>&value=<?=@$_GET["value"]?>"><?php }
									}
									
								?>
					</div>								
					<?php } ?>
					
						<div class="post">
							<!-- post-inner -->
							<div class="post-inner">
								<header>
									<h2 id='accRentals'><?=$lang['actually']?> <?=$lang['verliehen']?></h2>
									<p class="tags"></p>
									</br>
								</header>
								
								<table width="100%" border="0" rules="none">
									<tr align="left">
										<th style="border-width: 1px; border-bottom-style: solid;"><?=$lang['movie_s']?></th>
										<th style="border-width: 1px; border-bottom-style: solid;"><?=$lang['persona_1']?></th>
										<th style="border-width: 1px; border-bottom-style: solid;"><?=$lang['date_start']?> <?=$lang['date']?></th>
										<th style="border-width: 1px; border-bottom-style: solid;"></th>
									</tr><?php
										$getAccRentals = getAccRentals (); $i = "0"; 	  
									foreach ( $getAccRentals as $AccRentals)
									{ ?>						
										<tr class="row_<?=$i % 2?>">
											<td nowrap><?=getTitleByID($tb_originals, $AccRentals['uniqueid_value'])?></td>
											<td nowrap><?=$AccRentals['person']?></td>
											<td nowrap><?=convertDate($AccRentals['start_date'])?></td>
											<td nowrap><?php if ((isset($_SESSION['site_admin'])) && ($_SESSION['site_admin'] == "1")) { ?><a href='./index.php?area=<?=$_GET["area"]?>&rID=<?=$AccRentals['id']?>&options=rBack'><?=$lang['rental']?> <?=$lang['h_back']?></a><?php } ?></td>
										</tr>
										<?php  $i++;
									} ?>
								</table>					
							</div>								
						</div>
						
						<div class="post">
							<!-- post-inner -->
							<div class="post-inner">
								<header>
									<h2 id='finRentals'><?=$lang['rental']?> <?=$lang['verlauf']?></h2>
									<p class="tags"></p>
									</br>
								</header>
								
								<table width="100%" border="0" rules="none">
									<tr align="left">
										<th style="border-width: 1px; border-bottom-style: solid;"><?=$lang['movie_s']?></th>
										<th style="border-width: 1px; border-bottom-style: solid;"><?=$lang['persona_1']?></th>
										<th style="border-width: 1px; border-bottom-style: solid;"><?=$lang['date_start']?> <?=$lang['date']?></th>
										<th style="border-width: 1px; border-bottom-style: solid;"><?=$lang['date_stop']?> <?=$lang['date']?></th>
									</tr><?php
										$getFinRentals = getFinRentals (); $i = "0"; 	  
									foreach ( $getFinRentals as $FinRentals)
									{ ?>						
										<tr class="row_<?=$i % 2?>">
											<td nowrap><?=getTitleByID($tb_originals, $FinRentals['uniqueid_value'])?></td>
											<td nowrap><?=$FinRentals['person']?></td>
											<td nowrap><?=convertDate($FinRentals['start_date'])?></td>
											<td nowrap><?=convertDate($FinRentals['stop_date'])?></td>
										</tr>
										<?php  $i++;
									} ?>
								</table>					
							</div>								
						</div>
					</section>
					
	<?php				
	if (@$_REQUEST['options'] == 'rBack')
	{
		$rBack = rBack ($_GET['rID']);
			if ( $rBack == "1" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=<?=$_GET["area"]?>&result=true"><?php }
			if ( $rBack == "2" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=<?=$_GET["area"]?>"><?php }
			if ( $rBack == "0" ) { echo "Error setvBack</br>"; }
	} ?>