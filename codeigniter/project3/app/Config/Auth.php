<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use Myth\Auth\Config\Auth as AuthConfig;


class Auth extends AuthConfig
{
    // public $viewLayout = 'layouts/auth';
    /**
     * ---------------------------------------------------------------
     * Require Confirmation Registration via Email
     * ---------------------------------------------------------------
     */
    public $requireActivation = null;

    /**
     * --------------------------------------------------------------------
     * Views used by Auth Controllers
     * --------------------------------------------------------------------
     */
    public $views = [
        'login'           => 'Auth/login',
        'register'        => 'Auth/register',
        'forgot'          => 'Myth\Auth\Views\forgot',
        'reset'           => 'Myth\Auth\Views\reset',
        'emailForgot'     => 'Myth\Auth\Views\emails\forgot',
        'emailActivation' => 'Myth\Auth\Views\emails\activation',
    ];
}
