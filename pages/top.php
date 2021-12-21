	<!-- wrapper -->
	<div id="wrapper">
		<div class="light-bg">
			<!-- shell -->
			<div class="shell">
				<!-- header -->
				<div class="header">
					<h1 id="logo"><a href="./index.php"></a></h1>
					<!-- navigation -->
					<?php 					
							$menu_show_count_m = getCount ("m-all", "");
							$menu_show_count_s = getCount ("s-all", "");
							$menu_show_count_o = getCount ("o-all", "");
							$menu_show_count_v = getCountV();
					if ($TopMenu == "1") { 
					echo "<nav id='navigation'>";
						echo "<ul>";
						echo "<li><a href='./index.php'>{$lang['Home']}</a></li>";
							if((!empty($menu_show_count_m)) || ($menu_show_count_m > 0))
							{
								echo "<li><a href='./index.php?area=movie&criteria=m-all&value='>{$lang['all_']}{$lang['movie']}<span>{$menu_show_count_m}</span></a></li>";
							}
							if((!empty($menu_show_count_s)) || ($menu_show_count_s > 0))
							{
								echo "<li><a href='./index.php?area=serie&criteria=s-all&value='>{$lang['all_']}{$lang['serie']}<span>{$menu_show_count_s}</span></a></li>";
							}
							if((!empty($menu_show_count_o)) || ($menu_show_count_o > 0))
							{	
								echo "<li><a href='./index.php?area=originals&criteria=o-all&value='>{$lang['all_']}{$lang['original']}<span>{$menu_show_count_o}</span></a></li>";
							}	
								echo "<li><a href='./index.php?area=rental'>{$lang['rental']}<span>".@$menu_show_count_v."</span></a></li>";
								echo "<li><a href='./index.php?area=stats'>{$lang['Statistik']}</a></li>";
						echo "</ul>";
					echo "</nav>";
					} ?>
					<!-- end of navigation -->
					<div class="cl">&nbsp;</div>
				</div>
				<!-- end of header -->