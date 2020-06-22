<!-- Script et lien bootstrap-->
<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="css/index.css" rel="stylesheet" id="index-css">

<!-- Formulaire de connexion-->
<body>
    <div id="login">
        <h2 class="text-center text-white pt-5">Connexion au logiciel de gestion de TP </h2>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="../database/connect.php" method="POST"> 
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Utilisateur</label><br>
                                <input type="text" name="login" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Mot de passe:</label><br>
                                <input type="password" name="motdepasse" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Mémoriser</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submit" id="submit" class="btn btn-info btn-md">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
