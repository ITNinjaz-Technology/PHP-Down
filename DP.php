<?php
/*-----------------INFORMATION & LICENSING-----------------
 *           AUTHOR: Christopher Sparrowgrove
 *          WEBSITE: https://github.com/nam2long/DP-PHP
 *             DATE: January 11, 2014
 *             NAME: Dynamic Page - PHP (Ver 3.0.0.3680)
 *      DESCRIPTION: This script calls pages dynamicly based on what the user requests.
 *          LICENSE: GNU GENERAL PUBLIC LICENSE (Ver 2.0)  
 */

//include ('config/config.php'); //Configuration File

/////**DO NOT EDIT BELOW THIS LINE UNLESS YOU KNOW WHAT YOU ARE DOING**/////
//CONFIG SCRIPT
$file['pages'] = scandir($file['directory'], 0); //Scan 'directory' for all avilable pages.
unset($file['pages'][0], $file['pages'][1]); //SECURITY: Prevents Directory Traversal Attack

//START
if (isset($_GET['p']) & (in_array($_GET['p'].$file['extention'], $file['pages'])))  
{
   $request = $_GET['p'];
   	echo 'hello';
   	include($file['directory']."/".$request.$file['extention']); 
}
else 
{
    $request = $_GET['p'];  
    	switch ($request) {
        	case !in_array($request.$file['extention'], $file['pages']):
            	include($file['directory']."/error/".$file['errorpage'].$file['extention']); 
            	break;
        	case (is_null($request)):
            	include($file['directory']."/".$file['homepage'].$file['extention']); 
            	break;
        	default:
            	include($file['directory']."/".$file['homepage'].$file['extention']); 
           	 break;
    	}
}
?>
