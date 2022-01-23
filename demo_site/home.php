<?php
require_once("config.php");

//check if user is logged in
if (!$auth->isLogged()) {
    header('Location: index.php');    
    exit();
}else{
    //get the current session hash
    $sessionHash = $auth->getCurrentSessionHash();
    $UID = $auth->getCurrentUID();  // $UID = $auth->getSessionUID($sessionHash);
    $sessionCheck = $auth->checkSession($sessionHash);
    
    //validate current session hash and uid
    if($sessionCheck == false || $UID==false){
        $auth->deleteSession($sessionHash);
        header("Location: index.php");
        exit();
    }
    else{
        $user = $auth->getCurrentSessionUserInfo(); // $user = $auth->getCurrentUser(); //->
        // var_dump($user);
        // var_dump($_COOKIE);
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/signin.css">
    <title>PHP Auth Demo Website - Home</title>
</head>
<body>
    <!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="#">Features</a>
        <a class="nav-link" href="#">Pricing</a>
        <a class="nav-link" href="logout.php">Logout</a>
      </div>
    </div>
  </div>
</nav>
<!-- end of navbar -->

</body>
</html>
<?php

?>