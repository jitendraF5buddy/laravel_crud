@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Manage Live</div>


                

                <div class="card-body">
                    <table border="1">
                        <tr><td>Name</td><td>Email</td><td>Date</td><td>Action</td></tr>
                    <?php foreach ($allrecord as $key => $value) { ?>
                       <tr><td>{{$value->name}}</td><td>{{$value->description}}</td><td>{{$value->datee}}</td>
                            <td>
                       <?php $urla = 'manage/'.$value->id."/edit"; ?>
                       <?php $urla_delete = 'manage/'.$value->id; ?>

                        <a href="{{url($urla)}} " class='btn'>Edit </a> |
                            <a href='' class='btn'>View </a>| 
                            
                        <?php $deleteurl = 'manage/'.$value->id; ?>
                        <?php $formld = 'delete-'.$value->id.'form'; ?>
                                        
                        {{ Form::open(['url' =>$deleteurl, 'method' => 'delete','id'=>$formld]) }}
                        <a class="btn btn-danger a-btn-slide-text"    
                        onclick="deleteconfirm('<?php echo $formld;?>');" >
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                        <span><strong>Delete</strong></span>            
                        </a>
                        {{ Form::close() }}        
                   <?php } ?>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
   function deleteconfirm(id){
        $("#"+id).submit();
    }
    </script>
@endsection