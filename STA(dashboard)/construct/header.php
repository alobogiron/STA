<section class="menu-desktop fixed-top">
            <div class="logo">
                <img src="../images/Logo.png" class="img-fluid p-3"/>
            </div><!--logo-->
            <div class="menu-item">
                <ul class="nav flex-column">
                    <a class="nav-link" href="#">
                        <i class="bi bi-house-door"></i>    
                        <span>Home</span>
                    </a>
                    <a class="nav-link" href="#">
                        <i class="bi bi-bar-chart-fill"></i>
                        <span>Relatórios</span>
                    </a>
                    <a class="nav-link" href="../pgs/paciente_menu.php">
                        <i class="bi bi-person"></i>
                        <span>Pacientes</span>
                    </a>
                    <a class="nav-link" href="../pgs/sessao_menu.php">
                        <i class="bi bi-table"></i>
                        <span>Consultas</span>
                    </a>
                    <a class="nav-link" href="#">
                        <i class="bi bi-info-circle-fill"></i>
                        <span>Help Center</span>
                    </a>
                    <a class="nav-link" href="#">
                        <i class="bi bi-toggles"></i>
                        <span>Configurações</span>
                    </a>
                </ul><!--nav flex-colum-->
            </div><!--menu-item-->
            <div class="menu-user position-absolute bottom-0 start-50 translate-middle-x">
                <div class="infos">
                    <div class="user-pic">
                        <img src="../images/user.jpg" alt="" width="64" height="64" class="rounded-circle me-2">
                    </div><!--user-pic-->
                    <div class="user-name">
                        <p><?php echo $profissional->getNome();?></p>
                    </div><!--username-->
                </div><!--infos-->
                <div class="options">
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Opções
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="../pgs/alter_profissional.php?id_profissional=<?php echo $profissional->getId_profissional();?>">Perfil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../util/sair.php">Sair</a></li>
                        </ul>
                    </div>
                </div><!--options-->
            </div><!--menu-user-->
        </section><!--menu-->

        <section class="menu-mobile fixed-top">
            <div class="logo">
                <img src="../images/Logo.png" class="img-fluid p-3"/>
            </div><!--logo-->
        </section><!--menu-mobile-->