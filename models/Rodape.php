<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rodape".
 *
 * @property integer $id
 * @property string $link
 */
class Rodape extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rodape';
    }

    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['link'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Identificação do link',
            'link' => 'Link',
        ];
    }
}
