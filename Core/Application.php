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

    public string $layout = 'main';
    
    public string $userClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;
    public Session $session;
    public ?DbModel $user;


    public static Application $app;
    public ?Controller $controller = null;

    public function __construct($rootPath, array $config)
    {
        $this->userClass = $config['userClass'];
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->router = new Router($this->request, $this->response);
        
        $this->db = new Database($config['db']);


        $primaryValue = $this->session->get('user');
        if ($primaryValue) {
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);

        } else {
            $this->user = null;
        }
        
    }

    public static function isGuest()
    {
        return !self::$app->user;
    }

    public function run()
    {
        try{
            echo $this->router->resolve();
        }catch(\Exception $e){
            $this->response->setStatusCode($e->getCode());
            echo $this->router->renderView('errorPage', [
                'exception' => $e
            ]);
        }
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
        $this->controller = $controller;
    }

    public function login(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;

    }
    
    public function adminLogin(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set('user', $primaryValue);
        return true;

    }

    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');

    }
    
}
