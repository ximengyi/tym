 <?php
use app\common\services\UrlService;
 ?>

<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>编程浪子微信图书商城</title>
    <link href="/css/www/app.css" rel="stylesheet"></head>
<body>
<div class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-collapse collapse pull-left">
            <ul class="nav navbar-nav ">
                <li><a href="http://www.xixiaomo.com/">首页</a></li>
                <li><a target="_blank" href="http://ximengyi.github.io/">博客</a></li>
                <li><a href=<?=UrlService::buildWebUrl("/user/login");?>>管理后台</a></li>
                <li><?=UrlService::buildWebUrl("/user/login");?></li>
            </ul>
        </div>
    </div>
</div>


<?=$content;?>



</body></html>
