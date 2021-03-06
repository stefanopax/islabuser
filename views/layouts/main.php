<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => '/img/islab_mini.png']);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <style>
        /* this keeps the footer fixed to the bottom */
        {
            margin: 0;
            padding: 0;
        }
        html,body{
            height: 100%;
        }
        #container {
            min-height: 100%;
        }
        #main {
            overflow: auto;
            padding-bottom: 100px;
        }
        #footer {
            position: relative;
            height: 100px;
            margin-top: -100px;
            clear: both;
        }
    </style>
    <link rel="icon" href="<?= Url::base(); ?>/img/islab_mini.png" alt="islab_logo" type="image/png" />
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<?php

NavBar::begin([
    'brandLabel' => Html::img('@web/img/islab_mini.png'),
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'uk-navbar',
        'role' => 'navigation',
        'style' => 'background-color: orange; height: 100px',
        'innerContainerOptions' => ['class' => 'container-fluid'],
    ]
]);
echo Nav::widget([
    'options' => ['class' => 'uk-navbar-item'],
    'encodeLabels' => false,
    'items' => [
        [
            'label' => '<span class="glyphicon glyphicon-home"></span> Home',
            'class' => 'uk-navbar-left',
            'url' => Yii::$app->homeUrl,
            'linkOptions' => ['style' => 'color: #000;']
        ],
        [
            'label' => '<span class="glyphicon glyphicon-pencil"></span> Progetti',
            'url' => ['/project'],
            'class' => 'uk-navbar-left',
            'img' => 'dist/img/user2-160x160.jpg',
            'linkOptions' => ['style' => 'color: #000;']
        ],
        [
            'label' => '<span class="glyphicon glyphicon-user"></span> Staff',
            'url' => ['/staff'],
            'class' => 'uk-navbar-left',
            'img' => 'dist/img/user2-160x160.jpg',
            'linkOptions' => ['style' => 'color: #000;']
        ],
        [
            'label' => '<span class="glyphicon glyphicon-education"></span> Tesi',
            'url' => ['/thesis'],
            'class' => 'uk-navbar-left'	,
            'img' => 'dist/img/user2-160x160.jpg',
            'linkOptions' => ['style' => 'color: #000;']
        ],
        [
            'label' => '<span class="glyphicon glyphicon-tasks"></span> Corsi',
            'linkOptions' => ['style' => 'color: #000;'],
            'items' => [
                [
                    'label' => 'Basi di dati',
                    'url' => ['/course?id=1']
                ],
                [
                    'label' => 'Sistemi informativi',
                    'url' => ['/course?id=2']
                ],
            ],
        ],

        [
            'label' => '<span class="glyphicon glyphicon-signal"></span> News',
            'class' => 'uk-navbar-left'	,
            'img' => 'dist/img/user2-160x160.jpg',
            'linkOptions' => ['target'=>'_blank', 'style' => 'color: #000;'],
            'url' => 'http://islab.di.unimi.it/iNewsMail/feed.php?channel=islab'
        ],

        Yii::$app->user->isGuest ? (
        ['label' => '<span class="glyphicon glyphicon-ok"></span> Login', 'class' => 'uk-navbar-left',  'url' => ['/site/login'], 'linkOptions' =>[ 'style' => 'color: #000;']]
        ) : (
            '<li>'
            . Html::a('<span class="glyphicon glyphicon-home"></span> Home('.Yii::$app->user->identity->username.')', [Yii::$app->user->identity->roleBasedHomePage()])
            . '</li>'
            . '<li>'
            . Html::a('<span class="glyphicon glyphicon-remove"></span> Logout', ['site/logout'], ['data' => ['method' => 'post']])
            . '</li>'
            . '</li>'
        )
    ],
]);
NavBar::end();
?>
<?= Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? null : null,
]) ?>
<?= Alert::widget() ?>
<div id="container" class="container">
    <div id="main">
    <?= $content ?>
    </div>
</div>
<?php $this->beginBody() ?>
<footer id="footer" class="uk-text-center" style="background-color: orange">
    <div uk-sticky="bottom: true">
        <div class="uk-container uk-container-center">
            <img src="<?= Url::base(); ?>/img/islab_mini.png" alt="islab_logo" width="40" height="40">
            <br><br/>
            Via Celoria 18, 20133 Milano, Italy<br /> Tel +390250316354 Fax +390250316229 Web
            <a href="http://islab.di.unimi.it">http://islab.di.unimi.it</a>
        </div>
    </div>
</footer>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
