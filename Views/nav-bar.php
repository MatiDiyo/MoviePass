<nav class="navbar navbar-expand-lg fixed-top"> <!--le borre bg-light navbar-light a la class--> <!--La clase fixed top deja el navbar fijo-->
  <div class="container">
    <a class="navbar-brand" href="<?php echo FRONT_ROOT?>">MoviePass</a>
<!--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
-->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" id="cartelera" href="<?php echo FRONT_ROOT."Movie/ShowListView"?>">Cartelera</a>
          </li>

          <!--hacer cartelera usuario-->
              <!--          <li class="nav-item">
            <a class="nav-link" id="login" href="#">Iniciar sesión</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="login" href="#">Registrarse</a>
          </li>-->
          <li class="nav-item">
            <a class="nav-link" id="login" href="<?php echo FRONT_ROOT."Cinema/ShowListView"?>">Administrar Cines<small>(lo veria solo Admin)</small></a>
          </li>
        </ul>
    </div>
    
  </div>
</nav>