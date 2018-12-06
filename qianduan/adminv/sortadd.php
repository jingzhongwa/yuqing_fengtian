<?php
/**
 * 文章分类添加- sortadd.php
 *
 * @version       v0.01
 * @create time   2012-4-28
 * @update time   
 * @author        liuxiao
 * @copyright     Copyright (c) 微普科技 WiiPu Tech Inc. (http://www.wiipu.com)
 */
	require_once('admincheck.php');
	require_once('inc_dbconn.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title> 添加分类 </title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="author" content="liuxiao@WiiPu -- http://www.wiipu.com" />
		<link rel="stylesheet" href="style2.css" type="text/css"/>
	</head>
	<body>
		<div class="bgintor">
		<div class="tit1">
			<ul>
				<li class="l1"><a href="sortlist.php" target="mainFrame" >分类列表</a> </li>
				<li><a href="sortadd.php">添加分类</a> </li>
			</ul>		
		</div>
	<div class="listintor">
		<div class="header1"><img src="images/square.gif" width="6" height="6" alt="" />
			<span>位置：分类管理 －&gt; <strong>添加分类</strong></span>
		</div>
		<div class="header2"><span>添加分类</span>
		</div>
		<div class="fromcontent">
			<form action="sort_do.php?act=add" method="post" id="doForm">
				<p>分类名称：<input class="in1" type="text" name="sort_name" id="sort_name"/></p>
				<p>分类排序：<input class="in1" type="text" name="sort_order" id="sort_order" value="99"/><span class="start">&nbsp;*&nbsp;默认值为99</span></p>
				<p>分类级别：<select name="has_parent" onchange="show_parent(this.value);">
							<option value="0">一级分类</option>
							<option value="1">二级分类</option>
							</select>
				</p>
				<p id="parent_category" style="display:none">所属分类：<select name="parent_id">
				<?php
				   $sql = "select * from info_sort where parent_id = 0 order by sort_order asc";
				   $rs=mysql_query($sql);
				   while($rows = mysql_fetch_array($rs))
				   {
				?>
						<option value="<?php echo $rows["sort_id"] ?>"><?php echo $rows["sort_name"] ?></option>
				<?php
				   }
				   mysql_free_result($rs);
				?>
				</select></p>
				<div class="btn">
					<input type="image" src="images/submit1.gif" width="56" height="20" alt="提交" onClick="return check();"/>
				</div>
				<script type="text/javascript">
					function check(){
						var f=document.getElementById('doForm');
						if(f.sort_name.value=="")
						{
							alert('分类名称不能为空');
							f.sort_name.focus();
							return false;
						}
					}
					function show_parent(v)
					{
						var f=document.getElementById('parent_category');
						if (v == 0)
						{
							f.style.display = 'none';
						}
						else
						{
							f.style.display = 'block';
						}
					}
				</script>
			</form>
		</div>
	</div>
  </div>
 </body>
</html>
