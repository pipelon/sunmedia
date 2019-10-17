<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Componentes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="componentes-form">
    <?= Html::a('volver', ['anuncios/view', 'id' => $model->anuncio_id], ['class' => 'btn btn-info']) ?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'anuncio_id')->hiddenInput()->label(false) ?>    

    <?= $form->field($model, 'tipo')->dropDownList(Yii::$app->params['tipo'], ['prompt' => '- Seleccione -', 'id' => 'tipo']); ?>

    <div class="panelvideoimg" style="display: none">

        <?= $form->field($model, 'enlace')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'formato')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'peso')->textInput(['maxlength' => true]) ?>

    </div>

    <div class="paneltext" style="display: none">

        <?= $form->field($model, 'texto')->textInput(['maxlength' => true]) ?>

    </div>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'posicion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
    $(document).ready(function () {
        if($("#tipo").val() == 'video' || $("#tipo").val() == 'imagen'){
            $('.panelvideoimg').show('slow');
        }
        
        if($("#tipo").val() == 'texto'){
            $('.paneltext').show('slow');
        }
        
        $("#tipo").change(function () {
            console.info($(this).val());
            if ($(this).val() == 'video' || $(this).val() == 'imagen') {
                $('.panelvideoimg').show('slow');
                $('.paneltext').hide('slow');
            } else {
                $('.panelvideoimg').hide('slow');
                $('.paneltext').show('slow');
            }
        });
    })
</script>