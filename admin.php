<?php
define('IN_ADMIN',True);
require_once('include/common.php');
get_login($_USER->id);
if(!is_superadmin()){
	if ($_CONFIG->config_data('opendate')<=get_date('H',PHP_TIME) && $_CONFIG->config_data('enddate')<=get_date('H',PHP_TIME)){
		exit('对不起，系统被管理员关闭，开启时间为'.$_CONFIG->config_data('opendate').'点到'.$_CONFIG->config_data('enddate').'点');
	}else{
		if ($_CONFIG->config_data('configflag')=='0'){
			exit('对不起，系统被管理员关闭，请联系管理员！<br>关闭原因：'.$_CONFIG->config_data('closereason'));
		}
	}
}
 
if ($_GET[fileurl]!=""){
	$fileurl=$_GET[fileurl];
  }else{
	$fileurl="home";
  }
define('ADMIN_ROOT', TOA_ROOT.$fileurl.'/');
initGP(array('ac','do'));
empty($ac) && $ac = 'index';
if ( !eregi('[a-z_]', $ac) ) $ac = 'index';

//接收第三方插件
if($fileurl=="ilohamail"){
echo '<script>location.href="'.$ac.'?oausername='.$_GET[oausername].'";</script>';
exit;
}
$sqladmin = "SELECT hometype FROM ".DB_TABLEPRE."user_view  WHERE uid='".$_USER->id."'";
$bgusers = $db->fetch_one_array($sqladmin);
//处理桌面，以个人设定为先
if($bgusers['hometype']!=''){
	$hometype=$bgusers['hometype'];
}else{
	$hometype=$_CONFIG->config_data('home');
}
//新框架转接
if($fileurl=="home"){
	if($hometype==1){
		echo '<script>location.href="desktop.php?'.get_date('YmdHis',PHP_TIME).'";</script>';
	}else{
		echo '<script>location.href="desktop.php?'.get_date('YmdHis',PHP_TIME).'";</script>';
	}
	exit;
}
if ( file_exists('include/function_'.$fileurl.'.php') ) {
	require_once('include/function_'.$fileurl.'.php');
}
if ( file_exists(ADMIN_ROOT."mod_{$ac}.php") ) {
		require_once(ADMIN_ROOT.'./mod_'.$ac.'.php');
	} else {
		exit;
}

?>
