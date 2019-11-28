<!doctype htlm>
<html>
<head>
    <title>Html5 </title>
    <meta charset="utf-8">

    <body>
<h1>Wybierz operację do wykonania</h1>
    <?php

    if(isset($_GET["test"])){

       if ($_GET["test"]=="add"){
        echo "
        <form action='index.php' method='get'>
        <input name='imie' placeholder='wpisz imie' required>
        <input name='nazwisko' placeholder='wpisz nazwisko' required>
         <input name='klasa' placeholder='wpisz klasę' required>
        <input name='rocznik' type='number' placeholder='wpisz rocznik'>
        <input type='hidden' name='operation' value='add'>
        <button>dodaj</button>
        </form>";
        }

        elseif ($_GET["test"]=="delete"){


            if(!isset($_GET["uczniowie"])) {
                $tab = $obiekt->showStudents(); //return array with data of students

            }
        }
    }
    else
    {echo "<br> Nie wybranu żadnej operacji";}
    ?>

    <form action="index.php" method="get">

        <!--button name="test" value="showAll">Wyświetl wszystkich</button-->
        <button name="operation" value="show">Wyświetl wszystkich</button>
        <button name="test" value="add">Dodaj ucznia</button>
        <button name="operation" value="edit">Edytuj ucznia</button>
        <button name="operation" value="delete">Usuń ucznia</button>
    </form>


    </body>

</head>
</html>



	
