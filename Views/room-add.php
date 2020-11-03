<?php 
 include('header.php');
 include('nav-bar.php');

 $editing = $room != null && $room->getId() != null;
 
?>
<script>
    function goBack(){
        window.location = "<?php echo FRONT_ROOT."Cinema/ShowEditView?id=".$cinemaId?>";
    }
</script>
<div id="addroom" class="">
    <div class="container">
        <div class="row">
            <div class="col-12 listcinema-container">
                <?php if(!$editing){ ?>
                    <h3><b>Agregar una nueva Sala.</b></h3>
                    <p>Para crear una sala, completa los datos.</p>
                <?php }else{?>
                    <h3><b><?php echo 'Editando Sala: '.$room->getName() ?></b></h3>
                    <p>No olvides guardar los cambios.</p>
                <?php }?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-4">
                
                <form id="roomForm" class="" method="POST" action="<?php echo $editing ? FRONT_ROOT."Room/Edit" : FRONT_ROOT."Room/Add"?>"> 
                    <input type="hidden" name="cinemaId" value="<?php echo $cinemaId ?>"/> 
                    <?php if($editing){ ?>
                        <input type="hidden" name="roomId" value="<?php echo $room->getId()?>"/> 
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-12">
                        <h4><?php echo $editing? 'Edición de Sala' : 'Nueva Sala' ?></h4>
                            <div class="form-group">
                                <input type="text" class="form-control" name="roomName" id="nombre" placeholder="Nombre de sala" required
                                    value="<?php echo $editing? $room->getName() : '' ?>"
                                    /> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="roomCapacity" id="capacidad" placeholder="Capacidad" required 
                                    value="<?php echo $editing? $room->getCapacity() : '' ?>"/> 
                            </div>
                        </div>

                    </div>
                    <div class="row">
                            <div class="col-md-6 ">
                                <button type="submit" class="btn btn-dark">
                                    <?php echo $editing? 'Guardar cambios' : 'Crear sala' ?>
                                </button>
                            </div>
                            <div class="col-md-6 ">
                                <input type="button" class="btn btn-danger" value="Cancelar" onclick="goBack();"/>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
 include('footer.php');
?>