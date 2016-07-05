
 */<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title>Women</title>
    <link href="<?php echo $base_url?>css2/bootstrap.css" rel='stylesheet' type='text/css' media="all" />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo $base_url?>js2/jquery-1.11.0.min.js"></script>
    <!-- Custom Theme files -->
    <link href="<?php echo $base_url?>css2/style.css" rel='stylesheet' type='text/css' media="all" />
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Google Fonts -->
    <link href='http://fonts.useso.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo $base_url?>css2/sticky-navigation.css" />
    <link href="<?php echo $base_url?>css2/demo.css" rel="stylesheet" type="text/css" />
    <script>
$(function() {

    // grab the initial top offset of the navigation
    var sticky_navigation_offset_top = $('#sticky_navigation').offset().top;

    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var sticky_navigation = function(){
        var scroll_top = $(window).scrollTop(); // our current vertical position from the top

        // if we've scrolled more than the navigation, change its position to fixed to stick to top, otherwise change it back to relative
        if (scroll_top > sticky_navigation_offset_top) {
            $('#sticky_navigation').css({ 'position': 'fixed', 'top':0, 'left':0 });
                } else {
            $('#sticky_navigation').css({ 'position': 'relative' });
                }
    };

    // run our function on load
    sticky_navigation();

    // and run it again every time you scroll
    $(window).scroll(function() {
        sticky_navigation();
    });

    // NOT required:
    // for this demo disable all links that point to "#"
    $('a[href="#"]').click(function(event){
        event.preventDefault();
    });

});
    </script>
</head>
<body>
<!-- Header Part Starts Here -->
<div class="header">
    <div class="container">
        <div id="demo_top_wrapper">
            <div id="sticky_navigation_wrapper">
                <div id="sticky_navigation">
                    <div class="demo_container navigation-bar">
                        <div class="navigation">
                            <div class="logo"><a href="index.html">SH</a></div>
                            <span class="menu"></span>
                            <script>
$( "span.menu" ).click(function() {
    $( ".navig" ).slideToggle( "slow", function() {
        // Animation complete.
    });
});
                            </script>
                            <div class="clearfix"></div>
                        </div>
                        <div class="navigation-right">
                            <ul class="user">
                                <li>
                                    <span></span><a href="login.html">Log In</a>
                                </li>
                                <li>
                                    <span class="bascket"></span><a href="bascket.html">Basket(0)</a>
                                </li>
                                <li>
                                    <button class="search"></button>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <div class="serch">
								<span>
									<input type="text" placeholder="Search" required="">
									<input type="submit" value="" />
								</span>
                        </div>
                        <script>
$( "button.search" ).click(function() {
    $( ".serch" ).slideToggle( "slow", function() {
        // Animation complete.
    });
});
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach($query as $value){ ?>
<div  style=" height:380px;width: 1140px;margin-left: 222px;background: white;border: #929292 1px solid;color:#929292;">
    <?php echo form_open('blog/post')?>
    <div style="margin-top: 150px;float: left;margin-right: 150px"><input type="checkbox" name="check<?php echo$value['id'];?>" value="<?php echo$value['id'];?>"/><?php echo$value['goodsname'];?></div>
    <div style="float: left;margin-right: 100px"><img width="380" height="378" src="<?php echo$value['imange'];?>"/></div>
    <div style="float:left;margin-top: 150px ;width: 450px;">
        <h4 style="float:left;width: 115px;margin-right: 20px">商品价格：<b style="color: red">￥<?php echo$value['gooodsmoney'];?></b></h4>
        <h4 style="width: 105px;float: left；margin-right: 20px">商品数量：<b style="color: #929292"><?php echo$value['gooodsmoney'];?></b>
        <h4 style="margin-top:50px;text-align: center"><a href="<?php echo$base_url?>blog/delete/<?php echo$value['id'];?>">删除</a></h4></div>
</div>
<?php } ?>
<input type="submit" value="确认购买" style="color: white;position: fixed;right: 50px;bottom: 0px;color:red; border-radius: 15px"/>
</form>
</body>
