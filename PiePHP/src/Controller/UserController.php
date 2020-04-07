<?php

class UserController extends Controller
{
    

    public function __construct() {
        $this->request = new Request($_POST, $_GET);
        $this->orm = new ORM();
        $this->clean = $this->request->cleanArray();
    }

    public function indexAction() {
        // echo "la function " . __FUNCTION__ . "est lancer<br>";
        // $this->orm->create("users", ['email'=>'pauline', 'password'=>'chauvel']);

        // $this->orm->find("users");

        // $this->orm->read("users", "1");

        // $bool = $this->orm->delete('users', 2);
        // var_dump($bool);

        $bool = $this->orm->update("users", 10, ['email'=>'jqireussi', 'password'=>'cesttropcool']);
        var_dump($bool);

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
                
                $model = new UserModel($_POST['email'], $_POST['password']);
                $id = $model->create();

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
                    $model->readAll();

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

    ///////////////VERIFIER SI CORRECT///////////////
    public function testAction() {
        $model = new UserModel();

        $model->read(2, ["email", "password"]);
    }
    ////////////////////////////////////////////////

}