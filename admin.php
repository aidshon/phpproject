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
          <a class="navbar-brand" href="index.html"><img src="books.png" id="logo-img"><span id="logo-text">bliss</span></a>
        </div>
        <div class="collapse navbar-collapse" id="responsive-menu">
          <ul class="nav navbar-nav navbar-right">
            <li class="tabs"><a>Administrator</a></li>
            <li class="tabs"><a href="deadSession.php">Sign out</a>
            </li>
            
                </ul>
</div>
        </div>
      </div>
<?
if (isset($_SESSION['username']) && ($_SESSION['username'])=='bliss-admin') {
	?>
	<p id="welcome">Welcome, Aidana!</p>
	<div class="tab">
	    <button class="tablinks" onclick="openTabs(event, 'Tables')">Tables</button>
        <button class="tablinks" onclick="openTabs(event, 'Control')">Control</button>
        <button class="tablinks" onclick="openTabs(event, 'Create')">Create</button>
</div>

<div id="Tables" class="tabcontent">
<br>
  <p>Books</p>
  <br>
  <table>
  <tr>
    <th>book_id</th>
    <th>name</th>
    <th>image</th>
    <th>author</th>
    <th>genre_id</th>
    <th>year</th>
    <th>description</th>
    <th>pdf</th>
    <th>best_new</th>
  </tr>
  <?
  require "connection.php";
  $books=array();
    $sql = "SELECT * FROM books";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      $i=0;
    while($row = $result->fetch_assoc()) {
      $books[$i]['book_id']=$row['book_id'];
      $books[$i]['name']=$row['name'];
      $books[$i]['author']=$row['author'];
      $books[$i]['genre_id']=$row['genre_id'];
      $books[$i]['year']=$row['year'];
      $books[$i]['description']=$row['description'];
      $books[$i]['image']=$row['image'];
      $books[$i]['pdf']=$row['pdf'];
      $books[$i]['best_new']=$row['best_new'];
      $i++;
    }
  foreach ($books as $book) :
  ?>
  <tr>
    <td><?php echo $book['book_id']; ?></td>
    <td><?php echo $book['name']; ?></td>
    <td><?php echo $book['image']; ?></td>
    <td><?php echo $book['author']; ?></td>
    <td><?php echo $book['genre_id']; ?></td>
    <td><?php echo $book['year']; ?></td>
    <td><?php echo $book['description']; ?></td>
    <td><?php echo $book['pdf']; ?></td>
    <td><?php echo $book['best_new']; ?></td>
  </tr>
  <? 
  endforeach;
    }
          ?>
</table>
<br>
<p>Genres</p>
<br>
  <br>
  <table>
  <tr>
    <th>genre_id</th>
    <th>genre_name</th>
    <th>description</th>
  </tr>
  <?
  require "connection.php";
  $genres=array();
    $sql = "SELECT * FROM genres";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      $i=0;
    while($row = $result->fetch_assoc()) {
      $genres[$i]['genre_id']=$row['genre_id'];
      $genres[$i]['genre_name']=$row['genre_name'];
      $genres[$i]['description']=$row['description'];
      $i++;
    }
  foreach ($genres as $genre) :
  ?>
  <tr>
    <td><?php echo $genre['genre_id']; ?></td>
    <td><?php echo $genre['genre_name']; ?></td>
    <td><?php echo $genre['description']; ?></td>
  </tr>
  <? 
  endforeach;
    }
          ?>
</table>
<br>
<p>Blogs</p>
<br>
  <br>
  <table>
  <tr>
    <th>book_id</th>
    <th>image</th>
    <th>title</th>
    <th>description</th>
    <th>date</th>
  </tr>
  <?
  require "connection.php";
    $blogs=array();
    $sql = "SELECT * FROM blogs";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      $i=0;
    while($row = $result->fetch_assoc()) {
      $blogs[$i]['blog_id']=$row['blog_id'];
      $blogs[$i]['image']=$row['image'];
      $blogs[$i]['title']=$row['title'];
      $blogs[$i]['description']=$row['description'];
      $blogs[$i]['date']=$row['date'];
      $i++;
    }
  foreach ($blogs as $blog) :
  ?>
  <tr>
    <td><?php echo $blog['blog_id']; ?></td>
    <td><?php echo $blog['image']; ?></td>
    <td><?php echo $blog['title']; ?></td>
    <td><?php echo $blog['description']; ?></td>
    <td><?php echo $blog['date']; ?></td>
  </tr>
  <? 
  endforeach;
    }
          ?>
</table>
</div>

