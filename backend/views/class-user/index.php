<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ClassUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Class Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="class-user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Class User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'class_id',
            'date_start',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
