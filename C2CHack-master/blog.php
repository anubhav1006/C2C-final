<?php 

include('check.php');
             
			 $sql = mysqli_query($con,"SELECT id FROM blog");
			 $post_count=mysqli_num_rows($sql);
			 $category = $_GET['category'];
			
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="style/images/favicon.png">
<title>Lumos</title>
<!-- Bootstrap core CSS -->
<link href="style/css/bootstrap.min.css" rel="stylesheet">
<link href="style/css/plugins.css" rel="stylesheet">
<link href="style/css/prettify.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<link href="style/css/color/green.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Raleway:400,800,700,600,500,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,400italic' rel='stylesheet' type='text/css'>
<link href="style/type/fontello.css" rel="stylesheet">
<link href="style/type/budicons.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="style/js/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
</head>
<body class="full-layout">
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
      <!-- /.navbar-nav --> 
    </div>
    <!-- /.navbar-collapse -->

    <!-- /#elsewhere --> 
  </nav>
  <!-- /.navbar -->
  
  <div class="container inner">
    <div class="blog grid-view row">
      <div class="col-md-8 col-sm-12 content">
	  	<div class="blog-posts">
          <div class="isotope row">
		     <?php if ($category == ''){
			 for ($post_id = $post_count; $post_id >= 1; $post_id--){
		     $sql = mysqli_query($con,"SELECT title, content, image, author, date, intro FROM blog WHERE id='$post_id' ");
             $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
				$title = $row['title'];
				$content = $row['content'];
				$image = $row['image'];
				$author = $row['author'];
				$date = $row['date'];
				$intro = $row['intro']; ?>
            <div class="col-md-6 col-sm-12 post-grid">
              <div class="post box">
                <figure class="frame main"><a href="blog-post.php?postid=<?php echo $post_id;?>">
                  <div class="text-overlay">
                    <div class="info"><span>Read More</span></div>
                  </div>
                  <img src="<?php echo $image;?>" alt="" /></a></figure>
                <div class="meta"><span class="category"><?php echo $author;?></span><span class="date"><?php echo $date;?></span><span class="comments"><a href="#">8 <i class="icon-chat-1"></i></a></span></div>
                <h2 class="post-title"><a href="blog-post.php?postid=<?php echo $post_id;?>"><?php echo $title;?></a></h2>
                <p><?php echo $intro;?></p>
              </div>
              <!-- /.post -->
            </div>
			 <?php }} ?>
			 
			 		     <?php if ($category == 'general'){
						 for ($post_id = 1; $post_id <= $post_count; $post_id++){
		     $sql = mysqli_query($con,"SELECT title, content, image, author, date, intro FROM blog WHERE id='$post_id' and category = '$category' ");
             $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
				$title = $row['title'];
				$content = $row['content'];
				$image = $row['image'];
				$author = $row['author'];
				$date = $row['date'];
				$intro = $row['intro'];
                if(!empty($title)){				?>
            <div class="col-md-6 col-sm-12 post-grid">
              <div class="post box">
                <figure class="frame main"><a href="blog-post.php?postid=<?php echo $post_id;?>">
                  <div class="text-overlay">
                    <div class="info"><span>Read More</span></div>
                  </div>
                  <img src="<?php echo $image;?>" alt="" /></a></figure>
                <div class="meta"><span class="category"><?php echo $author;?></span><span class="date"><?php echo $date;?></span><span class="comments"><a href="#">8 <i class="icon-chat-1"></i></a></span></div>
                <h2 class="post-title"><a href="blog-post.php?postid=<?php echo $post_id;?>"><?php echo $title;?></a></h2>
                <p><?php echo $intro;?></p>
              </div>
              <!-- /.post -->
            </div>
						 <?php }}} ?>
			 
			 		     <?php if ($category == 'science'){
						 for ($post_id = 1; $post_id <= $post_count; $post_id++){
		     $sql = mysqli_query($con,"SELECT title, content, image, author, date, intro FROM blog WHERE id='$post_id' and category = '$category' ");
             $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
				$title = $row['title'];
				$content = $row['content'];
				$image = $row['image'];
				$author = $row['author'];
				$date = $row['date'];
				$intro = $row['intro'];
if(!empty($title)){						?>
            <div class="col-md-6 col-sm-12 post-grid">
              <div class="post box">
                <figure class="frame main"><a href="blog-post.php?postid=<?php echo $post_id;?>">
                  <div class="text-overlay">
                    <div class="info"><span>Read More</span></div>
                  </div>
                  <img src="<?php echo $image;?>" alt="" /></a></figure>
                <div class="meta"><span class="category"><?php echo $author;?></span><span class="date"><?php echo $date;?></span><span class="comments"><a href="#">8 <i class="icon-chat-1"></i></a></span></div>
                <h2 class="post-title"><a href="blog-post.php?postid=<?php echo $post_id;?>"><?php echo $title;?></a></h2>
                <p><?php echo $intro;?></p>
              </div>
              <!-- /.post -->
            </div>
						 <?php }}} ?>
			 
			 		     <?php if ($category == 'comedy'){
						 for ($post_id = 1; $post_id <= $post_count; $post_id++){
		     $sql = mysqli_query($con,"SELECT title, content, image, author, date, intro FROM blog WHERE id='$post_id' and category = '$category' ");
             $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
				$title = $row['title'];
				$content = $row['content'];
				$image = $row['image'];
				$author = $row['author'];
				$date = $row['date'];
				$intro = $row['intro'];
if(!empty($title)){						?>
            <div class="col-md-6 col-sm-12 post-grid">
              <div class="post box">
                <figure class="frame main"><a href="blog-post.php?postid=<?php echo $post_id;?>">
                  <div class="text-overlay">
                    <div class="info"><span>Read More</span></div>
                  </div>
                  <img src="<?php echo $image;?>" alt="" /></a></figure>
                <div class="meta"><span class="category"><?php echo $author;?></span><span class="date"><?php echo $date;?></span><span class="comments"><a href="#">8 <i class="icon-chat-1"></i></a></span></div>
                <h2 class="post-title"><a href="blog-post.php?postid=<?php echo $post_id;?>"><?php echo $title;?></a></h2>
                <p><?php echo $intro;?></p>
              </div>
              <!-- /.post -->
            </div>
						 <?php }}} ?>
			 
			 		     <?php if ($category == 'abstract'){
						 for ($post_id = 1; $post_id <= $post_count; $post_id++){
		     $sql = mysqli_query($con,"SELECT title, content, image, author, date, intro FROM blog WHERE id='$post_id' and category = '$category' ");
             $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
				$title = $row['title'];
				$content = $row['content'];
				$image = $row['image'];
				$author = $row['author'];
				$date = $row['date'];
				$intro = $row['intro'];
if(!empty($title)){						?>
            <div class="col-md-6 col-sm-12 post-grid">
              <div class="post box">
                <figure class="frame main"><a href="blog-post.php?postid=<?php echo $post_id;?>">
                  <div class="text-overlay">
                    <div class="info"><span>Read More</span></div>
                  </div>
                  <img src="<?php echo $image;?>" alt="" /></a></figure>
                <div class="meta"><span class="category"><?php echo $author;?></span><span class="date"><?php echo $date;?></span><span class="comments"><a href="#">8 <i class="icon-chat-1"></i></a></span></div>
                <h2 class="post-title"><a href="blog-post.php?postid=<?php echo $post_id;?>"><?php echo $title;?></a></h2>
                <p><?php echo $intro;?></p>
              </div>
              <!-- /.post -->
            </div>
						 <?php }}} ?>
			
          </div>
          <!-- /.isotope -->
		</div>
        <!-- /.blog-posts -->
        
      </div>
      <!-- /.content -->
      
      <aside class="col-md-4 col-sm-12 sidebar">


        <!-- /.widget -->
        
        <div class="sidebox box widget">
          <h3 class="widget-title section-title">Popular Posts</h3>
          <ul class="post-list">
            <li>
              <figure class="frame pull-left">
                <div class="icon-overlay"><a href="blog-post.html"><img src="style/images/art/a1.jpg" alt="" /> </a></div>
              </figure>
              <div class="meta"> <em><span class="date">3 Oct 2012</span><span class="comments"><a href="#">8 <i class="icon-chat-1"></i></a></span></em>
                <h5><a href="blog-post.html">Magna Mollis Ultricies</a></h5>
              </div>
            </li>
            <li>
              <figure class="frame pull-left">
                <div class="icon-overlay"><a href="blog-post.html"><img src="style/images/art/a2.jpg" alt="" /> </a></div>
              </figure>
              <div class="meta"> <em><span class="date">28 Sep 2012</span><span class="comments"><a href="#">5 <i class="icon-chat-1"></i></a></span></em>
                <h5><a href="blog-post.html">Ornare Nullam Risus</a></h5>
              </div>
            </li>
            <li>
              <figure class="frame pull-left">
                <div class="icon-overlay"><a href="blog-post.html"><img src="style/images/art/a3.jpg" alt="" /> </a></div>
              </figure>
              <div class="meta"> <em><span class="date">15 Aug 2012</span><span class="comments"><a href="#">9 <i class="icon-chat-1"></i></a></span></em>
                <h5><a href="blog-post.html">Euismod Nullam</a></h5>
              </div>
            </li>
          </ul>
          <!-- /.post-list --> 
        </div>
        <!-- /.widget -->

        <!-- /.widget -->
        
        <div class="sidebox box widget">
          <h3 class="widget-title section-title">Categories</h3>
          <ul class="circled">
            <li><a href="blog.php?category=general">General</a></li>
            <li><a href="blog.php?category=science">Science & Technology</a></li>
            <li><a href="blog.php?category=comedy">Comedy </a></li>
            <li><a href="blog.php?category=abstract">Abstract</a></li>
          </ul>
        </div>
        <!-- /.widget -->
        
        <div class="sidebox box widget">
          <h3 class="widget-title section-title">Tags</h3>
          <ul class="tag-list">
            <li><a href="#" class="btn">Web</a></li>
            <li><a href="#" class="btn">Photography</a></li>
            <li><a href="#" class="btn">Illustation</a></li>
            <li><a href="#" class="btn">Fun</a></li>
            <li><a href="#" class="btn">Blog</a></li>
            <li><a href="#" class="btn">Design</a></li>
            <li><a href="#" class="btn">Inspiration</a></li>
            <li><a href="#" class="btn">Tips</a></li>
            <li><a href="#" class="btn">Manipulation</a></li>
            <li><a href="#" class="btn">Graphic</a></li>
            <li><a href="#" class="btn">Travel</a></li>
            <li><a href="#" class="btn">Concept</a></li>
          </ul>
          <!-- /.tag-list -->    
        </div>
        <!-- /.widget --> 
        
      </aside>
      <!-- /column .sidebar --> 
      
    </div>
    <!-- /.blog --> 
    
  </div>
  <!-- /.container --> 
</div>
<!-- /.body-wrapper --> 
<script src="style/js/jquery.min.js"></script> 
<script src="style/js/bootstrap.min.js"></script> 
<script src="style/js/jquery.themepunch.tools.min.js"></script> 
<script src="style/js/classie.js"></script> 
<script src="style/js/plugins.js"></script> 
<script src="style/js/scripts.js"></script>  
<script>
	$.backstretch(["style/images/art/bg1.jpg"]);
</script>
</body>
</html>
