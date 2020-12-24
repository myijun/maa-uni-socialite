<?php
/**
 *
 * @project uni-socialite
 * @filename CURL.php
 * @author kb mk9007@163.com
 * @createtime  2020-12-2020/12/24 16:18
 */

namespace Myj\UniSocialite;


class CURL
{
    public static function request($url, $body = null, $isPost = false)
    {

        // 提交请求
        $con = curl_init();
        curl_setopt($con, CURLOPT_URL, $url);
        curl_setopt($con, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($con, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($con, CURLOPT_HEADER, 0);
        curl_setopt($con, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($con, CURLOPT_POST, $isPost);
        if ($isPost && $body) {
            curl_setopt($con, CURLOPT_POSTFIELDS, $body);
        }
        $result = curl_exec($con);
        curl_close($con);
        return $result;
    }
}