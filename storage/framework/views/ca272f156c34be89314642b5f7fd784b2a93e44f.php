<?php $__env->startSection('content'); ?>
<style type="text/css">
    td,th{
        text-align: center ;
    }
    img{
        border-image-repeat: 3px ;
        border-style: circle ;
    }
</style>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Table Penggajian</div>
                    
                <div class="">
                    <div class="col-md-12">
                        <a href="<?php echo e(url('penggajian/create')); ?>" class="btn btn-primary form-control">Tambah Data</a>
                        <center><?php echo e($penggajian->links()); ?></center>
                    </div>
                    <table class="table table-striped table-hover table-bordered">
                        <?php 
                            $no=1 ;
                         ?>
                        <?php $__currentLoopData = $penggajian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datapenggajian): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php 
                             ;
                         ?>
                        <div class="col-md-6">
                            <div class="panel panel-default pegawai">
                            <div class="panel-heading kecil">
                                <div class="panel-title"></div>
                            </div>
                            <div class="panel-body">                        
                            <center>
                            <p><?php echo e($no++); ?></p>
                            <img height="100px" alt="Smiley face" width="100px" class="img-circle" src="asset/image/<?php echo e($datapenggajian->tunjangan_pegawai->pegawai->foto); ?>">

                        <h3><?php echo e($datapenggajian->tunjangan_pegawai->pegawai->User->name); ?></h3>
                        <h4><?php echo e($datapenggajian->tunjangan_pegawai->pegawai->nip); ?></h4>
                        <h5><b><?php if($datapenggajian->tanggal_pengambilan == ""&&$datapenggajian->status_pengambilan == "0"): ?>
                            Gaji Belum Diambil 
                            <div class="col-md-12">
                            <a class="btn btn-primary col-md-12" href="<?php echo e(route('penggajian.edit',$datapenggajian->id)); ?>">Ubah Pengambilan</a>
                        </div>
                        <?php elseif($datapenggajian->tanggal_pengambilan == ""||$datapenggajian->status_pengambilan == "0"): ?>
                            Gaji Belum Diambil
                            <div class="col-md-12">
                            <a class="btn btn-primary col-md-12 " href="<?php echo e(route('penggajian.edit',$datapenggajian->id)); ?>">Ubah Pengambilan</a>
                        </div>
                        <?php else: ?>
                            Gaji Sudah Diambil Pada <?php echo e($datapenggajian->tanggal_pengambilan); ?>

                        <?php endif; ?></b></h5>
                        



                        </h5>
                        
                                <a class="btn btn-primary col-md-4 a" href="<?php echo e(route('penggajian.show',$datapenggajian->id)); ?>">Detail</a>
                                <a class="btn btn-success col-md-4" href="<?php echo e(route('penggajian.show',$datapenggajian->id)); ?>">Edit </a>
                                     <?php echo Form::open(['method'=>'DELETE','route'=>['penggajian.destroy',$datapenggajian->id]]); ?>

                                    <?php echo Form::submit('Delete',['class'=>'btn btn-danger col-md-4 a']); ?>

                                    <?php echo Form::close(); ?>

                                
                        </center>
                        </div>
                        </div>
                        </div> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        
                    </table>
                </div>

            </div>
        </div>
        
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>