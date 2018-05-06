<?php

namespace app\modules\web\controllers;

use yii\web\Controller;

use app\modules\web\controllers\common\BaseController;
class QrcodeController extends BaseController
{

  public function __construct($id, $module, $config = [])
   {
           parent::__construct($id, $module, $config = []);
           $this->layout = "main";
    }

  public function actionIndex(){

    return $this->render("index");
  }
  public function actionSet(){

    return $this->render("set");
  }
}
