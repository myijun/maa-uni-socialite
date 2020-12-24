<?php
/**
 *
 * @project uni-socialite
 * @filename AppConfig.php
 * @author kb mk9007@163.com
 * @createtime  2020-12-2020/12/24 16:04
 */

namespace Myj\UniSocialite;


class AppConfig
{
    /**
     * 小程序 appId
     * @var string
     */
    protected $APPID;
    /**
     * 小程序 appSecret
     * @var string
     */
    protected $APPSecret;


    /**
     * 用户的 session-key
     * @var string
     */
    protected $sessionKey;

    /**
     * @return string
     */
    public function getAPPID(): string
    {
        return $this->APPID;
    }

    /**
     * @param string $APPID
     * @return AppConfig
     */
    public function setAPPID(string $APPID): AppConfig
    {
        $this->APPID = $APPID;
        return $this;
    }

    /**
     * @return string
     */
    public function getAPPSecret(): string
    {
        return $this->APPSecret;
    }

    /**
     * @param string $APPSecret
     * @return AppConfig
     */
    public function setAPPSecret(string $APPSecret): AppConfig
    {
        $this->APPSecret = $APPSecret;
        return $this;
    }

    /**
     * @return string
     */
    public function getSessionKey(): string
    {
        return $this->sessionKey;
    }

    /**
     * @param string $sessionKey
     * @return AppConfig
     */
    public function setSessionKey(string $sessionKey): AppConfig
    {
        $this->sessionKey = $sessionKey;
        return $this;
    }


}