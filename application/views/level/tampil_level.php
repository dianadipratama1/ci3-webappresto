        <div class="page-content">

            <div class="row">
                <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->          
                <div class="row">
                    <div class="col-xs-12">
                        <h3>Tampilan Data Level</h3>

                        <div class="clearfix">
                            <div class="pull-right table-Tools-container"></div>
                        </div>
                        
                        <div class="table-header">
                            Tabel Data Level
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
                                    <th>Level</th>
                                    <th>Action</th>
                                </tr>
                        
                                <?php
                                if ($tlevel->num_rows() > 0) {
                                    $no=1;
                                    foreach($tlevel->result_object() as $tm){
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $tm->nama_level; ?></td>
                                        <td>
                                            <?php echo anchor('Level/formeditlevel/'.$tm->id_level,' EDIT ',array('class'=>'btn btn-white btn-info btn-bold')) ?>
                                            <?php echo anchor('Level/hapuslevel/'.$tm->id_level,' HAPUS ',
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
                <?php echo anchor('Level/formlevel','Tambah Level',array('class'=>' btn btn-sm btn-success')) ?>

                <!-- PAGE CONTENT ENDS -->
                </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->

        </div><!-- /.page-content -->

    </div>
</div><!-- /.main-content -->
