<?php
if ( $ver == "beta3")
{
	echo $lang['update_for']." BETA3";
	echo ' - <a href="./index.php?area=admin&update=1">Starten</a></br></br>';

	if (@$_REQUEST['update'] == "1")
	{
		$INTupdate = getConnected($conn_mysql_db1)->query("ALTER TABLE `$tb_originals` ADD `dateAdded` text NOT NULL");
		if ($INTupdate)
         { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&result=true#update"><?php }
	}
}
if ( $ver == "0.9.6")
{
	echo $lang['update_for']." 0.9.6";
	echo ' - <a href="./index.php?area=admin&update=1">Starten</a></br></br>';

	if (@$_REQUEST['update'] == "1")
	{
		$INTupdate = getConnected($conn_mysql_db1)->query("INSERT INTO $tb_settings (`name`, `wert`) VALUES ('HighlightColor', '#B40404')");
		if ($INTupdate)
         { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&result=true#update"><?php }
	}
}
if ( $ver == "0.9.7")
{
	echo $lang['update_for']." 0.9.7";
	echo ' - <a href="./index.php?area=admin&update=1">Starten</a></br></br>';

	if (@$_REQUEST['update'] == "1")
	{
		$INTupdate1 = getConnected($conn_mysql_db1)->query("ALTER TABLE `$tb_originals` ADD `edition` text NOT NULL");
		$INTupdate2 = getConnected($conn_mysql_db1)->query("ALTER TABLE `$tb_originals` ADD `strStereoMode` varchar(2) NOT NULL");
		if (($INTupdate1) && ($INTupdate2))
         { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&result=true#update"><?php }
	}
}
if ( $ver == "0.9.8")
{
	echo $lang['update_for']." 0.9.8";
	echo ' - <a href="./index.php?area=admin&update=1">Starten</a></br></br>';

	if (@$_REQUEST['update'] == "1")
	{
		$INTupdate = getConnected($conn_mysql_db1)->query("INSERT INTO $tb_settings (`name`, `wert`) VALUES ('language', 'de')");
		if ($INTupdate)
         { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&result=true#update"><?php }
	}
}

if ( $ver == "0.9.9")
{
	echo $lang['update_for']." 0.9.9";
	echo ' - <a href="./index.php?area=admin&update=1">Starten</a></br></br>';

	if (@$_REQUEST['update'] == "1")
	{
		$INTupdate = getConnected($conn_mysql_db1)->query("ALTER TABLE `$tb_originals` CHANGE `c09` `uniqueid_value` CHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL");
		$INTupdate = getConnected($conn_mysql_db1)->query("ALTER TABLE `$tb_originals` CHANGE `c05` `rating` CHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL");
		if ($INTupdate)
         { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&result=true#update"><?php }
	}
}
if ( $ver == "1.2.0")
{
	echo $lang['update_for']." 1.2.0";
	echo ' - <a href="./index.php?area=admin&update=1">Starten</a></br></br>';

	if (@$_REQUEST['update'] == "1")
	{
		$INTupdate = getConnected($conn_mysql_db1)->query("ALTER TABLE ``$tb_originals` ` ADD `idMovie` INT(100) NOT NULL AUTO_INCREMENT AFTER `strStereoMode`, ADD UNIQUE (`idMovie`);");
		if ($INTupdate)
         { ?><meta http-equiv="refresh" content="0; URL=./index.php?area=admin&result=true#update"><?php }
	}
}

