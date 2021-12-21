<?php
if ($GLOBALS['show_cover_instead_of_banner'] == "0")
{ ?>
<td align="center" valign="top">

        <table border="0">
                <tr>
                        <td class = "show_thumb" colspan="2">
							<a href="?area=<?=$_GET['area']?>&criteria=s-details&value=<?=$serie["idShow"]?>" name="" TVID="<?=$tvid++?>" title="<?=$serie["title"]?>">
							<img src="<?=$serie["THUMBNAIL"]?>" alt="<?=$serie["title"]?>" border="0" class="thumbnail" height="178" width="758"></a>
						</td>
				</tr><tr>
						<td align="left" valign="top"><img src="<?=$tf?>css/images/blank1x1.png" width="1" height="12"><?=$serie["RATING_IMAGES_small"]?> | <?=@$serie["SEE_THUMBNAIL"]?></td>
                        <td align="center" valign="top"><font size="+1"><?=$serie["title"]?></font></td>
                </tr>
        </table>
</br></td>
<?php } else { ?>
<td align="center" valign="top">

        <table border="0">
                <tr>
                        <td class = "show_thumb" align="center">
							<a href="?area=<?=$_GET['area']?>&criteria=s-details&value=<?=$serie["idShow"]?>" name="" TVID="<?=$tvid++?>" title="<?=$serie["title"]?>">
							<img src="<?=$serie["THUMBNAIL"]?>" alt="<?=$serie["title"]?>" border="0" class="thumbnail" height="210" width="144"></a></td>
				</tr><tr>
					<td align="center" nowrap><img src="<?=$tf?>css/images/blank1x1.png" width="1" height="12"><?=$serie["RATING_IMAGES_small"]?> | <?=@$serie["SEE_THUMBNAIL"]?></td>
				</tr>
                </tr><tr>
                        <td align="center"><center><?=$serie["title"]?></center></br></td>
                </tr>
        </table>
</td>




	 
<?php } ?>
