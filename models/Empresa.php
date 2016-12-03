<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property integer $idEmpresa
 * @property string $nome
 * @property string $analise
 * @property string $fonte
 * @property integer $Tipo_Empresa_idTipo_Empresa
 * @property string $logotipo
 *
 * @property Comentario[] $comentarios
 * @property Conta[] $contas
 * @property Demonstracao[] $demonstracaos
 * @property TipoEmpresa $tipoEmpresaIdTipoEmpresa
 * @property EmpresaHasUsuario[] $empresaHasUsuarios
 * @property Usuario[] $usuarioIdUsuarios
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'fonte', 'Tipo_Empresa_idTipo_Empresa'], 'required'],
            [['analise'], 'string'],
            [['Tipo_Empresa_idTipo_Empresa'], 'integer'],
            [['nome', 'fonte'], 'string', 'max' => 45],
            [['logotipo'], 'string', 'max' => 200],
            [['Tipo_Empresa_idTipo_Empresa'], 'exist', 'skipOnError' => true, 'targetClass' => TipoEmpresa::className(), 'targetAttribute' => ['Tipo_Empresa_idTipo_Empresa' => 'idTipo_Empresa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEmpresa' => 'Id Empresa',
            'nome' => 'Nome',
            'analise' => 'Analise',
            'fonte' => 'Fonte',
            'Tipo_Empresa_idTipo_Empresa' => 'Tipo  Empresa Id Tipo  Empresa',
            'logotipo' => 'Logotipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentario::className(), ['Empresa_idEmpresa' => 'idEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContas()
    {
        return $this->hasMany(Conta::className(), ['Empresa_idEmpresa' => 'idEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDemonstracaos()
    {
        return $this->hasMany(Demonstracao::className(), ['Empresa_idEmpresa' => 'idEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoEmpresaIdTipoEmpresa()
    {
        return $this->hasOne(TipoEmpresa::className(), ['idTipo_Empresa' => 'Tipo_Empresa_idTipo_Empresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresaHasUsuarios()
    {
        return $this->hasMany(EmpresaHasUsuario::className(), ['Empresa_idEmpresa' => 'idEmpresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioIdUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['idUsuario' => 'Usuario_idUsuario'])->viaTable('empresaHasUsuario', ['Empresa_idEmpresa' => 'idEmpresa']);
    }


    public function getTipoEmpresa()
    {
        return $this->hasOne(
            TipoEmpresa::className(),['idEmpresa'=>'idTipo_Empresa']
        );
    }
}
