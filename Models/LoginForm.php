<?php

namespace App\Models;

use App\Core\Application;
use App\Core\Model;
use App\Models\User;

/**
 * Class LoginForm
 * 
 * @author Jeevan Karki <jeevan.life195@gmail.com>
 * @package App\Models
 */

class LoginForm extends Model
 {

    public string $role = '';
    public string $username = '';
    public string $password = '';
    
    public function rules(): array
    {
        return [
            'username' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
            'username' => 'Username',
            'password' => 'Password'
        ];
    }

    public function login()
    {
        $user = User::findOne(['username' => $this->username]);
        if ($user->role === 1) {
            $this->addError('username', 'You\'re an admin. Please, Login from Admin Login Page!');
            return false;
        }
        
        if (!$user) {
            $this->addError('username', 'Username does not exists.');
            return false;
        }
        
        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'The password you\'ve entered is incorrect.');
            return false;
        }
       
        return Application::$app->login($user);
    }
    
    public function adminLogin()
    {
        $user = User::findRole(['username' => $this->username]);
        
        if ($user->role === 2) {
            $this->addError('username', 'Username is not an admin. Please login from the User Login Page.');
            return false;
        }

        if (!$user) {
            $this->addError('username', 'Username does not exists.');
            return false;
        }
        
        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'The password you\'ve entered is incorrect.');
            return false;
        }
       
        return Application::$app->adminLogin($user);
    }
    

    
 }
