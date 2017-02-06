<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comentario".
 *
 * @property integer $idComentario
 * @property string $conteudo
 * @property integer $Empresa_idEmpresa
 * @property string $nome
 * @property string $email
 * @property string $data
 * @property string $hora
 * @property integer $Comentario_idComentario
 *
 * @property Comentario $comentarioIdComentario
 * @property Comentario[] $comentarios
 * @property Empresa $empresaIdEmpresa
 */
class Comentario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comentario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'conteudo', 'Empresa_idEmpresa', 'nome', 'email', 'data', 'hora'], 'required'],
            [['idComentario', 'Empresa_idEmpresa', 'Comentario_idComentario'], 'integer'],
            [['conteudo'], 'string'],
            [['data', 'hora'], 'safe'],
            [['nome', 'email'], 'string', 'max' => 45],
            [['Comentario_idComentario'], 'exist', 'skipOnError' => true, 'targetClass' => Comentario::className(), 'targetAttribute' => ['Comentario_idComentario' => 'idComentario']],
            [['Empresa_idEmpresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['Empresa_idEmpresa' => 'idEmpresa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idComentario' => 'Id Comentario',
            'conteudo' => 'Conteudo',
            'Empresa_idEmpresa' => 'Empresa Id Empresa',
            'nome' => 'Nome',
            'email' => 'Email',
            'data' => 'Data',
            'hora' => 'Hora',
            'Comentario_idComentario' => 'Comentario Id Comentario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarioIdComentario()
    {
        return $this->hasOne(Comentario::className(), ['idComentario' => 'Comentario_idComentario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentario::className(), ['Comentario_idComentario' => 'idComentario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresaIdEmpresa()
    {
        return $this->hasOne(Empresa::className(), ['idEmpresa' => 'Empresa_idEmpresa']);
    }

}
