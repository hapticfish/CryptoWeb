<?php
//(c) 2016 Building Bitcoin Websites, Kyle Honeycutt
//This is a direct exerpt from Chapter 7 of the book pages 71-72

$url = "https://www.bitstamp.net/api/ticker/";
$fgc = file_get_contents($url);
$json = json_decode($fgc, TRUE);
$lastPrice = $json["last"];
$highPrice = $json["high"];
$lowPrice = $json["low"];

//calc 24 hr change
$openPrice = $json["open"];
if($openPrice < $lastPrice)
{
	$operator = "+";
	$change = $lastPrice - $openPrice;
	$percent = $change / $openPrice;
	$percent = $percent * 100;
	$percentChange = $operator.number_format($percent, 1);
	$color = "green";
}
if($openPrice > $lastPrice)
{
	$operator = "-";
	$change = $openPrice - $lastPrice;
	$percent = $change / $openPrice;
	$percent = $percent * 100;
	$percentChange = $operator.number_format($percent, 1);
	$color = "red";
}
$date = date("m/d/Y - h:i:sa");

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bitcoin Stryker.com</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
      
    <!--google fonts Oswald TITLES, and Montserrat BODY-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Oswald:500|Nunito+Sans" rel="stylesheet">
      
      
    <!-- fontawsome.com -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    
    <!--used 3.3.1 jquery isntead of video ver. 1.12.0.min.js-->
    <script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			  crossorigin="anonymous"></script>
      
      

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      
      <nav class="navbar navbar-fixed-top navbar-inverse">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Bitcoin Stryker</a>
        
      
        
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar">
        <li><a href="news.php">News</a></li>
        <li><a href="technology.php">Technology</a></li>
         <li><a href="events.php">Events</a></li>
        
      </ul>

        
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Resources <span class="caret"></span></a>
            
          <ul class="dropdown-menu">
            
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="privacy.php">Privacy</a></li>
            <li><a href="about.php">About Us</a></li>
          </ul>
        </li>
      </ul>
        
        <div class="container pull-left" id="TickContainer">
            
            <table width="100%">
<tr>
	<td rowspan="3" width="60%" id="lastPrice">
	$<?php echo number_format($lastPrice, 2); ?>
	</td>
	<td align="right" id="percentChange" style="color: <?php echo $color; ?>;">
	<?php echo number_format($percentChange, 2); ?>%
	</td>
</tr>
	<td align="right" id="highPrice">
	H: <?php echo number_format($highPrice, 2); ?>
	</td>
<tr>
	<td align="right" id="lowPrice">
	L: <?php echo number_format($lowPrice, 2); ?>
	</td>
</tr>
<!--commenting out the date and time, does not fit within the
    nave bar
<tr>
	<td align="right" colspan="2" id="dateTime">
	/*<?php echo $date; ?>*/
	</td>
</tr>
-->
</table>
            
      </div>
      <script>
        $('document').ready(function (){
            refreshData();
        })
      
        function refreshData(){
            $('#TickContainer').load("data.php"), function(){
                setTimeout(refreshData, 15000);
            });
        };
      </script>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



<div class="body_content">

<!--sectional devider-->


<header>
    <div class="body_content">
<div class="container">
    <div class="row">
        <div class="col-md-10">
                <div class="jumbotron text-center">
              <h1>Hello, world!</h1>
              <p>...</p>
              <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
            </div>
            <hr>
        </div> 

        <div class="col-xs-2">
            ADDs area
        </div>
        
        <div class="col-md-6">
            <div class="jumbotron">
              <h1>Hello, world!</h1>
              <p>...</p>
              <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="jumbotron">
              <h1>Hello, world!</h1>
              <p>...</p>
              <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
            </div>
        </div>
        
        <div class="col-md-2">
            ADDs area
        </div>
    </div>
