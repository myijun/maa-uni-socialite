<?php
/**
 *
 * @project uni-socialite
 * @filename Wechat.php
 * @author kb mk9007@163.com
 * @createtime  2020-12-2020/12/24 15:48
 */

namespace Myj\UniSocialite\Drivers\Wechat;


use Myj\UniSocialite\AbstractDriver;
use Myj\UniSocialite\Drivers\Wechat\Beans\GetUserInfoBean;

class Wechat extends AbstractDriver
{

    /**
     * 通过本接口可以获取openid，session_key，unionid
     * @return bool|mixed
     * @author kb mk9007@163.com
     *2020-12-2020/12/24  16:37
     */
    public function login()
    {
        $auth = new Auth($this->config);
        $code = $this->parameters['code'] ?? '';
        if (!$code) {
            throw new \RuntimeException('code获取失败!');
        }
        if (!$auth->code2Session($code)) {
            return false;
        }
        return $auth->value;
    }


    /**
     * @return mixed|void
     * @author kb mk9007@163.com
     *2020-12-2020/12/24  16:38
     */
    public function register()
    {
        $bean = new GetUserInfoBean();
        $bean->setUserInfo($this->parameters['userInfo'] ?? '');
        $bean->setRawData($this->parameters['rawData'] ?? '');
        $bean->setSignature($this->parameters['signature'] ?? '');
        $bean->setEncryptedData($this->parameters['encryptedData'] ?? '');
        $bean->setIv($this->parameters['iv'] ?? '');
        $bean->setCloudID($this->parameters['cloudID'] ?? '');
        if (!($bean->getUserInfo() && $bean->getRawData() && $bean->getSignature() && $bean->getEncryptedData() && $bean->getIv())) {
            throw  new \RuntimeException('register时需要获取到的必要数据丢失不存在.');
        }
        $auth = new Auth($this->config);
        if ($auth->getUserInfo($bean)) {
            return $auth->value;
        }
    }

    /**
     * 封装register时witch需要获取到的作用域数据
     * @param string $rawData 不包括敏感信息的原始数据字符串，用于计算签名
     * @param string $signature 使用 sha1( rawData + sessionkey ) 得到字符串，用于校验用户信息
     * @param string $encryptedData 包括敏感数据在内的完整用户信息的加密数据
     * @param string $iv 加密算法的初始向量
     * @param string $cloudID
     * @author kb mk9007@163.com
     *2020-12-2020/12/24  16:43
     */
    public static function registerWitch(string $userInfo, string $rawData, string $signature, string $encryptedData, string $iv, string $cloudID = null)
    {
        return [
            'userInfo' => $userInfo,
            'rawData' => $rawData,
            'signature' => $signature,
            'encryptedData' => $encryptedData,
            'iv' => $iv,
            'cloudID' => $cloudID,
        ];
    }

}