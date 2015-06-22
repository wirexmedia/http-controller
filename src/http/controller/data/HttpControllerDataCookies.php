<?php
/**
 * This file is part of Soloproyectos common library.
 *
 * @author  Gonzalo Chumillas <gchumillas@email.com>
 * @license https://github.com/soloproyectos/php.common-libs/blob/master/LICENSE BSD 2-Clause License
 * @link    https://github.com/soloproyectos/php.common-libs
 */
namespace wirexmedia\common\http\controller\data;
use wirexmedia\common\arr\ArrHelper;

/**
 * Class HttpControllerDataCookies.
 *
 * @package Event
 * @author  Gonzalo Chumillas <gchumillas@email.com>
 * @license https://github.com/soloproyectos/php.common-libs/blob/master/LICENSE BSD 2-Clause License
 * @link    https://github.com/soloproyectos/php.common-libs
 */
class HttpControllerDataCookies
{
    /**
     * By default the cookie expires in one year (365 * 24 * 60 * 60 seconds)
     */
    const DEFAULT_EXPIRATION_TIME = 31536000;

    /**
     * Gets a request attribute.
     *
     * @param string $name    Request attribute.
     * @param string $default Default value (not required)
     *
     * @return mixed
     */
    public function get($name, $default = "")
    {
        return ArrHelper::get($_COOKIE, $name, $default);
    }

    /**
     * Sets a request attribute.
     *
     * @param string $name           Request attribute.
     * @param mixed  $value          Request value.
     * @param int    $expirationTime Expiration time (default is one year)
     *
     * @return void
     */
    public function set(
        $name,
        $value,
        $expirationTime = HttpControllerDataCookies::DEFAULT_EXPIRATION_TIME
    ) {
        setcookie($name, $value, time() + $expirationTime, "/");
    }

    /**
     * Does the request attribute exist?
     *
     * @param string $name Request attribute.
     *
     * @return boolean
     */
    public function is($name)
    {
        return ArrHelper::is($_COOKIE, $name);
    }

    /**
     * Deletes a request attribute.
     *
     * @param string $name Request attribute.
     *
     * @return void
     */
    public function del($name)
    {
        setcookie($name, "", time() - 3600, "/");
        ArrHelper::del($_COOKIE, $name);
    }
}
