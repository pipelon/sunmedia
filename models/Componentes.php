<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "componentes".
 *
 * @property int $id ID
 * @property int $anuncio_id
 * @property string $nombre Nombre
 * @property string $tipo Reglas
 * @property string $formato
 * @property string $peso
 * @property string $texto
 * @property string $posicion
 * @property string $enlace
 *
 * @property Anuncios $anuncio
 */
class Componentes extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'componentes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['anuncio_id', 'nombre', 'tipo', 'posicion'], 'required'],
            [['anuncio_id'], 'integer'],
            [['nombre', 'posicion'], 'string', 'max' => 45],
            [['tipo', 'formato', 'peso'], 'string', 'max' => 10],
            [['texto'], 'string', 'max' => 140],
            [['enlace'], 'string', 'max' => 255],
            [['enlace'], 'url'],
            //CustomValidate
            [['enlace'], 'validateFile'],
            [['anuncio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Anuncios::className(), 'targetAttribute' => ['anuncio_id' => 'id']],
        ];
    }

    public function validateFile($attribute_name) {
        
        if(empty($this->$attribute_name)){
            return true;
        }
        
        if($this->tipo == 'imagen'){
            $url = $this->$attribute_name;
            $exp = explode(".", $url);
            if(strtolower(end($exp)) != 'png' && strtolower(end($exp)) != 'jpg'){
                $this->addError($attribute_name, 'Solo permitimos imágenes con el formato JPG y PNG.');
                return false;
            }
        }
        
        if($this->tipo == 'video'){
            $url = $this->$attribute_name;
            $exp = explode(".", $url);
            if(strtolower(end($exp)) != 'mp4' && strtolower(end($exp)) != 'webm'){
                $this->addError($attribute_name, 'Un vídeo solo será válido si está en formato MP4 y WEBM.');
                return false;
            }
        }
        
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'anuncio_id' => 'Anuncio ID',
            'nombre' => 'Nombre',
            'tipo' => 'Tipo',
            'formato' => 'Formato',
            'peso' => 'Peso',
            'texto' => 'Texto',
            'posicion' => 'Posicion',
            'enlace' => 'Enlace',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnuncio() {
        return $this->hasOne(Anuncios::className(), ['id' => 'anuncio_id']);
    }

}
