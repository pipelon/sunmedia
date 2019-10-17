<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AnunciosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Anuncios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="anuncios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nuevo anuncio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nombre',
            [
                'attribute' => 'estado',
                'format' => 'raw',
                'value' => function ($data) {
                    return $data->estado;
                },
                'filter' => Yii::$app->params['estados']
            ],
            'fecha:datetime',
            [
                'attribute' => 'publicado',
                'format' => 'raw',
                'value' => function ($data) {
                    return $data->publicado == 1 ?
                            "<span class='badge bg-green'>SI</span>" :
                            "<span class='badge bg-red'>NO</span>";
                },
                'filter' => Yii::$app->params['publicado']
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
