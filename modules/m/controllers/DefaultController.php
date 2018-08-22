<?php

namespace app\modules\m\controllers;

use app\models\brand\BrandImages;
use app\models\brand\BrandSetting;
use app\modules\m\controllers\common\BaseController;
use yii\web\Controller;

/**
 * Default controller for the `m` module
 */
class DefaultController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */


  public function __construct($id, $module, $config = [])
   {
             parent::__construct($id, $module, $config = []);
             $this->layout = "main";
   }


    public function actionIndex()
    {
        $info =BrandSetting::find()->one();
        $image_list = BrandImages::find()->all();
    
        return $this->render('index',
        [
            'info'=>$info,
            'image_list'=>$image_list

        ]

        );
    }
}
