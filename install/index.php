<?php
if (isset($_GET['step']))
$step = $_GET['step'];
else
$step = 0;

require_once('installer-config.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title><?php echo $setting['name'] ?> Installation</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <link href="installer-styles.css" rel="stylesheet" type="text/css" />
 </head>
 <body>
  <div id="container">
  <div id="header">
   <a href="index.php"><img src="../gfx/css/images/logo.png" height="75" width="272" border="0" >Installation</a>
   </div>
        <div id="main">
        <div class="pad25">
<?php
switch($step) {
        case 0:
		echo "<h1>Pre-Installation Informationen</h1><br />";
		echo "<p>Willkommen zum Installationsassistenten von <b>{$setting['name']}</b>.<br /><br /> <b>Bevor wir beginnen, checken wir ob alle Vorraussetzungen erf&uuml;llt sind:</b></br>";
		echo "Order /include ist beschreibbar: ";
				if (!is_writable($setting['config']['folder'])) { $msg ="1"; echo "<font color='#bc4141'><b><code>der Ordner existiert nicht oder es fehlen die n&ouml;tigen Rechte</code></b></font></br>"; } else { echo "<font color='#359f33'><b><code>OK</code></b></font></br>"; }
		echo "Order /thumb ist beschreibbar: ";
				if (!is_writable($setting['config']['folder1'])) { $msg ="1"; echo "<font color='#bc4141'><b><code>der Ordner existiert nicht oder es fehlen die n&ouml;tigen Rechte</code></b></font></br>"; } else { echo "<font color='#359f33'><b><code>OK</code></b></font></br>"; }
		echo "php Version (min.  {$setting['requirements']['php']}): ";
				if (phpversion() < $setting['requirements']['php']) { $msg ="1"; echo "<font color='#bc4141'><b><code>".phpversion()."</code></b></font></br>"; } else { echo "<font color='#359f33'><b><code>".phpversion()."</code></b></font></br>"; }
		echo "php Module: <ul style='list-style:disc;margin: 10px 40px;'>";
			echo "<li>";
			if (!extension_loaded('gd')) { $msg ="1";
                 echo "<font color='#bc4141'><b><code>gd ist nicht aktiv. Bitte aktivieren Sie diese in der php.ini</code></b></font></br>"; } else { echo "<font color='#359f33'><b><code>gd ist aktiv</code></b></font></br>"; }
			echo "</li>";
			echo "<li>";
			if (!extension_loaded('pdo_mysql')) { $msg ="1";
                 echo "<font color='#bc4141'><b><code>pdo_mysql ist nicht aktiv. Bitte aktivieren Sie diese in der php.ini</code></b></font></br>"; } else { echo "<font color='#359f33'><b><code>pdo_mysql ist aktiv</code></b></font></br>"; }
			echo "</li>";
			echo "<li>";
			if (!extension_loaded('pdo_sqlite')) { $msg ="1";
                 echo "<font color='#bc4141'><b><code>pdo_sqlite ist nicht aktiv. Bitte aktivieren Sie diese in der php.ini</code></b></font></br>"; } else { echo "<font color='#359f33'><b><code>pdo_sqlite ist aktiv</code></b></font></br>"; }
			echo "</li></b>";

			
echo "</ul></br>";
			echo "Optionale Einstellungen:</b></br>";
			echo "Maximale Ausf&uuml;hrungszeit > 300: "; $exe_time = ini_get('max_execution_time'); if ( $exe_time < 300 ) { echo "<font color='#bc4141'><b><code>$exe_time</code></b></font></br>"; } else { echo "<font color='#359f33'><b><code>$exe_time</code></b></font></br>"; }
 			echo "Maximale Uploadgr&ouml;&szlig;e > 32: "; $exe_upload = ini_get('upload_max_filesize'); if ( $exe_upload < 32 ) { echo "<font color='#bc4141'><b><code>$exe_upload</code></b></font></br>"; } else { echo "<font color='#359f33'><b><code>$exe_upload</code></b></font></br>"; }
  			echo "Maximale POSTgr&ouml;&szlig;e > 32: "; $exe_post = ini_get('post_max_size'); if ( $exe_post < 32 ) { echo "<font color='#bc4141'><b><code>$exe_post</code></b></font></br>"; } else { echo "<font color='#359f33'><b><code>$exe_post</code></b></font></br>"; }
 ?></br>
 <b>Stellen Sie bitte sicher, dass Sie die folgenden Informationen haben:</b></p>
<ul style="list-style:disc;margin: 10px 40px;">
  <li>Datenbankname</li>
  <li>Datenbank Benutzername</li>
  <li>Datenbank Passwort</li>
  <li>Datenbankhost</li>
</ul>
<p>Wenn sie die erforderlichen Informationen haben.
Prüfen Sie ob die Verzeichnisse <code><b>/thumb</b></code> und <code><b>/conf</b></code> beschreibbar sind (755).
Danach klicken sie auf <b>"<?php echo $setting['name'] ?> Installieren"</b> link zum Fortsetzten.</p>
<br />
</p>
<?php
if(isset($msg))
{ ?>
	<p><a class="button_non" style="float:right"> <span>Nicht alle Voraussetzung sind erf&uuml;llt &rsaquo;</span> </a></p>	<?php 
} else {
	if (file_exists($setting['config']['folder'] . $setting['config']['file']))
	{ 
		include('../include/enviroment.php');
		if($setting['versions'][$ver] == 1)
		{ ?>
				<p><a href="?step=1" class="button" style="float:right"> <span><?php echo $setting['name'] ?> updaten &rsaquo;</span> </a></p><?php
		} else { ?>
				<p style="float:right"><b>Es ist kein Datenbankupdate erforderlich.</b></p></br></br>
				<p><a class="button_non" style="float:right"> <span><?php echo $setting['name'] ?> updaten &rsaquo;</span> </a>
				<?php
		} ?>
		<p><a href="?step=5" class="button" style="float:left"> <span><?php echo $setting['name'] ?> Neuinstallieren &rsaquo;</span> </a></p><?php
	} else { ?>
		<p><a href="?step=1" class="button" style="float:left"> <span><?php echo $setting['name'] ?> installieren &rsaquo;</span> </a></p><?php 
	}
}
        break;

        case 1:
        ?>
        <h1>Step 1: Konfigurationseinstelungen KodiDB</h1><br />
<form method="post" action="?step=2" name="form">
  <table style="width: 100%;" border="0">
    <tr>
         <th class="col1"><h4><b><u>Datenbank</u></b></h4></th>
         <td class="col2"></td>
         <td class="col3"></td>
    </tr>
    <tr>
      <th class="col1">Datenbank Name</br>Nur die Zahl</th>
      <td class="col2"><input name="db_version" type="text" size="20" value="116" /></td>
      <td class="col3">Kodi 14.x = 90</br>
					   Kodi 15.x = 93 ( ab Kodi 15 beta2 )</br>
					   Kodi 16.x = 99</br>
					   Kodi 17.x = 107</br>
					   Kodi 18.x = 112-<b>116</b></br>
					   Kodi 19.x = 119</td>
					   
    </tr>	
	 <tr>
      <th class="col1"><b>Verwende MySQL</b></th>
      <td class="col2"><input name="use_db_file" type="radio" value="0" required></td>
      <td class="col3">Kodi wird mit MySQL betrieben</td>
    </tr>
    <tr>
      <th class="col1">Datenbank Beutzer</th>
      <td class="col2"><input name="db_user" type="text" size="20" /></td>
      <td class="col3"></td>
    </tr>
    <tr>
      <th class="col1">Datenbank Passwort</th>
      <td class="col2"><input name="db_pass" type="password" size="20" /></td>
      <td class="col3"></td>
    </tr>
    <tr>
      <th class="col1">Datenbank Server</th>
      <td class="col2"><input name="db_host" type="text" size="20" value="localhost" /></td>
      <td class="col3">Meistens muss dieser Wert nicht ge&auml;ndert werden.</td>
    </tr>
	<tr>
      <th class="col1">Datenbank Port</th>
      <td class="col2"><input name="db_port" type="text" size="20" value="3306" /></td>
      <td class="col3">Meistens muss dieser Wert nicht ge&auml;ndert werden. (MariaDB10 = Port 3307)</td>
    </tr>
	<tr>
      <th class="col1"><b>Verwende .DB Datei</b></th>
      <td class="col2"><input name="use_db_file" type="radio" value="1" required></td>
      <td class="col3">Kodi wird Standardmäßg mit .db Datei betrieben</td>
    </tr>
    <tr>
      <th class="col1"></th>
      <td class="col2">Die .db-Datei bitte in den Hauptordner von KodiWebView ablegen</td>
      <td class="col3"></td>
    </tr>
    <tr>
         <th class="col1"><h4><b></b></h4></th>
         <td class="col2"></td>
         <td class="col3"></td>
    </tr>	
    <tr>
         <th class="col1"><h4><b><u>Script Variablen</u></b></h4></th>
         <td class="col2"></td>
         <td class="col3"></td>
    </tr>
    <tr>
         <th class="col1">Seitentitel</th>
         <td class="col2"><input name="title" type="text" size="20" value="Kodi WebView" /></td>
         <td class="col3">Titel der Seite</td>
    </tr>
	<tr>
         <th class="col1">Login gesicherte Seite</th>
         <td class="col2"><input type="checkbox" name="login_secured_site" value="true"></td>
         <td class="col3">Wenn Aktiv , muss man sich erst mal</br>Einloggen um die Seite betreten zu können</td>
    </tr>
	<tr>
      <th class="col1">OMDB API Key</th>
      <td class="col2"><input name="omdbapi" type="text" size="20" /></td>
      <td class="col3"></td>
    </tr>		
    <tr>
         <th class="col1">Filme pro Seite</th>
         <td class="col2"><input name="ShowsPerPage" type="text" size="20" value="30" /></td>
         <td class="col3">f&uuml;r KodiFilme und Originale</td>
    </tr>
    <tr>
         <th class="col1">Filme pro Spalte</th>
         <td class="col2"><input name="ShowsPerRow" type="text" size="20" value="6" /></td>
         <td class="col3">f&uuml;r KodiFilme und Originale</td>
    </tr>
    <tr>
         <th class="col1">Serien pro Seite</th>
         <td class="col2"><input name="SeriePerPage" type="text" size="20" value="7" /></td>
         <td class="col3">f&uuml;r die Serienansicht</td>
    </tr>
    <tr>
         <th class="col1">Serien pro Spalte</th>
         <td class="col2"><input name="SeriePerRow" type="text" size="20" value="1" /></td>
         <td class="col3">f&uuml;r die Serienansicht</td>
    </tr>
	   <tr>
         <th class="col1"><input type="checkbox" name="show_cover_instead_of_banner" value="true"></th>
         <td class="col2">Verwende Cover statt Banner</td>
		 <td class="col3">f&uuml;r die Serienansicht</td>	
    </tr>
	 <tr>
         <th class="col1">Highlight Farbe</th>
         <td class="col2"><input name="HighlightColor" type="text" size="20" value="#B40404" /></td>
         <td class="col3"></td>
    </tr>
	
	
    <tr>
         <th class="col1" align="left" colspan="2"><h4><b><u>Widgets für die Startseite</u></b></h4></th>

         <td class="col3"></td>		 
    </tr>
    <tr>
         <th class="col2"><input type="checkbox" name="show_spotlight_movie_kodi" value="true" checked></th>
         <td class="col2">1 Film im Rampenlicht</td>
		 <td class="col3"></td>	
    </tr>
    <tr>
         <th class="col2"><input type="checkbox" name="show_newest_movie_kodi" value="true" checked></th>
         <td class="col2">5 Neueste Filme</td>
		 <td class="col3"></td>	
    </tr>
	<tr>
         <th class="col2"><input type="checkbox" name="show_best_movie_kodi" value="true" checked></th>
         <td class="col2">5 Bestbewerte Filme</td>
		 <td class="col3"></td>	
    </tr>
	<tr>
         <th class="col2"><input type="checkbox" name="show_spotlight_movie_original" value="true" checked></th>
         <td class="col2">1 Originale im Rampelicht</td>
		 <td class="col3"></td>	
    </tr>
	<tr>
         <th class="col2"><input type="checkbox" name="show_newest_movie_original" value="true" checked></th>
         <td class="col2">5 Neueste Originale</td>
		 <td class="col3"></td>	
    </tr>
	<tr>
         <th class="col2"><input type="checkbox" name="show_best_movie_original" value="true" checked></th>
         <td class="col2">5 Bestbewerte Originale</td>
		 <td class="col3"></td>	
    </tr>
	<tr>
         <th class="col2"><input type="checkbox" name="show_spotlight_serie_kodi" value="true" checked></th>
         <td class="col2">1 Serie im Rampelicht</td>
		 <td class="col3"></td>	
    </tr>
	<tr>
         <th class="col2"><input type="checkbox" name="show_newest_serie_kodi" value="true" checked></th>
         <td class="col2">5 Neueste Serien</td>
		 <td class="col3"></td>	
    </tr>
	<tr>
         <th class="col2"><input type="checkbox" name="show_best_serie_kodi" value="true" checked></th>
         <td class="col2">5 Bestbewerte Serien</td>
		 <td class="col3"></td>	
    </tr>
	<tr>
         <th class="col2"><input type="checkbox" name="show_newest_epi_kodi" value="true" checked></th>
         <td class="col2">5 Neueste Episoden</td>
		 <td class="col3"></td>	
    </tr>
	<tr>
         <th class="col2"><input type="checkbox" name="show_best_epi_kodi" value="true" checked></th>
         <td class="col2">5 Bestbewerte Episoden</td>
		 <td class="col3"></td>	
    </tr>
		

  </table><br />
          <input type="submit" class="button" value="Konfigurationsdatei erstellen &rsaquo;" style="float:right;"></input>
</form>
<?php
        break;
        case 2:

        echo '<h1>Step 2: Generiere Konfigdatei</h1><br />';
		
		$use_db_file = trim($_POST['use_db_file']);
		$omdbapi = trim($_POST['omdbapi']);
		
        $db_version = trim($_POST['db_version']);
        $db_user = trim($_POST['db_user']);
        $db_pass = trim($_POST['db_pass']);
        $db_host = trim($_POST['db_host']);
		$db_port = trim($_POST['db_port']);
		if($use_db_file == 1) { $db_user = ""; $db_pass = ""; $db_host = ""; $db_port = ""; }
		
		$siteVars = array();
        if ( @$_POST["show_spotlight_movie_kodi"] == "true" ) { $siteVarsName[] = 'show_spotlight_movie_kodi'; $siteVarsVal[] = "1"; } else { $siteVarsName[] = 'show_spotlight_movie_kodi'; $siteVarsVal[] = "0"; }
        if ( @$_POST["show_newest_movie_kodi"] == "true" ) { $siteVarsName[] = 'show_newest_movie_kodi'; $siteVarsVal[] = "1"; } else { $siteVarsName[] = 'show_newest_movie_kodi'; $siteVarsVal[] = "0"; }
        if ( @$_POST["show_best_movie_kodi"] == "true" ) { $siteVarsName[] = 'show_best_movie_kodi'; $siteVarsVal[] = "1"; } else { $siteVarsName[] = 'show_best_movie_kodi'; $siteVarsVal[] = "0"; }		
        if ( @$_POST["show_spotlight_movie_original"] == "true" ) { $siteVarsName[] = 'show_spotlight_movie_original'; $siteVarsVal[] = "1"; } else { $siteVarsName[] = 'show_spotlight_movie_original'; $siteVarsVal[] = "0"; }
        if ( @$_POST["show_newest_movie_original"] == "true" ) { $siteVarsName[] = 'show_newest_movie_original'; $siteVarsVal[] = "1"; } else { $siteVarsName[] = 'show_newest_movie_original'; $siteVarsVal[] = "0"; }
        if ( @$_POST["show_best_movie_original"] == "true" ) { $siteVarsName[] = 'show_best_movie_original'; $siteVarsVal[] = "1"; } else { $siteVarsName[] = 'show_best_movie_original'; $siteVarsVal[] = "0"; }
        if ( @$_POST["show_spotlight_serie_kodi"] == "true" ) { $siteVarsName[] = 'show_spotlight_serie_kodi'; $siteVarsVal[] = "1"; } else { $siteVarsName[] = 'show_spotlight_serie_kodi'; $siteVarsVal[] = "0"; }
        if ( @$_POST["show_newest_serie_kodi"] == "true" ) { $siteVarsName[] = 'show_newest_serie_kodi'; $siteVarsVal[] = "1"; } else { $siteVarsName[] = 'show_newest_serie_kodi'; $siteVarsVal[] = "0"; }
        if ( @$_POST["show_best_serie_kodi"] == "true" ) { $siteVarsName[] = 'show_best_serie_kodi'; $siteVarsVal[] = "1"; } else { $siteVarsName[] = 'show_best_serie_kodi'; $siteVarsVal[] = "0"; }		
		if ( @$_POST["show_newest_epi_kodi"] == "true" ) { $siteVarsName[] = 'show_newest_epi_kodi'; $siteVarsVal[] = "1"; } else { $siteVarsName[] = 'show_newest_epi_kodi'; $siteVarsVal[] = "0"; }
		if ( @$_POST["show_best_epi_kodi"] == "true" ) { $siteVarsName[] = 'show_best_epi_kodi'; $siteVarsVal[] = "1"; } else { $siteVarsName[] = 'show_best_epi_kodi'; $siteVarsVal[] = "0"; }
	
		$siteVarsName[] = 'title'; $siteVarsVal[] = trim($_POST['title']); 	
		$siteVarsName[] = 'ShowsPerPage'; $siteVarsVal[] = trim($_POST['ShowsPerPage']); 
		$siteVarsName[] = 'ShowsPerRow'; $siteVarsVal[] = trim($_POST['ShowsPerRow']); 
		$siteVarsName[] = 'SeriePerPage'; $siteVarsVal[] = trim($_POST['SeriePerPage']); 
		$siteVarsName[] = 'SeriePerRow'; $siteVarsVal[] = trim($_POST['SeriePerRow']); 
		if ( @$_POST["show_cover_instead_of_banner"] == "true" ) { $siteVarsName[] = 'show_cover_instead_of_banner'; $siteVarsVal[] = "1"; } else { $siteVarsName[] = 'show_cover_instead_of_banner'; $siteVarsVal[] = "0"; }
		if ( @$_POST["login_secured_site"] == "true" ) { $siteVarsName[] = 'login_secured_site'; $siteVarsVal[] = "1"; } else { $siteVarsName[] = 'login_secured_site'; $siteVarsVal[] = "0"; }	
		$siteVarsName[] = 'HighlightColor'; $siteVarsVal[] = trim($_POST['HighlightColor']); 
		
		$siteVarsName = implode ('§', $siteVarsName);
		$siteVarsVal = implode ('§', $siteVarsVal);
		

		
        $handle = fopen($setting['config']['folder'] . $setting['config']['file'], 'w');

$input = '<?php
////////////////////////////////////////////////////////////////////////////
//                                                                        //
//  RRRRR                     d   L                     b                 //
//  R    R                    d   L                     b                 //
//  R    R    eeeee       ddd d   L           aaaa      bbbbb      ssss   //
//  RRRRR     e    e    d     d   L         a     a     b     b   s       //
//  R  R      eeeee    d      d   L        a      a     b     b    sss    //
//  R   R     e        d      d   L        a      a     b     b       s   //
//  R    R    eeeee     ddddddd   LLLLLLL   a aaaa aa   bbbbbb    ssss    //
//                                                                        //
////////////////////////////////////////////////////////////////////////////

//// Titel der Seite
//// Database Details
// 0 = benutzt MySQL
// 1 = benutzt .db file
$use_kodi_db_file = "'.$use_db_file.'";
// pfad zum db file wenn $use_db_file = "1"

$omdbapi = "'.$omdbapi.'";


//// MySQL Database Verbindungseinstellungen
// Werte für $conn_mysql_db1
// Kodi 14.x = 90
// Kodi 15.x = 93 ( ab 15 beta2 )
// Kodi 16.x = 99
// Kodi 17.x = 107
// Kodi 18.x = 112-116

$db_version = "'.$db_version.'";
$conn_mysql_db1 = "MyVideos$db_version";
$conn_mysql_host = "'.$db_host.'";
$conn_mysql_user = "'.$db_user.'";
$conn_mysql_pass = "'.$db_pass.'";
$conn_mysql_port = "'.$db_port.'";

//////////WICHTIG // IMPORTANT //////////
// Damit die Filme richtig gefunden und ggf. gelöscht werden können. Müsent die Pfade stimmen, ansonsten kann es zu unerwarteten verhalten kommen!	
// $strL gibt an wieviele Zeichen am Anfang des im Kodi hinterlegten Pfads entfernt werden um dort dann $path_to_movie vorzuhängen.
// den Pfad finden man der Filmdetail-Maske.
// 
// Beispiel :
// Bei mir steht in der Datenbank : smb://10.10.12.2/video/MOViES/R/Rampage/
// Der Pfad auf dem Datenträger ist /volume2/video/MOViES/R/Rampage/
// Idetisch ist der Pfad-Anteil video/MOViES/R/Rampage/
// 
// Der Rest (smb://10.10.12.2/) soll Abgeschnitten werden. Das sind 17 Zeichen.
// Diesen Wert bitte bei $strL Eintragen.
//
// Zum Testen in den Admineinstellungen -> Tools den Test "Filme komplett entfernen (Kodi+Datenträger)-Test" durchlaufen lassen.
//

$path_to_movie = "/volume2/";
$strL = 17;

$tb_originals   	 = "kwv_originals";
$tb_users 	         = "kwv_users";
$tb_settings	     = "kwv_settings";
$tb_rental			 = "kwv_rental";
// DO NOT CHANGE UNDER THIS LINE IF U DONT KNOW WHAT U DO
$db_file = "settings.db";
if (is_file("./include/db_conf/".$conn_mysql_db1.".php")) { include ("./include/db_conf/".$conn_mysql_db1.".php"); } elseif  (is_file("./db_conf/".$conn_mysql_db1.".php")) { include ("./db_conf/".$conn_mysql_db1.".php"); } else { include ("../include/db_conf/".$conn_mysql_db1.".php"); }
?>
';

fwrite($handle, $input);
fclose($handle);
		
if (file_exists($setting['config']['folder'] . $setting['config']['file']))
        echo '<h3>Konfigurationsdatei erfolgreich erstellt!</h3><p>Die Datei <code>'.$setting['config']['folder'] . $setting['config']['file'].'</code> wurder erfolgreich erstellt. </br>Klicken sie bitte auf "Datenbank Tabellen erstellen" um Fortzufahren.  </p><form action="?step=3" method="post"><input type="hidden" name="siteVarsName" value="'.$siteVarsName.'"><input type="hidden" name="siteVarsVal" value="'.$siteVarsVal.'"><input class="button" style="float:right;color:#FFF;width:227px;" type="submit" name="submit" value="Datenbank Tabellen erstellen"></form>';
else
        echo '<h3>ERROR!</h3><p>Konfigurationsdatei konnte nicht erstellt werden. &Uuml;berpr&uuml;fen sie bitte ob der <code>'.$setting['config']['folder'].'</code> Ordner vorhanden ist und gen&uuml;gend Rechte ( <code>777</code> ) vorhanden sind . Klicken sie auf den Button um die Konfigurationsdatei erneut zu erstellen. </p> <a href="?step=1" class="button fail" style="float:left"> <span>&lsaquo; Regenerate Configuration</span> </a>';

        break;
        case 3:

if (file_exists($setting['config']['folder'] . $setting['config']['file'])) {

        echo '<h1>Step 3: Generating Database Tables</h1><br />';
        require $setting['config']['folder'] . $setting['config']['file'];
		
				$siteVarsName = $_POST['siteVarsName']; $siteVarsName = explode ('§', $siteVarsName);
				$siteVarsVal = $_POST['siteVarsVal']; $siteVarsVal = explode ('§', $siteVarsVal);

				$siteVars = array_combine($siteVarsName, $siteVarsVal);

				 
				$create_users = getConnected($conn_mysql_db1)->query("CREATE TABLE IF NOT EXISTS $tb_users  (
                         `name` varchar(100) COLLATE NOCASE,
                         `pw` varchar(100) ,
						 `admin` varchar(1) ,
                         PRIMARY KEY (`name`)
						)");
                        if ($create_users) {
                                echo "<true><b>&raquo;</b> Tabelle $tb_users erfolgreich erstellt.</true></br></br>";
                        } else {
                                echo '<false><b>&raquo;</b> Error! '.$getConnected($conn_mysql_db1)->errorInfo().'</false></br></br>';
                        }

				 $create_originals = getConnected($conn_mysql_db1)->query("CREATE TABLE IF NOT EXISTS $tb_originals  (
                         `c00` varchar(255) ,
                         `c01` text ,
                         `c04` text ,
                         `rating` varchar(100) ,
                         `c06` text ,
                         `c07` text ,
                         `uniqueid_value` varchar(100) UNIQUE ,
                         `c11` text ,
                         `c12` text ,
                         `c14` text ,
                         `c15` text ,
                         `c18` text ,
                         `c21` text ,
                         `actors` text ,
                         `idSet` varchar(100) ,
                         `videocodec` varchar(100) ,
                         `width` varchar(100) ,
                         `height` varchar(100) ,
                         `channels` varchar(100) ,
                         `audiocodec` varchar(255) ,
                         `playCount` varchar(2) ,
						 `dateAdded` text ,
						 `edition` text ,
						 `strStereoMode` varchar(2) ,
						 `idMovie` INTEGER PRIMARY KEY AUTOINCREMENT 
						)");
                        if ($create_originals) {
                                echo '<true><b>&raquo;</b> Tabelle '.$tb_originals.' erfolgreich erstellt.</true></br></br>';
                        } else {
                                echo '<false><b>&raquo;</b> Error! '.$getConnected($conn_mysql_db1)->errorInfo().'</false></br></br>';
                        }						
				  $create_rental = getConnected($conn_mysql_db1)->query("CREATE TABLE IF NOT EXISTS $tb_rental  ( 
						`id` INTEGER PRIMARY KEY AUTOINCREMENT , 
						`uniqueid_value` VARCHAR(100)  , 
						`person` TEXT  ,
						`start_date` TEXT  , 
						`stop_date` TEXT )");
                        if ($create_rental) {
                                echo "<true><b>&raquo;</b> Tabelle $tb_rental erfolgreich erstellt.</true></br></br>";
                        } else {
                                echo '<false><b>&raquo;</b> Error! '.$getConnected($conn_mysql_db1)->errorInfo().'</false></br></br>';
                        }							
						
						
				  $create_tb_settings = getConnected($conn_mysql_db1)->query("CREATE TABLE IF NOT EXISTS " . $tb_settings . " (
                 `name` VARCHAR(50) ,
                 `wert` VARCHAR(50) ,
				  PRIMARY KEY (`name`)
                )");
                        if ($create_tb_settings)
                        {
                                echo "<true><b>&raquo;</b> Tabelle $tb_settings erfolgreich erstellt.</true></br></br>";
                        } else {
                                echo '<false><b>&raquo;</b> Error! '.$getConnected($conn_mysql_db1)->errorInfo().'</false></br></br>';

                        }						

						 foreach ($siteVars as $k => $v) 
						 {
							$query01 = getConnected($conn_mysql_db1)->query("INSERT INTO $tb_settings (`name`, `wert`) VALUES ('$k', '$v')");
						 }
							echo "<true><b>&raquo;</b> SiteConf Werte erfolgreich gesetzt!</true></br></br>";
							
						$INT1 = getConnected($conn_mysql_db1)->query("INSERT INTO $tb_settings (`name`, `wert`) VALUES ('language', 'de')");
						
                        @$sql = getConnected($conn_mysql_db1)->query('INSERT INTO ' . $tb_users . ' (`name`, `pw`, `admin`) VALUES (\'admin\',\''.md5('admin').'\',\'1\');');
                        if($sql) {
                                echo '<true><b>&raquo;</b> Admin account erstellt</true></br></b>';
                        } else {
                                echo '<false><b>&raquo;</b> Error! '.$getConnected($conn_mysql_db1)->errorInfo().'</false></br>';
                        }

    echo '<h3>Gl&uuml;ckwunsch! '.$setting['name'].' wurder erfolgreich erstellt!</h3>';
    echo '<p>Sie k&ouml;nnen den Ordner <code>install</code> nun Umbenennen oder L&ouml;schen</p>';
    echo '<p>Adminaccount: </p>';
    echo '<p>Username: <b>admin</b> Passwort: <b>admin</b></p>';
          echo '<p><a href="'.$setting['after_install'].'" class="button" style="float:right"> <span>'.$setting['finished'].' &rsaquo;</span> </a></p>';
    //}
  } else {
          echo '<p>Configuration file not created. You may have to fill in the database information manually. To do this, simply open phpMyAdmin or another database manager and execute the MYSQL code located in <code>installer-sql.sql</code>.</p>';
  }

        break;
		case 5:
		echo "<p><b>Die Neuinstallation löscht die /include/conf.php und die /include/settings.db</b></p></br>";?>
		<p><a href="?step=5&stat=ok" class="button" style="float:left"> <span>OK &rsaquo;</span> </a></p>
		<p><a href="?step=0" class="button_non" style="float:right"> <span>Abbruch &rsaquo;</span> </a></p>	<?php 
		
		if(@$_REQUEST['stat'] == "ok")
		{ echo "</br></br></br>";
			$file1 = "../include/conf.php";
			$file2 = "../include/settings.db";
			
			if ( @ unlink ( $file1 ) )
			{
				echo "<true><b>&raquo;</b> Die Datei $file1 wurde gel&ouml;scht.</true></br></b> ";
				$f1 = 1;
			} else {
				echo "<false><b>&raquo;</b> Error! Datei $file1 konnte nicht gel&ouml;scht werden.</false></br>";
				$f1 = 0;
			}
			
			if ( @ unlink ( $file2 ) )
			{
				echo "<true><b>&raquo;</b> Die Datei $file2 wurde gel&ouml;scht.</true></br></b> ";
				$f2 = 1;
			} else {
				echo "<false><b>&raquo;</b> Error! Datei $file2 konnte nicht gel&ouml;scht werden.</false></br>";
				$f2 = 0;
			}
			
			if(($f1 == 1) AND ($f2 == 1))
			{ ?>
				<p><a href="?step=0" class="button" style="float:left"> <span><?php echo $setting['name'] ?> installieren &rsaquo;</span> </a></p><?php
			}
		}
		
		

		break;
}

?>

         </div>
        </div>
 <br class="clr" />
  </div>
 <br class="clr" />
   <div id="footer">
    <div class="footer_inner">
&copy; 2012-2021 Andreas Ludwig & RedLabs | THX to Tommy Marshall
        </div>
   </div>

 </body>
</html>