<?php $this->display('layouts/header.php'); ?>

	<div class="table-box">
		<table class="table table-striped table-bordered clearfix">
			<thead>
				<tr>
					<th width="8%">ID</th>
					<th>项目名称</th>
					<th width="15%">提交人</th>
					<th width="15%">提交时间</th>
					<th width="130">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($gits as $git) : ?>
					<tr>
						<td><?php echo $git['gitid'];?></td>
						<td><a href=""><?php echo $git['title'];?></a></td>
						<td><a href=""><?php echo $git['userid'];?></a></td>
						<td><?php echo Local\Util\Time::formatDate($git['dateline']);?></td>
						<td>
							<a href="<?php echo ADMINURL?>/content/edit/id/<?php echo $git['gitid']; ?>" class="btn btn-success">编辑</a>
							<a href="<?php echo ADMINURL?>/content/delete/id/<?php echo $git['gitid']; ?>" class="btn btn-danger">删除</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>

		</table>
	</div>
	
	<div class="pagenav">
		<?php echo $pageNav;?>
	</div>

<?php $this->display('layouts/footer.php'); ?>