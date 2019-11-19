<!doctype htlm>
<html>
<head>
    <title>Html5 </title>
    <meta charset="utf-8">

    <body>
<h1>Wybierz operację do wykonania</h1>
    <?php

    //require("../controller/control.php");
    require("../model/model.php");



    if(isset($_GET["test"])){
        $obiekt = new Model();

        if($_GET["test"]=="showAll"){  //if condition is true then show all students
            $tab=$obiekt->showStudents(); //return array with data of students

            echo "<table border='1' cellpadding='3' cellspacing='0'>";

            foreach ($tab as $row) {
                echo "<tr><td>".$row["Id"]."</td><td>".$row["imie"]."</td><td>".$row["nazwisko"]."</td><td> ".$row["klasa"]."</td><td> ".$row["rocznik"]."</td></tr>";

            }
            echo "</table>";
        }

        elseif ($_GET["test"]=="add"){
        echo "
        <form action='../controller/control.php' method='get'>
        <input name='imie' placeholder='wpisz imie' required>
        <input name='nazwisko' placeholder='wpisz nazwisko' required>
         <input name='klasa' placeholder='wpisz klasę' required>
        <input name='rocznik' type='number' placeholder='wpisz rocznik'>
        <input type='hidden' name='operation' value='add'>
        <button>dodaj</button>
        </form>"
        ;
        }
        elseif ($_GET["test"]=="edit"){
            if(!isset($_GET["uczniowie"])) {
                $tab = $obiekt->showStudents(); //return array with data of students
                echo "
            <form action='view.php' method='get'>
            <select name='uczniowie' id='ucz_id'>";
                foreach ($tab as $row) {
                    echo "<option value=" . $row["nazwisko"] . ">" . $row["nazwisko"]." ". $row["imie"]."</option>";
                }
                echo "</select>
            <input type='hidden' name='test' value='edit'>
            <button>Wybierz ucznia</button>
            </form>";
            }
            else
            {$chooseStudent = $obiekt->oneStudent($_GET["uczniowie"]);  //downloading data of one student

                echo "
            <form action='../controller/control.php' method='get'>
            <input name='imie' placeholder='wpisz imie' value=".$chooseStudent["imie"].">
            <input name='nazwisko' placeholder='wpisz nazwisko' value=".$chooseStudent["nazwisko"].">
            <input name='klasa' placeholder='wpisz klasę' value=".$chooseStudent["klasa"].">
            <input name='rocznik' type='number' placeholder='wpisz rocznik' value=".$chooseStudent["rocznik"].">
            <input type='hidden' name='operation' value='edit'>

            <button>Zmień</button>
            </form><br>";

            }


        }
        elseif ($_GET["test"]=="delete"){


            if(!isset($_GET["uczniowie"])) {
                $tab = $obiekt->showStudents(); //return array with data of students
                echo "
            <form action='../controller/control.php' method='get'>
            <select name='uczniowie' id='uczId'>";
                foreach ($tab as $row) {
                    echo "<option value=".$row["nazwisko"].">" . $row["nazwisko"]." ". $row["imie"]."</option>";
                }
                echo "</select>
            <input type='hidden' name='operation' value='delete'>
          
            <button>Usuń ucznia</button>
            </form>";
            }



        }



    }
    else
    {echo "<br> Nie wybranu żadnej operacji";}
    ?>

    <form action="view.php" method="get">

        <button name="test" value="showAll">Wyświetl wszystkich</button>
        <button name="test" value="add">Dodaj ucznia</button>
        <button name="test" value="edit">Edytuj ucznia</button>
        <button name="test" value="delete">Usuń ucznia</button>
    </form>


    </body>

</head>
</html>



	
