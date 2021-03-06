<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>信息操作页面</title>
<link type="text/css" media="screen" charset="utf-8" rel="stylesheet" href="template/default/content/css/style.account-1.1.css" />
<link charset="utf-8" rel="stylesheet" href="template/default/content/css/personal.record-1.0.css" media="all" />
<style type="text/css"> 
.tip-faq{
	clear:both;
	margin-top:0px;
}
#J-table-consume{
	margin-bottom:40px;
}
.ui-form-tips .m-cue{
	 background-position: -27px -506px;
	 *background-position: -27px -505px;
}
#J-set-date a{
	font-family:宋体;
}
.BigButtonBHovers{width:84px;height:30px;height:27px !important;padding-bottom:3px;color:#000000;background:url("template/default/content/images/big_btn_b.png") no-repeat;border:0px;cursor:pointer;font-size:12pt;background-position:0 -30px;}

</style>
<script type="text/javascript" charset="utf-8" src="template/default/content/js/arale.js"></script>
<script charset="utf-8" src="template/default/content/js/recordIndex.js?t=20110523"></script>
<script language="javascript" type="text/javascript" src="template/default/js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="template/default/content/js/common.js"></script>
<script type="text/javascript"> 
E.onDOMReady(function() {

	record = new AP.widget.Record({
		dom: {
			queryForm : "queryForm",
			searchForm : "topSearchForm",
			keyword : "J-keyword",
			keywordType : "J-keyword-type"
		}
	});

	//切换高级筛选状态
	E.on('J-filter-link', 'click', record.switchFilter);
});

</script>
</head>
<!--[if lt IE 7]><body class="ie6"><![endif]--><!--[if IE 7]><body class="ie7"><![endif]--><!--[if IE 8]><body class="ie8"><![endif]--><!--[if !IE]><!--><body><!--<![endif]-->
<div id="container" class="ui-container">
 
<div id="content" class="ui-content fn-clear" coor="default" coor-rate="0.02">
	<div class="ui-grid-21" coor="content">
		<div class="ui-grid-21 ui-grid-right record-tit" coor="title">
			<h2 class="ui-tit-page">账号信息列表</h2>
			
			<div class="record-tit-amount">
				<p>总共有<span class="number"><?php echo public_number('user')?></span>条数据
              </p>
			</div>
		</div>
		
		<!-- 过滤表单 -->
		<form method="get" action="admin.php" name="topSearchForm" class="ui-grid-21 ui-grid-right ui-form">
		<input type="hidden" name="ischeck" value="<?php echo $ischeck?>" />
		<input type="hidden" name="ac" value="<?php echo $ac?>" />
		<input type="hidden" name="do" value="list" />
		<input type="hidden" name="fileurl" value="<?php echo $fileurl?>" />
		<div class="ui-grid-21 ui-grid-right record-search">
		
			<div id="J-advanced-filter-option" class="">
				<div class="record-search-time fn-clear">
					<div class="ui-form-item ui-form-item-time">
						<label class="ui-form-label" for="J-start">用户名：</label>
						<div class="ui-form-content">
							<input type="text" value="<?php echo urldecode($username)?>" name="username" class="ui-input i-date" id="J-start">
						</div>
						
						<label class="ui-form-label" for="J-start">姓名：</label>
						<div class="ui-form-content">
							<input type="text" value="<?php echo urldecode($name)?>" name="name" class="ui-input i-date" id="J-start">
						</div>
						
						<label class="ui-form-label" for="J-start">部门：</label>
						<div class="ui-form-content">
							<select name="department" class="BigStatic">
						  <option value="" selected="selected"></option>
						 <?php echo get_realdepalist(0,$department,0)?>
						  </select>
						</div>
						
						<label class="ui-form-label" for="J-start">权限组：</label>
						<div class="ui-form-content">
							<select name="usergroup" class="BigStatic">
						  <option value="" selected="selected"></option>
						 <?php echo get_grouplist($usergroup)?>
							</select>
						</div>
						
						
						<div class="submit-time-container ">
							<div class="submit-time ui-button ui-button-sorange">
								<input type="submit" class="ui-button-text"id="J-submit-time" value="查 找"/>
							</div>
						</div>
						
					</div>
			  </div>
			</div>
		</div><!-- .record-search -->
		</form>
 

		<div class="ui-grid-21 ui-grid-right fn-clear" coor="total">
		                                <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td width="91%">
											<?php echo showpage($num,$pagesize,$page,$url)?></td>
                                            <td width="9%" align="right" style="padding-right:10px;"><input type="button" value="新增账号" class="BigButtonBHover" onClick="javascript:window.location='admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=add'"></td>
                                          </tr>
                                        </table>
		  
										

	  </div>
	</div>
	
	<form name="excel" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
		<input type="hidden" name="username" value="<?php echo urldecode($username)?>" />
		<input type="hidden" name="name" value="<?php echo urldecode($name)?>" />
        <input type="hidden" name="department" value="<?php echo $_GET[department]?>" />
        <input type="hidden" name="usergroup" value="<?php echo $_GET[usergroup]?>" />
		<input type="hidden" name="ischeck" value="<?php echo $_GET[ischeck]?>" />
		<input type="hidden" name="do" value="excel" />
		</form>
	<form name="update" method="post" action="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>">
		<input type="hidden" name="do" value="update" />
		<div class="ui-grid-21 ui-grid-right fn-clear" id="J-table-consume" coor="consumelist">
			<div class="ui-tab">
												<div class="ui-tab-trigger"> 
					<ul class="fn-clear"> 
<li class="ui-tab-trigger-item<?php echo $_check['ischeck']?>">
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>" class="ui-tab-trigger-text">账户列表</a></li>						
<li class="ui-tab-trigger-item<?php echo $_check['ischeck1']?> "><a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=1" class="ui-tab-trigger-text">正常账户</a></li>
<li class="ui-tab-trigger-item<?php echo $_check['ischeck2']?> "><a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&ischeck=0" class="ui-tab-trigger-text">禁用账户</a></li>	
</ul>
				</div>
 
				<div class="ui-tab-container" id="myScene">
					<div class="ui-tab-container-item ui-tab-container-item-current">
						<table id="tradeRecordsIndex" class="ui-table">

							<thead>
								<tr>
									<th class="checkbox">
									<input type="checkbox" class="checkbox" value="1" name="chkall" onClick="check_all(this)" /></th>
									<th class="checkbox">排序</th>
									<th class="title">用户名</th>
									<th class="name">姓名</th>
									<th class="status">状态</th>
									<th class="info">允许登录IP</th>
									<th class="info">岗位</th>
									<th class="info">所属部门</th>
									<th class="action">操作</th>
								</tr>
							</thead>
							
							
							
							
							<tbody>
<?foreach ($result as $row) {?>
																																								
<tr <?php if($result%2==0){?>class="split" <?php }?>>
<td class="checkbox"><input type="checkbox" name="id[]" value="<?php echo $row['id']?>" <?php echo ($row['flag'] == '1' ? 'disabled="disabled"' : '')?> class="checkbox" /></td>
<td class="checkbox"><input name="numbers[<?php echo $row['id'];?>]" type="text" style="width:30px;" value="<?php echo $row['numbers']?>" /></td>

<td class="title">
<ul><li class="name"><?php echo $row['username']?></li>
<li class="no J-bizNo">	<?php echo get_groupname($row['groupid'])?></li></ul>
</td>
<td class="name"><?php echo $row['name']?></td>
<td class="status">
<span class="amount-pay amount-pay-out"><?php
if($row['ischeck']=='1'){
echo '正常';
}else{
echo '<font color=red>禁用</font>';
}
?></span></td>
<td class="info"><?php echo $row['loginip']?></td>
<td class="info"><?php echo get_postname($row['positionid'])?></td>
<td class="info"><?php echo get_realdepaname($row['departmentid'])?></td>
<td class="action" >
<? if($row['flag'] != '1' || is_superadmin()!=''){?>
<a href="admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=add&id=<?php echo $row['id']?>">编辑</a>
<? }?>
</td>
									
</tr>
<?}?>			
																									
</tbody>
		</table>
 
											</div>
					
					<div class="fn-clear">
						<!-- 图释 -->
					  <div class="iconTip fn-left" style="padding-left:15px;">
					<input type="checkbox" class="checkbox" value="1" name="chkall" onClick="check_all(this)" /> 全选 &nbsp;&nbsp;&nbsp;<input type="submit" name="do" id="button" class="BigButtonBHovers" value="排 序"/>&nbsp;&nbsp;<input type="submit" name="do" id="button" class="BigButtonBHovers" value="删 除"/>&nbsp;&nbsp;<input type="button" name="do" id="button" class="BigButtonBHovers"  onClick="javascript:document:excel.submit();" value="导出数据"/>
					&nbsp;&nbsp;<input type="button" name="do" id="button" class="BigButtonBHovers"  onClick="javascript:window.location='admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=exceladd'" value="导入数据"/>
						  <!--<a class="ico-rmb"><span>导出数据</span></a>
						  <a href="javascript:document:excel.submit();">导出数据</a>
						  &nbsp;
						  <a class="js-add-contact"><span></span></a>
						  <a href="javascript:document:update.submit();">删除数据</a> -->
</div>
						
												<div class="page page-nobg fn-right">
							<span class="page-link"><?php echo showpage($num,$pagesize,$page,$url)?></span>
						</div>
						<!-- /分页 -->
											</div>
				</div>
			</div>
 
		
		</div>
		<!-- /交易记录-->
 </form>		
	</div>
 
 
	
</div>


</div>

                            

</body>
</html>
 

