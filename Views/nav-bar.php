<?php
  if(!isset($_SESSION["loggedUser"])){
?>

    <nav class="navbar navbar-expand-lg fixed-top"> 
      <div class="container">
        <a class="navbar-brand" href="<?php echo FRONT_ROOT?>">MoviePass</a>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" id="login" href="<?php echo FRONT_ROOT."User/ShowLogin"?>">Iniciar sesión</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="signup" href="<?php echo FRONT_ROOT."User/ShowSignUp"?>">Registrarse</a>
                </li>
              </ul>
          </div>
        
      </div>
    </nav>

<?php
  }
  else{
?>

    <nav class="navbar navbar-expand-lg fixed-top"> <!--le borre bg-light navbar-light a la class--> <!--La clase fixed top deja el navbar fijo-->
      <div class="container">
        <a class="navbar-brand" href="<?php echo FRONT_ROOT?>">MoviePass</a>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" id="cartelera" href="<?php echo FRONT_ROOT."Movie/ShowListView"?>">Cartelera</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="admin" href="<?php echo FRONT_ROOT."Cinema/ShowListView"?>">Administrar Cines<small>(lo veria solo Admin)</small></a>
                </li>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile" href="<?php echo FRONT_ROOT."User/ShowProfile"?>">Mi Perfil</a>
                </li>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="logout" href="<?php echo FRONT_ROOT."User/Logout"?>">Cerrar Sesion</a>
                </li>
              </ul>
          </div>

          <!--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          -->
        
      </div>
    </nav>
<?php
  }
?>