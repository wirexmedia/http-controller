<?php
/**
 * This file is part of WirexMedia common library.
 *
 * @author  Gonzalo Chumillas <gchumillas@email.com>
 * @license https://github.com/wirexmedia-php/http-controller/blob/master/LICENSE The MIT License (MIT)
 * @link    https://github.com/wirexmedia-php/http-controller
 */
namespace wirexmedia\http\controller\data;
use wirexmedia\arr\ArrHelper;

/**
 * Class HttpControllerDataRequest.
 *
 * This class is used to access the request variables.
 *
 * @package Http\Request
 * @author  Gonzalo Chumillas <gchumillas@email.com>
 * @license https://github.com/wirexmedia-php/http-controller/blob/master/LICENSE The MIT License (MIT)
 * @link    https://github.com/wirexmedia-php/http-controller
 */
class HttpControllerDataRequest
{
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
        $param = ArrHelper::get($_REQUEST, $name, $default);

        if ($_SERVER["REQUEST_METHOD"] == "GET" && is_string($param)) {
            $param = urldecode($param);
        }

        return $param;
    }

    /**
     * Sets a request attribute.
     *
     * @param string $name  Request attribute.
     * @param mixed  $value Request value.
     *
     * @return void
     */
    public function set($name, $value)
    {
        $_REQUEST[$name] = $value;
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
        return ArrHelper::is($_REQUEST, $name);
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
        ArrHelper::del($_REQUEST, $name);
    }
}
