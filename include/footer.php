					<div class="cl">&nbsp;</div>
				</div>
				<!-- end of main -->
				<div class="footer">

					<nav class="footer-nav">
						<ul><?php 
							  if((!empty($menu_show_count_m)) || ($menu_show_count_m > 0))
							{	?><li><a href='./index.php?area=movie&criteria=m-all&value='><?=$lang['all_'].$lang['movie']?></a></li><?php 
							} if((!empty($menu_show_count_s)) || ($menu_show_count_s > 0))
							{	?><li><a href='./index.php?area=serie&criteria=s-all&value='><?=$lang['all_'].$lang['serie']?></a></li><?php 
							} if((!empty($menu_show_count_o)) || ($menu_show_count_o > 0))
							{	?><li><a href='./index.php?area=originals&criteria=o-all&value='><?=$lang['all_'].$lang['original']?></a></li> <?php } ?>
							<li><a href='./index.php?area=admin'><?=$lang['admin']?></a></li>
							<li><a href='https://bugtracker.it-ludwig.eu/index.php?do=tasklist&project=8' target="_blank">Bugtracker</a></li>
						</ul>
					</nav>
					
					<p class="copy">Copyright &copy; 2015-<?=date("Y")?> | <a href="https://www.it-ludwig.eu" target="_blank">Andreas Ludwig</a> <span>|</span> <?php echo $title; ?> - <?php echo $ver; ?> <span>|</span> Design by <a href="http://chocotemplates.com" target="_blank">ChocoTemplates.com</a> <span>|</span> <?=round($measure_site_time, 3)?></p>
				</div>
			</div>
			<!-- end of shell -->
		</div>	
	</div>
	<!-- end of wrapper -->
</body>
</html>