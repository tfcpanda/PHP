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

      $filename = $_FILES['myFile']['name'];
      $filename = iconv("UTF-8", "GB2312", $filename);  
      $tmp_filename = $_FILES['myFile']['tmp_name'];
     if (move_uploaded_file($tmp_filename, "upload/$filename")) {
      echo "文件名称：".$_FILES['myFile']['name']."<br>";
      echo "文件类型：".$_FILES['myFile']['type']."<br>";
      echo "文件大小：".$_FILES['myFile']['size']."<br>";
    }
      $sql="insert into beverage values($beverageId,'$beverageName','$beverageMark',$beveragePrice,'$country','upload/".$filename."')";
       $zt=mysql_query($sql);  
       if ($zt) {
     
        header("Location:product-brand.php");
     }else{
       echo "插入不成功！";
     }
    }
  ?>
<div class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-article-add" enctype="multipart/form-data">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>饮料ID：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="输入ID" name="beverageId">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">饮料名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="输入饮料名称" id="" name="beverageName">
			</div>
		</div>	
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">供应公司：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="beverageMark" placeholder="输入供应公司" value="" class="input-text">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">价格：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="beveragePrice" placeholder="输入价格" value="" class="input-text">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">所属国家：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" name="country" placeholder="输入所属国家" value="" class="input-text">
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
    <!--简陋版上传-->
      <input type="file" name="myFile">
 

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
</div>

<!--_footer 作为公共模版分离出去-->
<?php include './public/footer.php'; ?>
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<?php include './public/upload.php'; ?>
</body>
</html>