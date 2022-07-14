<?php


namespace App\Core;

/**
 * Class UserModel
 * 
 * @author Jeevan Karki <jeevan.life195@gmail.com>
 * @package App\Core
 */


abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}