<?php 

include('check.php');

			 $sql = mysqli_query($con,"SELECT id FROM blog");
			 $post_count=mysqli_num_rows($sql);

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
      <script src="style/js/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
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
        <li class="current"><a href="home.php" class="hint--right" data-hint="Home"><i class="budicon-home-1"></i><span>Home</span></a></li>
        <li><a href="dashboard.php" class="hint--right" data-hint="Dashboard"><i class="budicon-image"></i><span>Dashboard</span></a></li>
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

  
  <section id="home" class="naked">
    <div class="fullscreenbanner-container revolution">
      <div class="fullscreenbanner">
        <ul>
          <li data-transition="fade"> <img src="style/images/dummy.png"  alt="slidebg1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="repeat">
            <h1 class="tp-caption caption large sfb" style="text-align: center;" data-x="center" data-y="center" data-voffset="-25" data-speed="900" data-start="1000" data-endspeed="100" data-easing="Sine.easeOut">Welcome <?php echo $_SESSION['name'];?>!<br><br> This is ANSAT</h1>

            <div class="arrow smooth"><a href="#portfolio"><i class="icon-down-open-big"></i></a></div>
          </li>
        </ul>
        <div class="tp-bannertimer"></div>
      </div>

    </div>

  </section>

  
  <div class="container">
    <section id="portfolio" class="portfolio">
      <div class="box">
        <h2 class="section-title pull-left">Categories at Glance</h2>
        <div id="filters-container" class="cbp-l-filters-alignRight pull-right">
          <div data-filter="*" class="cbp-filter-item-custom-active cbp-filter-item-custom btn">All</div>
          <div data-filter=".general" class="cbp-filter-item-custom btn">General</div>
          <div data-filter=".science" class="cbp-filter-item-custom btn">Science & Technology</div>
          <div data-filter=".comedy" class="cbp-filter-item-custom btn">Comedy</div>
          <div data-filter=".abstract" class="cbp-filter-item-custom btn">Abstract</div>
        </div>

        <div class="clearfix"></div>
        <div id="grid-container" class="cbp-l-grid-masonry">
          <ul>
		  			<?php
			
			
			
			 for ($post_id = $post_count; $post_id >= 1; $post_id--){
		     $sql = mysqli_query($con,"SELECT title, content, image, author, date, category, intro FROM blog WHERE id='$post_id' ");
             $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
				$title = $row['title'];
				$image = $row['image'];
				$author = $row['author'];
				$date = $row['date']; 
				if(!empty($title)){ ?>
            <li class="cbp-item frame <?php echo $category;?>"> <a class="cbp-caption cbp-singlePage" href="ajax/post1.php?postid=<?php echo $post_id;?>">
              <div class="cbp-caption-defaultWrap"> <img src="<?php echo $image;?>" alt=""> </div>
              <div class="cbp-caption-activeWrap">
                <div class="cbp-l-caption-alignCenter">
                  <div class="cbp-l-caption-body">
                    <div class="cbp-l-caption-title"><?php echo $title;?></div>
                  </div>
                </div>
              </div>
              </a> 
            </li>
			 <?php }}?>
          </ul>

        </div>

        <div class="cbp-l-loadMore-button"> <a href="#" class="cbp-l-loadMore-button-link btn">LOAD MORE</a> </div>
      </div>

    </section>

    
    <section id="about">
      <div class="box">
        <h2 class="section-title">WHY US?</h2>
        <div class="row">

        </div>

        <div class="clearfix"></div>
        <div class="divide40"></div>

        <div class="divide10"></div>
        <div class="services-1">
          <div class="row">
            <div class="col-md-4 col-sm-6">
              <div class="icon"><i class="budicon-monitor"></i>  </div>

              <div class="text">
                <h5>Easy Interface</h5>
                <p>The most easy interface to interact with the community</p>
              </div>

            </div>

            <div class="col-md-4 col-sm-6">
              <div class="icon"><i class="budicon-monitor"></i>  </div>

              <div class="text">
                <h5>Easy Interface</h5>
                <p>The most easy interface to interact with the community</p>
              </div>

            </div>

            <div class="col-md-4 col-sm-6">
              <div class="icon"><i class="budicon-monitor"></i>  </div>

              <div class="text">
                <h5>Easy Interface</h5>
                <p>The most easy interface to interact with the community</p>
              </div>

            </div>

			<div class="divide30"></div>
            <div class="col-md-4 col-sm-6">
              <div class="icon"><i class="budicon-monitor"></i>  </div>

              <div class="text">
                <h5>Easy Interface</h5>
                <p>The most easy interface to interact with the community</p>
              </div>

            </div>

            <div class="col-md-4 col-sm-6">
              <div class="icon"><i class="budicon-monitor"></i>  </div>

              <div class="text">
                <h5>Easy Interface</h5>
                <p>The most easy interface to interact with the community</p>
              </div>

            </div>

            <div class="col-md-4 col-sm-6">
              <div class="icon"><i class="budicon-monitor"></i>  </div>

              <div class="text">
                <h5>Easy Interface</h5>
                <p>The most easy interface to interact with the community</p>
              </div>

            </div>

        </div>

        
      </div>

    </section>

    
    <section id="contact">
      <div class="box">
        <h2 class="section-title">Get in Touch with ANSAT</h2>
        <p>We, at ANSAT believe that Customer is the <strong>KING</strong> and feedback is the best way to improve our quality.
          Message us your feedback and we will try to improve our services. You can also directly call us or drop a letter on the address below.</p>
        <div class="divide20"></div>
        <div class="row text-center services-2">
          <div class="col-md-3 col-sm-6"> <i class="budicon-map"></i>
            <p>VIT University<br/>
              Vellore,632014</p>
          </div>
          <div class="col-md-3 col-sm-6"> <i class="budicon-telephone"></i>
            <p>+91 9833455500<br/>
              +91 9585604074</p>
          </div>
          <div class="col-md-3 col-sm-6"> <i class="budicon-mobile"></i>
            <p>+91 7010038318<br/>
              +91 9819035999</p>
          </div>
          <div class="col-md-3 col-sm-6"> <i class="budicon-mail"></i>
            <p> <a class="nocolor" href="mailto:#">atharva@tagclub.in</a> <br />
              <a class="nocolor" href="mailto:#">saurabh@tagclub.in</a>
              <a class="nocolor" href="mailto:#">anubhav@tagclub.in</a> <br /></p>
          </div>
        </div>
        <!-- /.services-2 -->
        <div class="divide30"></div>
        <div class="form-container">
          <div class="response alert alert-success"></div>
          <form class="forms" action="contact/form-handler.php" method="post">
            <fieldset>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-row text-input-row name-field">
                    <label>Name</label>
                    <input type="text" name="name" class="text-input defaultText required"/>
                  </div>
                  <div class="form-row text-input-row email-field">
                    <label>Email</label>
                    <input type="text" name="email" class="text-input defaultText required email"/>
                  </div>
                  <div class="form-row text-input-row subject-field">
                    <label>Subject</label>
                    <input type="text" name="subject" class="text-input defaultText"/>
                  </div>
                </div>
                <div class="col-sm-6 lp5">
                  <div class="form-row text-area-row">
                    <label>Message</label>
                    <textarea name="message" class="text-area required"></textarea>
                  </div>
                  <div class="form-row hidden-row">
                    <input type="hidden" name="hidden" value="" />
                  </div>
                  <div class="nocomment">
                    <label for="nocomment">Leave This Field Empty</label>
                    <input id="nocomment" value="" name="nocomment" />
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="button-row pull-right">
                    <input type="submit" value="Send Message" name="submit" class="btn btn-submit bm0" />
                  </div>
                </div>
                <div class="col-sm-6 lp5">
                  <div class="button-row pull-left">
                    <input type="reset" value="Clear Message" name="reset" class="btn btn-submit bm0" />
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
<script src="style/js/plugins.js"></script> 
<script src="style/js/scripts.js"></script>  
<script>
	$.backstretch(["style/images/art/bg1.jpg"]);
</script>
</body>
</html>
