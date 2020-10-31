<?php
    include('header.php');
    include('nav-bar.php');
?>

<section id="signup">
    <form id="signupForm" method="POST" action="<?php echo FRONT_ROOT."User/Add"?>"> 
        <div class="container">
            <div class="content-center">
                <div class="row">
                    <div class="col-12">
                        <h3><b>Registrate.</b></h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Mail" required /> 
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required /> 
                        </div>
                    </div>
                </div>

                <div class="row">
                        <div class="col-6">
                            <button type="submit" class="btn btn-dark">Registrarse</button>
                        </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <hr/>
                    </div>
                </div>

            </div>        
        </div>    
    </form>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <form method="get" action="<?php echo FRONT_ROOT."User/ShowLogin"?>">
                    <button type="submit" class="btn btn-danger">Ya tengo cuenta</button>
                </form> 
            </div>
        </div>
    </div>

</section>

<?php
    include('footer.php');
?>