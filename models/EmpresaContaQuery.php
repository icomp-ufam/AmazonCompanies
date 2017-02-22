<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ValidaltdadosEmpresaConta]].
 *
 * @see ValidaltdadosEmpresaConta
 */
class EmpresaContaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ValidaltdadosEmpresaConta[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ValidaltdadosEmpresaConta|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
