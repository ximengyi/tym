<?php

namespace app\modules\web\controllers;
use app\modules\web\controllers\common\BaseController;
use yii\web\Controller;
use app\common\components\BaseWebController;
use app\common\services\UrlService;
use app\models\User;
/**
 * Default controller for the `m` module
 */
class UserController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
     //登录页面


    public function actionLogin()
    {
      if (\Yii::$app->request->isGet) {
        $this->layout = false;
        return $this->render("login");
      }
       $login_name = trim($this->post("login_name",""));
       $login_pwd = trim($this->post("login_pwd",""));
       if(!$login_name||!$login_pwd)
       {
       return $this->renderJs("请输入正确的用户名和密码0",UrlService::buildWebUrl("/user/login"));

        }
        $user_info = User::find()->where(['login_name'=>$login_name])->one();
        if (!$user_info) {
           return $this->renderJs("请输入正确的用户名和密码1",UrlService::buildWebUrl("/user/login"));
        }
  //  md5(login_pwd +md5(login_salt))
    $auth_pwd = md5($login_pwd.md5($user_info['login_salt']));
    if ($auth_pwd!=$user_info['login_pwd']){

       return $this->renderJs("请输入正确的用户名和密码2",UrlService::buildWebUrl("/user/login"));
    }
// cookie 加密字符串+#+uid   md5(login_name+login_pwd+login_salt)

     $this->setLoginStatus($user_info);

     return $this->redirect(UrlService::buildWebUrl("/dashboard/index"));


    }
  // 编辑当前登录人信息
    public function actionEdit()
    {
       $this->layout = "main";
        return $this->render('edit');
    }
    // 重置密码
    public function actionResetPwd()
    {
        $this->layout = "main";
        return $this->render('reset_pwd');
    }
    public function actionLogout()
    {
      $this->removeLoginStatus();
      return $this->redirect(UrlService::buildWebUrl("/user/login"));
    }

  

}
