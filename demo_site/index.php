<?php
require_once("config.php");
$screenMessage = '';
if (!$auth->isLogged()) {
    
    if(isset($_POST)){

        $email = $_POST['email'];
        $password = $_POST['password'];
        $validEmail = $auth->validateEmail($email);
        if($validEmail['error'] == 1){
            //invalid email
            $screenMessage = $validEmail['message'];
        }
        // if(isEmailTaken($email)){
        //   $screenMessage = 'Email already taken, use another email or <a href="index.php">Login</a>';
        // }
        else{
          $attempt = $auth->login($email,$password,$remember=0,$captcha=NULL);
          
          if($attempt['error'] == true){
            $screenMessage = $attempt['message'];
          }else{
            if($auth->isLogged()){
              header("Location: home.php");
            }
          }
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
    <title>PHP Auth Demo Website</title>
</head>
<body>
<?php
  if($screenMessage!="" || $screenMessage!=null){
    echo '<div class="alert alert-danger" role="alert">
        '.$screenMessage.'
      </div>';
  }
?>      
<main class="form-signin">
  <form method="post" action=""> 
    <img class="mb-4" src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="email" class="form-control" id="email" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>

</body>
</html>
<?php
}else{
    header("Location: home.php");
}
?>