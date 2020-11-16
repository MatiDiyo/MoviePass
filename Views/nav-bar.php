<nav class="navbar navbar-expand-lg fixed-top"> 
        <div class="container">
          <a class="navbar-brand" href="<?php echo FRONT_ROOT?>">MoviePass</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

              <?php
                if(!isset($_SESSION["loggedUser"]))
                {
              ?>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                          <a class="nav-link" id="login" href="<?php echo FRONT_ROOT."User/ShowLogin"?>">Iniciar sesión</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="signup" href="<?php echo FRONT_ROOT."User/ShowSignUp"?>">Registrarse</a>
                        </li>
                    </ul>

              <?php
                }
                elseif(isset($_SESSION["loggedUser"]) && isset($_SESSION["roleUser"]))
                {
                  if($_SESSION["roleUser"] == 'user_admin')
                  {
              ?>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                          <a class="nav-link" id="cartelera" href="<?php echo FRONT_ROOT."Movie/ShowListView"?>">Cartelera</a>
                        </li>

                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Administrar
                          </a>
                          <div id="drop" class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="nav-link" id="admin" href="<?php echo FRONT_ROOT."Cinema/ShowListView"?>">Cines</a>
                            <a class="nav-link" id="ventas" href="<?php echo FRONT_ROOT."Showtime/ShowVentasRemanentes"?>">Ventas</a>
                          </div>
                        </li>

                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mi cuenta
                          </a>
                          <div id="drop" class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="nav-link" id="profile" href="<?php echo FRONT_ROOT."User/ShowProfile"?>">Mi Perfil</a>
                            <a class="nav-link" id="logout" href="<?php echo FRONT_ROOT."User/Logout"?>">Cerrar Sesion</a>
                          </div>
                        </li>

                    </ul>

              <?php
                  }else{
              ?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                          <a class="nav-link" id="cartelera" href="<?php echo FRONT_ROOT."Movie/ShowListView"?>">Cartelera</a>
                        </li>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mi cuenta
                          </a>
                          <div id="drop" class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="nav-link" id="profile" href="<?php echo FRONT_ROOT."User/ShowProfile"?>">Mi Perfil</a>
                            <a class="nav-link" id="logout" href="<?php echo FRONT_ROOT."User/Logout"?>">Cerrar Sesion</a>
                          </div>
                        </li>
                    </ul>

              <?php
                  }
                }//elseif(isset($_SESSION["loggedUser"])){
              ?>
                  <!--  <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                          <a class="nav-link" id="cartelera" href="<?php echo FRONT_ROOT."Movie/ShowListView"?>">Cartelera</a>
                        </li>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mi cuenta
                          </a>
                          <div id="drop" class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="nav-link" id="profile" href="<?php echo FRONT_ROOT."User/ShowProfile"?>">Mi Perfil</a>
                            <a class="nav-link" id="logout" href="<?php echo FRONT_ROOT."User/Logout"?>">Cerrar Sesion</a>
                          </div>
                        </li>
                    </ul>
                -->
              <?php
                //}
              ?>

            </div>       
        </div>
</nav>