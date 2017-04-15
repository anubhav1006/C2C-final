<?php 

include('check.php');

$con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database) or die("Oops something went wrong!"); 

if(isset($_POST['submit'])){ 
    $title= $_POST['title']; 
    $intro= $_POST['intro']; 
    $category= $_POST['category']; 
    $author= $username;
	$content = $_POST['content'];
	$price = $_POST['price'];

$sql = $con->query("insert into blog(title,intro,category,author,content,price,date) values ('$title','$intro','$category','$author','$content',$price, now())");
if($sql){
echo "<script>alert('Submitted Successfully!')</script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="style/images/favicon.png">
<title>ANSAT|HOME</title>

<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/plugins.css" rel="stylesheet">
<link href="style/css/prettify.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<link href="style/css/color/green.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Raleway:400,800,700,600,500,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,400italic' rel='stylesheet' type='text/css'>
<link href="style/type/fontello.css" rel="stylesheet">
<link href="style/type/budicons.css" rel="stylesheet">
  <link href="style/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
</head>
<body class="full-layout" style="background-image: url('style/images/art/bg1.jpg')">
<div id="preloader"><div id="status"><div class="spinner"></div></div></div>
<div class="body-wrapper">
  <nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header"> <a class="btn responsive-menu" data-toggle="collapse" data-target=".navbar-collapse"><i></i></a>
      <div class="navbar-brand text-center"> <a href="index.html"><img src="style/images/logo.png" alt="" data-src="style/images/logo.png" data-ret="style/images/logo@2x.png" class="retina" /></a> </div>
      <!-- /.navbar-brand --> 
    </div>
    <!-- /.navbar-header -->
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="home.php" class="hint--right" data-hint="Home"><i class="budicon-home-1"></i><span>Home</span></a></li>
        <li class="current"><a href="dashboard.php" class="hint--right" data-hint="Dashboard"><i class="budicon-image"></i><span>Dashboard</span></a></li>
        <li><a href="profile.php" class="hint--right" data-hint="Profile"><i class="budicon-author"></i><span>Profile</span></a></li>
        <li><a href="blog.php?category=" class="hint--right" data-hint="Blog"><i class="budicon-book-1"></i><span>Blog</span></a></li>
		<li><a class="hint--right" data-hint="Logout"><i class="budicon-monitor" onclick="logout()"></i><span>Logout</span></a></li>
		<script>function logout() {
			var r= confirm("Logout?");
			if (r == true){
				location.href="logout.php";
			}
		}
		</script>
      </ul>

    </div>
       </nav>
	   
	     <div class="container">
	       <section id="contact">
      <div class="box">
        <h1 class="section-title" style="text-align: center;">My Dashboard</h1>
        <p>Dear <?php echo $_SESSION['name'];?>,</p>
		<p>This is the dashboard where you can upload new blog for the customers, set its price and publish it. Be creative, innovative and earn what you deserve!</p>
        <div class="divide20"></div>
	           <div class="divide30"></div>
        <div class="form-container">
          <div class="response alert alert-success"></div>
          <form class="forms" method="post" action="dashboard.php">
            <fieldset>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-row text-input-row name-field">
                    <label>Title</label>
                    <input type="text" name="title" class="text-input defaultText required"/>
                  </div>
                  <div class="form-row text-input-row subject-field">
                    <label>Introduction</label>
                    <input type="text" name="intro" class="text-input defaultText required"/>
                  </div>
                  <div class="form-row text-input-row subject-field">
                    <label>Category: </label>
					<select name="category" class="text-input defaultText">
                    <option value="general">General</option>
					<option value="science">Science & Technology</option>
					<option value="comedy">Comedy</option>
					<option value="abstract">Abstract</option>
                  </div>
                  <div class="form-row text-area-row">
                    <label>Content</label>
                    <textarea name="content" class="text-area required"></textarea>
                  </div>
				  <div class="form-row text-input-row">
                    <label>Price</label>
                    <input type="text" name="price" class="text-input defaultText required"/>
                  </div>
                  <div class="button-row">
                    <input type="submit" value="Submit" name="submit" class="btn btn-submit bm0" />
                  </div>
                </div>
                <input type="hidden" name="v_error" id="v-error" value="Required" />
                <input type="hidden" name="v_email" id="v-email" value="Enter a valid email" />
              </div>
            </fieldset>
          </form>
        </div>
		
		      </div>

    </section>
		
		<footer class="footer box">
      <p class="pull-left">© 2017 ANSAT. All rights reserved.</p>
      <ul class="social pull-right">

        <li><a href="#"><i class="icon-s-facebook"></i></a></li>

        <li><a href="#"><i class="icon-s-instagram"></i></a></li>

      </ul>
      <div class="clearfix"></div>
    </footer>

    
  </div>

</div>

<script src="style/js/jquery.min.js"></script> 
<script src="style/js/bootstrap.min.js"></script> 
<script src="style/js/jquery.themepunch.tools.min.js"></script> 
<script src="style/js/classie.js"></script> 
<script src="style/js/scripts.js"></script>  
<script>
	$.backstretch(["style/images/art/bg1.jpg"]);
</script>
</body>
</html>
