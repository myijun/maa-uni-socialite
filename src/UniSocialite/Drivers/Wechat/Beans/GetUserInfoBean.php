<?php
/**
 *
 * @project uni-socialite
 * @filename GetUserInfoBean.php
 * @author kb mk9007@163.com
 * @createtime  2020-12-2020/12/24 16:55
 */

namespace Myj\UniSocialite\Drivers\Wechat\Beans;


use Myj\UniSocialite\Helpers;

class GetUserInfoBean
{
    /**
     * 用户信息对象，不包含 openid 等敏感信息
     * @var array
     */
    public $userInfo;

    /**
     * 不包括敏感信息的原始数据字符串，用于计算签名
     * @var string
     */
    protected $rawData;
    /**
     * 使用 sha1( rawData + sessionkey ) 得到字符串，用于校验用户信息
     * @var string
     */
    protected $signature;
    /**
     * 包括敏感数据在内的完整用户信息的加密数据
     * @var string
     */
    protected $encryptedData;
    /**
     * 加密算法的初始向量
     * @var string
     */
    protected $iv;
    /**
     * 敏感数据对应的云 ID，开通云开发的小程序才会返回，可通过云调用直接获取开放数据
     * @var string
     */
    protected $cloudID;

    /**
     * @return array
     */
    public function getUserInfo(): array
    {
        return $this->userInfo;
    }

    /**
     * @param array $userInfo
     * @return GetUserInfoBean
     */
    public function setUserInfo(string $userInfo): GetUserInfoBean
    {
        $this->userInfo = Helpers::jsonDecode($userInfo);
        return $this;
    }

    /**
     * @return string
     */
    public function getRawData(): string
    {
        return $this->rawData;
    }

    /**
     * @param string $rawData
     * @return GetUserInfoBean
     */
    public function setRawData(string $rawData): GetUserInfoBean
    {
        $this->rawData = $rawData;
        return $this;
    }

    /**
     * @return string
     */
    public function getSignature(): string
    {
        return $this->signature;
    }

    /**
     * @param string $signature
     * @return GetUserInfoBean
     */
    public function setSignature(string $signature): GetUserInfoBean
    {
        $this->signature = $signature;
        return $this;
    }

    /**
     * @return string
     */
    public function getEncryptedData(): string
    {
        return $this->encryptedData;
    }

    /**
     * @param string $encryptedData
     * @return GetUserInfoBean
     */
    public function setEncryptedData(string $encryptedData): GetUserInfoBean
    {
        $this->encryptedData = $encryptedData;
        return $this;
    }

    /**
     * @return string
     */
    public function getIv(): string
    {
        return $this->iv;
    }

    /**
     * @param string $iv
     * @return GetUserInfoBean
     */
    public function setIv(string $iv): GetUserInfoBean
    {
        $this->iv = $iv;
        return $this;
    }

    /**
     * @return string
     */
    public function getCloudID(): string
    {
        return $this->cloudID;
    }

    /**
     * @param string $cloudID
     * @return GetUserInfoBean
     */
    public function setCloudID(string $cloudID): GetUserInfoBean
    {
        $this->cloudID = $cloudID;
        return $this;
    }


}