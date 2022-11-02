<?php
class Controller {
    
    function model($modelName) {
        require_once "models/{$modelName}.php";
        $model = new $modelName();
        return $model;
    }

    function render($controller, $action) {
        return "views/{$controller}/{$action}.php";
    }
}
?>