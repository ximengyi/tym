<?php

namespace app\controllers;
use yii\web\Controller;


class ErrorController extends Controller
{
  public function actionError(){
    //记录错误信息到文件和数据库
    return "错误页面";
  }
}
