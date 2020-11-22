<div class="page-content">
    <div class="row">
        <div class="col-xs-12">
      <!-- PAGE CONTENT BEGINS --> 
            <div class="row">
                <div class="col-xs-12">
                    <h3>Tampilan Data Masakan</h3>

                    <div class="clearfix">
                        <div class="pull-right table-Tools-container"></div>
                    </div>
                    
                    <div class="table-header">
                        Tabel Data Masakan
                        <br/>
                    </div>

                    <?php if($this->session->flashdata('info')){?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">
                            <i class="ace-icon fa fa-times"></i>
                        </button>
                        
                        <strong>
                            <i class="ace-icon fa fa-check"></i>
                            Well done!
                        </strong>
                        <?php echo $this->session->flashdata('info') ?>
                        <br />
                    </div>
                    <?php } ?>
                   
                    <div>
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                            <tr>
                                <th>NO</th>
                                <th>Nama Masakan</th>
                                <th>Harga</th>
                                <th>status Masakan</th>
                                <th>Action</th>
                            </tr>
                            <?php
                                if ($tmasakan->num_rows() > 0) {
                                    $no=1;
                                    foreach($tmasakan->result_object() as $tm){
                                    ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $tm->nama_masakan; ?></td>
                                        <td><?php echo $tm->harga; ?></td>
                                        <td><?php echo $tm->status_masakan; ?></td>
                                        <td>
                                            <?php echo anchor('Masakan/formeditmasakan/'.$tm->id_masakan,' EDIT ',array('class'=>'btn btn-white btn-info btn-bold')) ?>
                                            <?php echo anchor('Masakan/hapusmasakan/'.$tm->id_masakan,' HAPUS ',
                                            array( 'class'=>'btn btn-white btn-warning btn-bold','onclick'=>'return confirm(\'apakah data mau dihapus\')')) ?> 
                                        </td>
                                    </tr>
                                    <?php
                                    $no++;
                                    }  
                                } else {
                                   ?>
                                    <tr>
                                        <td colspan="5" align="center">Data tidak ada</td>
                                    </tr>
                                   <?php 
                                }   
                            ?>
                        </table>
                    </div>
                </div>
            </div> 
            <?php echo anchor('Masakan/formmasakan','Tambah Masakan',array('class'=>'btn btn-sm btn-success')) ?>
        <!-- PAGE CONTENT ENDS -->
        </div>
    <!-- /.col -->
    </div>
<!-- /.row -->
</div>
<!-- /.page-content -->
    </div>
</div><!-- /.main-content -->
