<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="<?php echo FRONT_ROOT?>">MoviePass</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" id="cartelera" href="<?php echo FRONT_ROOT."Movie/refreshData"?>">Cartelera</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="login" href="#">Iniciar sesión</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="login" href="#">Registrarse</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="login" href="<?php echo FRONT_ROOT."Cinema/ShowListView"?>">Administrar Cines<small>(lo veria solo Admin)</small></a>
          </li>
    </div>
    
  </div>
</nav>