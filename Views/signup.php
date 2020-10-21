<?php
    include('header.php');
    include('nav-bar.php');
?>

<section id="signup">
    <form action="signupForm" method="POST" action="<?php echo FRONT_ROOT."User/ShowSignUp"?>"> 
        <div class="container">
            <div class="content-center">
                <div class="row">
                    <div class="col-12">
                        <h3><b>Registrate.</b></h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                                <input type="mail" class="form-control" name="userMail" id="mail" placeholder="Mail" required /> 
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                                <input type="text" class="form-control" name="userPassword" id="contraseña" placeholder="Contraseña" required /> 
                        </div>
                    </div>
                </div>
<!--
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                                <input type="text" class="form-control" name="cinemaAddress" id="direccion" placeholder="Direcci&oacute;n" required /> 
                        </div>
                    </div>
                </div>
-->

                <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-dark">Registrarse</button>
                        </div>
                </div>

            </div>        
        </div>    
    </form>
</section>

<?php
    include('footer.php');
?>