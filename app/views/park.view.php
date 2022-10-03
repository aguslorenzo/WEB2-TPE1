<?php
/* require_once('./libs/smarty/Smarty.class.php'); */
class ParkView {
    /* private $smarty;
    public function __construct(){
        $this->smarty = new Smarty();
    } */
    function showParks($parks){
        include './templates/header.php';
        include './templates/parkForm.php';
        echo '<ul class="list-group">';
        foreach($parks as $park){
            echo '<li class="list-group-item">';
            ?><a href="park/<?php echo $park->id?>"><?php echo $park->name?></a>
           
            <a href="deletePark/<?php echo $park->id?>" type="button" class="btn btn-danger">Eliminar</a>
            </li>
            
            <?php
            }
        echo '</ul>';
    }
    function showPark($park, $provinceName){
        ?><div class="card" style="width: 18rem;">
            <div class="card-body">
                <h1 class="card-title"><?php echo $park->name ?></h1>
                <h3 class="card-subtitle mb-2 text-muted"><?php echo $provinceName?></h3>
                <p class="card-text"><?php echo $park->description?></p>
                <h1 class="card-title"><?php echo $park->price ?></h1>
            </div>
            <a href="editPark/<?php echo $park->id?>" type="button" class="btn btn-light">Editar</a>
        </div>
        <?php 

    }
}