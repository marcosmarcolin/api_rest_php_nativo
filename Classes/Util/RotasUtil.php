<?php

namespace Util;

class RotasUtil
{
    /**
     * @return array
     */
    public static function getRotas()
    {
        $urls = self::getUrls();

        $request = [];
        $request['rota'] = strtoupper($urls[0]);
        $request['recurso'] = $urls[1] ?? null;
        $request['id'] = $urls[2] ?? null;
        $request['metodo'] = $_SERVER['REQUEST_METHOD'];

        return $request;
    }

    /**
     * @return false|string[]
     */
    public static function getUrls()
    {
        $uri = str_replace('/' . DIR_PROJETO, '', $_SERVER['REQUEST_URI']);
        return explode('/', trim($uri, '/'));
    }
}