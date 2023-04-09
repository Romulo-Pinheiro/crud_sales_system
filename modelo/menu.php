

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./inicio.php">
                <img src="_images/estoque.png" class="logo">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <h2><?php echo $_SESSION['cargo']; ?></h2>

            <div class=" pr-2rem collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./inicio.php"><h5>Home</h5></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="./_scripts/logout.php" tabindex="-1"><h5>Sair</h5></a>
                </li>
            </ul>
            </div>
        </div>
    </nav>