</div>

    
  <div class="container blog_container">
    <div class="row">
        <div class="col-md-10">
            <div class="blogbubble">
                <div class="blogheader">
                <h1>Curious about Bitcoin and Cryptocurrencies?</h1>
                
                        <div class="post-preview_meta">
                            <time itemprop="datePulbished dateCreated dateModified" datetime="2018/08/26"> Posted August 26, 2018</time>

                            | Author

                            <span itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person"><a href="your author profile link hereIE /educatioon-and-resources/professional/author/116/lorne-opler" rel="author" itemprop="url">
                                <span itemprop="name">John Quinlan</span>
                                </a></span>
                        </div>

                        <div class="post-preview_meta_update">
                            <time itemprop="datePulbished dateCreated dateModified" datetime="2018/08/26"> Updated August 26, 2018</time>

                        </div>
                    
                </div>
               
                
            </div>
               
            </div>

        </div>
    </div>

</header>

    
<section>
 <div class="container blog_container">
    <div class="row">
        <div class="col-md-10">
            <div class="blogbubble">
                <div class="blogheader">
                <h1>How Does Bitcoin Affect Me?</h1>
                
                        <div class="post-preview_meta">
                            <time itemprop="datePulbished dateCreated dateModified" datetime="2018/08/26"> Posted October 29th, 2018</time>

                            | Author

                            <span itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person"><a href="your author profile link hereIE /educatioon-and-resources/professional/author/116/lorne-opler" rel="author" itemprop="url">
                                <span itemprop="name">John Quinlan</span>
                                </a></span>
                        </div>

                        <div class="post-preview_meta_update">
                            <time itemprop="datePulbished dateCreated dateModified" datetime="2018/08/26"> Updated October 29th, 2018</time>

                        </div>
                </div>
                
                <div class="blog_text">
                
                    
                <p>There has been</p>
                
                </div>
                
                
            </div>
            
            </div>
        </div>
    </div>
</section>


    
<!--CONTINUE TO MAKE BLOGGING AREA, NEEDS WORKIGN ARE ALONG SIDE ADDS AND SUCH-->
<div class="container blog_container">
    <div class="row">
        <div class="col-md-10">
            <div class="blogbubble">
                <div class="blogheader">
                <h1>Curious about Bitcoin and Cryptocurrencies?</h1>
                
                        <div class="post-preview_meta">
                            <time itemprop="datePulbished dateCreated dateModified" datetime="2018/08/26"> Posted August 26, 2018</time>

                            | Author

                            <span itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person"><a href="your author profile link hereIE /educatioon-and-resources/professional/author/116/lorne-opler" rel="author" itemprop="url">
                                <span itemprop="name">John Quinlan</span>
                                </a></span>
                        </div>

                        <div class="post-preview_meta_update">
                            <time itemprop="datePulbished dateCreated dateModified" datetime="2018/08/26"> Updated August 26, 2018</time>

                        </div>
                    
                </div>
               
                
            </div>
               
            </div>

        </div>
    </div>
    

</div>
      
    

</div>


</div><!--body_content end tag-->    

<div class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-text pull-left">
            <p>&copy; 2018 BitcoinStryker.Com</p>
        </div>
        
        <div class="navbar-text pull-right">
            <a href="#"><i class="fab fa-facebook-square fa-2x"></i></a>
            <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
            <a href="#"><i class="fab fa-google-plus fa-2x"></i></a>
        </div>
        
         <div class="navbar-text pull-right">
            <li><a href="#contact" data-toggle="modal">Message Us</a></li>
        </div>
        
        <div class="navbar-text pull-right">
            <li><a href="#contact" data-toggle="modal">About Us</a></li>
        </div>
    </div>
</div>
      
      
<div class="modal fade" id="contact" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form class="form-horizontal">
                        <div class="modal-header">
                            <h4>Message Us</h4>
                        </div>
                        <div class="modal-body">
                        
                            <div class="form-group">
                            <label for="contact-name" class="col-lg-2 control-lable">Name:</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="contact-name" placeholder="Full Name">    
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <label for="contact-email" class="col-lg-2 control-lable">Email</label>
                            <div class="col-lg-10">
                                <input type="email" class="form-control" id="contact-email" placeholder="you@example.com">    
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <label for="contact-msg" class="col-lg-2 control-lable">Message:</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" rows="8"></textarea>    
                            </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-submit" type="submit">Submit</button>
                            <a class="btn btn-default" data-dismiss="modal">Close</a>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--end of modal-->

      
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>