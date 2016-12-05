<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_demonstracao".
 *
 * @property integer $idTipo_Demonstracao
 * @property string $nome
 *
 * @property Demonstracao[] $demonstracaos
 */
class TipoDemonstracao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_demonstracao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 45],
        ];
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTipo_Demonstracao' => 'Id Tipo  Demonstracao',
            'nome' => 'Nome',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDemonstracaos()
    {
        return $this->hasMany(Demonstracao::className(), ['Tipo_Demonstracao_idTipo_Demonstracao' => 'idTipo_Demonstracao']);
    }
}
