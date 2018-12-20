<?php
/**
 * Created by PhpStorm.
 * User: usersio
 * Date: 13/12/18
 * Time: 14:42
 */

namespace Controllers;

use Core\Config;
use Models\Employee;

class Controller
{
    protected $container;

    public function __construct($container) {
        $this->container = $container;
    }


    public function __get($property){
        if ($this->container->{$property}){
            return $this->container->{$property};
        }
    }

    public function redirect($response, $name){

        return $response->withStatus(302)->withHeader('Location', $this->container->router->pathFor($name));

    }

    public function flush($message, $type='succes'){
        if(isset($_SESSION['flush'])){
            $_SESSION['flush'] = [];
        }
        return $_SESSION['flush'][$type]= $message;

    }

    public function display($title){
        $employee = Employee::getEmployee($_SESSION['id']);

        return ['title'=> $title, 'footer' => Config::APPLI_NAME .' '. Config::APPLI_VERSION, 'employee' => $employee];

    }

}