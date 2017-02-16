<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_indice".
 *
 * @property integer $idTipo_indice
 * @property string $nome
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
            [['idTipo_indice', 'nome'], 'required'],
            [['idTipo_indice'], 'integer'],
            [['nome'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTipo_indice' => 'Id tipo índice',
            'nome' => 'Nome',
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
