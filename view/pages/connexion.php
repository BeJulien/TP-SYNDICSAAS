<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="sidenav">
    <div class="login-main-text">
      <img id="logo" src="img/syndicsaas.png">
    </div>
  </div>
      <div class="main">
        <div class="col-md-6 col-sm-12">
          <div class="login-form">
            <b><p>Connectez-vous à SYNDICSAAS</p></b>
            <form method="POST" action="index.php?act=connect">
              <div class="form-group">
                 <input type="text" class="form-control" name="login" placeholder="Nom d'utilisateur">
              </div>
              <div class="form-group">
                 <input type="password" class="form-control" name="password" placeholder="Mot de passe">
              </div>
              <div class="form-group" ><a id="mdpOublie" href="">Mot de passe oublié ?</a></div>
              <div><button type="submit" class="btn btnNav">Se connecter</button></div>
            </form>
          </div>
         </div>
      </div>