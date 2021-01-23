<nav class="navbar navbar-expand-md navbar-light">
        <img id="logoNav" src="img/syndicsaas.png">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <div><a class="nav-link" href="index.php?act=accueil">
                  <button class="btn btn-success btnHome"><i class="fas fa-home"></i> Accueil</button>
                </a></div>
              </li>
              <li class="nav-item">
                <div><a class="nav-link" <?php if(isset($_SESSION['idCopropriete'])) {?>href="index.php?act=gestionCoproprietaire"<?php } ?>>
                  <button <?php if(!isset($_SESSION['idCopropriete'])) echo "disabled";?> class="btn btnNav">Gestion des copropriétaires</button>
                </a></div>
              </li>
              <li class="nav-item">
                <div><a class="nav-link" <?php if(isset($_SESSION['idCopropriete'])) {?>href="index.php?act=gestionBiens"<?php } ?>>
                  <button <?php if(!isset($_SESSION['idCopropriete'])) echo "disabled";?> class="btn btnNav">Gestion des biens</button>
                </a></div>
              </li>
              <li class="nav-item">
                <div><a class="nav-link"  <?php if(isset($_SESSION['idCopropriete'])) {?>href="index.php?act=gestionCopropriete"<?php } ?>>
                  <button <?php if(!isset($_SESSION['idCopropriete'])) echo "disabled";?> class="btn btnNav">Gestion de la copropriété</button>
                </a></div>
              </li>
              <li class="nav-item">
                <div><a class="nav-link" href="index.php?act=changerCopropriete">
                  <button class="btn btnNav" id="changeCopropriete" data-toggle="modal" data-target="#coproprieteModal">Changer de copropriété</button>
                </a></div>
              </li>
              <li class="nav-item">
                <div><a class="nav-link" href="index.php?act=deconnexion">
                  <button class="btn btn-danger btnExit"><i class="fas fa-sign-out-alt"></i> Déconnexion</button>
                </a></div>
              </li>
            </ul>
        </div>
</nav>