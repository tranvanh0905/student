<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ClassCourse */

$this->title = 'Create Class Course';
$this->params['breadcrumbs'][] = ['label' => 'Class Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="class-course-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
