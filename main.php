<?php
session_start();  
include ("header.php");
  if(isset($_SESSION['username'])){
   
    require ("connection.php");

    //select to db
    $sql = "SELECT * from users where username='".$_SESSION['username']."' ";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $firstname=$row['firstname'];
      $lastname=$row['lastname'];
      $username=$row['username'];
      $email=$row['email'];
      $password=$row['password'];
      ?>
      <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 user-info">
                <div class="card card-inverse card-info">
                <div class="row card-top">
                <div class="col-sm-4">
                  <img class="card-img-top" src="http://moziru.com/images/profile-clipart-end-user-20.png">
                  </div>
                  <div class="col-sm-4 ">
                  <form method="POST" action="edit.php">
                  <button class="btn btn-default top-btn"><img src="/images/edit.png" class="icons">Edit account</button>
                  </form>
                  <form method="POST" action="deleteUser.php">
                    <button class="btn btn-default top-btn delete"><img src="/images/delete.png" class="icons">Delete account</button>
                  </form>
                  </div>
                </div>
                    <div class="card-block">
                        <figure class="profile">
                            <img src="http://moziru.com/images/profile-clipart-end-user-20.png" class="profile-avatar" alt="">
                        </figure>
                        <h4 class="card-title"><?php echo $firstname. " " .$lastname; ?></h4>
                        <div class="meta card-text">
                            <a>Username: </a>
                            <p class="info"><?php echo $username; ?></p>
                        </div>
                        <div class="meta card-text">
                            <a>E-mail: </a>
                            <p class="info"><?php echo $email; ?></p>
                        </div>
                    </div>
                </div>
            </div>
</div>
</div>
      <?php 
    }
  }
      else {
        echo "No such user";
      }
      $conn->close();
    }
    else {
      echo "<p>An error occured</p>";
    }
      ?>
<style type="text/css">
.info {
  color: black;
  font-size: 17px;
}
.icons {
  padding-right: 10px;
}
.btn-default {
  background: #FFFAF0;
  font-family: 'PT Sans', sans-serif;
  font-size: 17px;
  width: 180px;
}
.delete {
  position: relative;
  top: -35px;
}
.card-top {
  background: #B0E0E6;
}
.top-btn {
  margin-top: 50px;
}
.card {
    font-size: 1em;
    overflow: hidden;
    padding: 0;
    border: none;
    border-radius: .28571429rem;
    box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px #d4d4d5;
    width: 600px;
}

.card-block {
    font-size: 1em;
    position: relative;
    margin: 0;
    padding: 1em;
    border-top: 1px solid rgba(34, 36, 38, .1);
    box-shadow: none;
}

.card-img-top {
    display: block;
    height: 200px;
    width: 200px;
}

.card-title {
    font-size: 20px;
    font-weight: 700;
    line-height: 1.2857em;
}

.card-text {
    clear: both;
    margin-top: .5em;
    color: rgba(0, 0, 0, .68);
    font-family: 'PT Sans', sans-serif;
}

.card-footer {
    font-size: 1em;
    position: static;
    top: 0;
    left: 0;
    max-width: 100%;
    padding: .75em 1em;
    color: rgba(0, 0, 0, .4);
    border-top: 1px solid rgba(0, 0, 0, .05);
}

.card-inverse .btn {
    border: 1px solid rgba(0, 0, 0, .05);
}

.profile {
    position: absolute;
    top: -12px;
    display: inline-block;
    overflow: hidden;
    box-sizing: border-box;
    width: 25px;
    height: 25px;
    margin: 0;
    border: 1px solid #fff;
    border-radius: 50%;
}

.profile-avatar {
    display: block;
    width: 100%;
    height: auto;
    border-radius: 50%;
}

.text-bold {
    font-weight: 700;
}

.meta {
    font-size: 1em;
    color: rgba(0, 0, 0, .4);
}

.meta a {
    text-decoration: none;
    color: rgba(0, 0, 0, .4);
}

.meta a:hover {
    color: rgba(0, 0, 0, .87);
}
.user-info {
  position: relative;
  top: 130px;
}
</style>
    </body>
    </html>