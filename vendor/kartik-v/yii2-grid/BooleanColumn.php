<?php

/**
 * @package   yii2-grid
 * @author    Kartik Visweswaran <kartikv2@gmail.com>
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2016
 * @version   3.1.4
 */

namespace kartik\grid;

use Yii;
use Closure;

/**
 * A BooleanColumn will convert true/false values as user friendly indicators with an automated drop down filter for the
 * [[GridView]] widget.
 *
 * To add a BooleanColumn to the gridview, add it to the [[GridView::columns|columns]] configuration as follows:
 *
 * ```php
 * 'columns' => [
 *     // ...
 *     [
 *         'class' => BooleanColumn::className(),
 *         // you may configure additional properties here
 *     ],
 * ]
 * ```
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class BooleanColumn extends DataColumn
{
    /**
     * @inheritdoc
     */
    public $hAlign = GridView::ALIGN_CENTER;

    /**
     * @inheritdoc
     */
    public $width = '90px';

    /**
     * @inheritdoc
     */
    public $format = 'raw';

    /**
     * @var string label for the true value. Defaults to `Active`.
     */
    public $trueLabel = 'Ativo';

    /**
     * @var string label for the false value. Defaults to `Inactive`.
     */
    public $falseLabel = 'Inativo';
    
    // criando uma label para não visualizado -> status = 2
    public $alertLabel = 'Pendente';

    /**
     * @var string icon/indicator for the true value. If this is not set, it will use the value from `trueLabel`. If
     * GridView `bootstrap` property is set to true - it will default to [[GridView::ICON_ACTIVE]].
     */
    public $trueIcon;

    /**
     * @var string icon/indicator for the false value. If this is null, it will use the value from `falseLabel`. If
     * GridView `bootstrap` property is set to true - it will default to [[GridView::ICON_INACTIVE]].
     */
    public $falseIcon;
	
    //icone do alerta
    public $alertIcon;
    
    /**
     * @var boolean whether to show null value as a false icon.
     */
    public $showNullAsFalse = false;

    /**
     * @inheritdoc
     */
    public function init()
    {
        if (empty($this->trueLabel)) {
            $this->trueLabel = Yii::t('kvgrid', 'Ativo');
        }
        if (empty($this->falseLabel)) {
            $this->falseLabel = Yii::t('kvgrid', 'Inativo');
        }
        if(empty($this->alertLabel)){
        	$this->alertLabel = Yii::t('kvgrid', 'Pendente');
        }
        $this->filter = [true => $this->trueLabel, false => $this->falseLabel, '2' => $this->alertLabel];

        if (empty($this->trueIcon)) {
            /** @noinspection PhpUndefinedFieldInspection */
            $this->trueIcon = ($this->grid->bootstrap) ? GridView::ICON_ACTIVE : $this->trueLabel;
        }

        if (empty($this->falseIcon)) {
            /** @noinspection PhpUndefinedFieldInspection */
            $this->falseIcon = ($this->grid->bootstrap) ? GridView::ICON_INACTIVE : $this->falseLabel;
        }
        
        if (empty($this->alertIcon)) {
        	/** @noinspection PhpUndefinedFieldInspection */
        	$this->alertIcon = ($this->grid->bootstrap) ? GridView::ICON_ALERT : $this->alertLabel;
        }

        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function getDataCellValue($model, $key, $index)
    {
        $value = parent::getDataCellValue($model, $key, $index);
        if ($value !== null) {
            if($value == 2){
            	return $this->alertIcon; 
         	}else{
        		return $value ? $this->trueIcon : $this->falseIcon;
            }
        }
        return $this->showNullAsFalse ? $this->falseIcon : $value;
    }
}
