<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comentario".
 *
 * @property integer $idComentario
 * @property string $conteudo
 * @property integer $Empresa_idEmpresa
 * @property integer $Usuario_idUsuario
 * @property integer $Comentario_idComentario
 *
 * @property Comentario $comentarioIdComentario
 * @property Comentario[] $comentarios
 * @property Empresa $empresaIdEmpresa
 * @property Usuario $usuarioIdUsuario
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
            [['conteudo', 'Empresa_idEmpresa', 'Usuario_idUsuario'], 'required'],
            [['conteudo'], 'string'],
            [['Empresa_idEmpresa', 'Usuario_idUsuario', 'Comentario_idComentario'], 'integer'],
            [['Comentario_idComentario'], 'exist', 'skipOnError' => true, 'targetClass' => Comentario::className(), 'targetAttribute' => ['Comentario_idComentario' => 'idComentario']],
            [['Empresa_idEmpresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['Empresa_idEmpresa' => 'idEmpresa']],
            [['Usuario_idUsuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['Usuario_idUsuario' => 'idUsuario']],
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
            'Usuario_idUsuario' => 'Usuario Id Usuario',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioIdUsuario()
    {
        return $this->hasOne(Usuario::className(), ['idUsuario' => 'Usuario_idUsuario']);
    }
}
