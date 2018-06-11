<?php 
session_start();
?>
<!DOCTYPE html> 
<html lang="en"> 
<head> 
<meta charset="utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>Online book-reader</title> 
<link href="css/bootstrap.css" rel="stylesheet"> 
<link href="css/main.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Calligraffitti|Marck+Script|Montez" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Barlow+Condensed" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/main.js" type="text/javascript"></script>
</head> 
<body class="main-body"> 
  <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
      <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle plus collapsed" data-toggle="collapse" data-target="#responsive-menu">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
          <a class="navbar-brand" href="index.php"><img src="/images/books.png" id="logo-img"><span id="logo-text">bliss</span></a>
        </div>
        <div class="collapse navbar-collapse" id="responsive-menu">
          <ul class="nav navbar-nav navbar-right">
            <li class="tabs"><a href="index.php">HOME</a></li>
            <li class="dropdown tabs"><a href="#" class="dropdown-toggle" data-toggle="dropdown">BROWSE <b class="caret"></b></a>
            <ul class="dropdown-menu multi-column columns-2">
            <div class="row">
            <?
        require "connection.php";
    $genres=array();
    $sql = "SELECT * FROM genres";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      $i=0;
    while($row = $result->fetch_assoc()) {
      $genres[$i]['genre_name']=$row['genre_name'];
      $i++;
    }
  }
    foreach ($genres as $genre) :
      ?>
              <div class="col-sm-6">
                <ul class="multi-column-dropdown">
                  <li><a href="genredesc.php?genre_name=<?php echo $genre['genre_name']; ?>" class="genres"><?php echo $genre['genre_name']; ?></a></li>
                </ul>
              </div>
              <? 
                endforeach; ?>
            </div>  
            </ul></li>
            <li class="tabs"><a href="blog.php">BLOG</a></li>
            <li class="tabs"><a href="contacts.php">CONTACTS</a></li>
          <?php if(!isset( $_SESSION['user_id'])):  ?>
            <li class="tabs"><a href="#" data-toggle="modal" data-target="#modal">SIGN IN</a>
    </li>
  <?php else: ?>
    <li class="tabs"><a href="main.php">ME</a></li>
    <li class="tabs"><a href="deadSession.php">SIGN OUT</a></li>
    <?php endif; ?>
    </ul>
</div>
        </div>
      </div>
      <div id="modal" class="modal" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="container sign-in-tabs">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#login">Login</a></li>
    <li><a data-toggle="tab" href="#register">Register</a></li>
  </ul>

  <div class="tab-content">
    <div id="login" class="tab-pane fade in active">
      <form class="login" method="POST" action="login.php">               
                <img src="user.png"><input type="text" name="username" placeholder="Username" class="inputs" id="username">
                <br>
                <img src="key.png"><input type="password" name="password" placeholder="Password" class="inputs" id="password">
                <br>
                <input type="submit" id="signin-btn" class="btn"> <!--onclick="validate()-->
                </form>
    </div>
    <div id="register" class="tab-pane fade">
    <form class="register" method="POST" action="registration.php">
      <span class="name">First name</span>
      <br>
      <input type="text" class="registration-inp" name="first-name">
      <br>
      <span class="name">Last name</span>
      <br>
      <input type="text" class="registration-inp" name="last-name">
      <br>
      <span class="required-username">Username</span>
      <br>
      <input type="text" class="registration-inp inp1" name="reg-username" id="user" data-toggle="tooltip" data-placement="auto right" title="Username must contain exactly one uppercase letter, exactly two digits and length must be at least 5.">
      <img src="check-mark.png" id="check-mark">
      <img src="cancel-mark.png" id="wrong-mark">
      <br>
      <span class="required-email">E-mail</span>
      <br>
      <input type="email" class="registration-inp inp2" name="email" id="e-mail" placeholder="user123@gmail.com">
      <img src="check-mark.png" id="check-mark1">
      <img src="cancel-mark.png" id="wrong-mark1">
      <br>
      <span class="required-password">Password</span>
      <br>
      <input type="password" class="registration-inp inp3" name="reg-password" id="pass" data-toggle="tooltip" data-placement="auto right" title="Password can contain only letters and digits.">
      <img src="check-mark.png" id="check-mark2">
      <img src="cancel-mark.png" id="wrong-mark2">
      <br>
      <input type="submit" class="btn" id="register-btn"><!--onclick="register()-->
    </form>
</div>
      </div>
        </div>
          
        </div>
      </div>
    </div>