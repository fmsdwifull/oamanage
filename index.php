<?php

define('IN_ADMIN',True);
require_once('include/common.php');
get_login($_USER->id);
header('Location: desktop.php');
exit;
?>