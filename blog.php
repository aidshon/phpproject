<?php 
include ("header.php");
?>
<a href="#" id="toTop"><span class="glyphicon glyphicon-circle-arrow-up"></span></a>
    <div class="container quotes-container"> 
        <div class="row"> 
        <div class="col-lg-3 col-md-2 col-sm-2 col-xs-12">
          <p id="quotes-header" class="text-right">As<br>wise man<br>once said</p>
        </div>
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12"> 
            <img src="/images/11.png" class="images"> 
            <img src="/images/22.png" class="images"> 
            <img src="/images/33.png" class="images"> 
          </div> 
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 quotes-div"> 
            <blockquote class="blockquote quotes" id="quote1"><p>“There is no friend as loyal as a book.”</p><footer>Ernest Hemingway</footer></blockquote> 
            <blockquote class=" blockquote quotes" id="quote2"><p>“I find television very educating. Every time somebody turns on the set, I go into the other room and read a book.”</p><footer>Groucho Marx</footer></blockquote> 
            <blockquote class="blockquote quotes" id="quote3"><p>“A book, too, can be a star, a living fire to lighten the darkness, leading out into the expanding universe.”</p><footer>Madeleine L'Engle</footer></blockquote> 
          </div> 
        </div> 
      </div> 
      <?
      require ("connection.php");
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
  }
    foreach ($blogs as $blog) :
      ?>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 articles">
              <div class="card mb-3">
                <img class="card-img-top" src="/images/<?php echo $blog['image']; ?>" alt="Card image cap">
              <div class="card-body">
                <h4 class="card-title"><?php echo $blog['title']; ?></h4>
                <p class="card-text"><?php echo $blog['description']; ?></p>
                <p class="card-text"><small class="text-muted"><span class="glyphicon glyphicon-calendar"></span><?php echo $blog['date']; ?></small></p>
                <div id="read-div1"></div>
                <? 
                require ("connection.php");
                $sql="SELECT comment, username, dateCom FROM blogs JOIN comments ON blogs.blog_id=comments.blog_id JOIN users
                ON users.user_id=comments.user_id";
                $result=$conn->query($sql);
                $comments=array();
                $i=0;
                if ($result->num_rows>0) {
                    while($row = $result->fetch_assoc()) {
                    $comments[$i]['username']=$row['username'];
                    $comments[$i]['comment']=$row['comment'];
                    $comments[$i]['dateCom']=$row['dateCom'];
                    $i++;
                  }
                }
                foreach ($comments as $comment):
                ?>
              <div class="container">
<div class="row">
<div class="col-sm-1">
<div class="thumbnail">
<img class="img-responsive user-photo" src="http://moziru.com/images/profile-clipart-end-user-20.png">
</div>                 
</div>
<div class="col-sm-5">
<div class="panel panel-default">
<div class="panel-heading">
<strong><?php echo  $comment['username']; ?></strong> <span class="text-muted"><?php echo $comment['dateCom']; ?></span>
</div>
<div class="panel-body">
<?php echo $comment['comment']; ?></div>
</div>
</div>
</div>
</div>
              <?
              endforeach;
              ?>
                <form method="POST" action="comment.php">
                 <?php 
                if (isset($_SESSION['user_id'])) {
                  require ("connection.php");
                  $sql="SELECT username FROM users WHERE user_id='".$_SESSION['user_id']."'";
                  $result=$conn->query($sql);
                  if ($result->num_rows>0) {
                    while($row = $result->fetch_assoc()) {
                    $user=$row['username'];
                  ?>
                  <textarea style="display: none;" name="author"><?php echo $user; ?></textarea>
                  <?php $today=getdate(date("U")); ?>
                  <textarea style="display: none;" name="date"><?php echo $today[month]. ", " .$today[mday]. " " .$today[year]; ?></textarea>
                  <textarea type="" name="comment"></textarea>
                  <textarea style="display: none;" name="blog_id"><?php echo $blog['blog_id']; ?></textarea>
                  <br>
                  <button type="submit" class="btn btn-primary" name="">Send</button>
                  <? 
                }}}
                ?>
                </form>
            </div>
            </div>
          </div> 
        </div>
      </div>
      <? 
                endforeach; ?>
                <style type="text/css">
                textarea {
                  border-radius: 5px;
                  width: 500px;
                  height: 200px;
                  border: 1px solid blue;
                  margin-bottom: 20px;
                  font-size: 18px;
                  font-family: 'PT Sans', sans-serif;
                }
                .btn-primary {
                  font-size: 20px;
                  font-family: 'PT Sans', sans-serif;
                  width: 90px;
                  margin-bottom: 20px;
                }
                  .thumbnail {
                     padding:0px;
                  }
.panel {
  position:relative;
}
.panel>.panel-heading:after,.panel>.panel-heading:before{
  position:absolute;
  top:11px;left:-16px;
  right:100%;
  width:0;
  height:0;
  display:block;
  content:" ";
  border-color:transparent;
  border-style:solid solid outset;
  pointer-events:none;
}
.panel>.panel-heading:after{
  border-width:7px;
  border-right-color:#f7f7f7;
  margin-top:1px;
  margin-left:2px;
}
.panel>.panel-heading:before{
  border-right-color:#ddd;
  border-width:8px;
}
                </style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/main.js" type="text/javascript"></script> 
</body> 
</html>