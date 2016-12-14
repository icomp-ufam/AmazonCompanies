<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "analise".
 *
 * @property integer $idanalise
 * @property string $texto
 * @property integer $status
 * @property integer $idEmpresa
 *
 * @property Empresa $idEmpresa0
 */
class Analise extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'analise';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['texto'], 'string'],
            [['status', 'idEmpresa'], 'required'],
            [['status', 'idEmpresa'], 'integer'],
            [['idEmpresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['idEmpresa' => 'idEmpresa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idanalise' => 'Idanalise',
            'texto' => 'Texto',
            'status' => 'Status',
            'idEmpresa' => 'Id Empresa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpresa0()
    {
        return $this->hasOne(Empresa::className(), ['idEmpresa' => 'idEmpresa']);
    }
}
