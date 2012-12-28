<?php

define('AppRoot', dirname(dirname(dirname(__FILE__))));
include_once("../config/config.php");

$basefolder = "./formdesigns";
if ($handle = opendir($basefolder)) {

echo "<table border='0px'>";
    while (false !== ($entry = readdir($handle))) {
        echo "<tr>";
        if ($entry != "." && $entry != ".." && $entry != ".svn") {
            $ch = curl_init(AppAdminDirUrl . "formcreate.php?designfile=$entry");
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_FAILONERROR, 1);
            curl_setopt($ch, CURLOPT_NOPROGRESS, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_VERBOSE, 1);
            $output = curl_exec($ch);
            curl_close($ch);

            echo "<td>".$entry ."</td>";
            echo "<td>=====>  ".$output . "</td>";
        }
        echo "</tr>";
    }

echo "</table>";

    closedir($handle);
}
?>
