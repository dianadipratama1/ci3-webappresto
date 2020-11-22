<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
            <div class="col-sm-12">
                <div class="widget-box">
                    <div class="widget-header">
                        <?php echo form_open('Masakan/editmasakan'); ?>
                        <?php echo form_hidden('id_masakan',$editmasakan->id_masakan); ?>
                        <h4 class="widget-title" align="center">Form Edit Masakan</h4>
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
                                            <td colspan="5" align="center">Nama Masakan</td>
                                            <td colspan="5" align="center">:</td>
                                            <td colspan="12" align="center"> 
                                                <?php echo form_input('nama_masakan',$editmasakan->nama_masakan, array('class'=>'form-control', 'placeholder'=>'Isi Nama masakan')); ?>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td colspan="5" align="center">Harga Masakan</td>
                                            <td colspan="5" align="center">:</td>
                                            <td colspan="12" align="center"> 
                                                <?php echo form_input('harga_masakan',$editmasakan->harga, array('class'=>'form-control', 'placeholder'=>'Isi Harga masakan')); ?>
                                            </td>
                                        </tr>
                                                                       
                                        <tr>
                                            <td colspan="5" align="center">Status Makanan</td>
                                            <td colspan="5" align="center">:</td>
                                            <td colspan="12" align="left"> 
                                                <?php $options = array('pesan'=>'pesan','langsung'=>'langsung',);
                                                echo form_dropdown('status_masakan', $options, $editmasakan->status_masakan); ?>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="5"></br></td>
                                            <td colspan="5"></br></td>
                                             <td colspan="5">*)Kosongi Jika Tidak Mau Di Ubah</br></td>
                                        </tr>

                                        <tr>
                                            <td colspan="5"></br></td>
                                            <td colspan="5">
                                                <?php echo form_submit('btedit','EDIT',array('class'=>'btn btn-sm btn-success'));?>
                                            </td>
                                            <td colspan="5">
                                                <?php echo anchor('Masakan','BATAL',array('class'=>'btn btn-sm btn-danger')) ?>
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