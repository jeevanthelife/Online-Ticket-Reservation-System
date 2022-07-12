<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Controller;
use App\models\User;

/**
 * Class AuthController
 * 
 * @author Jeevan Karki <jeevan.life195@gmail.com>
 * @package App\Controllers
 */

 class AuthController extends Controller
 {
    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login');
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
}
 