﻿<?php
require("../model/model.php");

$obiekt = new Model();
if($_GET["operation"]=="add"){


    $obiekt->addStudent($_GET["imie"], $_GET["nazwisko"], $_GET["klasa"] ,$_GET["rocznik"] );

}
elseif($_GET["operation"]=="delete"){
    //$obiekt = new Model();
    $chooseStudent = $obiekt->oneStudent($_GET["uczniowie"]);
    $obiekt->deleteStudent($chooseStudent["nazwisko"], $chooseStudent["Id"]);
   // $obiekt->deleteStudent($_GET["nazwisko"], $_GET["id"]);
}
elseif ($_GET["operation"]=="edit"){

    $tab = $obiekt->editStudent($_GET["imie"],$_GET["nazwisko"],$_GET["klasa"], $_GET["rocznik"]);  //downloading data of one student

}
else{
    echo "Błędne dane lub niekompletne";
}
echo "<br><a href='../view/view.php'>Powrtót</a>";

class Control{
}
	
?>