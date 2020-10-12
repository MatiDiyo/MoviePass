<?php 
 include('header.php');
 include('nav-bar.php');

 
?>


<div id="listaCines">
    <div class="container">
        <div class="listcinema-container">
            <div class="row">
                <div class="col-9">
                    <h2>Sucursales</h2>
                </div>
                <div class="col-3">
                    <form method="get" action="<?php echo FRONT_ROOT."Cinema/ShowAddView"?>">
                        <button type="submit" class="btn btn-dark" >Agregar nuevo cine</button>
                    </form>                        
                </div>
            </div>  
            <hr/>
            <div class="row">
                <?php
                    foreach($cinemaList as $cine){
                ?>
                    <div class="col-3" style="margin-bottom:20px;">
                        <div class="card">
                            <div class="card-img-top cinema-card container">
                                    <div class="row" style="height:inherit">
                                        <div class="col align-self-center">
                                            <span class="h2 border-text"><?php echo $cine->getName() ?></span>
                                        </div>
                                    </div>
                            </div>
                            <div class="card-body">
                                <!--<span class="h5 card-title"><?php echo $cine->getName() ?></span><br/>-->
                                <span class="h5 card-title">Direccion: <?php echo $cine->getAddress() ?></span><br/>
                                <span class="p card-text">Capacidad: <?php echo $cine->getCapacity() ?></span><br/>
                                <span class="p card-text">Precio: $<?php echo $cine->getPrice() ?></span>
                                <!--<div class="col-auto">-->
                                    <form class="" action="<?php echo FRONT_ROOT."Cinema/Remove"?>">
                                        <button type="submit" name="id" class="btn-dark btn-sm" value="<?php echo $cine->getId() ?>">Eliminar</button>
                                        <!--probablemente haya que poner un boton mas para administrar el cine-->
                                    </form>
                                <!--</div>-->
                            </div>    
                        </div>
                    </div>
            <?php
                    }
                ?>
            </div>
            <hr/>
        </div>

    </div>
</div>

<?php
 
 
 include('footer.php');
?>