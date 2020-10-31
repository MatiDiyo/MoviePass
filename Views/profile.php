<?php
    include('header.php');
    include('nav-bar.php');
?>

<!--
    -mail, password
    -name, surname, dni
-->

<div id="profile">
    <div class="container">
        <div class="listcinema-container">

            <div class="row">
                <div class="col-9">
                    <h2>Mi perfil</h2>
                </div>
                <div class="col-3">
                    <form method="get" action="#"> <!--en el action hay que poner como en cinema-list-->
                        <button type="submit" class="btn btn-dark">Editar Perfil</button>
                    </form> 
                </div>
            </div>

            <hr/>

            <div class="row">
                <div class="col-6">
                    <span>Email: </span>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <span>Contraseña: </span>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <span>Nombre: </span>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <span>Apellido: </span>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <span>DNI: </span>
                </div>
            </div>

        </div>
    </div>
</div>