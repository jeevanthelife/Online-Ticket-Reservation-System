<?php

namespace App\Models;

use App\Core\UserModel;

/**
 * Class User
 * 
 * @author Jeevan Karki <jeevan.life195@gmail.com>
 * @package App\Models
 */

class User extends UserModel
 {
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const STATUS_DELETED = 2;
    const ROLE_ADMIN = 1;
    const ROLE_USER = 2;
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $gender = '';
    public string $username = '';
    public int $status = self::STATUS_INACTIVE;
    public int $role = self::ROLE_USER;
    public string $password = '';
    public string $confirmpassword = '';
    
    public static function tableName(): string
    {
        return 'users';
    }
    
    public static function primaryKey(): string
    {
        return 'id';
    }

    
    public function save()
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, 'class' => self::class
                ]],
            'username' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 5], [self::RULE_MAX, 'max' => 24], [
                self::RULE_UNIQUE, 'class' => self::class
                ]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 5], [self::RULE_MAX, 'max' => 16]],
            'confirmpassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function attributes(): array
    {
        return ['name', 'gender', 'email', 'phone', 'username', 'password', 'status', 'role'];
    }
    
    public function labels(): array
    {
        return [
            'name' => 'Full Name',
            'email' => 'Email',
            'phone' => 'Phone Number',
            'username' => 'Username',
            'password' => 'Password',
            'confirmpassword' => 'Confirm Password',
        ];
    }

    public function getDisplayName(): string
    {
        return $this->name;
    }

    
 }
