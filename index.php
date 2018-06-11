<?php 
include ("header.php");
?>
        <div class="container info1">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 paragraph1">
            <p id="read" class="text-center"><span>EVERYONE</span><br>deserves to read good books</p>
          </div>
        </div>
      </div>
      
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header">
            <h1>BESTSELLERS</h1>
          </div>
        </div>
      </div>
      <div class="container books">
        <div class="row">
        <?
        require "connection.php";
    $books=array();
    $sql = "SELECT * FROM books JOIN genres ON books.genre_id = genres.genre_id WHERE best_new=1";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
    // output data of each row
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
      $books[$i]['genre_name']=$row['genre_name'];
      $i++;
    }
  }
    foreach ($books as $book) :
      ?>
          <div class="col-lg-4 col-md-4 col-sm-6 bookholder">
            <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 cover">
                <img src="/images/<?php echo $book['image']; ?>" class="books-images">
              </div>
              <div class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1 col-sm-8 col-xs-8 description">
              <form action="about.php"></form>
                <h1>Author: <?php echo $book['author']; ?><br></h1>
                <h1>Genre: <?php echo $book['genre_name']; ?><br></h1>
                <h1>Published in: <?php echo $book['year']; ?></h1>
                <a href="about.php?book=<?php echo $book['book_id'];?>" class="btn about" >About</a>
                <a href="<?php echo $book['pdf']; ?>" type="button" class="btn read">Read</a>
<div id="1book" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center"><?php echo $book['name']; ?></h4>
      </div>
      <div class="modal-body">
        <p class="text-center"><?php echo $book['description']; ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
              </div>
            </div>
          </div>
          <? 
                endforeach; ?>
                <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header two">
            <h1>NEW ON SITE</h1>
          </div>
        </div>
      </div>
      <?
        require "connection.php";
    //select to db
    $books=array();
    $sql = "SELECT * FROM books JOIN genres ON books.genre_id = genres.genre_id WHERE best_new=0";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
    // output data of each row
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
      $books[$i]['genre_name']=$row['genre_name'];
      $i++;
    }
  }
    foreach ($books as $book) :
      ?>
          <div class="col-lg-4 col-md-4 col-sm-6 bookholder">
            <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 cover">
                <img src="/images/<?php echo $book['image']; ?>" class="books-images">
              </div>
              <div class="col-lg-8 col-lg-offset-1 col-md-8 col-md-offset-1 col-sm-8 col-xs-8 description">
                <h1>Author: <?php echo $book['author']; ?><br></h1>
                <h1>Genre: <?php echo $book['genre_name']; ?><br></h1>
                <h1>Published in: <?php echo $book['year']; ?></h1>
                <button type="button" class="btn about" data-toggle="modal" data-id="<?php echo $book['book_id']; ?>" data-target="#1book">About</button>
                <a href="<?php echo $book['pdf']; ?>" type="button" class="btn read">Read</a>
<div id="1book" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <?

        ?>
        <h4 class="modal-title text-center"><?php echo $book['name']; ?></h4>
      </div>
      <div class="modal-body">
        <p class="text-center"><?php echo $book['description']; ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
              </div>
            </div>
          </div>
          <? 
                endforeach; 
                ?>
                <?php include ("footer.php"); ?>