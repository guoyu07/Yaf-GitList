<?php $this->display('layouts/header.php'); ?>

	<form name="settingedit" method="post" action="<?php echo ADMINURL;?>/setting/edit">
		<div class="table-box">
			<table class="table table-striped table-bordered clearfix">
				<thead>
					<tr>
						<th width="15%">变量名称</th>
						<th width="28%">参数说明</th>
						<th>参数值</th>
						<th width="5%">排序</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($settings as $setting) : ?>
						<tr>
							<td><?php echo $setting['title'];?></td>
							<td><?php echo $setting['description'];?></td>
							<td><?php echo  Local\Util\Page::displayFormElement("settings[{$setting['settingid']}][value]", $setting['value'], $setting['type']); ?></td>
							<td><input type="text" class="form-control text-center" maxlength="3" name="settings[<?php echo $setting['settingid'];?>][sort]" value="<?php echo $setting['sort'];?>"></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="4"><input type="submit" class="btn btn-primary" value="确定" /></td>
					</tr>
				</tfoot>
			</table>
		</div>
	</form>

<?php $this->display('layouts/footer.php'); ?>