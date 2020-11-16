<?php
    include('header.php');
    include('nav-bar.php');
?>

<!--
    -mail, password
    -name, surname, dni
-->

<script>
    function goBack(){
        window.history.back();
    }
</script>

<div id="profile">
    <div class="container">
        <div class="listcinema-container">

            <div class="row">
                <div class="col-9">
                    <h2>Mi perfil</h2>
                </div>
                <div class="col-3">
                            
                    <?php
                        if(!isset($_SESSION["profileUser"]))
                        {
                    ?>
                            <form method="get" action="<?php echo FRONT_ROOT."User/ShowAddProfile"?>">
                                <button type="submit" name="id" class="btn btn-dark" >Agregar info</button>
                            </form>
                    <?php
                        }
                    ?> 
                </div>
            </div>

            <hr/>

            <div class="row">
                <div class="col-6">
                    <span>Email: <?php echo $user->getMail();?></span>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <span>Contraseña: <?php echo $user->getPassword();?></span>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <span>Estado: <?php if($role->getDescription() == 'user_normal'){
                                            echo 'Normal';
                                        }else if($role->getDescription() == 'user_admin'){
                                            echo 'Admin';
                                        }
                                    ?>
                    </span>
                </div>
            </div>

        <?php
            if(isset($_SESSION["profileUser"]))
            {
        ?>

            <div class="row">
                <div class="col-6">
                    <span>Nombre: <?php echo $profile->getName();?></span>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <span>Apellido: <?php echo $profile->getSurname();?></span>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <span>DNI: <?php echo $profile->getDni();?></span>
                </div>
            </div>

        <?php
            }
        ?>

        </div>
    </div>
</div>