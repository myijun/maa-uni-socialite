<?php
/**
 *
 * @project uni-socialite
 * @filename AbstractDriver.php
 * @author kb mk9007@163.com
 * @createtime  2020-12-2020/12/24 15:47
 */

namespace Myj\UniSocialite;


abstract class AbstractDriver implements IDriver
{

    protected $parameters;
    /**
     * @var AppConfig
     */
    protected $config;

    public function __construct(AppConfig $config)
    {
        $this->config = $config;
    }

    public function witch(array $parameters)
    {
        $this->parameters = $parameters;
    }
}