<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "conta".
 *
 * @property integer $idConta
 * @property string $nome
 * @property string $valor
 * @property integer $idDemonstracao
 * @property integer $idAgregado
 *
 * @property Demonstracao $idDemonstracao0
 * @property Agregado $idAgregado0
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
            [['nome', 'valor'], 'required'],
            [['valor'], 'number'],
            [['idDemonstracao', 'idAgregado'], 'integer'],
            [['nome'], 'string', 'max' => 255],
            [['idDemonstracao'], 'exist', 'skipOnError' => true, 'targetClass' => Demonstracao::className(), 'targetAttribute' => ['idDemonstracao' => 'idDemonstracao']],
            [['idAgregado'], 'exist', 'skipOnError' => true, 'targetClass' => Agregado::className(), 'targetAttribute' => ['idAgregado' => 'idAgregado']],
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
            'valor' => 'Valor',
            'idDemonstracao' => 'Id Demonstracao',
            'idAgregado' => 'Id Agregado',
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
    public function getIdAgregado0()
    {
        return $this->hasOne(Agregado::className(), ['idAgregado' => 'idAgregado']);
    }
}
