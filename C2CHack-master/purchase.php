<?php 

include('check.php');

$con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database) or die("Oops something went wrong!"); 

$post_id = $_GET['postid'];

$sql1 = $con->query("SELECT title,category,author,price FROM blog WHERE id ='$post_id'");
$row1=mysqli_fetch_array($sql1,MYSQLI_ASSOC);
$title = $row1['title'];
$category = $row1['category'];
$author = $row1['author'];
$price = $row1['price'];

if(!empty($_POST['submit'])){ 



$sql1 = $con->query("SELECT title,category,author,price FROM blog WHERE id ='$post_id'");
$row1=mysqli_fetch_array($sql1,MYSQLI_ASSOC);
$title = $row1['title'];
$category = $row1['category'];
$author = $row1['author'];
$price = $row1['price'];

$username = $_SESSION['username'];
$sql2 = $con->query("SELECT balance FROM user WHERE username ='$username'");
$row2=mysqli_fetch_array($sql2,MYSQLI_ASSOC);
$balance2 = $row2['balance'];

$netbalance2 = $balance2 - $price;
$sql3 = mysqli_query($con,"UPDATE user SET balance='$netbalance2' WHERE username='$username' ");

$sql4 = $con->query("SELECT balance FROM user WHERE username ='$author'");
$row4=mysqli_fetch_array($sql4,MYSQLI_ASSOC);
$balance4 = $row4['balance'];

$netbalance4 = $balance4 + $price;
$sql5 = mysqli_query($con,"UPDATE user SET balance='$netbalance4' WHERE username='$author' ");

$sql = $con->query("insert into purchase(post_id,user) values ('$post_id','$username')");

if ($sql){
	echo "<script type='text/javascript'> alert('Payment failed'); </script>";
	header("location: blog-post.php?postid=$post_id");
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
<title>ANSAT|PURCHASE</title>

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
        <li><a href="dashboard.php" class="hint--right" data-hint="Dashboard"><i class="budicon-image"></i><span>Dashboard</span></a></li>
        <li><a href="profile.php" class="hint--right" data-hint="Profile"><i class="budicon-author"></i><span>Profile</span></a></li>
        <li class="current"><a href="blog.php?category=" class="hint--right" data-hint="Blog"><i class="budicon-book-1"></i><span>Blog</span></a></li>
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
        <h1 class="section-title" style="text-align: center;">Confirm Purchase</h1>
        <p>Dear <?php echo $_SESSION['name'];?>,</p>
		<p>Kindly confirm your purchase-</p>
        <div class="divide20"></div>
	           <div class="divide30"></div>
        <div class="form-container">
          <div class="response alert alert-success"></div>
          <form class="forms" method="post" action="purchase.php?postid=<?php echo $post_id;?>">
            <fieldset>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-row text-input-row name-field">
                    <label>Title</label>
                    <input type="text" name="title" placeholder="<?php echo $title;?>" class="text-input defaultText required" readonly/>
                  </div>
                  <div class="form-row text-input-row subject-field">
                    <label>Category</label>
                    <input type="text" name="category" class="text-input defaultText required" placeholder="<?php echo $category;?>" readonly/>
                  </div>
				  <div class="form-row text-input-row subject-field">
                    <label>Author</label>
                    <input type="text" name="author" class="text-input defaultText required" placeholder="<?php echo $author;?>" readonly/>
                  </div>
				  <div class="form-row text-input-row subject-field">
                    <label>Price</label>
                    <input type="text" name="price" class="text-input defaultText required" placeholder="<?php echo $price;?>" readonly/>
                  </div>
                  <div class="button-row">
                    <input type="submit" value="Submit" name="submit" class="btn btn-submit bm0" />
                  </div>
                </div>
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
