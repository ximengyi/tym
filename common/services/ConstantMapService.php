<?php
/**
 * Created by PhpStorm.
 * User: MengYi
 * Date: 2018/6/13 0013
 * Time: 1:11
 */

namespace app\common\services;


class ConstantMapService
{

    public static $status_default = -1;
    public static $status_mapping = [
        1 =>'正常',
        0 =>'已删除',
    ];

}