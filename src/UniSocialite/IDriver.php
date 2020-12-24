<?php
/**
 *
 * @project uni-socialite
 * @filename IDriver.php
 * @author kb mk9007@163.com
 * @createtime  2020-12-2020/12/24 15:40
 */

namespace Myj\UniSocialite;


interface IDriver
{

    /**
     * 小程序登录
     * @return IDriver
     * @author kb mk9007@163.com
     *2020-12-2020/12/24  15:42
     */
    public function login();

    /**
     * @param array $parameters
     * @return IDriver
     * @author kb mk9007@163.com
     *2020-12-2020/12/24  15:42
     */
    public function witch(array $parameters);

    /**
     * @return IDriver
     * @author kb mk9007@163.com
     *2020-12-2020/12/24  15:42
     */
    public function register();


}