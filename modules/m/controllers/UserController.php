<?php

namespace app\modules\m\controllers;

use app\modules\m\controllers\common\BaseController;
use yii\web\Controller;

/**
 * Default controller for the `m` module
 */
class UserController extends BaseController
{

     //登录页面

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
    public function actionAddress()
    {

        return $this->render('address');
    }
    // 重置密码
    public function actionAddress_set()
    {

        return $this->render('address_set');
    }
    public function actionFav()
    {

        return $this->render('fav');
    }

    public function actionBind()
    {

        return $this->render('bind');
    }

    public function actionCart()
    {

      return $this->render('cart');
    }

    public function actionOrder()
    {

      return $this->render('order');
    }

    public function actionComment()
    {

      return $this->render('comment');
    }

    public function actionComment_set()
    {

      return $this->render('comment_set');
    }


}
