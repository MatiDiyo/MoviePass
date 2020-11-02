<?php
    include('header.php');
    //include('nav-bar.php');
?>
<section id="login">

    <div class="container form-user">
        <div class="row">

            <div class="col-md-6 mt-4">
                <h3><b>Movie Pass</b></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, exercitationem.<br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, magnam.</p>
            </div>

            <div class="col-md-6 mt-4">
                <form id="loginForm" method="POST" action="<?php echo FRONT_ROOT."User/Login"?>">

                        <div class="row">
                            <div class="col-md-12">
                                <h4>Iniciar sesión.</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="userMail" id="mail" placeholder="Mail" required/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="userPassword" id="password" placeholder="Contraseña" required/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-dark">Iniciar sesión</button>
                            </div>

                </form>

                            <div class="col-6">
                                <form method="get" action="<?php echo FRONT_ROOT."User/ShowSignUp"?>">
                                    <button type="submit" class="btn btn-danger">Registrarme</button>
                                </form> 
                            </div>

                        </div>

            </div>
        </div>
</section>

<?php
    include('footer.php');
?>