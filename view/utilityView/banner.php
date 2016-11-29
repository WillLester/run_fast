<?php
/**
 * Created by PhpStorm.
 * User: Lester
 * Date: 2016/11/9
 * Time: 8:25
 */
require_once ("bannerView.php");
$bannerView = new BannerView();
?>
<!DOCTYPE html>
<html lang="en">
<body>
<link rel="stylesheet" type="text/css" href="../../assets/css/common.css">
<header class="header" role="banner">
    <div class="container">
        <img class="head-logo" src="../../image/run_icon-50x50.png">
        <div class="head-menu">
            <nav class="head-nav">
                <a class="nav-item <?php if($bannerView->getSelected() == "index.php"){echo "nav-selected";}  ?>" href="/view/index.html">主页</a>
                <a class="nav-item <?php if($bannerView->getSelected() == "exercise.php"){echo "nav-selected";}  ?>" href="/view/xercise.html">运动数据</a>
                <a class="nav-item <?php if($bannerView->getSelected() == "activity.php"){echo "nav-selected";}  ?>" href="/view/activityView/activity-list.html">活动</a>
            </nav>
            <div  class="personal-info-header">
                <div>
                    <a href="/view/personalpersonal.html">
                        <div class="info-btn">
                            <img class="face-img" src="<?php echo $bannerView->getFace()?>" alt="<?php echo $bannerView->getName()?>" width="50px" height="50px">
                            <p class="column"><?php echo $bannerView->getName()?></p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
</html>