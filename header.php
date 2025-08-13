<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<header class="p-3 header-bg">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            
            <a href="?pagina=home" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none" style="margin-right: 70px;">
                <img src="../testar/assets/logo.png" alt="Logo do Hotel" width="100" height="55" class="me-2">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="?pagina=cadastro" class="nav-link px-2 text-black">Registrar hotel</a></li>
                <li><a href="?pagina=meushoteis" class="nav-link px-2 text-black">Meus hotéis</a></li>
                <li><a href="#" class="nav-link px-2 text-black">Sobre nós</a></li>
                <li><a href="#" class="nav-link px-2 text-black">Suporte</a></li>
                <li><a href="#" class="nav-link px-2 text-black">Favoritos</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                <input type="search" class="form-control form-control-white text-bg-white" placeholder="Search..." aria-label="Search">
            </form>

            <div class="text-end">
            <?php if (isset($_SESSION['usuario'])): ?>
                <a href="?pagina=minha-conta" class="btn btn-success">Minha conta</a>
            <?php else: ?>
                <a href="?pagina=login" class="btn btn-outline-light me-2">Login</a>
                <a href="?pagina=criar-conta" class="btn btn-warning">Criar conta</a>
            <?php endif; ?>
</div>

        </div>
    </div>
</header>
