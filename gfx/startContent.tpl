<td align="center" valign="top">

        <table border="0">
                <tr>
                        <td class = "show_thumb" align="center">
							<a href="?area=<?=$_GET['area']?>&criteria=<?=$_GET['criteria']?>&value=<?=$movie["c09"]?>" name="" TVID="<?=$tvid++?>" title="<?=$movie["title"]?>">
							<img src="<?=$movie["THUMBNAIL"]?>" alt="<?=$movie["title"]?>" border="0" class="thumbnail" height="210" width="144"></a></td>
				</tr><tr>
					<td align="center" nowrap><img src="<?=$tf?>css/images/blank1x1.png" width="1" height="12"><?=$movie["RATING_IMAGES_small"]?> | <?=@$movie["SEE_THUMBNAIL"]?></td>
				</tr>
                </tr><tr>
                        <td align="center"><center><?=$movie["title"]?></center></br></td>
                </tr>
        </table>
</td>