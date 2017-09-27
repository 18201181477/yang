@extends('layouts.hospital_layouts')

@section('title')
    医院后台
@stop

@section('content')
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
@stop