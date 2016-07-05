<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MYHOP 管理中心 - 商品分类 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo $base_url?>css1/general.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $base_url?>css1/main.css" rel="stylesheet" type="text/css" />
<script type = 'text/javascript' src = '<?php echo $base_url?>js1/jquery-1.4.2.min.js'></script>
</head>
<body>

<h1>
<span class="action-span"><a href="<?php echo $base_url?>admin/cateadd">添加分类</a></span>
<span class="action-span1"><a href="#">MYSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品分类 </span>
<div style="clear:both"></div>
</h1>
<form method="post" action="" name="listForm">
<div class="list-div" id="listDiv">
  <h1  style="color: red;text-align: center;font-size: 20px;">分类名称</h1>
  <table><tr>
<?php
//var_dump($cate_list);

foreach($cate_list as $key=>$value){
if($value !=''){
    //var_dump($value);
    echo '<td  style="border: white 2px inset; float: left;width: 50px;list-style: none;text-align: center; color: #16a085 ">' . $value . '</td>';
}}
?></tr></table>
</div>
</form>

</body>
</html>