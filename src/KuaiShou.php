<?php
/*
 * This file is part of the koala/kuaishou.
 *
 * (c) koala <koalachy@gamil.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Koala\Kuaishou;

use Koala\Kuaishou\Kernel\Support\Help;

/**
 * Class KuaiShou
 *
 * @method static \Koala\Kuaishou\MiniProgram\App  miniProgram(array $config)
 *
 */
class KuaiShou
{

    /**
     * 初始化映射应用入口
     * @param string $name
     * @param array $config
     * @return mixed
     */
    public static function make(string $name, array $config)
    {
        $namespace = Help::mapping($name);
        $application = "\\Koala\\Kuaishou\\{$namespace}\\App";
        return new $application($config);
    }

    /**
     * __callStatic 魔术方法
     * @param string $name 应用名称
     * @param array $arguments 对应参数
     *
     * @return mixed
     */
    public static function __callStatic(string $name, array $arguments)
    {
        return self::make($name, ...$arguments);
    }



}
