<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Componentes */

$this->title = 'Nuevo componente';

?>
<div class="componentes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
