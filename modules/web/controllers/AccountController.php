<?php

namespace app\modules\web\controllers;

use yii\web\Controller;

/**
 * Default controller for the `m` module
 */
class AccountController extends Controller
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
  // 编辑当前登录人信息
    public function actionSet()
    {

        return $this->render('set');
    }
    // 重置密码
    public function actionInfo()
    {
        return $this->render('info');
    }
}
