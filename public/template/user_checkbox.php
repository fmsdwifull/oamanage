<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>系统信息选择</title>
  
    <link href="template/default/usertree/css/tree_user.css" rel="stylesheet" type="text/css" />
    <link href="template/default/usertree/sample-css/page.css" rel="stylesheet" type="text/css" />
    
    <style type="text/css">
    body {
		color:#000; /* MAIN BODY TEXT COLOR */
		font-family:"Lucida Grande","Lucida Sans Unicode",Arial,Verdana,sans-serif; /* MAIN BODY FONTS */
		}
		.demo{
      float:left;
      width:320px;
    }
    .docs{
      margin-left: 265px;
    }
    a.button{
      font-size: 0.8em;
      margin-right: 4px;
    }
	input.BigButtonBHover{width:84px;height:30px;height:27px !important;padding-bottom:3px;color:#000000;background:url("template/default/content/images/big_btn_b.png") no-repeat;border:0px;cursor:pointer;font-size:12pt;background-position:0 -30px;}
input.BigButtonB{width:84px;height:30px;height:27px !important;padding-bottom:3px;color:#36434E;background:url("template/default/content/images/big_btn_b.png") no-repeat;border:0px;cursor:pointer;font-size:12pt;}
input.BigButtonB:hover{background-position:0 -30px;}
.big3   { font-size: 12pt;COLOR: #124164;FONT-WEIGHT: bold;}
    </style>
    <meta charset="UTF-8" />
</head>
<body>
  <div style="padding:10px;"> 
  <div class="demo">
    <div style="margin-bottom:5px; margin-left:10px;">
		<img src="template/default/content/images/notify_new.gif" align="absmiddle"><span class="big3"> 人员信息选择</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" value="确 定" class="BigButtonBHover" id="showchecked">

    </div>
    <div style="border-bottom: #c3daf9 1px solid; border-left: #c3daf9 1px solid; width: 320px; height: 450px; overflow: auto; border-top: #c3daf9 1px solid; border-right: #c3daf9 1px solid;">
        <div id="tree">
            
        </div>
        
    </div>
  </div>
  </div>
    <script src="template/default/usertree/src/jquery.js" type="text/javascript"></script>
    <script src="template/default/usertree/src/Plugins/jquery.user.js" type="text/javascript"></script>
	    <script type="text/javascript">
         var userAgent = window.navigator.userAgent.toLowerCase();
        $.browser.msie8 = $.browser.msie && /msie 8\.0/i.test(userAgent);
        $.browser.msie7 = $.browser.msie && /msie 7\.0/i.test(userAgent);
        $.browser.msie6 = !$.browser.msie8 && !$.browser.msie7 && $.browser.msie && /msie 6\.0/i.test(userAgent);
        function load() {        
            var o = { showcheck: true
            //onnodeclick:function(item){alert(item.text);},        
            };
            o.data = treedata;                  
            $("#tree").treeview(o);            
            $("#showchecked").click(function(e){
                var s=$("#tree").getCheckedNodes();
                if(s !=null){
				jQuery.ajax({
					  type: 'GET',
					  url: 'admin.php?ac=<?php echo $ac?>&fileurl=<?php echo $fileurl?>&do=add&value='+s.join(",")+'date='+new Date(),
					  success: function(data){
					  //alert(data);
					  var datas=data.split("|"); //字符分割     
					  window.opener.document.save.<?php echo $_GET[inputname]?>.value=datas[0];
					  window.opener.document.save.<?php echo $_GET[inputname]?>phone.value=datas[1];
					  window.opener.document.save.<?php echo $_GET[inputname]?>id.value=datas[2];
					  window.close();
					  }
				   });
				
                }else{
					alert("您没有选择任何东西");
				}
            });
             $("#showcurrent").click(function(e){
                var s=$("#tree").getCurrentNode();
                if(s !=null)
                    alert(s.text);
                else
                    alert("您没有选择任何东西");
             });
        }   
        if( $.browser.msie6)
        {
            load();
        }
        else{
            $(document).ready(load);
        }
		function createNode(){
		  var root = {
			"id" : "0",
			"text" : "<?php echo $_CONFIG->config_data('name');?>",
			"value" : "",
			"showcheck" : false,
			complete : true,
			"isexpand" : true,
			"checkstate" : 0,
			"hasChildren" : true
		  };
		  var arr = [];
		  <?php 
		  global $db;
		  $query = $db->query("SELECT * FROM ".DB_TABLEPRE."department where father='0' ORDER BY id Asc");
		  $html='';
		  while ($row = $db->fetch_array($query)) {
		  	$blog = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."department where father='".$row['id']."'   ORDER BY id Asc");
			$user = $db->fetch_one_array("SELECT * FROM ".DB_TABLEPRE."user WHERE departmentid  LIKE '%,".$row['id'].",%'");
		    $html.= 'arr.push( {'.chr(13).chr(10);
			$html.= ' "id" : "'.$row['id'].'",'.chr(13).chr(10);
			$html.= '  "text" : "'.$row['name'].'",'.chr(13).chr(10);
			$html.= '  "value" : "department",'.chr(13).chr(10);
			$html.= '  "showcheck" : true,'.chr(13).chr(10);
			$html.= '  complete : true,'.chr(13).chr(10);
			$html.= '  "isexpand" : false,'.chr(13).chr(10);
			$html.= '  "checkstate" : 0,'.chr(13).chr(10);
			if($blog['id']!='' || $user['id']!=''){
				$html.= '  "hasChildren" : true,'.chr(13).chr(10);
				$html.= '  "ChildNodes" : subarr'.$row[id].''.chr(13).chr(10);
			}else{
				$html.= '  "hasChildren" : false'.chr(13).chr(10);
			}
			$html.= '});'.chr(13).chr(10);
			if($blog['id']!='' || $user['id']!=''){
				echo  'var subarr'.$row['id'].' = [];'.chr(13).chr(10);
				if($blog['id']!=''){
					dep_data($row['id'],$userview);
				}
				if($user['id']!=''){
					dep_data_user($row['id'],$userview);
				}
			}
			//if($user['id']!=''){
				//echo  'var subarr'.$row['id'].' = [];'.chr(13).chr(10);
				//dep_data_user($row['id']);
			//}
			
		}
		echo $html;
		  ?>
		  root["ChildNodes"] = arr;
		  return root; 
		}
		
		//treedata = [createNode()];
		treedata = [createNode()];
    </script>

</body>
</html>