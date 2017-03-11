<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_indice".
 *
 * @property integer $idTipo_indice
 * @property string $nome
 * @property string $descricao
 *
 * @property Indice[] $indices
 */
class TipoIndice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_indice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['descricao'], 'string'],
            [['nome'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTipo_indice' => Yii::t('app', 'Id Tipo Indice'),
            'nome' => Yii::t('app', 'Nome'),
            'descricao' => Yii::t('app', 'Descricao'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndices()
    {
        return $this->hasMany(Indice::className(), ['idTipo_Indice' => 'idTipo_indice']);
    }
}
