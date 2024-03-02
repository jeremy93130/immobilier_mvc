<div class="container-fluid">
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="<?= addLink("home") ?>">
            <img src="<?= UPLOAD_LOGO_IMG . "logo_bien_chez_moi_rouge-removebg-preview.png" ?>" width="150" alt="logo entreprise" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= addLink("home") ?>">Accueil</a>
                </li>
                <?php if ($userConnecte = Service\Session::getUserConnected()) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= addLink("postulant", "show", $userConnecte->getId()) ?>"><?= $userConnecte->getPrenom() ?></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= addLink("postulant", "logout") ?>">
                            <i class="fa fa-sign-out"></i>
                        </a>
                    </li>

                    <?php if (Service\Session::isadmin()) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Utilisateurs
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="<?= addLink('admin/user', 'list') ?>">Liste</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= addLink('admin/user', 'new') ?>">Ajouter</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Propriétés
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="<?= addLink('admin/bien', 'list') ?>">Liste</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= addLink('admin/bien', 'new') ?>">Ajouter</a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>

                <?php else : ?>
                    <li class="nav-item active">
                        <a class="nav-link d-flex align-items-center" href="<?= addLink("postulant", "new") ?>">
                            <i class="fa-solid fa-user-plus me-1"></i>
                            <span>Inscription</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link d-flex align-items-center" href="<?= addLink("postulant", "login") ?>">
                            <i class="fa fa-sign-in me-1"></i>
                            <span>Connexion</span>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </nav>
</div>