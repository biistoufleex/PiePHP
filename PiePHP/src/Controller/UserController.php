<?php

class UserController extends Controller
{
    

    public function __construct() {
        echo __CLASS__ . " _construct<br>";
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
        echo __FUNCTION__ . " Ok \n";   
        $this->render('register');

        if (isset($_POST['email'], $_POST['password'])) {
            
            //instancie userModel
            $model = new UserModel($_POST['email'], $_POST['password']);
            //appel methode save
            $model->save();


        }
    }

    // public function testAction() {
    //     $test = new Database();
    //     $bdd = $test->Connect();
    //     var_dump($bdd);
    // }
}