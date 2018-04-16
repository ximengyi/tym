<?php

namespace app\controllers;
use yii\log\FileTarget;
use yii\web\Controller;



class ErrorController extends Controller
{
  public function actionError(){
    //记录错误信息到文件和数据库
    $error = \Yii::$app->errorHandler->exception;
    $err_msg = '';
    if ($error) {
      $file = $error->getFile();
      $line = $error->getLine();
      $message = $error->getMessage();
      $code = $error->getCode();
      $log = new FileTarget();
      $log->logFile = \Yii::$app->getRuntimePath(). DIRECTORY_SEPARATOR . 'logs'.DIRECTORY_SEPARATOR.'err.log';
      $err_msg = $message."[file:{$file}][line:{$line}][code:{$code}][url:{$_SERVER['REQUEST_URI']}]
      [POST-DATA:".http_build_query($_post)."]";

      $log->messages[]=[
        $err_msg,
        1,
        'application',
        microtime(true)
    ];

    $log->export();
    // todo 写入数据库

    }
      $this->layout =  false;

    return  $this->render("error",["$err_msg"=>$err_msg]);
  }



}
