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


   public function __construct($id, $module, $config = [])
   {
              parent::__construct($id, $module, $config = []);
              $this->layout = "main";
    }

    public function actionIndex()
    {

        return $this->render('index');
    }
      // 添加或者编辑会员
    public function actionSet()
    {

        return $this->render('set');
    }

    // 会员详情
    public function actionInfo()
    {

        return $this->render('info');
    }

    public function actionComment()
    {

      return $this->render('comment');
    }



  }
