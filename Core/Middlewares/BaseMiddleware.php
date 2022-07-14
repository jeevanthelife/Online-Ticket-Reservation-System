<?php


namespace App\Core\MiddleWares;

/**
 * Class BaseMiddlewares
 * 
 * @author Jeevan Karki <jeevan.life195@gmail.com>
 * @package App\Core\MiddleWares
 */


abstract class BaseMiddleware
{
    abstract public function execute();
}