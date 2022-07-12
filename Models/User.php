<?php

namespace App\Models;

use App\Core\DbModel;

/**
 * Class User
 * 
 * @author Jeevan Karki <jeevan.life195@gmail.com>
 * @package App\Models
 */

class User extends DbModel
 {
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const STATUS_DELETED = 2;
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $gender = '';
    public string $username = '';
    public int $status = self::STATUS_INACTIVE;
    public string $password = '';
    public string $confirmpassword = '';
    
    public function tableName(): string
    {
        return 'users';
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
        return ['name', 'gender', 'email', 'phone', 'username', 'password', 'status'];
    }
    
    
 }