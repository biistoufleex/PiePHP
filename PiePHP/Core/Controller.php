<?php 

class Controller 
{

    protected function render($view, $scope = []) {
        exctact($scope);
        $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', str_replace('Controller', '', basename(get_class($this))), $view]) . '.php';

            if (file_exist($f)) {
                ob_start();
                include($f);
                $view = ob_get_clean();
                ob_start();

                include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', 'index'])
                . '.php');
                self::$_render = ob_get_clean();
            }
    }
}