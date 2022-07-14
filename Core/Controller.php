<?php


namespace App\Core;

use App\Core\MiddleWares\BaseMiddleware;

/**
 * Class Controller
 * 
 * @author Jeevan Karki <jeevan.life195@gmail.com>
 * @package App\Core
 */


class Controller
{
    public string $layout = 'main';
    public string $action = '';
    
    /**
     * @var \App\Core\MiddleWares\BaseMiddleware[] 
     */

    protected array $middlewares = [];
 
    public function setLayout($layout): void
    {
        $this->layout = $layout;
    }

    public function render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }
    
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}
