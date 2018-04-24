<?php
namespace app\modules\web\controllers\common;
use app\common\components\BaseWebController;
use app\common\services\UrlService;
use app\models\User;


class BaseController  extends BaseWebController
{
    protected   $auth_cookie_name = "mooc_book";
    public $allowAllAction = [
      "web/user/login"
    ];

  public function __construct($id,$module,array $config = [])
   {

     parent::__construct($id,$module,$config);
     $this->layout = "main";

   }


   public function checkLoginStatus()
   {

     $auth_cookie = $this->getCookie($this->auth_cookie_name,"");
     if (!$auth_cookie) {
        return false;
     }
     list($auth_token,$uid) = explode("#",$auth_cookie);
     if(!$auth_token|| !$uid){
       return false;
     }
     if(!preg_match("/^\d+$/",$uid)){
       return false;

     }
    $user_info = User::find()->where(['uid'=>$uid])->one();
    if (!$user_info) {
        return false;
    }
    if ($auth_token != $this->geneAuthToken($user_info)) {
       return false;
    }
        return true;

   }


   public function beforeAction($action)
   {

     $is_login = $this->checkLoginStatus();

     if (in_array($action->getUniqueId(),$this->allowAllAction)) {
         return true;
     }

     if(!$is_login){
       if (\Yii::$app->request->isAjax) {
            $this->renderJson([],"未登录请先登录",-302);
       }else{
         $this->redirect(UrlService::buildWebUrl("/user/login"));
       }
       return false;
     }
        return true;
   }

   //同意生成加密字段
   public function geneAuthToken($user_info)
   {
      return   md5($user_info['login_name'].$user_info['login_pwd'].$user_info['login_salt']);
   }

   public function setLoginStatus($user_info)
   {
      $auth_token = $this->geneAuthToken($user_info);
      $this->setCookie($this->auth_cookie_name,$auth_token."#".$user_info['uid']);

   }

   public function removeLoginStatus()
   {
     $this->removeCookie($this->$auth_cookie_name);
   }

}
