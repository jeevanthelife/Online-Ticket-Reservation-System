<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Controller;
use App\Core\Request;

/**
 * Class SiteController
 * 
 * @author Jeevan Karki <jeevan.life195@gmail.com>
 * @package App\Controllers
 */

 class SiteController extends Controller
 {
    public function home()
    {
        $params = [
            'name' => "Ticket Booking System"
        ];
        return $this->render('home', $params);
    }
    public function contact()
    {
        return $this->render('contact');
    }
    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        return 'Handling Submitted Data.';
    }
 }
 