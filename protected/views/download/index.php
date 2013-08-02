<?php
    header ("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header('Content-Type: application/octetstream');
    header("Content-Transfer-Encoding: Binary");
    header("Content-length: ".filesize($filePath));
    header("Content-disposition: attachment; filename=\"".$name."\"");
    ob_clean();
    flush();
    readfile("$filePath");                
    exit;
?>
