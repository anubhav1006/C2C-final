<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="style/images/favicon.png">
    <title>ANSAT|LOGIN</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".hideme").hide();

            $(".btn").click(function(){
                $(".hideme").toggle(900);
            });
        });
    </script>
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
        <li class="current"><a href="profile.php" class="hint--right" data-hint="Profile"><i class="budicon-author"></i><span>Profile</span></a></li>
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
<div class="body-wrapper">
    <div class="page">
        <div class="container">
            <section>
                <div class="box">
				<?php include('config.php');
		              include('check.php');
					  $username = $_SESSION['username'];
				$sql = mysqli_query($con,"SELECT name, avatar, email, balance FROM user WHERE username='$username' ");
                $row=mysqli_fetch_array($sql,MYSQLI_ASSOC);
				$name = $row['name'];
				$avatar = $row['avatar'];
				$email = $row['email'];
				$balance = $row['balance'];
					  
					  ?>
                    <center><h1>Profile</h1></center>
                    <div class="row">
                        <div class="col-sm-2"></div>
						<div class="col-sm-8" >
						<center>
                            <img class="sp-image" src="<?php echo $avatar;?>" alt="" />

                            <label><?php echo $name;?></label><br>
                            <label>Email :</label>
                            <p><?php echo $email;?></p>
                            <label>Total Credits</label>
                            <p><?php echo $balance;?></p>
				            <div class="form-container">
                                <div class="response alert alert-success"></div>
                                <form class="forms" method="post" action="profile.php">
                                <fieldset>
                                <div class="row">
                                <div class="col-sm-12">
                                <div class="form-row text-input-row name-field">
                                <label>Add Credits</label>
                                <input type="text" name="add_credit" id="add_credit" class="text-input defaultText required"/>
                                </div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>

<div id="paypal-button-container"></div>

<script>

    // Render the PayPal button
	
	var credit = document.getElementById('add_credit').value;
		

    paypal.Button.render({

        // Set your environment

        env: 'sandbox', // sandbox | production

        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create

        client: {
            sandbox:    'AXScNWzXUuWb7CrcDHrDwxcJHQ9dgJBPzKE3fCCoUK-ZEmi896OMzA7T2e2cL7CT0mE7mh6qB-UsDdCC',
            production: 'EM8pSSaygZogL4hpuSr9Un-r-16wTNV1TXc3p19tKi8skhRCj7OmfiMmCf482I3DR-zrBrpz920N2M_H'
        },

        // Wait for the PayPal button to be clicked

        payment: function() {

            // Make a client-side call to the REST api to create the payment

            return paypal.rest.payment.create(this.props.env, this.props.client, {
                transactions: [
                    {
                        amount: { total: credit, currency: 'USD' }
                    }
                ]
            });
        },

        // Wait for the payment to be authorized by the customer

        onAuthorize: function(data, actions) {

            // Execute the payment

            return actions.payment.execute().then(function() {
			   var link1 = "add_credit.php?credit=";
			   var link2 = credit;
			   var link = link1.concat(link2);
               window.open(link);
            });
        }

    }, '#paypal-button-container');
</script>
								</div>
								</div>
								</fieldset>
								</form>
</center>
                        </div>
						<div class="col-sm-2"></div>

                    </div>
                </div>
                <!-- /.box -->
            </section>
			    <footer class="footer box">
      <p class="pull-left">© 2017 ANSAT. All rights reserved.</p>
      <ul class="social pull-right">

        <li><a href="#"><i class="icon-s-facebook"></i></a></li>

        <li><a href="#"><i class="icon-s-instagram"></i></a></li>

      </ul>
      <div class="clearfix"></div>
    </footer>
            <!-- /section -->
        </div>
		
        <!-- /.container -->
    </div>
	
    <!-- /.page -->
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