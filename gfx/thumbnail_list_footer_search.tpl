	           </tr>
		 </table>
<?php if (!isset($_GET["imdb"])) 
	  {
          if ( @$page["page"] != @$page["NumberOfPages"] ) 
		  {?>
						<div class="pagination">
							<ul>
								<li class="laquo"><a href="<?=$page["PrevPageLink"]?>" tvid="PGDN"><span></span></a></li>
								<?php
								for ( $x = 0; $x < $page['NumberOfPages']; $x++ )
								{
									if (@$_GET['counter'] == $x ) { $active = "class='active'"; } else { $active = ""; }
									$site = $x + 1 ;
									echo "<li $active><a href='{$page['PageLink']}$x'>$site</a></li>";
								
								} ?>
								<li class="raquo"> <a href="<?=$page["NextPageLink"]?>" tvid="PGUP"><span></span></a></li>

							</ul>
						</div><?php
			}
	  } 
	  ?>


				