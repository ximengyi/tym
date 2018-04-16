<?php

namespace app\modules\web\controllers;

use yii\web\Controller;

/**
 * Default controller for the `m` module
 */
class MemberController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
     //会员列表
    public function actionIndex()
    {
       $this->layout= false;
        return $this->render('index');
    }
      // 添加或者编辑会员
    public function actionSet()
    {
      $this->layout = false;
        return $this->render('set');
    }

    // 会员详情
    public function actionInfo()
    {
        $this->layout = false;
        return $this->render('info');
    }

    public function actionComment()
    {
      $this->layout = false;
      return $this->render('comment');
    }



  }
