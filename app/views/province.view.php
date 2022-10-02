<?php
class ProvinceView {
    public function showProvinces($provinces){
        echo "<ul>";
        foreach($provinces as $province){
            echo "<li>";
            ?><a href="province/<?php echo $province->id?>"><?php echo $province->name?></a>;
            </li>
            <?php
            }
        echo "</ul>";
    }
    public function showParks($parks, $province){
        //mostrar nombre de la provincia mirar como mostrarlo xq no creo q así esté bien
        foreach ($parks as $park){
            echo "Parque en la provincia de " . $province->name;
            echo $park->name;
            echo $park->description;
            echo $park->price;
        }
    }
}