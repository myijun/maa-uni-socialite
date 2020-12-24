<?php
/**
 *
 * @project uni-socialite
 * @filename Helpers.php
 * @author kb mk9007@163.com
 * @createtime  2020-12-2020/12/24 16:20
 */

namespace Myj\UniSocialite;


class Helpers
{
    /**
     * 字符串json解析
     * @param $jsonString
     * @param null $jsonLastError
     * @return bool|mixed
     */
    public static function jsonDecode($jsonString, &$jsonLastError = null)
    {
        if (empty($jsonString)) {
            return false;
        }
        $json = json_decode($jsonString, true);
        $jsonLastError = json_last_error();
        if ($jsonLastError != JSON_ERROR_NONE) {
            return false;
        }
        return $json;
    }

    /**
     * @param $jsonString
     * @param null $jsonLastError
     */
    public static function jsonEncode($subject, &$jsonLastError = null)
    {
        if ($subject == '' || is_null($subject)) {
            return '';
        }
        $json = json_encode($subject);
        $jsonLastError = json_last_error();
        if ($jsonLastError != JSON_ERROR_NONE) {
            return '';
        }
        return $json;
    }
}