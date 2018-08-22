<?php

namespace app\modules\m\controllers;

use app\modules\m\controllers\common\BaseController;
use yii\web\Controller;

/**
 * Default controller for the `m` module
 */
class PayController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */


   public function __construct($id, $module, $config = [])
    {
             parent::__construct($id, $module, $config = []);
             $this->layout = "main";
       }


    public function actionBuy()
    {

        return $this->render('buy');
    }
}
