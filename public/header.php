<!--NAVBAR-->
<nav class="navbar bg-primary text-white fixed-top">
        <div class="container-fluid justify-content-start text-center">
                <div class="col-1">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                </div>       
            <a class="navbar-brand text-white"><h4>BIENVENID<small>@</small></h4></a>
            <a class="navbar-brand text-warning"><h5><?php echo $_SESSION['first_name'];?></h5></a>
            <div>
            <a href="../login/userAccount.php?logoutSubmit=1" class="logout text-white" style="margin-left:1000px;">Cerrar Sesión</a>
            </div>
            <!--DESIGN OFFCANVAS-->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="navbarOffcanvasLgLabel">
                <div class="offcanvas-header">
                                <a class="navbar-brand text-black"><h5>Universidad Mariano</h5></a>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class = " container text-center">
                    <i class="bi bi-person-circle h1"></i>
                </div>
                <div class="navbar-body text-center">
                <p class="opacity-50 Light weight text"><?php echo $_SESSION['first_name'];?></p>
                    <ul class="navbar-nav justify-content-start flex-grow-1 pe-3 mt-4">
                        <li class="nav-item mt-4">
                            <a href="../inicio/index.php" class="nav-link">TAREAS</a>
                        </li>
                        <li class="nav-item mt-4">
                            <a href="../vista_asis/asistencia.php" class="nav-link">ASISTENCIA</a>
                        </li>
                        <li class="nav-item mt-4">
                            <a href="../controlador_asis/reporte_asis.php" class="nav-link" target="_blank">PDF TEST</a>
                        </li>
                    </ul>
                </div>
              </div>
           </div>
    </nav>