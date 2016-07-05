<!-- $Id: goods_info.htm 17126 2010-04-23 10:30:26Z liuhui $ -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>MYSHOP 管理中心 - 添加新商品 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo $base_url?>css1/general.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $base_url?>css1/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
function charea(a) {
    var spans = ['general','detail','mix'];
    for(i=0;i<3;i++) {
        var o = document.getElementById(spans[i]+'-tab');
        var tb = document.getElementById(spans[i]+'-table');
        o.className = o.id==a+'-tab'?'tab-front':'tab-back';
        tb.style.display = tb.id==a+'-table'?'block':'none';
    }
}
</script>
</head>
<body>
<h1>
<span class="action-span"><a href="<?php echo $base_url?>admin/goodslist">商品列表</a></span>
<span class="action-span1"><a href="<?php echo $base_url?>admin">MYSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 添加新商品 </span>
<div style="clear:both"></div>
</h1>
        <!-- 最大文件限制 -->
        <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
        <!-- 通用信息 -->
        <table width="90%" id="general-table" align="center">
            <tr>
                <td class="label">上传商品图片：
                </td>
                <td>
                    <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('admin/goodsadd');?>
                    <input type="file" name="goods_img" size="35" />
                </td>
            </tr>
          <tr>
            <td class="label">商品名称：</td>
            <td>
                <input type="text" name="goods_name" value="" style="float:left;color:;" size="30" />
            </td>
          </tr>
          <tr>
            <td class="label">商品分类：</td>
            <td><select name="cat_id"  >
                    <?php
                   // var_dump($cate_list);

                    foreach($cate_list as $key=>$value)
                        if($value !=''){
                            echo '<option>' . $value . '</option>';
                        }
                    ?></select>
             </td>
          </tr>
                   <tr>
            <td class="label">售价：</td>
            <td><input type="text" name="shop_price" value="0" size="20" /></td>
          </tr>
            <tr>
                <td class="label">数量：</td>
                <td><input type="text" name="shop_price" value="0" size="20" /></td>
            </tr>
          <tr style="margin: auto">
              <td style="position:absolute;left:490px;width:195px;float: left "><b>商品描述：&nbsp;</b></td>
            <td ><textarea name="goods_desc" ></textarea></td>
          </tr>
        </table>
        <div class="button-div">
          <input type="hidden" name="goods_id" value="0" />
                    <input type="submit" value=" 确定 " class="button" />
        </div>
        <input type="hidden" value="insert" />
      </form>
    </div>
</div>
<!-- end goods form -->

</body>
</html>