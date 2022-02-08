<?php
include("../db.php");
if(!isset($_COOKIE["uname"])){
    header("location: ./loginpage.php");
}
$page = $_REQUEST["page"] ?? 1;
$blog=$con->query("SELECt * from blog where id='$page'")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Panel</title>
	<link rel="stylesheet" href="styles.css">
  <script src="https://cdn.tiny.cloud/1/iztqcy23htw1h0qhtm94ty89clbaoizwvsl8w9ef50zr8dli/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>


<div class="wrapper">
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <ul>    
            <li><a href="Homepage.html"><i class="fas fa-home"></i>HomePage</a></li>
            <li><a href="features.html"><i class="fas fa-stroopwafel fa-spin"></i>Features/What I Do</a></li>
            <li><a href="portfolio.html"><i class="fas fa-project-diagram"></i>portfolio</a></li>
            <li><a href="resume.html"><i class="fas fa-address-card"></i>My Resume</a></li>
            <li><a href="testimonial.html"><i class="fas fa-blog"></i>Testimonial</a></li>
            <li><a href="pricing.html"><i class="fas fa-address-book"></i>My pricing</a></li>
            <li><a href="blog.html"><i class="fas fa-map-pin"></i>My Blog</a></li>
            <li><a href="message.html"><i class="fas fa-sms"></i>Veiw Message</a></li>
            <li><a href="password.html"><i class="fas fa-address-card"></i>Password Change</a></li>
            <li><a href="#"><i class="fas fa-sign-out-alt fa-spin"></i>LOGOUT</a></li>
        </ul> 
        <div class="social_media"></div>
      </div>
    </div>
    
    <div class="topnav">
        <a class="active" href="blog.php?page=1">Blog 1</a>
        <a href="blog.php?page=2">Blog 2</a>
        <a href="blog.php?page=3">Blog 3</a>
      </div>
      <div class="divider">   
        <?php
        if(isset($_POST["Save"])){
          $topic=$_POST["topic"];
          $title=$_POST["title"];
          $duration=$_POST["duration"];
          $content=$_POST["content"];
          $date= date("M d, Y");
          if($con->query("UPDATE blog set topic='$topic', title='$title', duration='$duration', content='$content', date='$date' where id=$page")){
            echo"<script> alert ('Successful'); </script>";
          }
        }
        ?>
      <form action="" style="margin-left: 25%;" method="post">
        <input type="text" name="topic" id="" value="<?php echo $blog["topic"]; ?>"> <br>
        <input type="text" name="title" id="" value="<?php echo $blog["title"]; ?>"> <br>
        <input type="text" name="duration" id="" value="<?php echo $blog["duration"]; ?>"> <br>
        <textarea name="content" id="" cols="30" rows="300">
          <?php echo $blog["content"]; ?>
        </textarea>
        <input type="submit" value="Save" name="Save">
      </form>
     <div class = "vertical"><br>
      <i><h1 class="topic-red">Message Veiw</h1></i>
      <hr width="220%">
     </div>
</div>
</body>
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
    });
  </script>
</html>