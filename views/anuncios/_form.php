<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Anuncios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="anuncios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->dropDownList(Yii::$app->params['estados'], ['prompt' => '- Seleccione -']); ?>

    <?= $form->field($model, 'publicado')->dropDownList(Yii::$app->params['publicado'], ['prompt' => '- Seleccione -']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
