<?php
 
!defined('IN_TOA') && exit('Access Denied!');
//
function workbench_registadd($rid,$hour,$number,$type){
		global $_USER;
  		$registration_log = array(
			'rid' => $rid,
			'hour' => $hour,
			'number' => $number,
			'type' => $type
		);
		insert_db('registration_log',$registration_log);
		return ;
}
?>