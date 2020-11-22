<div class="page-content">
	<div class="row">
    	<div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        	<div class="col-sm-12">
				<div class="widget-box">
					<div class="widget-header">
						<?php echo form_open('User/simpanuser'); ?>
						<h4 class="widget-title" align="center">Form User</h4>
						<?php if(validation_errors()){ ?>
						<?php echo validation_errors(); ?>
						<?php } ?>
					</div>

						<div class="widget-body">
							<div class="widget-main no-padding">
							</br>
								<form><!-- <legend>Form</legend>-->
									<table align="center" border="0"> 
										<tr>
										    <td colspan="5" align="center">Nama user</td>
										    <td colspan="5" align="center">:</td>
											<td colspan="12" align="center"> 
												<?php echo form_input('nama_user','', array('class'=>'form-control', 'placeholder'=>'Isi Nama user')); ?>
											</td>
										</tr>
										
										<tr>
										    <td colspan="5" align="center">Username</td>
											<td colspan="5" align="center">:</td>
											<td colspan="12" align="center"> 
												<?php echo form_input('username','', array('class'=>'form-control', 'placeholder'=>'Isi Username')); ?>
											</td>
										</tr>
										
										<tr>
										    <td colspan="5" align="center">Password</td>
											<td colspan="5" align="center">:</td>
											<td colspan="12" align="center"> 
												<?php echo form_password('password','', array('class'=>'form-control', 'placeholder'=>'Isi Passwrod')); ?>
											</td>
										</tr>
										
										<tr>
										    <td colspan="5" align="center">Level</td>
											<td colspan="5" align="center">:</td>
											<td colspan="12" align="left"> 
												<?php echo form_dropdown('level', $combobox, '',array('class'=>'form-control')); ?>
											</td>
										</tr>

										<tr>
											<td colspan="5"></br></td>
											<td colspan="5"></br></td>
										</tr>

										<tr>
											<td colspan="5"></br></td>
											<td colspan="5">
												<?php echo form_submit('btnsimpan','SIMPAN',array('class'=>'btn btn-sm btn-success'));?>
											</td>
											<td colspan="5">
												<?php echo anchor('User','BATAL',array('class'=>'btn btn-sm btn-danger')) ?>
											</td>
										</tr>

									</table>
									<?php echo form_close(); ?>
									<div class="form-actions center">
										<h7>..::::Isi Dengan Teliti::::..</h7>		
									</div>
								</form>
							</div>
						</div>
				</div>
			</div>
		<!-- PAGE CONTENT ENDS -->
        </div>
    <!-- /.col -->
    </div>
<!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
