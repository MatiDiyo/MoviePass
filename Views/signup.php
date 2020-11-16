<?php
    include('header.php');
    //include('nav-bar.php');
?>

<script>
    function goBack(){
        window.history.back();
    }
</script>

<section id="signup">

    <div class="container form-user">
        <div class="row">

            <div class="col-md-6 mt-4">
                <h3><b>Movie Pass</b></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, exercitationem.<br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, magnam.</p>
            </div>

            <div class="col-md-6 mt-4">
                <form id="loginForm" method="POST" action="<?php echo FRONT_ROOT."User/Add"?>">

                        <div class="row">
                            <div class="col-md-12">
                                <h4>Registrarse.</h4>
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
                                <button type="submit" class="btn btn-dark">Registrarse</button>
                            </div>

                </form>

                            <div class="col-6">
                                <form method="get" action="<?php echo FRONT_ROOT."User/ShowLogin"?>">
                                    <button type="submit" class="btn btn-danger">Ya tengo cuenta</button>
                                </form> 
                            </div>

                        </div>

            </div>
        </div>
</section>


<?php
    include('footer.php');
?>