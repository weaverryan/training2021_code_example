<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;

class SimpleSSOAuthenticator extends AbstractGuardAuthenticator
{
    public function supports(Request $request)
    {
        return $request->attributes->get('_route') === 'app_login_check';
    }

    public function getCredentials(Request $request)
    {
        return [
            'email' => $request->query->get('email'),
            'name' => $request->query->get('name'),
        ];
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $user = new User();
        $user->setEmail($credentials['email']);
        $user->setName($credentials['name']);

        return $user;
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        dd('check credentials');
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        // todo
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $providerKey)
    {
        // todo
    }

    public function start(Request $request, AuthenticationException $authException = null)
    {
        // todo
    }

    public function supportsRememberMe()
    {
        // todo
    }
}