<div id="Control" class="tabcontent">
<br>
<p>Books</p>
<br>
  <table>
  <tr>
    <th>book_id</th>
    <th>name</th>
    <th>image</th>
    <th>author</th>
    <th>genre_id</th>
    <th>year</th>
    <th>description</th>
    <th>pdf</th>
    <th>best_new</th>
  </tr>
  <?
  require "connection.php";
  $books=array();
    $sql = "SELECT * FROM books";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      $i=0;
    while($row = $result->fetch_assoc()) {
      $books[$i]['book_id']=$row['book_id'];
      $books[$i]['name']=$row['name'];
      $books[$i]['author']=$row['author'];
      $books[$i]['genre_id']=$row['genre_id'];
      $books[$i]['year']=$row['year'];
      $books[$i]['description']=$row['description'];
      $books[$i]['image']=$row['image'];
      $books[$i]['pdf']=$row['pdf'];
      $books[$i]['best_new']=$row['best_new'];
      $i++;
    }
  foreach ($books as $book) :
  ?>
  <tr>
  <form method="POST" action="editBook.php">
    <td><textarea class="numbers" name="bookarray[]" readonly><?php echo $book['book_id'];?></textarea></td>
    <td><input class="books-edit" placeholder="<?php echo $book['name']; ?>" name="bookarray[]"></td>
    <td><input class="books-edit" placeholder="<?php echo $book['image']; ?>" name="bookarray[]"></td>
    <td><input class="books-edit" placeholder="<?php echo $book['author']; ?>" name="bookarray[]"></td>
    <td><input class="books-edit numbers" placeholder="<?php echo $book['genre_id']; ?>" name="bookarray[]"></td>
    <td><input class="books-edit numbers" placeholder="<?php echo $book['year']; ?>" name="bookarray[]"></td>
    <td><textarea placeholder="<?php echo $book['description']; ?>" name="bookarray[]"></textarea></td>
    <td><input class="books-edit" placeholder="<?php echo $book['pdf']; ?>" name="bookarray[]"></td>
    <td><input class="books-edit numbers" placeholder="<?php echo $book['best_new']; ?>" name="bookarray[]"></td>
    <td class="buttons"><button type="submit"><img id="edit" src="/images/edit.png"></button></td>
    </form>
    <td><a href="deleteBook.php?delBook=<?php echo $book['book_id']; ?>"><img id="delete" src="/images/delete.png"></a></td>
  </tr>
  <? 
  endforeach;
}
          ?>
</table>
<br>
<p>Genres</p>
<br>
<table>
  <tr>
    <th>genre_id</th>
    <th>genre_name</th>
    <th>description</th>
  </tr>
  <?
  require "connection.php";
  $genres=array();
    $sql = "SELECT * FROM genres";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      $i=0;
    while($row = $result->fetch_assoc()) {
      $genres[$i]['genre_id']=$row['genre_id'];
      $genres[$i]['genre_name']=$row['genre_name'];
      $genres[$i]['description']=$row['description'];
      $i++;
    }
  foreach ($genres as $genre) :
  ?>
  <tr>
  <form method="POST" action="editGenre.php">
    <td><textarea class="numbers" name="genrearray[]" readonly><?php echo $genre['genre_id'];?></textarea></td>
    <td><input class="books-edit" placeholder="<?php echo $genre['genre_name']; ?>" name="genrearray[]"></td>
    <td><textarea class="books-edit" placeholder="<?php echo $genre['description']; ?>" name="genrearray[]"></textarea></td>
    <td><button type="submit"><img id="edit" src="/images/edit.png"></button></td>
    <td><a href="delGenre.php?delGenre=<?php echo $genre['genre_id']; ?>"><img id="delete" src="/images/delete.png"></a></td>
    </form>
  </tr>
  <? 
  endforeach;
}
          ?>          </form>
</table>
<br>
<p>Blogs</p>
<br>
  <table>
  <tr>
    <th>book_id</th>
    <th>image</th>
    <th>title</th>
    <th>description</th>
  </tr>
  <?
  require "connection.php";
  $blogs=array();
    $sql = "SELECT * FROM blogs";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      $i=0;
    while($row = $result->fetch_assoc()) {
      $blogs[$i]['book_id']=$row['book_id'];
      $blogs[$i]['image']=$row['image'];
      $blogs[$i]['title']=$row['title'];
      $blogs[$i]['description']=$row['description'];
      $blogs[$i]['date']=$row['date'];
      $i++;
    }
  foreach ($blogs as $book) :
  ?>
  <tr>
  <form method="POST" action="editBlog.php">
    <td><textarea class="numbers" name="blogarray[]" readonly><?php echo $book['blog_id'];?></textarea></td>
    <td><input class="books-edit" placeholder="<?php echo $blog['image']; ?>" name="blogarray[]"></td>
    <td><input class="books-edit" placeholder="<?php echo $blog['name']; ?>" name="blogarray[]"></td>   
     <td><input class="books-edit" placeholder="<?php echo $blog['author']; ?>" name="blogarray[]"></td>
    <td><textarea placeholder="<?php echo $blog['description']; ?>" name="blogarray[]"></textarea></td>
    <td><input class="books-edit" placeholder="<?php echo $blog['date']; ?>" name="blogarray[]"></td>
    <td class="buttons"><button type="submit"><img id="edit" src="/images/edit.png"></button></td>
    </form>
    <td><a href="deleteBlog.php?delBlog=<?php echo $blog['blog_id']; ?>"><img id="delete" src="/images/delete.png"></a></td>
  </tr>
  <? 
  endforeach;
}
          ?>
