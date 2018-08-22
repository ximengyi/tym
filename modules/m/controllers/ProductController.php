<?php

namespace app\modules\m\controllers;

use app\modules\m\controllers\common\BaseController;
use yii\web\Controller;

/**
 * Default controller for the `m` module
 */
class ProductController extends BaseController
{


  public function __construct($id, $module, $config = [])
    {
          parent::__construct($id, $module, $config = []);
          $this->layout = "main";
    }


    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionInfo()
    {

        return $this->render('info');
    }

    public function actionOrder()
    {
    
        return $this->render('order');
    }



}
