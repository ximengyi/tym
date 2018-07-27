<?php
/**
 * Created by PhpStorm.
 * User: MengYi
 * Date: 2018/7/27
 * Time: 9:58
 */

namespace app\common\services;

//所有服务的基类
class BaseService
{
   protected static $_error_msg = null;

   protected  static $_error_code = null;

   public  static function _err($msg='',$code = -1){
       self::$_error_msg = $msg;
       self::$_error_code = $code;
       return false;
   }


   public static function getLastErrorMsg(){

       return self::$_error_msg;
   }


    public static function getLastErrorCode(){

        return self::$_error_code;
    }

}