<?php

namespace App\Core;

/**
 * Class Application
 * 
 * @author Jeevan Karki <jeevan.life195@gmail.com>
 * @package App\Core
 */

 
class Response
{
    public function setStatusCode(int $code)
    {
        http_response_code($code);
    }

    public function redirect(string $url)
    {
        header('Location: '.$url);
    }
    
}
