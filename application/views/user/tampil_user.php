
        <div class="page-content">

            <div class="row">
                <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->          
                <div class="row">
                    <div class="col-xs-12">
                        <h3>Tampilan Data user</h3>

                        <div class="clearfix">
                            <div class="pull-right table-Tools-container"></div>
                        </div>
                        
                        <div class="table-header">
                            Tabel Data User
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
                                    <th>Nama user</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                </tr>
                        
                                <?php
                                if ($tuser->num_rows() > 0) {
                                    $no=1;
                                    foreach($tuser->result_object() as $tm){
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $tm->nama_user; ?></td>
                                        <td><?php echo $tm->username; ?></td>
                                        <td>
                                            <?php echo anchor('User/formedituser/'.$tm->id_user,' EDIT ',array('class'=>'btn btn-white btn-info btn-bold')) ?>
                                            <?php echo anchor('User/hapususer/'.$tm->id_user,' HAPUS ',
                                            array( 'class'=>'btn btn-white btn-warning btn-bold','onclick'=>'return confirm(\'apakah data mau dihapus\')')) ?> 
                                        </td>
                                    </tr>
                                    <?php
                                    $no++;
                                    }  
                                }else{
                                ?>
                                        <tr>
                                            <td colspan="5"  align="center">Data tidak ada</td>
                                        </tr>
                                <?php }  ?>
                            </table>  
                        </div>
                    </div>
                </div>
                <?php echo anchor('User/formuser','Tambah user',array('class'=>' btn btn-sm btn-success')) ?>

                <!-- PAGE CONTENT ENDS -->
                </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->

        </div><!-- /.page-content -->

    </div>
</div><!-- /.main-content -->
