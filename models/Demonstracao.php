<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "demonstracao".
 *
 * @property integer $idDemonstracao
 * @property string $nomeDemonstracao
 *
 * @property Conta[] $contas
 */
class Demonstracao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'demonstracao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomeDemonstracao'], 'required'],
            [['nomeDemonstracao'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDemonstracao' => 'Id Demonstracao',
            'nomeDemonstracao' => 'Nome Demonstracao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContas()
    {
        return $this->hasMany(Conta::className(), ['idDemonstracao' => 'idDemonstracao']);
    }
}
