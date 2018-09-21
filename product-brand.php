<!--_meta -->
<?php include './public/meta.php'; ?>
<!--/meta -->

<title>品牌管理</title>
</head>
<body>
<!--_header -->
<?php include './public/header.php'; ?>
<!--/_header -->

<!--_menu -->
<?php include './public/menu.php'; ?>
<!--/_menu -->

<section class="Hui-article-box">
	<!--nav表头开始-->
	<nav class="breadcrumb">
		<i class="Hui-iconfont">&#xe67f;</i>首页
		<span class="c-gray en">&gt;</span> 产品管理 
		<span class="c-gray en">&gt;</span> 品牌管理 
		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i>
		</a>
	</nav>
		<!--nav表头结束-->
	<div class="Hui-article">
		<article class="cl pd-20">
			<div class="text-c cl pd-5 bg-1 bk-gray mt-20">				
				<form class="Huiform" method="post" action="" target="_self">
				<!--批量删除开始-->
				<span class="l"><a class="btn btn-danger radius">
				<i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
				</span>
				<!--批量删除结束-->
				<!--查询文本输入框-->					
				<input type="text" name="" class="input-text" style="width:240px;">
				<!--查询文本输入框-->	
				<!--查询按钮-->
				<button type="button" class="btn btn-success" name="">
				查询</button>
				<!--按钮结束-->
				<!--添加按钮-->	
				 <span class="r">
				 	<a href="product-add.php">
						<button type="button" class="btn btn-success" name="">
						<i class="Hui-iconfont">&#xe600;</i> 添加</button>
					</a>
				</span> 
				<!--添加按钮结束-->
				</form>				
			</div>
			
			<?php
				error_reporting(E_ALL ^ E_DEPRECATED);
				$con=mysql_connect('localhost','root','236598');
				mysql_select_db('store');
				mysql_query("set names utf8"); //设置字符集为utf8
				$sql="select * from beverage";
				$result=mysql_query($sql);
				$count=mysql_num_rows($result); //记录总条数$count。
				$pagesize=5;//每页要显示的记录条数$pagesize
				if ($count%$pagesize==0) $pagecount=$count/$pagesize;else $pagecount=(int)($count/$pagesize+1); //总页数$pagecount
				$row=mysql_fetch_assoc($result); //数组$row的键名为字段名
				$page=@$_REQUEST["page"];  //欲显示的页数$page
if ($page==null) $currentpage=1;else $currentpage=intval($page);
for($i=1;$i<=($currentpage-1)*$pagesize;$i++) //指定每一页面显示20条记录 
{  if (!$row) break;
   $row=mysql_fetch_assoc($result); 
}
			?>
			<!--表单开头-->
			<div class="mt-10">
				<table class="table table-border table-bordered table-bg table-sort">
					<thead>
						<tr class="text-c">
							<th width="25"><input type="checkbox" name="" value=""></th>
							<th width="70">ID</th>
							<th width="100">饮料名称</th>
							<th width="200">所属公司</th>
							<th width="120">价格</th>
							<th width="120">所属国家</th>
							<th>图片</th>
							<th width="100">操作</th>
						</tr>
					</thead>
					<tbody>
						 <?php
		for($i=1;$i<=$pagesize;$i++)
		{  if (!$row) break;		
    ?> 
						<tr class="text-c">
							<td><input name="" type="checkbox" value=""></td>
							<td><?php echo $row["beverageId"]; ?></td>
							<td><?php echo $row["beverageName"]; ?></td>
							<td><?php echo $row["beverageMark"]; ?></td>
							<td><?php echo $row["beveragePrice"]; ?></td>
							<td><?php echo $row["country"]; ?></td>
							<th>图片</th>


							<td class="f-14 product-brand-manage">
								<a style="text-decoration:none" title="编辑">
									<i class="Hui-iconfont">&#xe6df;</i></a> 
							    <a style="text-decoration:none" title="删除">
							 		<i class="Hui-iconfont">&#xe6e2;</i></a>
							</td>
							<?php
		    $row=mysql_fetch_assoc($result); 
		}
	?>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td height="25" colspan="8" align="center" class="text-c">
						第<?php echo $currentpage;?>页/共<?php echo $pagecount;?>页 &nbsp;&nbsp;
						<?php
	  						if ($currentpage==1)  echo "首 页 | 上一页 | ";
	 						else
    					{?>
							<a href="product-brand.php?page=1">首 页</a> | 
							<a href="product-brand.php?page=<?php echo $currentpage-1;?>">上一页</a> |	
						<?php
	 		 					}	  	
	  						if ($currentpage==$pagecount) echo "下一页 | 尾 页";
	  						else
	 					 {?>									
						<a href="product-brand.php?page=<?php echo $currentpage+1;?>">下一页</a> | 
							<a href="product-brand.php?page=<?php echo $pagecount;?>">尾 页</a>
       					 <?php
	 							 }
	 					 ?>
							</td>						
						</tr>
					</tfoot>
				</table>
			</div>
		</article>
	</div>
</section>

<!--_footer 作为公共模版分离出去--> 
<?php include './public/footer.php'; ?>
<!--/_footer /作为公共模版分离出去--> 

<!--请在下方写此页面业务相关的脚本--> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>