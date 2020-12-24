<?php
/**
 *
 * @project uni-socialite
 * @filename Wxbizdatacrypt.php
 * @author kb mk9007@163.com
 * @createtime  2020-12-2020/12/24 17:05
 */

namespace Myj\UniSocialite\Drivers\Wechat;


use Myj\UniSocialite\Helpers;
use \RuntimeException;
use Myj\UniSocialite\AppConfig;

class Crypt
{
    /**
     * @var AppConfig
     */
    private $config;

    public function __construct(AppConfig $config)
    {
        $this->config = $config;
    }

    /**
     * 检验数据的真实性，并且获取解密后的明文.
     * @param $encryptedData string 加密的用户数据
     * @param $iv string 与用户数据一同返回的初始向量
     * @param $data string 解密后的原文
     *
     * @return int 成功0，失败返回对应的错误码
     */
    public function decryptData($encryptedData, $iv, &$data)
    {
        if (strlen($this->config->getSessionKey()) != 24) {
            throw new RuntimeException('SessionKey长度错误!');
        }
        $aesKey = base64_decode($this->sessionKey);
        if (strlen($iv) != 24) {
            throw new RuntimeException('加密算法的初始向量长度错误!');
        }
        $aesIV = base64_decode($iv);
        $aesCipher = base64_decode($encryptedData);
        $result = openssl_decrypt($aesCipher, "AES-128-CBC", $aesKey, 1, $aesIV);
        $dataObj = Helpers::jsonDecode($result);
        if (!$dataObj) {
            return false;
        }
        if ($dataObj['watermark']['appid'] ?? '' != $this->config->getAPPID()) {
            return false;
        }
        return $dataObj;
    }

}