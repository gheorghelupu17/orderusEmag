<?php


namespace Orderus\Utils;


class Config
{

    /**
     * ConfigClass constructor.
     */
    private $config;

    public function __construct()
    {
        $configs = get_defined_constants(true)['user'];
        foreach ($configs as $key => $value) {
            $key = strtolower(trim($key, '_'));
            $this->{$key} = $value;
        }
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @param array $config
     */
    public function setConfig(array $config): void
    {
        $this->config = $config;
    }
}