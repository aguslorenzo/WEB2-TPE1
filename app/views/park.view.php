<?php

class ParkView {
    function showParks($parks){
        include './templates/form.php';
        echo "<ul>";
        foreach($parks as $park){
            echo "<li>";
            ?><a href="park/<?php echo $park->id?>"><?php echo $park->name?></a>;
            </li>
            <?php
            }
        echo "</ul>";
    }
    function showPark($park){
        echo $park->name;
        echo $park->description;
        echo $park->price;
        //esto esta MAL. No tengo q mostrar el id, sino el nombre, VER más adelante
        echo $park->id_province_fk;
    }
}