<?php $__env->startSection('title'); ?>
	医院后台
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="row">
            <div class="col-md-12">
                 <div class="card">
                           
                            <div class="fl w676">
         <div class="ExpertsPart1" style="height: 195px">
            <div class="imgDiv" style="display: inline-block;"><img src="/img/<?php echo $ary['img'] ?>" width="153" height="175"></div>
             
            <div class="content" style="display: inline-block;width: 600px;height: 175px">
                  <!-- <b style='font-size:15px'></b><br> -->
                <b><?php echo $ary['docname'] ?></b><br>
                <b>科室：</b>
                   <?php echo $ary['name'] ?>
                <br>
                <b>职称：</b>
                   <?php echo $ary['title'] ?>
                <br>
                <b>主治方向：</b>
                  <?php echo $ary['main'] ?>
                <br>
                    
                <b>毕业院校：</b>
                   <?php echo $ary['school'] ?>
                <br>
               <a href="<?php echo e(url('hos/rotaaddpage')); ?>?docid=<?php echo $ary['doc_id'] ?>"><button>值班添加</button></a> 
                      
            </div>
            </div>
             <input type="hidden" name="_token" value="<?PHP echo csrf_token(); ?>" id="csrf">
                    <div class="content table-responsive table-full-width">
                        <table class="table table-striped">
                            <thead>
                                <th>序号</th>
                            	<th>日期</th>
                            	<th>周</th>
                            	<th>操作</th>
                            </thead>
                            <tbody>
            <?php  $a=1; foreach ($data as $k => $v) {?>
                                <tr>
                                    <td><?php echo $a++; ?></td>
                                    <td><?php echo date('Y-m-d',$v['rotatime']) ?></td>
                                    <td>周<?php 
                                $week = ['日','一','二','三','四','五','六'];
                                   $weektime=date('w',$v['rotatime']);
                                foreach ($week as $key => $val) {
                                   if ($key==$weektime) {
                                      echo  $val;
                                   }
                                }
                                    

                                    ?></td>
                                    <td><span class="del"><img class="operation delban" src="img/delete.png"></span><input
                                            type="hidden" value="<?php echo $v['id'] ?>"/></td>
                                </tr>
          <?php } ?>       
                            </tbody>
                        </table>
  <?php  echo $data ->appends(['docid'=>isset($_GET['docid'])?$_GET['docid']:$ary['doc_id']])->links()
              ?>
                    </div>
                 </div>
            </div>

              </div>
<script>
  
              //删除父级科室
    $(document).on('click','.del',function(){
        var id = $(this).next().val();
        var csrf = $('#csrf').val();
        if(window.confirm('此操作将删除该信息？')){
            $.ajax({
                type: "POST",
                url: "<?php echo e(url('hos/rotadel')); ?>",
                data: "id="+id+"&_token="+csrf,
                success: function(msg){
                if(msg == 1){
                    location.reload();
                }else{
                    alert('删除失败，请稍后再试');
                }

             
                }
            });
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.hospital_layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>