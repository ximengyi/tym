<?php
/**
 * Created by PhpStorm.
 * User: MengYi
 * Date: 2018/8/27
 * Time: 8:55
 */

namespace app\modules\weixin\controllers;

use app\common\components\BaseWebController;

class MsgController extends BaseWebController
{
    public function actionIndex()
    {
        if(!$this->checkSignature()){

            return "error signature";

        }
        if(array_key_exists("echostr",$_GET) && $_GET['echostr']){

            return $_GET['echostr'];
        }


        return "helloworld";
    }

    public function checkSignature(){
        $signature = trim($this->get("signature",""));
        $timestamp = trim($this->get("signature",""));
        $nonce = trim($this->get("nonce",""));
        $tmpArr = array(\Yii::$app->params['weixin']['token'],$timestamp,$nonce);
        sort($tmpArr);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);
        if($tmpStr == $signature){

            return true;

        }else{

            return false;
        }

    }


}