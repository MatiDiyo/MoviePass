<?php 
 include('header.php');
 include('nav-bar.php');
?>

<section id="addcinema">
    <form id="cinemaForm" method="POST" action="<?php echo FRONT_ROOT."Cinema/Add"?>"> 
        <div class="container form-cine">
            <div class="row">
                <div class="col-md-6 mt-4">
                    <h3><b>Ingresar un nuevo Cine.</b></h3>
                    <p>En esta parte podes ingresar nuevas sucursarles. Para hacer el registro <br>de la sucursal no olvides llenar cada parte del formulario.</p>
                </div>

                
                <div class="col-md-6 mt-4">
                    <div class="row">
                        <div class="col-md-12">
                        <h4>Nuevo Cine</h4>
                            <div class="form-group">
                                <input type="text" class="form-control" name="cinemaName" id="nombre" placeholder="Nombre de Sucursal" required /> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="cinemaAddress" id="direccion" placeholder="Direcci&oacute;n" required /> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="number" class="form-control" name="cinemaCapacidad" id="capacidad" placeholder="Capacidad" required /> 
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="number" class="form-control" name="cinemaPrice" id="precio" placeholder="Valor de entradas" required /> 
                            </div>
                        </div>
    
                </div>
                <div class="row">
                        <div class="col-md-6 ">
                            <button type="submit" class="btn btn-dark">Registrar cine</button>
                        </div>
                        <div class="col-md-6 ">
                            <button type="" class="btn btn-danger">Cancelar</button>
                        </div>
                </div>
            </div>
        </div>
    </form>
</section>

<?php
 include('footer.php');
?>