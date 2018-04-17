<?php

namespace app\modules\m\controllers;

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
    public function actionIndex()
    {
       $this->layout= false;
        return $this->render('index');
    }
  // 编辑当前登录人信息
    public function actionAddress()
    {
      $this->layout = false;
        return $this->render('address');
    }
    // 重置密码
    public function actionAddress_set()
    {
        $this->layout = false;
        return $this->render('address_set');
    }
    public function actionFav()
    {
        $this->layout = false;
        return $this->render('fav');
    }

    public function actionBind()
    {
        $this->layout = false;
        return $this->render('bind');
    }

    public function actionCart()
    {
      $this->layout = false;
      return $this->render('cart');
    }

    public function actionOrder()
    {
      $this->layout = false;
      return $this->render('order');
    }

    public function actionComment()
    {
      $this->layout = false;
      return $this->render('comment');
    }

    public function actionComment_set()
    {
      $this->layout = false;
      return $this->render('comment_set');
    }


}
