<?php

namespace app\modules\m\controllers;

use yii\web\Controller;

/**
 * Default controller for the `m` module
 */
class ProductController extends Controller
{
  

    public function actionIndex()
    {
       $this->layout= false;
        return $this->render('index');
    }

    public function actionInfo()
    {
      $this->layout = false;
        return $this->render('info');
    }

    public function actionOrder()
    {
        $this->layout = false;
        return $this->render('order');
    }



}
