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

//AES解密
class AES
{

    /**
     * AES解密
     * @param string $encryptedData 返回的加密数据（base64编码）
     * @param string $sessionKey 有效的sessionKey，通过 login code 置换
     * @param string $iv 返回的加密IV（base64编码）
     * @return false|string
     */
    public static  function decrypt(string $encryptedData, string $sessionKey, string $iv)
    {
        $aesKey = base64_decode($sessionKey);
        $ivBytes = base64_decode($iv);
        $cipherBytes = base64_decode($encryptedData);
        return openssl_decrypt(
            $cipherBytes,
            'AES-128-CBC',
            $aesKey,
            OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING,
            $ivBytes
        );
    }


}