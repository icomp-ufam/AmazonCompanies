<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_empresa".
 *
 * @property integer $idTipo_Empresa
 * @property string $nome
 *
 * @property Empresa[] $empresas
 */
class TipoEmpresa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_empresa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idTipo_Empresa', 'nome'], 'required'],
            [['idTipo_Empresa'], 'integer'],
            [['nome'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idTipo_Empresa' => 'Id Tipo Empresa',
            'nome' => 'Tipo de Empresa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresas()
    {
        return $this->hasMany(Empresa::className(), ['Tipo_Empresa_idTipo_Empresa' => 'idTipo_Empresa']);
    }

    public function getEmpresa()
    {
        return $this->hasMany(
            Empresa::className(),['idTipo_Empresa'=>'idEmpresa']
        );
    }
}
