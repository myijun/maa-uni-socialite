<?php
/**
 *
 * @project uni-socialite
 * @filename Socialite.php
 * @author kb mk9007@163.com
 * @createtime  2020-12-2020/12/24 15:36
 */

namespace Myj\UniSocialite;


class UniSocialite
{
    /**
     * @param $driver
     * @return IDriver
     * @author kb mk9007@163.com
     *2020-12-2020/12/24  15:45
     */
    public static function driver($driver, AppConfig $config)
    {
        if (!class_exists($driver)) {
            throw new \RuntimeException('驱动不存在！');
        }
        return new $driver($config);
    }

}