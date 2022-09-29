<?php

class ParkView {
    function showParks($parks){
        echo "<ul>";
        foreach($parks as $park){
            echo "<li>";
            echo $park->name;
            echo "</li>";
        }
        echo "</ul>";
    }
}