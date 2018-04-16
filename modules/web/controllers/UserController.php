<?php

namespace app\modules\web\controllers;

use yii\web\Controller;

/**
 * Default controller for the `m` module
 */
class UserController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
     //登录页面
    public function actionLogin()
    {
       $this->layout= false;
        return $this->render('login');
    }
  // 编辑当前登录人信息
    public function actionEdit()
    {
      $this->layout = false;
        return $this->render('edit');
    }
    // 重置密码
    public function actionResetPwd()
    {
        $this->layout = false;
        return $this->render('reset_pwd');
    }
}
