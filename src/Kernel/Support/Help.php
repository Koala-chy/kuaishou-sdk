<?php
/*
 * This file is part of the koala/kuaishou.
 *
 * (c) koala <koalachy@gamil.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Koala\Kuaishou\Kernel\Support;


/**
 * Class Help
 */
class Help
{

    //应用数据
    protected static array $applicationCache = [];


    /**
     * 映射对应APP应用
     * @param string $appName
     * @return array|mixed|string|string[]
     */
    public static function mapping(string $appName)
    {
        $key = $appName;
        if (isset(static::$applicationCache[$key])){
            return static::$applicationCache[$key];
        }
        $appName = ucwords(str_replace(['-', '_'], ' ', $appName));
        return static::$applicationCache[$key] = str_replace(' ', '', $appName);
    }




}