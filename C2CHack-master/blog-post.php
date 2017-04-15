<?php 

include('config.php');
include('check_purchase.php');

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
    <div class="single blog row">
      <div class="col-md-8 col-sm-12 content">
        <div class="blog-posts">
          <div class="post box">
		  <?php $post_id = $_GET['postid'];
		        $sql = mysqli_query($con,"SELECT title, content, image, author, date, intro FROM blog WHERE id='$post_id' ");
                $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
				$title = $row['title'];
				$content = $row['content'];
				$image = $row['image'];
				$author = $row['author'];
				$date = $row['date'];
				$intro = $row['intro'];
				?>
            <div class="meta"><span class="category"><?php echo $author;?></span><span class="date"><?php echo $date;?></span><span class="comments"><a href="#">8 <i class="icon-chat-1"></i></a></span></div>
            <h2 class="post-title"><a href="blog-post.html"><?php echo $title;?></a></h2>
            <p><?php echo $intro;?></p>
            <figure class="frame"><img src="<?php echo $image;?>" alt="" /></figure>
            <p><?php echo $content;?></p>
            <div class="divide20"></div>
            
            <!-- /.tags -->
            <div class="share"> <a href="#" class="btn share-facebook">Like</a><a href="#" class="btn share-googleplus">+1</a></div>
            <!-- /.share --> 
          </div>
          <!-- /.post --> 
        </div>
        <!-- /.blog-posts -->
        
        <div class="divide20"></div>
        
        <div class="about-author box">
          <div class="author-image frame"> <img alt="" src="style/images/art/author.jpg" /> </div>
          <div class="author-details">
            <h3>About the author</h3>
            <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris nibh, ut fermentum massa justo sit amet risus. Maecenas faucibus mollis.</p>
            <ul class="social">
              <li><a href="#"><i class="icon-s-twitter"></i></a></li>
              <li><a href="#"><i class="icon-s-facebook"></i></a></li>
              <li><a href="#"><i class="icon-s-pinterest"></i></a></li>
              <li><a href="#"><i class="icon-s-linkedin"></i></a></li>
            </ul>
          </div>
          <div class="clearfix"></div>
        </div>
        <!-- /.about-author -->
        
        <div class="divide20"></div>
        
        <div id="comments" class="box">
          <h3>4 Comments</h3>
          <ol id="singlecomments" class="commentlist">
            <li>
              <div class="user frame"><img alt="" src="style/images/art/u1.jpg" class="avatar" /></div>
              <div class="message">
                <div class="info">
                  <h2><a href="#">Connor Gibson</a></h2>
                  <div class="meta">
                    <div class="date">January 14, 2010</div>
                    <a class="reply-link" href="#">Reply</a> </div>
                </div>
                <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Sed posuere consectetur est at lobortis. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Vestibulum id ligula porta felis euismod semper.</p>
              </div>
            </li>
            <li>
              <div class="user frame"><img alt="" src="style/images/art/u2.jpg" class="avatar" /></div>
              <div class="message">
                <div class="info">
                  <h2><a href="#">Nikolas Brooten</a></h2>
                  <div class="meta">
                    <div class="date">February 21, 2010</div>
                    <a class="reply-link" href="#">Reply</a> </div>
                </div>
                <p>Quisque tristique tincidunt metus non aliquam. Quisque ac risus sit amet quam sollicitudin vestibulum vitae malesuada libero. Mauris magna elit, suscipit non ornare et, blandit a tellus. Pellentesque dignissim ornare elit, quis mattis eros sodales ac.</p>
              </div>
              <ul class="children">
                <li class="bypostauthor">
                  <div class="user frame"><img alt="" src="style/images/art/u3.jpg" class="avatar" /></div>
                  <div class="message">
                    <div class="bypostauthor">
                      <div class="info">
                        <h2><a href="#">Pearce Frye</a></h2>
                        <div class="meta">
                          <div class="date">February 22, 2010</div>
                          <a class="reply-link" href="#">Reply</a> </div>
                      </div>
                      <p>Cras mattis consectetur purus sit amet fermentum. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Etiam porta sem malesuada magna mollis euismod. Maecenas sed diam eget risus varius blandit non magna.</p>
                    </div>
                  </div>
                  <ul class="children">
                    <li>
                      <div class="user frame"><img alt="" src="style/images/art/u2.jpg" class="avatar" /></div>
                      <div class="message">
                        <div class="info">
                          <h2><a href="#">Nikolas Brooten</a></h2>
                          <div class="meta">
                            <div class="date">April 4, 2010</div>
                            <a class="reply-link" href="#">Reply</a> </div>
                        </div>
                        <p>Nullam id dolor id nibh ultricies vehicula ut id. Cras mattis consectetur purus sit amet fermentum. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </li>
            <li>
              <div class="user frame"><img alt="" src="style/images/art/u4.jpg" class="avatar" /></div>
              <div class="message">
                <div class="info">
                  <h2><a href="#">Lou Bloxham</a></h2>
                  <div class="meta">
                    <div class="date">May 03, 2010</div>
                    <a class="reply-link" href="#">Reply</a> </div>
                </div>
                <p>Sed posuere consectetur est at lobortis. Vestibulum id ligula porta felis euismod semper. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
              </div>
            </li>
          </ol>
        </div>
        <!-- /#comments -->
        
        <div class="divide20"></div>
        
        <div class="comment-form-wrapper box">
          <h3>Would you like to share your thoughts?</h3>
          <p>Your email address will not be published. Required fields are marked *</p>
          <form class="comment-form" name="form_name" action="#" method="post">
            <div class="name-field">
              <input type="text" name="first" title="Name*"/>
            </div>
            <div class="email-field">
              <input type="text" name="first" title="Email*" />
            </div>
            <div class="website-field">
              <input type="text" name="first" title="Website" />
            </div>
            <div class="message-field">
              <textarea name="textarea" id="textarea" rows="5" cols="30" title="Enter your comment here..."></textarea>
            </div>
            <input type="submit" value="Submit" name="submit" class="btn btn-submit" />
          </form>
        </div>
        <!-- /.comment-form-wrapper --> 
        
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
            <li><a href="#">Web Design (21)</a></li>
            <li><a href="#">Photography (19)</a></li>
            <li><a href="#">Graphic Design (16)</a></li>
            <li><a href="#">Manipulation (15)</a></li>
            <li><a href="#">Motion Graphics (12)</a></li>
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
