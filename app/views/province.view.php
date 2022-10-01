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
    public function showParks($parks){
        var_dump($parks);
            /* foreach ($parks as $park){
                echo $park->name;
                echo $park->description;
                echo $park->price;
            } */
    }
}