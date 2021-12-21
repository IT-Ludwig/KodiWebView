<center>
<form action="./index.php?area=<?=$_GET["area"]?>&criteria=<?=$_GET["criteria"]?>&value=<?=$_GET["value"]?>&options=edit" method="POST">		
<div class='bar'>

	<table border="0" width="100%">
		<tr>
				<td colspan="5" valign="top"><b><font style="font-size: 40px; "><?php echo $MovieDetail['c00']?></font></b></td>
		</tr>
		<tr>
				<td rowspan="6" valign="top" width="300" align="left"><img src="<?=$thumb; ?>" height="424" width="300" border="0" ></td>
				<td rowspan="6" width="5px"></td>
				<td rowspan="6" valign="top"><?php $genre = getGenre (); $secGenre = convertSlash ($MovieDetail["c14"], "explode") ?>
								<select size="<?=count($genre)?>" name="val[c14][]" multiple>
									<?php
									foreach($genre as $key => $val1)
									{										
										if ( in_array ( $val1, $secGenre ) ) { $checked2 = "selected"; } else { $checked2 = ""; }
										echo "<option value='$val1' $checked2>$val1</option>";
									} ?>
								</select>
				</td>
				<td rowspan="6" width="5px"></td>
				
		</tr>
		<tr>												
			<td valign="top"></br><div class="img-holder"><b><font size="+2"><?=$lang['moviedetails']?></font></b></div></td>
		</tr>
		<tr>
			<td valign="top"><table width="100%"><tr>
									<td valign="top" nowrap><b><?=$lang['year']?> : </b></br><input type="text" name="val[c07]" value="<?=$MovieDetail['c07']?>"></td>
									<td valign="top" nowrap><b><?=$lang['runtime']?> : </b></br><input type="text" name="val[c11]" value="<?=$MovieDetail['c11']?>"> in sec</td>
			</tr></table></td>
		</tr>
		<tr>
			<td valign="top"><table width="100%"><tr>
									<td valign="top" nowrap><b><?=$lang['Rating']?> : </b></br><input type="text" name="val[c12]" value="<?=$MovieDetail['c12']?>"></td>
									<td valign="top"><b><?=$lang['studio']?> : </b></br><textarea style="width:95%" name="val[c18]"><?php echo $MovieDetail['c18']?></textarea></td>
			</tr></table></td>
		</tr>		

		<tr>
			<td valign="top"><div class="img-holder"></div><table width="100%"><tr>
									<td valign="top" width="50%"><b><?=$lang['Drehbuch']?> : </b></br><textarea style="width:95%" name="val[c06]"><?=$MovieDetail['c06']?></textarea></td>
									<td valign="top" width="50%"><b><?=$lang['Regisseur']?> : </b></br><textarea style="width:95%" name="val[c15]"><?=$MovieDetail["c15"]?></textarea></td>
		</tr></table></td>
		</tr>
		<tr>
			<td valign="top"><div class="img-holder"></div><table width="100%" border="0"><tr>
											<td valign="top" width="50%"><b>IMDB-Rating : </b></br><input type="text" style="width:25%" name="rate[rating]" value="<?=$MovieDetail['c05']?>"> ( <input type="text" style="width:22%" name="rate[votes]" value="<?=$MovieDetail['c04']?>"> Bewertungen ) </td>
											<td valign="top" width="50%"><b><?=$lang['Land']?> : </b></br><textarea style="width:95%" name="val[c21]"><?=$MovieDetail["c21"]?></textarea></td>
										</tr></table></td>
		</tr>
		<tr>
			<td valign="top" colspan="5"><div class="img-holder"></div><table width="100%" border="0"><tr>
										<td valign="top" width="78%"><b><?=$lang['m_plot']?> :</b></br><textarea style="width:95%" name="val[c03]" rows="3"><?=$MovieDetail['c03']?></textarea></br></br>
																						   <textarea style="width:95%" rows="10" name="val[c01]"><?=$MovieDetail['c01']?></textarea></br></br></td>
										<td width="10px"></td>

										<td valign="top" align="left" nowrap width="20%">
														<?=$lang['m_st_kodi']?> <?=$lang['anpassen']?></br>
														<select size="1" name="val[idSet]" style="width: 220px">
														<option value='' selected><?=$lang['m_set_ohne']?></option><?php   							
															$set = getSets ();
															foreach ($set as $key => $value) 
															{ if($key ==  $MovieDetail['idSet']) { $selected1 = "selected"; } else { $selected1 = ""; }?>									
																<option value='<?=$key?>' <?=$selected1?>><?=$value?></option><?php
															} ?>	
														</select>		
										</td>
										</tr></table><td>
		</tr>		
	</table>
	
	<input type="hidden" style="width:25%" name="ratingId" value="<?=$MovieDetail['ratingId']?>">
	<input type="hidden" style="width:25%" name="idMovie" value="<?=$MovieDetail['idMovie']?>">
	<input type="Submit" name="submit" value="<?=$lang['save']?>"></form>
	</div>
</center>
<?php
	if (@$_REQUEST['options'] == 'edit')
	{		$crt = explode("-", $_GET['criteria']);
			$criteria = "{$crt[0]}-{$crt[1]}";
		$edit = editMovie ($_GET['area'], $_POST['val'], $_POST['idMovie'], $_POST['rate'], $_POST['ratingId']);
			if ( $edit == "1" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=<?=$_GET["area"]?>&criteria=<?=$criteria?>&value=<?=$_GET["value"]?>&result=true"><?php }
			if ( $edit == "2" ) { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=<?=$_GET["area"]?>&criteria=<?=$_GET["criteria"]?>&value=<?=$_GET["value"]?>"><?php }
			if ( $edit == "0" ) { echo "Error edit</br>"; }
	}