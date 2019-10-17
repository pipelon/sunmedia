<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Componentes */

$this->title = 'Editar componente: ' . $model->id;

?>
<div class="componentes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
