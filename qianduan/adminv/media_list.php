<?php
	require_once('admincheck.php');
	require_once('inc_dbconn.php');
	$title="媒体列表";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title> <?php echo $title;?> </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Jiangting@WiiPu -- http://www.wiipu.com" />
  <link rel="stylesheet" href="style2.css" type="text/css"/>
 </head>
 <body>
  <div class="bgintor">
		<div class="tit1">
			<ul>
				<li><a href="#"><?php echo $title;?></a> </li>
				<li class="l1"><a href="add_media.php" target="mainFrame">添加媒体信息</a> </li>
			</ul>		
		</div>
	<div class="listintor">
		<div class="header1"><img src="images/square.gif" width="6" height="6" alt="" />
			<span>位置：媒体管理 －&gt; <strong><?php echo $title;?></strong></span>
		</div>
		<div class="header2"><span><?php echo $title;?></span></div>
		<div class="content">
			<table width="70%">
				<tr class="t1">
				    <td width="5%">序号</td>
					<td width="35%">媒体名称</td>
					<td width="5%">媒体等级</td>
					<td width="35%">媒体域名</td>
					<td width="10%">编辑</td>
					<td width="10%">删除</td>
				</tr>
				<?php
					$sql="select * from media_list order by m_id asc";
					$result=mysql_query($sql);
					while($rows=mysql_fetch_array($result)){
				?>
				<tr>
				    <td><?php echo $rows['m_id'];?></td>
					<td><a href="<?php echo "http://".$rows['domain'];?>" target="_blank"><?php echo $rows['media_name'];?></a></td>
					<td><?php if($rows['grade']==1) echo "A级";elseif($rows['grade']==2) echo "B级";elseif($rows['grade']==3) echo "C级";else echo "D级";?></td>
					<td><a href="<?php echo "http://".$rows['domain'];?>" target="_blank"><?php echo $rows['domain'];?></a></td>
					<td><a href="edit_media.php?m_id=<?php echo $rows['m_id'];?>"><img width="9" height="9" alt="编辑" src="images/dot_edit.gif"></a></td>
					<td><a href="javascript:if(confirm('您确定要删除吗？')){location.href='media_do.php?op=del&m_id=<?php echo $rows['m_id'];?>'}"><img src="images/dot_del.gif" width="9" height="9" alt="删除" /></a></td>
				</tr>
				<?php
				  }
				?>					
			</table>
		  </div>
		</div>
	</div>
   </div>
 </body>
</html>