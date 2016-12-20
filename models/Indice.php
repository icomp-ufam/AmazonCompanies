<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "indice".
 *
 * @property integer $idIndice
 * @property string $formula
 * @property integer $idTipo_Indice
 *
 * @property TipoIndice $idTipoIndice
 */
class Indice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'indice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['formula', 'idTipo_Indice'], 'required'],
            [['idTipo_Indice'], 'integer'],
            [['formula'], 'string', 'max' => 45],
            [['idTipo_Indice'], 'exist', 'skipOnError' => true, 'targetClass' => TipoIndice::className(), 'targetAttribute' => ['idTipo_Indice' => 'idTipo_indice']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idIndice' => 'Id Indice',
            'formula' => 'Formula',
            'idTipo_Indice' => 'Id Tipo  Indice',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoIndice()
    {
        return $this->hasOne(TipoIndice::className(), ['idTipo_indice' => 'idTipo_Indice']);
    }
}
