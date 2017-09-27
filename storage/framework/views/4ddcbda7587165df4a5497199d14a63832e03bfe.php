<?php $__env->startSection('title'); ?>
    医院后台
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
         <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="header">
                        <h4 class="title">医院简介</h4>
                        

                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-6">
                              
                   <img src="/img/<?=$res['image']?>" style="width: 420px;height: 350px;">             
                            </div>
                            <div class="col-md-6">
                               <?php echo  isset($res['profile'])?$res['profile']:null;;?>
                                
                              
                            
                             
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="places-buttons">
                            <div class="row">                         
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.hospital_layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>