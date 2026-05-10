<?php if ($this->uri->segment(3) == 'manage'): ?>
	<?= showMsg(); ?>
	<?= getBredcrum(ADMIN, array('#' => 'Add/Update City')); ?>
	<div class="row margin-bottom-10">
		<div class="col-md-6">
			<h2 class="no-margin"><i class="entypo-list"></i> <?= $page_title?></h2>
		</div>
		<div class="col-md-6 text-right">
			<a href="<?= site_url(ADMIN . '/cities'); ?>" class="btn btn-lg btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
		</div>
	</div>
	<div>
		<hr>
		<div class="row col-md-12">
			<form action="" name="frmCity" role="form" class="form-horizontal" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<div class="col-md-6">
						<label class="control-label" for="city"> City <span class="symbol required">*</span></label>
						<input type="text" name="city" id="city" value="<?php if (isset($row->city)) echo $row->city; ?>" class="form-control" autofocus required>
					</div>
					<div class="col-md-6">
						<label class="control-label" for="state"> State <span class="symbol required">*</span></label>
						<select name="state" id="state" class="form-control" required>
							<option value="">Select State</option>
							<?= get_states_options('code', $row->state, 1)?>
						</select>
					</div>
				</div>
				<div class="col-md-12">
					<hr class="hr-short">
					<div class="form-group text-right">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary btn-lg col-md-3 pull-right"><i class="fa fa-save"></i> Save</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="clearfix"></div>
	</div>
<?php else: ?>
	<?= showMsg(); ?>
	<?= getBredcrum(ADMIN, array('#' => 'Manage Cities')); ?>
	<div class="row margin-bottom-10">
		<div class="col-md-6">
			<h2 class="no-margin"><i class="entypo-list"></i> Cities</h2>
		</div>
		<div class="col-md-6 text-right">
			<a href="<?= site_url(ADMIN . '/cities/manage'); ?>" class="btn btn-lg btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
		</div>
	</div>
	<table class="table table-bordered datatable" id="table-1">
		<thead>
			<tr>
				<th width="5%" class="text-center">#</th>
				<th>City</th>
				<th>State</th>
				<th width="12%" class="text-center">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php if (count($rows) > 0): $count = 0; ?>
				<?php foreach ($rows as $row): ?>
					<tr class="odd gradeX">
						<td class="text-center"><?= ++$count; ?></td>
						<td><b><?= $row->city; ?></b></td>
						<td><b><?= $row->state; ?></b></td>
						<td class="text-center">
							<a href="<?= site_url(ADMIN.'/cities/manage/'.$row->id); ?>">Edit</a> |
							<a href="<?= site_url(ADMIN.'/cities/delete/'.$row->id); ?>" onclick="return confirm('Are you sure?');">Delete</a>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
<?php endif; ?>