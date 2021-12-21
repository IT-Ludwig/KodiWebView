<?php
    session_start();

include ('../include/conf.php');
include ('../include/functions.php');
	siteVars();
	include ("../include/lang/$language.php");
	 include("../gfx/css/style.css.php");
?>
<style>

body {
    font-size: 12px;
    line-height: 22px;
    font-family: arial, sans-serif;
    color: #fff;
    background: url(../gfx/css/images/body.png) repeat 0 0;
    min-width: 980px;
}

</style>
<form action="./MovieDetails.cover.php?do=upload" enctype="multipart/form-data" id="upload_form" method="post">
         <table>
                <tr>
                         <td><?=$lang['selectFile']?> : </td>
                         <td style="border:1px solid; border-color:#808080" colspan="2" ><input name="userfile" type="file" value="<?php echo $HTTP_POST_FILES['userfile']['name']; ?>" class="css5"></td>
                </tr>
				<tr>
						<td><input type="hidden" name="imdbid" value="<?=$_GET["imdbid"]?>"><input name="save" type="submit" value="<?=$lang['selectFile_Up']?>"></td>
				</tr>
         </table>
           </br>


</form>
<?php
if (isset($_REQUEST['do']) && $_REQUEST["do"] == "upload")
{
                 $uploadCover = uploadCover ( $_FILES['userfile'], $_POST['imdbid']);
                 if ($uploadCover == "0") { echo "Keine Datei gew&auml;hlt"; };
                 if ($uploadCover == "3") { echo "Fehler beim Upload!"; }
                 if ($uploadCover == "2") { echo "Falsches Format, Nochmals versuchen!"; }
				 if ($uploadCover == "1") { ?><script language="JavaScript">window.opener.location.reload();</script><script language="JavaScript">window.close();</script><?php }
}