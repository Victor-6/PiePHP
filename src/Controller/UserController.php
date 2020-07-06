<?php

namespace Controller;

use \Core\Controller;
use Core\Database;
use Core\ORM;
use Model\UserModel;
use \Core\Request;

class UserController extends Controller
{
    private $orm;
    private $id;

    public function __construct()
    {
        parent::__construct(); //instiencie tous les controllers de la classe Request
        new Request();
        $this->orm = new ORM();
    }

    public function errorAction()
    {
        echo "404 ERROR, FILE NOT FOUND";
    }

    public function registerAction()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $register = new UserModel($_POST['email'], $_POST['password']);
            $register->Create($_POST['email'], $_POST['password']);
            header('Location: login');
        } else {
            $this->render("register");
        }
    }

    public function loginAction()
    {
        $this->render('login');
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $this->model = new UserModel($_POST['email'], $_POST['password']);
            if ($this->model->login($_POST['email'], $_POST['password'])) {
                header('Location: show');
                $this->orm->read("users", $_SESSION['id']);
            } else {
                header('Location: login');
            }
        }
    }

    public function showAction()
    {
        $this->render("show");
        $id = $_SESSION['id'];
        $email = $_SESSION['email'];
        $model = new ORM();
        $this->orm->read("users", $id);

        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $this->orm->update("users", $id, $_POST);
        }

        if (isset($_POST['password'])) {
            $password = $_POST['password'];
            $this->orm->update("users", $id, $_POST);
        }
    }
}

