<?php

$setting = Array(

        // Configuration settings to the folder you want the configuration file created
        // and the folder to within it should be created.
        'config'                =>        Array (
                'folder'        =>        '../include/',
				'folder1'        =>        '../thumb/',
                'file'          =>        'conf.php'
                ),

        // Change function connect() (Lines 40 and 41) databa constants to match values below.
				'database'            =>        Array (
                'name'                => 'DB_NAME',
                'user'                => 'DB_USER',
                'pass'                => 'DB_PASS',
                'host'                => 'DB_HOST'
                ),

        // You can change these settings to mee what you need, then modify the requirements
        // on line 30.
        'requirements'       		 =>        Array (
                'php'                =>        '7.0'
                ),
		//versions for db updates	
        'versions'       		 =>        Array (
                '1.5'                =>        '0'
				),

        // General application settings
        'name'                     	=>        ' Kodi WebView',
        'finished'                	=>        'Login Now',
        'after_install'        		=>        '../index.php'
        );
				
				function getConnected($db) 
				{
					include ('../include/conf.php');

						$dbh = new PDO('sqlite:../include/'.$db_file);
						$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					return $dbh;																								
				}

?>