<?php
namespace app\common\services;


/**
 *
 */
class StaticService
{
  public static function includeAppJsStatic($path,$depend)
  {
     self::includeAppStatic("js",$path,$depend);
  }
  public static function includeAppCssStatic($path,$depend)
  {
      self::includeAppStatic("css",$path,$depend);
  }
  protected static function includeAppStatic($type,$path,$depend)
  {
    if ($type=="css") {
        \Yii::$app->getView()->registerCssFile($path,["depends"=>$depend]);
    } else {
      \Yii::$app->getView()->registerJsFile($path,["depends"=>$depend]);
    }


  }


}
