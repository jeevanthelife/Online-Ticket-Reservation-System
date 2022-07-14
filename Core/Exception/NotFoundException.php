<?php


namespace App\Core\Exception;


/**
 * Class e
 * 
 * @author Jeevan Karki <jeevan.life195@gmail.com>
 * @package App\Core\Exception
 */


class NotFoundException extends ForbiddenException
{
    protected $message = 'Page Not Found.';
    protected $code = 404;
}
