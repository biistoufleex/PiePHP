<?php

class UserController extends Controller
{
    

    public function __construct() {
        // echo __CLASS__ . " _construct<br>";
    }

    public function indexAction() {
        echo "la function " . __FUNCTION__ . "est lancer<br>";
    }
    
    public function errorAction() {
        // echo __FUNCTION__ . " Ok <br>";

        $this->render('404');
    }

    public function addAction() {
        // echo __FUNCTION__ . " Ok <br>";

        $this->render('register');
    }

    
    public function registerAction() {
        // echo __FUNCTION__ . " Ok <br>";   
        $this->render('register');
        
    }
    
    public function loginAction() {

        $this->save();
        $this->render('login');

    }


    // Save password email dans la BDD
    public function save() {
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
    
    // Test la connection
    public function acceuilAction() {
        
        if (isset($_POST['email'], $_POST['password'])) {
            if (!empty($_POST['email']) && !empty(['password'])) {
               
                $model = new UserModel($_POST['email'], $_POST['password']);
                if ($model->rowUser() == 1) {

                    $this->render('acceuil');

                } else {
                    $this->render('login');
                    echo "Email ou Mot de passe incorect<br>";
                }
                
            } else {
                    $this->render('login');
                    echo "Email ou password vide <br>";
            }
        }
    }


}