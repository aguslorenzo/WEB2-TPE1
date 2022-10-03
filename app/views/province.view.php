<?php
/* require_once('./libs/smarty/Smarty.class.php'); */
class ProvinceView {
    public function showProvinces($provinces){
        include './templates/header.php';
        include './templates/provinceForm.php';
        echo '<ul class="list-group">';
        foreach($provinces as $province){
            echo '<li class="list-group-item">';
            ?><a href="province/<?php echo $province->id?>"><?php echo $province->name?></a>;
            <a href="editProvince/<?php echo $province->id?>" type="button" class="btn btn-light">Editar</a>  
            <a href="deleteProvince/<?php echo $province->id?>" type="button" class="btn btn-danger">Eliminar</a>    
            </li>
            <?php
            }
        echo '</ul>';
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