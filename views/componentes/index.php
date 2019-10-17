<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ComponentesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Componentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="componentes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nuevo componente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'anuncio_id',
            'nombre',
            'tipo',
            'formato',
            //'peso',
            //'texto',
            //'posicion',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}  {delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        var_dump($url);exit;
                        return Html::a('<span class="flaticon-edit-1" style="font-size: 20px"></span>', $url, [
                                    'title' => 'Editar',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="flaticon-circle" style="font-size: 20px"></span>', $url, [
                                    'data-confirm' => '¿Está seguro que desea eliminar este ítem?',
                                    'data-method' => 'post',
                                    'title' => 'Borrar',
                        ]);
                    }
                ]
            ],
        ],
    ]);
    ?>


</div>
