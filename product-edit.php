<!--_meta 作为公共模版分离出去-->
<?php include './public/meta.php'; ?>
<!--/meta 作为公共模版分离出去-->

<link href="lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<?php
    error_reporting(E_ALL ^ E_DEPRECATED);
    $con=mysql_connect('localhost','root','236598');  
    mysql_query("set names utf8");
    $com=mysql_select_db('store');  
    if (isset($_REQUEST["submit"])) {
      $test = 1;
      $beverageId = $_REQUEST["beverageId"];
      $beverageName = $_REQUEST["beverageName"];
      $beverageMark = $_REQUEST["beverageMark"];
      $beveragePrice = $_REQUEST["beveragePrice"];
      $country = $_REQUEST["country"];
      //图书编号验证
      // if($bookId == "") {
      //   $bookId1 = "必须输入";
      //   $test = 0;
      // }else{
      //   $lol="select * from book where 书籍ID=$bookId";
      //   $zt=mysql_query($lol);
      //   if(mysql_num_rows($zt)>0) {
      //   $test = 0;
      //   $bookId1="编号重复";
      //   }
      // }
      
      // //图书名字的验证
      // if ($bookName == "") {
      //   $bookName1 = "必须输入书名！";
      //   $test = 0;
      // }
      // //出版社的验证
      // if ($publish == "") {
      //   $publish1 = "必须输入出版社！";
      //   $test = 0;
      // }
      // //作者的验证
      // if ($author == "") {
      //   $author1 = "必须输入作者！";
      //   $test = 0;
      // }
      // //在馆数量验证
      // if ($number == "") {
      //   $number1 = "必须输入数量";
      //   $test = 0;
      // }elseif (preg_match('/^([1-9][0-9]*)$/', $number)==0) {
      //   $number1="必须为整数";$test=0;
      // } 
    //   if($test==1) {
    //   $sql="insert into book values($bookId,'$bookName','$publish','$author',$number)";
    //   $zt=mysql_query($sql);  
    // if ($zt) {
    //   echo "<script>alert('插入成功')</script>";
    // }else{
    //   echo "插入不成功！";
    // }
    //   }
 $sql="update beverage set beverageName='$beverageName',beverageMark='$beverageMark',beveragePrice='$beveragePrice',country='$country',photo='' WHERE beverageId='$beverageId'";
       $zt=mysql_query($sql);  
       if ($zt) {
        header("Location:product-brand.php");
     }else{
     	echo "SQL出错";
       echo "插入不成功！";
     }
    }
  ?>

	<?php
    error_reporting(E_ALL ^ E_DEPRECATED);
    $con=mysql_connect('localhost','root','236598');  
    mysql_query("set names utf8");
    $com=mysql_select_db('store');  
    $no = $_REQUEST["no"];
    $sql="select * from beverage where `beverageId`=$no";
    $result=mysql_query($sql); 
  ?>
<div class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-article-add">
		 <?php
      $row = mysql_fetch_row($result);
      while ($row) 
      {
    ?>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>饮料ID：</label>
			<div class="formControls col-xs-8 col-sm-9">
		<input type="text" class="input-text" placeholder="输入ID" name="beverageId" value="<?php echo $row[0];?>">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">饮料名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo $row[1];?>" placeholder="输入饮料名称" name="beverageName">
			</div>
		</div>	
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">供应公司：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="beverageMark" placeholder="输入供应公司" value="<?php echo $row[2];?>" class="input-text">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">价格：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="beveragePrice" placeholder="输入价格" value="<?php echo $row[3];?>" class="input-text">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">所属国家：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="country" placeholder="输入所属国家" value="<?php echo $row[4];?>" class="input-text">
			</div>
		</div>
		
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">图片上传：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="uploader-list-container">
					<div class="queueList">
						<div id="dndArea" class="placeholder">
							<div id="filePicker-2"></div>
							<p>或将照片拖到这里，单次最多可选300张</p>
						</div>
					</div>
					<div class="statusBar" style="display:none;">
						<div class="progress"> <span class="text">0%</span> <span class="percentage"></span> </div>
						<div class="info"></div>
						<div class="btns">
							<div id="filePicker2"></div>
							<div class="uploadBtn">开始上传</div>
						</div>
					</div>
				</div>
			</div>
		</div>	
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button class="btn btn-primary radius" type="submit" name="submit">
                    <i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</button>
				<button class="btn btn-secondary radius" type="button">
                    <i class="Hui-iconfont">&#xe632;</i> 保存草稿</button>
				<button class="btn btn-default radius" type="button">
                &nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
	<?php
      $row = mysql_fetch_row($result);
    }
    ?>
</div>

<!--_footer 作为公共模版分离出去-->
<?php include './public/footer.php'; ?>
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<?php include './public/upload.php'; ?>
</body>
</html>