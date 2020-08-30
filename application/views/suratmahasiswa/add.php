<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Suratmahasiswa Add</h3>
            </div>
            <?php echo form_open('suratmahasiswa/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="mahasiswa_Id" class="control-label">Mahasiswa Id</label>
						<div class="form-group">
							<input type="text" name="mahasiswa_Id" value="<?php echo $this->input->post('mahasiswa_Id'); ?>" class="form-control" id="mahasiswa_Id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="pejabat_idpejabat" class="control-label">Pejabat Idpejabat</label>
						<div class="form-group">
							<input type="text" name="pejabat_idpejabat" value="<?php echo $this->input->post('pejabat_idpejabat'); ?>" class="form-control" id="pejabat_idpejabat" />
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