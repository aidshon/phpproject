<?php 
include ('header.php');
    require "connection.php";
    if (isset($_GET['genre_name'])) {
      $genre_name=$_GET['genre_name'];
    $sql = "SELECT description, genre_name FROM genres WHERE genre_name='$genre_name'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	$desc=$row['description'];
        $genre_name=$row['genre_name'];
    }}
  ?>
<div class="container bio-header">
        <div class="row">
          <div class="col-lg-12 bio-content">
            <p id="p-bio"><span><?php echo $genre_name; ?></span></p>
            <p id="p-description"><?php echo $desc; ?></p>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
        <?
      $books=array();
      $sql = "SELECT image FROM books JOIN genres ON books.genre_id = genres.genre_id WHERE genre_name='$genre_name'";
      $i=0;
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	$books[$i]['image']=$row['image'];
    	$i++;
    }}
  }
    foreach ($books as $book) :
      ?>
          <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5">
            <a href="Ray-Bradbury-Fahrenheit-451.pdf"><img src="/images/<?php echo $book['image']; ?>" class="bio-images">
            </a>
          </div>
          <?
      endforeach;
      ?>
        </div>
      </div>