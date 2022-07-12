<?php


namespace App\Core;
use App\Core\Controller;
use App\Core\Database;

/**
 * Class Application
 * 
 * @author Jeevan Karki <jeevan.life195@gmail.com>
 * @package App\Core
 */


class Application
{
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;
    public Session $session;


    public static Application $app;
    public Controller $controller;

    public function __construct($rootPath, array $config)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        
        $this->db = new Database($config['db']);
    }

    public function run()
    {
        echo $this->router->resolve();
    }
    /**
     * @return \App\Core\Controller
     */

    public function getController(): Controller
    {
        return $this->controller;
    }
    /**
     * @param \App\Core\Controller $controller
     */
    public function setController(Controller $controller)
    {
        return $this->controller = $controller;
    }
}