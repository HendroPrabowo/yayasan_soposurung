<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

$user = \app\models\User::findOne(Yii::$app->user->id);

?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini"><b>Y</b>SP</span><span class="logo-lg">Yayasan Soposurung</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <!-- <img src="'.$directoryAsset.'/img/yayasan_soposurung.png" class="user-image" alt="User Image"/> -->
                <!-- <img src="uploads/logo/yayasan_soposurung.png" class="user-image" alt="User Image"/> -->
                <?php
                    if(Yii::$app->user->isGuest == false){
                        echo '<li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="'.Yii::getAlias('@web/uploads/logo/yayasan_soposurung.png').'" class="user-image" alt="User Image"/>
                            <span class="hidden-xs">'.$user->username.'</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="'.Yii::getAlias('@web/uploads/logo/yayasan_soposurung.png').'" class="img-circle" alt="User Image"/>
                                <p style="margin-bottom: 0px">'.$user->username.'</p>
                                <p style="font-size: 12px; margin-top: 0px">Workgroup : <z style="font-size: 10px" class="badge bg-red">'.$user->role.'</z></p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="'.\yii\helpers\Url::to(["user/view", "id" => Yii::$app->user->id]).'" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="'.\yii\helpers\Url::to(["user/logout"]).'" class="btn btn-default btn-flat">Sign Out</a>
                                </div>
                            </li>
                        </ul>
                    </li>';
                    }
                ?>
            </ul>
        </div>
    </nav>
</header>
