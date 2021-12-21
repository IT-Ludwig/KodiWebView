<?php
if (!is_file('./include/conf.php'))
{ header('Location: ./install'); } 

$measure_site_time_start = microtime(true);
session_start();
				@include ('./include/conf.php');				
				include ('./include/enviroment.php');					
				include ('./include/functions.php');
					siteVars();
					include ("./include/lang/$language.php");
				include ('./include/header.php');
if ((!isset($_SESSION['site_id'])) && ($GLOBALS['login_secured_site'] == "1"))
{ ?>
		<center></br></br></br>
                <form action="./index.php?action=login" method="post" >
                    <table width="400" border = "0" id="tabellegh">
                        <tr>
							<td colspan="2" align="center"></br><font size="+1"><?=$lang['Login']?></br></br></font></td>
						</tr>
						<tr align="center" >
                           <td align="right"><?=$lang['username']?> : </font></td>
							<td><input type="text" name="user" value=""></td>
                        </tr>
						<tr align="center" >
							<td align="right"><?=$lang['password']?> : </td>
							<td><input type="password" name="pass" value=""></td>
						</tr>
						<tr align="center" >
							<td colspan="2" align="center"></br><input type="Submit" name="submit" value="<?=$lang['Login']?>"></br></br></td>
						</tr>
					</table>
              </form>
		</center><?php 
							if (@$_REQUEST['action'] == 'login')
							{
								$user = htmlspecialchars($_POST['user'], ENT_QUOTES);
								$pass = md5(htmlspecialchars($_POST['pass'], ENT_QUOTES));
								$login = siteLogin($user, $pass);
									if ($login == "1")
									{
										?><meta http-equiv="refresh" content="0; URL=index.php"><?php
									} else {
										echo "<false><b>&raquo;</b> {$lang['e_login1']}</false></br>";
										//echo 'Fehler:</br></br>' . mysql_error();
									}
							}
}	else {	  

include ('./pages/top.php');		
if (!@$_REQUEST['area'])         { include ('./pages/'.$StartPage );	 }
if (isset($_REQUEST['area'])) { include ('./pages/cont_'.$_GET['area'].'.php'); }	
if (is_file('./include/conf.php')) 
{ 
	include ('./pages/sidebar.php'); 
	$measure_site_time_stop = microtime(true);	$measure_site_time = $measure_site_time_stop - $measure_site_time_start;
	include ('./include/footer.php');	
}
}

?>
<script src="./gfx/js/auto.js"></script>

