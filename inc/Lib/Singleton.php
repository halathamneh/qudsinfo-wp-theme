<?php


namespace QITheme\Lib;


/**
 * Class Singleton
 * @package QITheme\Lib
 */
class Singleton
{
    private static $instances = [];

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance(...$args): self
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            if(count($args) > 0) {
                self::$instances[$cls] = new static(...$args);
            } else {
                self::$instances[$cls] = new static;
            }
        }

        return self::$instances[$cls];
    }

}
