<?php
    include('header.php');
    include('nav-bar.php');
?>

<section id="login">
    <form id=loginForm method="POST" action="<?php echo FRONT_ROOT."User/Login"?>">
        <div class="container">
            <div class="content-center">
                
                <div class="row">
                    <div class="col-12">
                        <h3><b>Iniciar sesion.</b></h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <input type="email" class="form-control" name="userMail" id="mail" placeholder="Mail" required/>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <input type="password" class="form-control" name="userPassword" id="password" placeholder="Contraseña" required/>
                        </div>
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-6">
                        <button type="submit" class="btn btn-dark">Iniciar Sesion</button>
                    </div>
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
                <form method="get" action="<?php echo FRONT_ROOT."User/ShowSignUp"?>">
                    <button type="submit" class="btn btn-danger">Registrarme</button>
                </form> 
            </div>
        </div>
    </div>
    
</section>

<?php
    include('footer.php');
?>