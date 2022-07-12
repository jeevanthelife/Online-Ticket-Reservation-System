<?php


namespace App\Core\Form;

use App\Core\Model;

/**
 * Class Form
 * 
 * @author Jeevan Karki <jeevan.life195@gmail.com>
 * @package App\Core\Form
 */


class Form
{
    public static function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }

    public static function end()
    {
        return '</form>';
    }

    public function field(Model $model, $attribute)
    {
        return new Field($model, $attribute);
    }
}