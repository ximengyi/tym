<?php

namespace app\modules\web\controllers;

use yii\web\Controller;

/**
 * Default controller for the `web` module
 */
class DefaultController extends Controller
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
    public function actionIndex()
    {
        return $this->render('index');
    }
}
