<!DOCTYPE html>
<html lang="en">
<head>
<title>Fashon - Fullscreen Onepage Portfolio Template</title>
<meta charset="utf-8" />
<!-- =========================== CSS FILES ======================== -->
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/jScrollPane.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/jquery.fancybox-1.3.4.css" type="text/css" media="all" />
<!-- =========================== JS FILES ======================== -->
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.js"></script>
<script type="text/javascript" src="js/jquery.masonry.js"></script>
<script type="text/javascript" src="js/jquery.transform.js"></script>
<script type="text/javascript" src="js/jquery.animate-colors-min.js"></script>
<script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="js/forms.js"></script>
<script type="text/javascript" src="js/switcher.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>
<script type="text/javascript" src="js/sprites.js"></script>
<script type="text/javascript" src="js/googleMap.js"></script>
<script type="text/javascript" src="js/jquery.bxSlider.min.js"></script>
<script type="text/javascript" src="js/jScrollPane.js"></script>
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>
<script>
$(function(){
	
	$('.features_slider').bxSlider({
		auto: false,
		displaySlideQty: 5,
		moveSlideQty: 2,
    	speed : 1000
	});
	$('.intro_slider').bxSlider({
		auto: false,
		controls : false,
		mode: 'fade',
		pager: true
	});	
    $('#pane1,#pane2,#pane3,#pane4').jScrollPane();
});
</script>
<script type="text/javascript" src="js/init.js"></script>
<!--[if lt IE 9]> <script type="text/javascript" src="js/html5.js">
</script> <![endif]-->
<!--[if lt IE 8]> <div style='clear:both;text-align:center;position:relative;'> <a href="../../windows.microsoft.com/en-US/internet-explorer/products/ie/home@ocid=ie6_countdown_bannercode"><img src="../../storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/></a> </div> 
<![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
<div class="page_spinner"></div>
<div class="extra">
  <div class="main">
    
    <!-- =========================== HEADER ======================== -->
    <header>
      <h1><a href="#!/" id="logo">瓜子饮料</a></h1>
      <nav class="menu">
        <ul id="menu">          
          <li><a href="index-ch.php">国产饮料</a></li>                     
          <li><a href="index-for.php">国外饮料</a></li> 
          <li><a href="index.php">前台</a></li>       
          <li><a href="product-brand.php">后台</a></li>
        </ul>
      </nav>
    </header>
     <!-- =========================== END HEADER ======================== -->     
  </div>
  
   <!-- =========================== MAIN FULLSCREEN GALLERY ======================== -->
  <div id="container">
         <?php
          error_reporting(E_ALL ^ E_DEPRECATED);
          $con=mysql_connect('localhost','root','236598');
          mysql_select_db('store');
          mysql_query("set names utf8"); //设置字符集为utf8
          $sql="select * from beverage WHERE country='美国'";
          $result=mysql_query($sql);
          $count=mysql_num_rows($result);
          $row=mysql_fetch_assoc($result); 
          $first = "images/gallery/pic_";        
          $last = "_hover.jpg";             
            for($i=1;$i<=$count;$i++)
                {  
                  if (!$row) break;
                    $middle = rand(1,29);
               ?> 
    <div class="item">
      <a href="images/gallery/big.jpg">
        <span>     
        <?php echo "<img src='".$first.$middle.$last."' width='240' height='240'/>"; ?>           
        </span>
          <?php echo "<img src='".$row['photo']."' width='240' height='240'/>"; ?>   
      </a>
    </div>
      <?php
        $row=mysql_fetch_assoc($result); 
              }
      ?>
  </div>
  <div id="description">
    <ul>
       <?php       
        $sql="select * from beverage WHERE country='美国'";
        $result=mysql_query($sql);
        $count=mysql_num_rows($result);
        $row=mysql_fetch_assoc($result); 
            for($i=1;$i<=$count;$i++)
                {  
                  if (!$row) break;    
               ?> 
      <li>
        <h4><?php echo $row["beverageName"]; ?></h4>
        <p>测试</p>
      </li>
       <?php
        $row=mysql_fetch_assoc($result); 
            }
      ?>      
    </ul>
  </div>
  <!-- =========================== END MAIN FULLSCREEN GALLERY ======================== -->
  
</div>

<!-- =========================== FOOTER ======================== -->
<footer> 2013 &copy; Fashon - Privacy Policy</footer>
<!-- =========================== END FOOTER ======================== -->
<script>
$(window).load(function(){$('.page_spinner').fadeOut(600);$('body').css({overflow:'visible'})}) </script>
</body>
</html>
