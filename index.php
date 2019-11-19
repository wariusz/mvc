<?php
$config = require("config/config.php");
require("model/model.php");
require("controller/control.php");
if(array_key_exists('operation',$_GET)) {
    $operation = $_GET["operation"];
    $control = new Control($config);
    $control->$operation();
}
require("view/view.php");