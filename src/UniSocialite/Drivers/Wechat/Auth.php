<?php
/**
 *
 * @project uni-socialite
 * @filename Auth.php
 * @author kb mk9007@163.com
 * @createtime  2020-12-2020/12/24 16:10
 */

namespace Myj\UniSocialite\Drivers\Wechat;


use Myj\UniSocialite\AppConfig;
use Myj\UniSocialite\CURL;
use Myj\UniSocialite\Drivers\Wechat\Beans\GetUserInfoBean;
use Myj\UniSocialite\Helpers;

class Auth
{

    const JSCODE2SESSION_URI = 'https://api.weixin.qq.com/sns/jscode2session?';
    /**
     * @var AppConfig
     */
    private $config;


    public $body;

    public $value;

    public function __construct(AppConfig $config)
    {
        $this->config = $config;
    }

    /**
     * 登录凭证校验。通过 wx.login 接口获得临时登录凭证 code 后传到开发者服务器调用此接口完成登录流程
     * @author kb mk9007@163.com
     *2020-12-2020/12/24  16:12
     */
    public function code2Session($code)
    {
        $url = sprintf('%s%s', self::JSCODE2SESSION_URI, http_build_query([
            'appid' => $this->config->getAPPID(),
            'secret' => $this->config->getAPPSecret(),
            'js_code' => $code,
            'grant_type' => 'authorization_code'
        ]));
        $result = $this->body = CURL::request($url);
        if (!$result) {
            return false;
        }
        $result = Helpers::jsonDecode($result);
        if (!$result) {
            return false;
        }
        if (($result['errcode'] ?? -1) == 0) {
            $this->value = [
                'openid' => $result['openid'] ?? '',
                'session_key' => $result['session_key'] ?? '',
                'unionid' => $result['unionid'] ?? ''
            ];
            return true;
        }
        return false;
    }

    /**
     * 解密获取敏感数据在内的完整用户信息
     * @param Beans\GetUserInfoBean $bean
     * @author kb mk9007@163.com
     *2020-12-2020/12/24  17:01
     */
    public function getUserInfo(GetUserInfoBean $bean)
    {
        if (sha1($bean->getRawData() . $this->config->getSessionKey()) !== $bean->getSignature()) {
            return false;
        }
        $crypt = new Crypt($this->config);
        $this->body = $crypt->decryptData($bean->getEncryptedData(), $bean->getIv());
        if (!$this->body) {
            return false;
        }
        $this->value = $this->body;
        return true;
    }


}