<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "anuncios".
 *
 * @property int $id
 * @property string $nombre
 * @property string $estado
 * @property string $fecha
 * @property int $publicado
 *
 * @property Componentes[] $componentes
 */
class Anuncios extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'anuncios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['nombre'], 'required'],
            [['fecha'], 'safe'],
            [['publicado'], 'integer'],
            [['nombre', 'estado'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'estado' => 'Estado',
            'fecha' => 'Fecha',
            'publicado' => 'Publicado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComponentes() {
        return $this->hasMany(Componentes::className(), ['anuncio_id' => 'id']);
    }

}
