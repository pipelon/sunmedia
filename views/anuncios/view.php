<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Anuncios */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Anuncios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="anuncios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'estado',
            'fecha:datetime',
            [
                'attribute' => 'publicado',
                'format' => 'raw',
                'value' => function ($data) {
                    return $data->publicado == 1 ?
                            "<span class='badge bg-green'>SI</span>" :
                            "<span class='badge bg-red'>NO</span>";
                }
            ],
        ],
    ])
    ?>
    <h3>Componentes</h3>
    <p>
        <?= Html::a('Create Componentes', ['componentes/create', 'anuncio_id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    yii\grid\GridView::widget([
        'dataProvider' => $modelC,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nombre',
            'tipo',                     
            'enlace',
            'formato',
            'peso',
            'texto',
            'posicion',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}  {delete}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['componentes/update', 'id' => $model->id], [
                                    'title' => Yii::t('app', 'lead-update'),
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['componentes/delete', 'id' => $model->id], [
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
