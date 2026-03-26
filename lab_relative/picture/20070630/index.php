<?php
if ($handle = opendir('.')) {
    while (false !== ($file = readdir($handle))) {
        if (preg_match("/\.JPG$/i", $file)) {
            echo "<a href='$file' target='_blank'><img src='$file' width='300' border='0'></a>\n";
        }
    }
    closedir($handle);
}
?> 