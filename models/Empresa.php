<?php

namespace app\models;

use Yii;
use app\models\UploadForm;

/**
 * This is the model class for table "empresa".
 *
 * @property integer $idEmpresa
 * @property string $nome
 * @property string $fonte
 * @property string $logotipo
 * @property integer $tipo
 *
 * @property Analise[] $analises
 * @property Comentario[] $comentarios
 * @property Demonstracao[] $demonstracaos
 * @property EmpresaHasUsuario[] $empresaHasUsuarios
 * @property Usuario[] $usuarioIdUsuarios
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $upload_file;

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
            [['nome', 'fonte', 'tipo'], 'required'],
            [['tipo'], 'string'],
            [['nome', 'fonte'], 'string', 'max' => 45],
            [['logotipo'], 'string', 'max' => 200],
            [['upload_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'doc, xlsx, xls'],
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
            'fonte' => 'Fonte',
            'logotipo' => 'Logotipo',
            'tipo' => 'Tipo de Empresa',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnalises()
    {
        return $this->hasMany(Analise::className(), ['idEmpresa' => 'idEmpresa']);
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
    public function getDemonstracaos()
    {
        return $this->hasMany(Demonstracao::className(), ['Empresa_idEmpresa' => 'idEmpresa']);
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

    private $nome, $extensao;
    public function upload()
    {
        $nome= "imagem_tmp.png";
       // $extensao = $this->logotipo;
        if ($this->validate()) {
            $this->logotipo->saveAs('img/' . $nome);
            $this->logotipo="img/".$nome;
            return true;
        } else {
            return false;
        }
    }
    public function upload2()
    {
        if ($this->validate()) {
            foreach ($this->logotipo as $file) {
                $file->saveAs('img/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }


}
