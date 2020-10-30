<?php 
 include('header.php');
 include('nav-bar.php');

 $editing = $cinema != null && $cinema->getId() != null;
 
?>
<script>
    function goBack(){
        window.location = "<?php echo FRONT_ROOT."Cinema/ShowListView"?>"
    }
</script>
<section id="addcinema">
    <form id="cinemaForm" method="POST" action="<?php echo $editing ? FRONT_ROOT."Cinema/Edit" : FRONT_ROOT."Cinema/Add"?>"> 
        <?php if($editing){ ?>
            <input type="hidden" name="cinemaId" value="<?php echo $cinema->getId()?>"/> 
        <?php } ?>
        <div class="container form-cine">
            <div class="row">
                <div class="col-md-6 mt-4">
                    <?php if(!$editing){ ?>
                        <h3><b>Ingresar un nuevo Cine.</b></h3>
                        <p>En esta parte podes ingresar nuevas sucursarles. Para hacer el registro <br>de la sucursal no olvides llenar cada parte del formulario.</p>
                    <?php }else{?>
                        <h3><b><?php echo 'Editando Cine: '.$cinema->getName() ?></b></h3>
                        <p>No olvides guardar los cambios.</p>
                    <?php }?>
                </div>

                
                <div class="col-md-6 mt-4">
                    <div class="row">
                        <div class="col-md-12">
                        <h4><?php echo $editing? 'Edición de Cine' : 'Nuevo Cine' ?></h4>
                            <div class="form-group">
                                <input type="text" class="form-control" name="cinemaName" id="nombre" placeholder="Nombre de Sucursal" required
                                    value="<?php echo $editing? $cinema->getName() : '' ?>"
                                 /> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="cinemaAddress" id="direccion" placeholder="Direcci&oacute;n" required 
                                    value="<?php echo $editing? $cinema->getAddress() : '' ?>"/> 
                            </div>
                        </div>
                        <!--<div class="col-md-12">
                            <div class="form-group">
                                <input type="number" class="form-control" name="cinemaCapacidad" id="capacidad" placeholder="Capacidad" required 
                                    value="<?php /*echo $editing? $cinema->getCapacity() : ''*/ ?>" /> 
                            </div>
                        </div>-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="number" class="form-control" name="cinemaPrice" id="precio" placeholder="Valor de entradas" required 
                                    value="<?php echo $editing? $cinema->getPrice() : '' ?>"/> 
                            </div>
                        </div>
    
                </div>
                <div class="row">
                        <div class="col-md-6 ">
                            <button type="submit" class="btn btn-dark">
                                <?php echo $editing? 'Guardar cambios' : 'Registrar cine' ?>
                            </button>
                        </div>
                        <div class="col-md-6 ">
                            <input type="button" class="btn btn-danger" value="Cancelar" onclick="goBack();"/>
                        </div>
                </div>
            </div>
        </div>
    </form>
</section>

<?php
 include('footer.php');
?>