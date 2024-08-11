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

//PKCS#5填充
class PKCS5Encoder
{
    public static int $packSize = 16;


    /**
     * PKCS#5 填充（Padding）
     * @param string $str
     * @return string
     */
    public static function pkcs5Encode(string $str): string
    {
        $strLength = strlen($str);
        //计算需要填充的位数
        $toPadNum = self::$packSize - ($strLength % self::$packSize);
        if ($toPadNum == 0) {
            $toPadNum = self::$packSize;
        }
        return $str . str_repeat(chr($toPadNum), $toPadNum);

    }


    /**
     * PKCS#5 填充的解码（去除填充）
     * @param string $str
     * @return string
     */
    public static function pkcs5Decode(string $str): string
    {
        //获取填充值
        $pad = ord(substr($str, -1));
        //检查填充值是否合法
        if ($pad < 1 || $pad > self::$packSize) {
            $pad = 0;
        }
        return substr($str, 0, (strlen($str) - $pad));
    }

}