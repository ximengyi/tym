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
     //登录页面
    public function actionIndex()
    {
       $this->layout= false;
        return $this->render('index');
    }
  // 编辑当前登录人信息
    public function actionSet()
    {
      $this->layout = false;
        return $this->render('set');
    }
    // 重置密码
    public function actionInfo()
    {
        $this->layout = false;
        return $this->render('info');
    }
}
