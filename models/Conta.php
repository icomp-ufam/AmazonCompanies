<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "conta".
 *
 * @property integer $idConta
 * @property string $nome
 * @property integer $idDemonstracao
 *
 * @property Demonstracao $idDemonstracao0
 * @property EmpresaConta[] $empresaContas
 */
class Conta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'conta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'idDemonstracao'], 'required'],
            [['idDemonstracao'], 'integer'],
            [['nome'], 'string', 'max' => 255],
            [['idDemonstracao'], 'exist', 'skipOnError' => true, 'targetClass' => Demonstracao::className(), 'targetAttribute' => ['idDemonstracao' => 'idDemonstracao']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idConta' => 'Id Conta',
            'nome' => 'Nome',
            'idDemonstracao' => 'Id Demonstracao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDemonstracao0()
    {
        return $this->hasOne(Demonstracao::className(), ['idDemonstracao' => 'idDemonstracao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresaContas()
    {
        return $this->hasMany(EmpresaConta::className(), ['idConta' => 'idConta']);
    }
}
