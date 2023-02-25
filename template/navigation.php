<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="./index.php">
            <img src="./assets/images/logo-ct.png" alt="" height="24">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if ($navigation_menu == 'dashboard') {
                        echo 'active';
                    } ?>" aria-current="page" href="./index.php">Overzicht</a>
                </li>
                <?php if (security_has_role('WERKPLAATS')) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($navigation_menu == 'werkplaats') {
                            echo 'active';
                        } ?>" aria-current="page" href="./werkplaats/index.php">Werkplaats</a>
                    </li>
                <?php }
                if (security_has_role('BALIE')) { ?>
                    <li class="nav-item ">
                        <a class="nav-link <?php if ($navigation_menu == 'balie') {
                            echo 'active';
                        } ?>" aria-current="page" href="./balie/index.php">
                            Balie
                        </a>
                    </li>
                <?php }
                if (security_has_role('EDUCATIE')) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($navigation_menu == 'educatie') {
                            echo 'active';
                        } ?>" aria-current="page" href="./educatie/index.php">Educatie</a>
                    </li>
                <?php }
                if (security_has_role('MONITOR')) { ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($navigation_menu == 'monitor') {
                            echo 'active';
                        } ?>" aria-current="page" href="./monitor/index.php">Monitor</a>
                    </li>
                <?php }
                if (security_has_role('ADMIN')) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php if ($navigation_menu == 'admin') {
                            echo 'active';
                        } ?>" aria-current="page" href="#"
                           data-bs-toggle="dropdown" aria-expanded="false">Admin</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item <?php if ($navigation_menu == 'admin') {
                                    echo 'active';
                                } ?>" aria-current="page" href="./admin/index.php">Rechten</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item <?php if ($navigation_menu == 'personen') {
                                    echo 'active';
                                } ?>" href="./admin/personen/index.php">Personen</a>
                            </li>
                            <li><a class="dropdown-item <?php if ($navigation_menu == 'bedrijven') {
                                    echo 'active';
                                } ?>"
                                   href="./admin/bedrijven/index.php">Bedrijven</a></li>
                            <li><a class="dropdown-item <?php if ($navigation_menu == 'computers') {
                                    echo 'active';
                                } ?>" href="./admin/computers/index.php">Computers</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item <?php if ($navigation_menu == 'reparaties') {
                                    echo 'active';
                                } ?>" href="./admin/reparaties/index.php">Reparaties</a>
                            </li>
                            <li><a class="dropdown-item <?php if ($navigation_menu == 'tijdregistraties') {
                                    echo 'active';
                                } ?>" href="./admin/tijdregistraties/index.php">Tijdregistraties</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item <?php if ($navigation_menu == 'activiteiten') {
                                    echo 'active';
                                } ?>" href="./admin/activiteiten/index.php">Activiteiten</a>
                            </li>
                            <li><a class="dropdown-item <?php if ($navigation_menu == 'postcodes') {
                                    echo 'active';
                                } ?>" href="./admin/postcodes/index.php">Postcodes</a>
                            </li>
                        </ul>
                    </li>

                <?php } ?>
            </ul>
            <div class="d-flex">
                <a class="btn btn-outline-success" href="./uitloggen.php" type="button">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    <span class="nav-link-text ms-1">Uitloggen</span>
                </a>
            </div>
        </div>
    </div>
</nav>
