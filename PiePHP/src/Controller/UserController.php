<?php

class UserController extends Controller
{
    

    public function __construct() {
        // echo __CLASS__ . " _construct<br>";
    }

    public function indexAction() {
        echo "la function " . __FUNCTION__ . "est lancer<br>";
    }
    // appel en dur mes views
    public function addAction() {
        echo __FUNCTION__ . " Ok \n";

        $this->render('login');
    }

    public function modifAction() {
        echo __FUNCTION__ . " Ok \n";

        $this->render('test');
    }

    public function registerAction() {
        // echo __FUNCTION__ . " Ok \n";   
        $this->render('register');

        if (isset($_POST['email'], $_POST['password'])) {
            if (!empty($_POST['email']) && !empty(['password'])) {
                // echo "here<br>";

                $model = new UserModel($_POST['email'], $_POST['password']);
                $model->save();

            } else {
                echo "Email ou password vide <br>";
            }
        }
    }

}