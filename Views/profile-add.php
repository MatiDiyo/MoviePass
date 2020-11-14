<?php
    include('header.php');
?>

<section id="signup">

    <div class="container form-user">
        <div class="row">

            <div class="col-md-6 mt-4">
                <h3><b>Movie Pass</b></h3>
                <p>Cuentanos un poco mas de ti. ¿Quien eres?. Toda la informacion que nos compartas ahora sera utilizada mas tarde :D</p>
            </div>

            <div class="col-md-6 mt-4">
                <form id="loginForm" method="POST" action="<?php echo FRONT_ROOT."User/AddProfile"?>">

                        <div class="row">
                            <div class="col-md-12">
                                <h4>Agregar informacion.</h4>
                            </div>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $_SESSION["loggedUser"]->getId(); ?>"/> 

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="userName" id="name" placeholder="Nombre" required/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="userSurname" id="surname" placeholder="Apellido" required/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="number" class="form-control" name="userDNI" id="dni" placeholder="DNI" required/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-dark">Agregar</button>
                            </div>

                </form>

                            <div class="col-6">
                                <form method="get" action="<?php echo FRONT_ROOT."User/ShowProfile"?>">
                                    <button type="submit" class="btn btn-danger">Ahora no</button>
                                </form> 
                            </div>

                        </div>

            </div>
        </div>
</section>


<?php
    include('footer.php');
?>