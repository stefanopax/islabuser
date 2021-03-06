<?php

use backend\models\Standard;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

?>
<?php
    NavBar::begin([
        'options' => [
            'class' => 'uk-navbar',
            'role' => 'navigation',
            'style' => 'background-color: #CBCACA; color: blue; height: 80px',
            'innerContainerOptions' => ['class' => 'container-fluid'],
        ]
    ]);
    echo Nav::widget([
        'options' => ['class' => 'uk-navbar-item'],
        'items' => [
            ['label' => 'Personal', 'url' => ['/adminteacher/view', 'id' => Yii::$app->user->identity->getId()]],
            ['label' => 'Personal Menu', 'url' => ['/staffmenuentry', 'id' => Yii::$app->user->identity->getId()]],
            ['label' => 'Course', 'url' => ['/coursesite']],
            ['label' => 'Exam', 'url' => ['/teacher/exam']]
        ],
    ]);
    NavBar::end();
?>