<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ClassCourse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="class-course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'class_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'student_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
