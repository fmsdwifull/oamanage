<?php

header("Content-type:application/octet-stream");
header("Accept-Ranges:bytes");
header("Content-transfer-encoding: binary");
header("Content-Type:application/force-download");
header("Content-Disposition:inline;filename=".iconv("UTF-8","GB2312",$_GET['filename']));
header("Accept-Length:".filesize($_GET['urls']));
readfile($_GET['urls']);
?>
 