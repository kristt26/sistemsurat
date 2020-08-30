<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Mahasiswa Add</h3>
            </div>
            <?php echo form_open('mahasiswa/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="npm" class="control-label">Npm</label>
						<div class="form-group">
							<input type="text" name="npm" value="<?php echo $this->input->post('npm'); ?>" class="form-control" id="npm" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="kdps" class="control-label">Kdps</label>
						<div class="form-group">
							<input type="text" name="kdps" value="<?php echo $this->input->post('kdps'); ?>" class="form-control" id="kdps" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="jenjang" class="control-label">Jenjang</label>
						<div class="form-group">
							<input type="text" name="jenjang" value="<?php echo $this->input->post('jenjang'); ?>" class="form-control" id="jenjang" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="kelas" class="control-label">Kelas</label>
						<div class="form-group">
							<input type="text" name="kelas" value="<?php echo $this->input->post('kelas'); ?>" class="form-control" id="kelas" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nmmhs" class="control-label">Nmmhs</label>
						<div class="form-group">
							<input type="text" name="nmmhs" value="<?php echo $this->input->post('nmmhs'); ?>" class="form-control" id="nmmhs" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="tmlhr" class="control-label">Tmlhr</label>
						<div class="form-group">
							<input type="text" name="tmlhr" value="<?php echo $this->input->post('tmlhr'); ?>" class="form-control" id="tmlhr" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="tglhr" class="control-label">Tglhr</label>
						<div class="form-group">
							<input type="text" name="tglhr" value="<?php echo $this->input->post('tglhr'); ?>" class="has-datepicker form-control" id="tglhr" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="jk" class="control-label">Jk</label>
						<div class="form-group">
							<input type="text" name="jk" value="<?php echo $this->input->post('jk'); ?>" class="form-control" id="jk" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="agama" class="control-label">Agama</label>
						<div class="form-group">
							<input type="text" name="agama" value="<?php echo $this->input->post('agama'); ?>" class="form-control" id="agama" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="kewarga" class="control-label">Kewarga</label>
						<div class="form-group">
							<input type="text" name="kewarga" value="<?php echo $this->input->post('kewarga'); ?>" class="form-control" id="kewarga" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="pendidikan" class="control-label">Pendidikan</label>
						<div class="form-group">
							<input type="text" name="pendidikan" value="<?php echo $this->input->post('pendidikan'); ?>" class="form-control" id="pendidikan" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nmsmu" class="control-label">Nmsmu</label>
						<div class="form-group">
							<input type="text" name="nmsmu" value="<?php echo $this->input->post('nmsmu'); ?>" class="form-control" id="nmsmu" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="jursmu" class="control-label">Jursmu</label>
						<div class="form-group">
							<input type="text" name="jursmu" value="<?php echo $this->input->post('jursmu'); ?>" class="form-control" id="jursmu" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="kotasmu" class="control-label">Kotasmu</label>
						<div class="form-group">
							<input type="text" name="kotasmu" value="<?php echo $this->input->post('kotasmu'); ?>" class="form-control" id="kotasmu" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="kabsmu" class="control-label">Kabsmu</label>
						<div class="form-group">
							<input type="text" name="kabsmu" value="<?php echo $this->input->post('kabsmu'); ?>" class="form-control" id="kabsmu" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="provsmu" class="control-label">Provsmu</label>
						<div class="form-group">
							<input type="text" name="provsmu" value="<?php echo $this->input->post('provsmu'); ?>" class="form-control" id="provsmu" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="pekerjaan" class="control-label">Pekerjaan</label>
						<div class="form-group">
							<input type="text" name="pekerjaan" value="<?php echo $this->input->post('pekerjaan'); ?>" class="form-control" id="pekerjaan" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="almt" class="control-label">Almt</label>
						<div class="form-group">
							<input type="text" name="almt" value="<?php echo $this->input->post('almt'); ?>" class="form-control" id="almt" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="notlp" class="control-label">Notlp</label>
						<div class="form-group">
							<input type="text" name="notlp" value="<?php echo $this->input->post('notlp'); ?>" class="form-control" id="notlp" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="status" class="control-label">Status</label>
						<div class="form-group">
							<input type="text" name="status" value="<?php echo $this->input->post('status'); ?>" class="form-control" id="status" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="jmsaudara" class="control-label">Jmsaudara</label>
						<div class="form-group">
							<input type="text" name="jmsaudara" value="<?php echo $this->input->post('jmsaudara'); ?>" class="form-control" id="jmsaudara" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nmayah" class="control-label">Nmayah</label>
						<div class="form-group">
							<input type="text" name="nmayah" value="<?php echo $this->input->post('nmayah'); ?>" class="form-control" id="nmayah" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="almtayah" class="control-label">Almtayah</label>
						<div class="form-group">
							<input type="text" name="almtayah" value="<?php echo $this->input->post('almtayah'); ?>" class="form-control" id="almtayah" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="nmibu" class="control-label">Nmibu</label>
						<div class="form-group">
							<input type="text" name="nmibu" value="<?php echo $this->input->post('nmibu'); ?>" class="form-control" id="nmibu" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="sumbiaya" class="control-label">Sumbiaya</label>
						<div class="form-group">
							<input type="text" name="sumbiaya" value="<?php echo $this->input->post('sumbiaya'); ?>" class="form-control" id="sumbiaya" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="statuskul" class="control-label">Statuskul</label>
						<div class="form-group">
							<input type="text" name="statuskul" value="<?php echo $this->input->post('statuskul'); ?>" class="form-control" id="statuskul" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="tgdaftar" class="control-label">Tgdaftar</label>
						<div class="form-group">
							<input type="text" name="tgdaftar" value="<?php echo $this->input->post('tgdaftar'); ?>" class="has-datepicker form-control" id="tgdaftar" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="kurikulum" class="control-label">Kurikulum</label>
						<div class="form-group">
							<input type="text" name="kurikulum" value="<?php echo $this->input->post('kurikulum'); ?>" class="form-control" id="kurikulum" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="IdUser" class="control-label">IdUser</label>
						<div class="form-group">
							<input type="text" name="IdUser" value="<?php echo $this->input->post('IdUser'); ?>" class="form-control" id="IdUser" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="photo" class="control-label">Photo</label>
						<div class="form-group">
							<input type="text" name="photo" value="<?php echo $this->input->post('photo'); ?>" class="form-control" id="photo" />
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