<div class="container-fluid bg-dark">
            <header>
                <h1 class="fw-bold text-white" style="text-align: center">
                    <a class="link-light" style="text-decoration:none" href="index.php">Workout</a>
                </h1>
            </header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-top">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                    aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=workout">Entrainement</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=food">Food</a>
                            </li>
                            <!--
                            <li class="nav-item">
                                <a class="nav-link" href="#">Ajouter un workout</a>
                            </li>
                            -->
                        </ul>
                        <div class="d-flex">
                            <input type="text" class="form-control me-2" id="search" placeholder="Ex: Fullbody" onChange="Recherche();" >
                            <button class="btn btn-outline-light bi bi-search" type="button" onclick="Recherche();"></button>
                        </div>
                    </div>
                </div>
            </nav>
</div> 