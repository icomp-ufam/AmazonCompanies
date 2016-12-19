<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "agregado".
 *
 * @property integer $idAgregado
 * @property string $nome
 * @property string $sigla
 *
 * @property Conta[] $contas
 */
class Agregado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'agregado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'sigla'], 'required'],
            [['nome', 'sigla'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idAgregado' => 'Id Agregado',
            'nome' => 'Nome',
            'sigla' => 'Sigla',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContas()
    {
        return $this->hasMany(Conta::className(), ['idAgregado' => 'idAgregado']);
    }
}