</table>
</div>

<div id="Create" class="tabcontent">
<br>
  <p>Books</p> 
  <br>
  <table>
  <tr>
    <th>book_id</th>
    <th>name</th>
    <th>image</th>
    <th>author</th>
    <th>genre_id</th>
    <th>year</th>
    <th>description</th>
    <th>pdf</th>
    <th>best_new</th>
  </tr>
  <?
  require "connection.php";
  ?>
  <form method="POST" action="createBook.php">
  <tr>
    <td><input class="books-create numbers" name="bookId"></td>
    <td><input class="books-create" name="bookname"></td>
    <td><input class="books-create" name="bookimage"></td>
    <td><input class="books-create" name="bookauthor"></td>
    <td><input class="books-create numbers" name="bookgenre"></td>
    <td><input class="books-create numbers" name="bookyear"></td>
    <td><textarea name="bookdesc"></textarea></td>
    <td><input class="books-create" name="bookpdf"></td>
    <td><input class="books-create numbers" name="bestNew"></td>
    <td class="buttons"><button type="submit" name=""><img src="/images/success.png"></button></td>
  </tr>
          </form>
</table>
<br>
<p>Genres</p>
  <table>
  <tr>
    <th>genre_name</th>
    <th>description</th>
  </tr>
  <?
  require "connection.php";
  ?>
  <form method="POST" action="createGenre.php">
  <tr>
    <td><input class="books-create" name="genrename"></td>
    <td><textarea name="genredesc" id="genreDesc"></textarea></td>
    <td class="buttons"><button type="submit" name=""><img src="/images/success.png"></button></td>
  </tr>
          </form>
</table>
<br>
<p>Blogs</p>
<br>
<table>
  <tr>
    <th>image</th>
    <th>title</th>
    <th>description</th>
  </tr>
  <form method="POST" action="createBlog.php">
  <tr>
    <td><input class="books-create" name="image"></td>
    <td><input class="books-create" name="title"></td>
    <td><textarea name="blogdesc" id="genreDesc"></textarea></td>
    <td class="buttons"><button type="submit" name=""><img src="/images/success.png"></button></td>
  </tr>
          </form>
  <tr>
</table>
</div>
<script>
function openTabs(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
	<?
}
else { ?>
<p id="not-admin-text">Restricted. You are not an administrator.</p>
<a href="index.php" id="back"><img src="back.png"></a>
<?
}
?>
<style type="text/css">
table {
    font-family: 'PT Sans', sans-serif;
    border-collapse: collapse;
}

td, th {
    border: 2px solid black;
    text-align: left;
    padding: 8px;
}
td, tr, th {
  font-family: 'PT Sans', sans-serif;
  font-size: 13px;
}
th {
  color: blue;
}
tr:nth-child(even) {
    background-color: #dddddd;
}
.books-edit {
	width: 150px;
}
.numbers {
	width: 60px;
  height: auto;
}
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    margin-top: 100px;
}

.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

.tab button:hover {
    background-color: #ddd;
}

.tab button.active {
    background-color: #ccc;
}

.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
#not-admin-text {
	margin-top: 130px;
	color: red;
	font-family: 'PT Sans', sans-serif;
    font-weight: bold;
    font-size: 25px;
}
#not-admin-text, #back {
	margin-left: 10px;
}
#welcome {
	font-family: 'PT Sans', sans-serif;
	font-size: 20px;
	margin-top: 160px;
	margin-left: 10px;
	color: #000080;
}
input, textarea {
  font-family: 'PT Sans', sans-serif;
  border-radius: 4px;
  border: 1px solid blue;
  padding: 5px;
}
button {
  background: none;
  border: none;
}
button:hover {
 opacity: 0.6;
}
p {
  font-size: 20px;
  font-family: 'PT Sans', sans-serif;
  color: blue;
  font-weight: bold;
}
</style>