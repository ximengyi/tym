<?php
/**
 * Created by PhpStorm.
 * User: MengYi
 * Date: 2018/8/28
 * Time: 9:04
 */

namespace app\common\services\weixin;


use app\common\services\BaseService;
use app\models\member\OauthAccessToken;
use app\models\pay\PayOrder;

class RequestService extends BaseService
{
    private static $app_token = "";
    private static $appid = "";
    private static $app_secret = "";

    private static $url ="";


    public static function getAccessToken(){
        $date_now = date("Y-m-d H:i:s");
        $access_token_info = OauthAccessToken::find()->where(['>','expired_time',$date_now])->limit(1)->one();
        if($access_token_info){
            return $access_token_info['access_token'];
        }

        //调用接口获取

    }


    public static function send($path,$data = [],$method ='GET'){
        $request_url =self::$url.$path;
        if($method =="POST"){

        }else{

        }

    }

    public function  setConfig($appid,$app_token,$app_secret){

      self::$appid = $appid;
      self::$app_token =$app_token;
      self::$app_secret =$app_secret;

    }

}