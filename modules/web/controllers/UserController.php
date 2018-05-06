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

      if(\Yii::$app->request->isGet){
        return $this->render("edit",['user_info' => $this->current_user]);
      }
      // $this->layout = "main";
      $nickname = trim($this->post("nickname",""));
      $email = trim($this->post('email',''));
     if(mb_strlen($nickname,'utf-8')<1){
       return $this->rederJson([],'请输入合法的姓名');
     }
     if(mb_strlen($email,'utf-8')<1){
        return $this->rederJson([],'请输入合法的邮箱');
      }
      $user_info = $this->current_user;
      $user_info->nickname = $nickname;
      $user_info->email = $email;
      $user_info->updated_time = date('Y-m-d H:i:s');
      $user_info->update(0);
        return $this->renderJson([],'编辑成功~');
    }
    // 重置密码
    public function actionResetPwd()
    {
      if(\Yii::$app->request->isGet){
        return $this->render("reset_pwd",['user_info'=>$this->current_user]);
      }
      //  $this->layout = "main";
      //  return $this->render('reset_pwd
     $old_password = trim($this->post("old_password",""));
     $new_password = trim($this->post("new_password",""));
     if (mb_strlen($old_password,"utf-8") <1) {
       return $this->renderJson([],"请输入原密码",-1);
     }

     if (mb_strlen($new_password,"utf-8") <6) {
       return $this->renderJson([],"请输入不少于6位字符的新密码",-1);
     }
     if($old_password == $new_password){
     return   $this->renderJson([],"请重新输入一个吧，新密码和原来的密码不能相同哦",-1);
     }


      $current_user = $this->current_user;

      $auth_pwd= md5($old_password . md5($current_user['login_salt']));

      if ($auth_pwd !=$current_user['login_pwd']){
        return $this->renderJson([],"请检查原密码是否正确~~",-1);
      }

      $current_user->login_pwd = md5($new_password . md5($current_user['login_salt']));
      $current_user->updated_time = date("Y-m-d H:i:s");
      $current_user->update(0);
      $this->setLoginStatus($current_user);
      return $this->renderJson([],"重置密码成功~~");

    }
    public function actionLogout()
    {
      $this->removeLoginStatus();
      return $this->redirect(UrlService::buildWebUrl("/user/login"));
    }



}
