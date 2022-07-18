<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Controller;
use App\Core\MiddleWares\AuthMiddleware;
use App\Core\MiddleWares\UserAuthMiddleware;
use App\Core\Request;
use App\Core\Response;
use App\Models\LoginForm;
use App\models\User;

/**
 * Class AuthController
 * 
 * @author Jeevan Karki <jeevan.life195@gmail.com>
 * @package App\Controllers
 */

 class AuthController extends Controller
 {
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
        $this->registerMiddleware(new UserAuthMiddleware(['dashboard']));
    }
    
    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());

            
            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/');
                return;
            }
        }
        
        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function adminLogin(Request $request, Response $response)
    {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());

            
            if ($loginForm->validate() && $loginForm->adminLogin()) {
                $response->redirect('dashboard');
                return;
            }
        }
        
        $this->setLayout('auth');
        return $this->render('admin/adminLogin', [
            'model' => $loginForm
        ]);
    }
    
    public function dashboard(Request $request, Response $response)
    {
        
        return $this->render('admin/dashboard');
    }
    
    public function register($request)
    {
        $user = new User();
        if ($request->isPost()) {                                
            $user->loadData($request->getBody());

            
            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thank you for registering!!');
                Application::$app->response->redirect('/');
                exit;
            }
            
            return $this->render('register', [
                'model' => $user
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $user
        ]);
    }

    public function profile(Request $request, Response $response)
    {
        return $this->render('profile');
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }
    
    public function adminLogout(Request $request, Response $response)
    {
        Application::$app->adminLogout();
        $response->redirect('/');
    }
    
}
 