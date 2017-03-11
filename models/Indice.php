<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "indice".
 *
 * @property integer $idIndice
 * @property string $formula
 * @property integer $idTipo_Indice
 * @property string $nomeIndice
 * @property integer $formato
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
            [['formula', 'idTipo_Indice', 'formato'], 'required'],
            [['idTipo_Indice', 'formato'], 'integer'],
            [['formula'], 'string', 'max' => 45],
            [['nomeIndice'], 'string', 'max' => 100],
            [['idTipo_Indice'], 'exist', 'skipOnError' => true, 'targetClass' => TipoIndice::className(), 'targetAttribute' => ['idTipo_Indice' => 'idTipo_indice']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idIndice' => Yii::t('app', 'Id Indice'),
            'formula' => Yii::t('app', 'Fórmula'),
            'idTipo_Indice' => Yii::t('app', 'Id Tipo  Indice'),
            'nomeIndice' => Yii::t('app', 'Nome Indice'),
            'formato' => Yii::t('app', 'Formato'),
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
