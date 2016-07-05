<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台登录</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="<?php echo $base_url?>css1/style.css" />
<style>
body{height:100%;background:#16a085;overflow:hidden;}
canvas{z-index:-1;position:absolute;}
</style>
<script src="<?php echo $base_url?>js1/jquery.js"></script>
<script src="<?php echo $base_url?>js1/verificationNumbers.js"></script>
<script src="<?php echo $base_url?>js1/Particleground.js"></script>
    <script>
        $(document).ready(function() {
            //粒子背景特效
            $('body').particleground({
                dotColor: '#5cbdaa',
                lineColor: '#5cbdaa'
            });
            //验证码
            createCode();
            //测试提交，对接程序删除即可
            $(".submit_btn").click(function(){
                location.href="index.html";
            });
        });
    </script>
</head>
<body>
<dl class="admin_login">

 <dt>
     <strong>站点后台管理系统</strong>
  <em>Management System</em>
 </dt>
    <?php echo form_open('admin/login'); ?>
 <dd class="user_icon">
  <input type="text" placeholder="账号" class="login_txtbx" value="<?php echo set_value('username'); ?>" name="username"/>
 </dd><?php echo form_error('username', '<font color="red">', '</font>'); ?>
 <dd class="pwd_icon">
  <input type="password"  name="password" placeholder="密码" class="login_txtbx" value="<?php echo set_value('password'); ?>"/>
 </dd><?php echo form_error('password', '<font color="red">', '</font>'); ?>
 <dd>
  <input type="submit" value="立即登陆" class="submit_btn"/>
 </dd>
    </form>
</dl>
</body>
</html>
