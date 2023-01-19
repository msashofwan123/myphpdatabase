<html>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="
    margin-bottom: 25px;
    padding-top: 0px;
    padding-bottom: 0px;
">
        <a class="navbar-brand" href="index.php" id="logo">DATABASE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="datasiswa.php">Data Siswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="daftarkota.php">Daftar Kota</a>
                </li>
            </ul>
        </div>
        
        <div class="search-bar" id="search-bar">
            <form class="row g-3" style="padding-top: 15px; margin-bottom: 0px;">
                <div class="col-auto">
                    <input type="search" class="form-control" name="cari" id="search" placeholder="Cari Disini" aria-label="cari" value="<?php if(isset($_GET['cari'])) { echo $_GET['cari'];}; ?>">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-outline-success mb-3">Cari</button>
                </div>
            </form>
        </div>

        <div class="btn-group" id="login-button">
            <a href="login.php" class="btn btn-success" id="login">Login</a>
            <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="signup.php" id="signup">Sign Up</a></li>
            </ul>
        </div>
        <div id="logout">
            <a href=logout.php class="btn btn-outline-success" id="log">Log Out</a>
        </div>
    </nav>
</body>

</html>