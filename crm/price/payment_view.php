<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<link rel="stylesheet" type="text/css" href="template/default/content/css/style.css">
<script src="template/default/tree/js/admincp.js?SES" type="text/javascript"></script>
<title>Office 515158 2011 OA办公系统</title>
</head>
<body class="bodycolor">
<div id="navPanel">
<div id="navMenu" style="padding-left:50px;">
<a href="admin.php?ac=<?php echo $ac;?>&fileurl=<?php echo $fileurl;?>" ><span><img src="template/default/content/images/p3.gif" width="16" height="16" align="absmiddle">付款列表</span></a>
<a href="admin.php?ac=<?php echo $ac;?>&fileurl=<?php echo $fileurl;?>&do=edit&id=<?php echo $view['id'];?>"><span><img src="template/default/content/images/p2.gif" width="16" height="16" align="absmiddle">付款编辑</span></a>
<a href="admin.php?ac=<?php echo $ac;?>&fileurl=<?php echo $fileurl;?>&do=view&id=<?php echo $view['id'];?>" class="active"><span><img src="template/default/content/images/p4.gif" width="16" height="16" align="absmiddle">付款查看</span></a>

<a href="#" onClick="window.open ('admin.php?ac=public&do=crmlog&fileurl=crm&viewid=<?php echo $view['id'];?>&modid=crm_payment', '<?php echo $view['id'];?>', 'height=600, width=600, top=50, left=150, toolbar=no, menubar=no, scrollbars=yes, resizable=yes,location=no, status=no')"><span><img src="template/default/images/admin_img/detail.png" width="16" height="16" align="absmiddle">操作记录</span></a>
</div>
<div id="search" style="float: right; padding-right:100px;">
	
	<input type="button" value="新增付款" class="BigButtonBHover" onClick="javascript:window.location='admin.php?ac=<?php echo $ac;?>&do=add&fileurl=<?php echo $fileurl;?>'">


 
</div>
</div>



<div style="position:absolute; height:90%; width:100%;overflow:auto"> 
<table class="TableBlock" border="0" width="95%" align="center" style="margin-top:20px;">
<tr>
      <td nowrap class="TableHeader" colspan="4">基本信息</td>
    </tr>
	<tr>
      <td nowrap class="TableContent" width="15%"> 
        付款编号：</td>
      <td class="TableData" width="35%"><?php echo $view['number'];?></td>
      <td class="TableContent" width="15%"> 付款名称：</td>
      <td class="TableData" width="35%"><?php echo $view['title'];?>
       </td>
    </tr>
	<tr>
      <td nowrap class="TableContent">业务人员：</td>
      <td class="TableData"><?php echo $view['user'];?></td>
      <td class="TableContent">金额:</td>
      <td class="TableData">
	 <?php echo $view['price'];?>
      </td>
    </tr>
	<tr>
      <td nowrap class="TableContent">客户名称：</td>
      <td class="TableData">
	  <?php
	  if($view['sid']!=''){
		  echo public_value('title','crm_supplier','id='.$view['sid']);
	  }
	  ?></td>
      <td class="TableContent">采购单:</td>
      <td class="TableData">
	 <?php
	 if($view['perid']!=''){
		 echo public_value('title','crm_purchase','id='.$view['perid']);
	 }
	  ?>
      </td>
    </tr>
</table>
<?php
//引入表单
form_view('付款信息','crm_payment',$view['id']);
//引入编辑器
form_view_eweb('crm_payment',$view['id']);
//引入流程
if($_flow==1){
	echo crm_flow_view($view['id'],'crm_payment');
}
?>

</div> 
</form>

 
</body>
</html>
