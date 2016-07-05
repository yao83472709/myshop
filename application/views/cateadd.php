<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MYCSHOP 管理中心 - 添加分类 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo $base_url?>css1/general.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $base_url?>css1/main.css" rel="stylesheet" type="text/css" />
</head>
<body>

<h1>
<span class="action-span"><a href="<?php echo $base_url?>admin/catelist">商品分类</a></span>
<span class="action-span1"><a href="#">MYSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加分类 </span>
<div style="clear:both"></div>
</h1>
<?php echo form_open('admin/cateadd'); ?>
<div class="main-div">
  <table width="100%" id="general-table">
      <tr>
        <td class="label">分类名称:</td>
        <td>
          <input type='text' name='cat_name' maxlength="20" value="<?php echo set_value('username'); ?>" size='27' /> <font color="red">*</font>
        </td>
          <td>
              <?php echo form_error('cat_name', '<font color="red">', '</font>'); ?>
          </td>
      </tr>
      </table>
      <div class="button-div">
      <input type="submit" value=" 确定 " />
      </div>
    <input type="hidden" name="act" value="insert" />
    <input type="hidden" name="old_cat_name" value="" />
    <input type="hidden" name="cat_id" value="" />
</div>
</form>
</body>
</html>