<?php

namespace app\common\components;
use yii\web\Controller;

//集成常用公用方法给所有的controller使用
/**

//  get post  set cookie get
**/


class BaseWebController extends Controller
{

public $enableCsrfValidation = false;


public function get($key,$default_val = "")
{
  return \Yii::$app->request->get($key,$default_val);

}
//获取httppost
public function post($key,$default_val)
{
  return \Yii::$app->request->post($key,$default_val);

}
// 设置cookie

public function setCookie($name,$value,$expire =0)
{

  $cookies = \Yii::$app->response->cookies;
  $cookies->add(new \yii\web\Cookie(
[
  'name'=>$name,
  'value'=>$value,
   'expire'=>$expire

] ));

}

//获取cookie
public function getCookie($name,$deafult_val='')
{

   $cookies = \Yii::$app->request->cookies;
   return $cookies->getValue($name,$deafult_val);

}

    public function removeCookie($name)
    {
      $cookies = \Yii::$app->response->cookies;
      $cookies->remove($name);
    }
    //api 统一返回json格式方法

    public function renderJson($data=[],$msg = "ok",$code =200)
    {
      header("Content-type: application/json");
      echo json_encode(
        [
          "code"=>$code,
          "msg"=>$msg,
          "data"=>$data,
          "req_id"=>uniqid()

        ] );

    }
     public function renderJs($msg,$url)
     {
       return $this->renderPartial("@app/views/common/js",['msg'=>$msg,'url'=>$url]);
     }

}
