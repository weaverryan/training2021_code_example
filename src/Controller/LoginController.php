<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class LoginController extends AbstractController
{
    /**
     * @Route("/login")
     */
    public function login()
    {
        $loginCheck = $this->generateUrl(
            'app_login_check',
            [],
            UrlGeneratorInterface::ABSOLUTE_URL
        );

        $url = 'http://54.196.76.192/authorize?redirect_uri='.$loginCheck;

        return $this->redirect($url);
    }

    /**
     * @Route("/login/check", name="app_login_check")
     */
    public function loginCheck()
    {
        throw new \Exception('Eventually, this will never be hit!');
    }
}
