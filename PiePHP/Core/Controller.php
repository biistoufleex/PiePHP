<?php 

class Controller 
{

    private static $_render;

    protected function render($view, $scope = []) {
        

        extract($scope);

        $path = ($view == "404") ? "Error" : get_class($this);
        $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', str_replace('Controller', '', basename($path)), $view]) . '.php';

        if (file_exists($f)) {
                ob_start();
                include($f);
                $view = ob_get_clean();
                ob_start();


                // Layout
                include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', 'index'])
                . '.php');
                self::$_render = ob_get_clean();

                echo "<a href=" . 'add' . "><button>ADD</button></a> <br>" .  
                "<a href=" . 'delete' . "><button>Delete</button></a> <br>" . self::$_render;
            }
    }
}