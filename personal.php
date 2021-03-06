<?php
include_once (dirname(__FILE__)."/view/utilityView/prevent.php");
require_once(dirname(__FILE__)."/view/personalView/personalView.php");
$view = new PersonalView();
$uri = $_SERVER['REQUEST_URI'];
$arr = explode("/", $uri);
$width = 0;

if (count($arr) > 2){
    getPersonalInfo($arr[3],$view);
    switch ($arr[2]){
        case "focus":
            $view->setContent("view/personalView/focus.php");
            break;
        case "fans":
            $view->setContent("view/personalView/fans.php");
            break;
        case "edit":
            $view->setInfo("view/personalView/personal-edit.php");
            $view->setContent("");
            break;
    }
}
function getPersonalInfo($id,$view){
    require_once (dirname(__FILE__)."/controller/personalController/personalController.php");
    $controller = new PersonalController();
    $result = $controller->getPersonalInfo($id);
    if ($_SESSION["id"] == $result->userId[0]){
        $view->setIsSelf(true);
    } else {
        $view->setIsSelf(false);
        $view->setFocused($result->focused[0]);
        $view->setIsFriend($result->isFriend[0]);
    }
    $view->setId($result->userId[0]);
    $view->setName($result->username[0]);
    $view->setFace($result->face[0]);
    $view->setLevel($result->level[0]." ".$result->levelName[0]);
    $view->setExperience($result->experience[0]."/".((pow(2,$result->level[0])-1)*1000));
    $view->setWidth(($result->experience[0]/(double)((pow(2,$result->level[0])-1)*1000)*100)."%");
    $view->setDescription($result->description[0]);
    $view->setGender($result->gender[0]);
    $view->setLocation($result->location[0]);
    $view->setBirthday($result->birthday[0]);
    $result = $controller->getInfoRight($id);
    $view->setFocus($result->focusNum[0]);
    $view->setFans($result->fansNum[0]);
    $view->setFriend($result->friendNum[0]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>跑得快 - <?php echo $view->getName()?>的个人中心</title>
    <script type="text/javascript" src="/assets/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/assets/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
    <link rel="stylesheet" type="text/css" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/common.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/personal.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/user-info.css">
</head>
<body>
<?php include dirname(__FILE__)."/view/utilityView/banner.php" ?>
<div role="main">
    <div class="content-container">
        <?php
        include $view->getInfo();
        ?>
        <?php
        if (!$view->isSelf()){
            echo "<script type=\"text/javascript\" src=\"/view/personalView/user-info.js\"></script>";
        }
        ?>
        <?php
        if ($view->getContent() != "") include $view->getContent() ?>
    </div>
</div>
</body>
</html>