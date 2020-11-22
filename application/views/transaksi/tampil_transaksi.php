        <div class="page-content">

            <div class="row">
                <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->          
                <div class="row">
                    <div class="col-xs-12">
                        <?php if($this->session->flashdata('info')){?>
                                  <div class="alert alert-warning" role="alert">
                                      <?php echo $this->session->flashdata('info') ?>
                                    </div>
                        <?php } ?>

                        <div class="clearfix">
                            <div class="col-xs-12 col-sm-6">
                            <h3>Daftar Pesanan</h3>
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>                      
                                    <tr>
                                        <th>Nama Masakan</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Status Masakan</th>
                                        <th>Sub Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tampil_keranjang">
                                    
                                </tbody>                                                                    
                            </table> 
                            <?php echo form_submit('btnsimpan','SIMPAN',array('class' =>'btn btn-success'));?>
                             </div>
                              <?php echo form_close(); ?>

                            <div class="pull-right table-Tools-container">
                            <div class="col-xs-19 col-sm-19">
                                            <div class="widget-box">
                                                <div class="widget-header">
                                                    <h4 class="widget-title">Detail Pesanan</h4>
                                                </div>

                                                <div class="widget-body">
                                                    <div class="widget-main">
                                                        <div>
                                                            <label for="name"><b>No Orders</b></label>
                                                            <?php
                                                                echo form_input('no_orders',@$torder, array('class'      =>'form-control',
                                                                                                         'placeholder'=>'Orders',
                                                                                                         'readOnly'   =>'readOnly')); 
                                                            ?>
                                                        </div>

                                                        <div>
                                                            <label for="name"><b>No Meja</b></label>
                                                            <input type="number" name="no_meja" value="0" class="quantity form-control">
                                                        </div>
            
                                                        <div>
                                                            <label for="name"><b>Keterangan</b></label>
                                                            <?php echo form_input('keterangan','-', array('class'       =>'form-control',
                                                                                                          'placeholder' =>'Isi Keterangan'));
                                                            ?>
                                                        </div>
            
                                                        <div>
                                                            <label for="name"><b>Status Order</b></label> 
                                                            <?php 
                                                                $options=array('cash'=>'Cash','kredit'=>'Kredit',);
                                                                echo form_dropdown('status_order',$options,'cash',
                                                                                    array('class'=>'form-control','placeholder'=>'Isi Keterangan')); 
                                                            ?>
                                                        </div>
                                                        <?php echo form_hidden('id_user',$this->session->userdata('id_user')); ?>
                                                    </div>
                                                </div>
                                            </div>
                                </div><!-- /.span -->                          
                            </div>
                        </div>

                        <div class="row">
                            <!--Awal Tempat Transaksi-->
                             <h3>Menu Masakan</h3>
                            <?php foreach($tmasakan->result_object() as $tm){?>
                                    <div class="col-xs-6 col-sm-3 pricing-box">
                                        <div class="widget-box widget-color-dark">
                                            <div class="widget-header">
                                                <h5 class="widget-title bigger lighter"><?php echo $tm->nama_masakan; ?></h5>
                                            </div>

                                            <div class="widget-body">
                                                <div class="widget-main">
                                                    <div class="widget-title" position="center">
                                                        <ul class="list-unstyled spaced2">
                                                            <li>
                                                                <div class="widget-body">                                       
                                                                    <div class="widget-main">
                                                                        <P align="center">
                                                                            <?php $options=array('pesan'   =>'pesan',
                                                                                                 'langsung'=>'langsung');
                                                                                echo form_dropdown('status_masakan',$options,$tm->status_masakan); 
                                                                            ?>
                                                                        </P>
                                                                    </div>
                                                               </div>


                                                            </li>
                                                        </ul>
                                                    </div>
                                                    
                                                    <div class="price">
                                                        <?php echo 'Rp '.number_format($tm->harga) ?>
                                                    </div>
                                                </div>

                                                <div>
                                                    <button class="tambah_beli btn btn-block btn-inverse" 
                                                            data-idmasakan="<?php echo $tm->id_masakan;?>" 
                                                            data-namamasakan="<?php echo $tm->nama_masakan;?>" 
                                                            data-hargamasakan="<?php echo $tm->harga;?>"
                                                            data-statusmasakan="<?php echo $tm->status_masakan;?>">
                                                            <i class="ace-icon fa fa-shopping-cart bigger-110"></i>
                                                        <span>Buy</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?> 
                        </div>
                        <?php echo form_open('TransAdmin/simpantransaksi'); ?>                      
                        <!-- <button class="btn btn-success">Total</button> -->
                <!-- PAGE CONTENT ENDS -->
                </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->

        </div><!-- /.page-content -->

    </div>
</div><!-- /.main-content -->

<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-2.2.3.min.js');?>"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.tambah_beli').click(function(){
        var masakan_id    = $(this).data("idmasakan");
        var masakan_nama  = $(this).data("namamasakan");
        var masakan_harga = $(this).data("hargamasakan");
        var status_masakan = $(this).data("statusmasakan");
        $.ajax({
            url : "<?php echo base_url('index.php/TransAdmin/simpan_keranjang');?>",
            method : "POST",
            data : {id_masakan: masakan_id, nama_masakan: masakan_nama, harga_masakan: masakan_harga, status_masakan:status_masakan},
            success: function(data){
            $('#tampil_keranjang').html(data);
        }
      });
    });

    // panggil data tampil keranjang
    $('#tampil_keranjang').load("<?php echo base_url();?>index.php/TransAdmin/load_keranjang");

    $(document).on('click','.hapus_cart',function(){
      var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
      $.ajax({
        url : "<?php echo base_url();?>index.php/TransAdmin/hapus_cart",
        method : "POST",
        data : {row_id : row_id},
        success :function(data){
          $('#tampil_keranjang').html(data);
        }
      });
    });
 
  });
</script>




