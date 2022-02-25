<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StudentController extends Controller
{
    // Route defines the URL path and the HTTP method

    /**
     * @Route("/student/")
     */

    //  Action method where to build a page and return a Response object
    public function homeAction()
    {
        return $this->render('student/home.html.twig');
    }
}

// $request = Request::createFromGlobals();
// $request = Request::Create(
//     '/student',
//     'GET',
//     array('name' => 'John', 'age' => '25')
// );
