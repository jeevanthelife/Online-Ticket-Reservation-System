<?php


namespace App\Core\MiddleWares;

use App\Core\Application;
use App\Core\Exception\ForbiddenException;
use App\Core\Exception\UserForbiddenException;

/**
 * Class AuthMiddleware
 * 
 * @author Jeevan Karki <jeevan.life195@gmail.com>
 * @package App\Core\MiddleWares
 */


class UserAuthMiddleware extends BaseMiddleware
{
    public array $actions = [];

    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }
    
    public function execute()
    {
        if (Application::isUser()) {
            if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }
    }
    
}
