<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Struktural Add</h3>
            </div>
            <?php echo form_open('struktural/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="nm_struktural" class="control-label">Nm Struktural</label>
						<div class="form-group">
							<input type="text" name="nm_struktural" value="<?php echo $this->input->post('nm_struktural'); ?>" class="form-control" id="nm_struktural" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>