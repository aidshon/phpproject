<?php
  session_start();
  include ("header.php");
  if(isset($_SESSION['username'])){
	 require ("connection.php");
		$sql = "SELECT * from users where username='".$_SESSION['username']."' ";
		$result = $conn->query($sql);
		$_SESSION['password'];
		if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
    	$firstname=$row['firstname'];
    	$lastname=$row['lastname'];
    	$username=$row['username'];
    	$email=$row['email'];
    	$password=$row['password'];
        ?>
        <form style="margin-top: 100px;" method='POST' action='editU.php'>
        <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 user-info">
                <div class="card card-inverse card-info">
                    <div class="card-block">
                        <div class="meta card-text">
                            <a>First name: </a>
                            <input class="info-inp" type='text' name='firstname' placeholder="<?php echo $row['firstname']; ?>">
                        </div>
                        <div class="meta card-text">
                            <a>Last name: </a>
                            <input class="info-inp" name='lastname' placeholder="<?php echo $row['lastname']; ?>">
                        </div>
                        <div class="meta card-text">
                            <a>Username: </a>
                            <input class="info-inp" type='text' name='username' placeholder="<?php echo $row['username']; ?>"> 
                        </div>
                        <div class="meta card-text">
                            <a>E-mail: </a>
                            <input class="info-inp" type='text' name='email' placeholder="<?php echo $row['email']; ?>">
                            </div>
                        <div class="meta card-text">
                            <a>Password: </a>
                            <input class="info-inp" type='password' name='password' placeholder='Enter your password'>
                        </div>
                        <input id="submit-btn" type='submit'>
                    </div>
                </div>
            </div>
</div>
</div>
</form>
<style type="text/css">
.info {
  color: black;
  font-size: 17px;
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

.card-text {
    clear: both;
    margin-top: .5em;
    color: rgba(0, 0, 0, .68);
    font-family: 'PT Sans', sans-serif;
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
	top: 0px;
}
.info-inp {
	width: 200px;
	height: 50px;
	border: none;
	border-radius: 3px;
	font-size: 16px;
	padding: 15px;
	margin-left: 50px;
	color: #008080;
}
#submit-btn {
	border: none;
	font-size: 20px;
	margin-top: 20px;
	width: 110px;
	height: 40px;
	border-radius: 3px;
	background: #90EE90;
	color: white;
}
#submit-btn:hover {
	background: #6B8E23;
}
</style>
		<?
	}
	} else {
    echo "0 results";
	}
	$conn->close();
	 }
  else
      echo "eror";
?>