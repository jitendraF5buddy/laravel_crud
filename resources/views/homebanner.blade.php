@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Home Banner Setting</div>

                <div class="card-body">
                    <a href="{{url('manage-banner/create')}}" class="btn btn-primary btn-sm">Add New </a>
                    <br />
                    <br />
                   <table class="table table-bordered">
                       <tr>
                           <th>Title</th>
                           <th>Description</th>
                           <th>Image</th>
                           <th>Status</th>
                           <th>Action</th>
                       </tr> 
                       @foreach($result as $res)
                        <tr>
                            <td>{{$res->title}}</td>
                            <td>{{$res->description}}</td>
                            <td>{{$res->banner_image}}</td>
                            <td>{{$res->status==1?'Publish':'Unpublish'}}</td>
                            <td>
                              <?php $edit_id = "/manage-banner/$res->id/edit/"; ?>
                                <a href="{{url($edit_id)}}" class="btn btn-info btn-sm">Edit</a>
                                <?php $delete_id = 'delete-'.$res->id; ?>
                                <?php $deleteurl = '/manage-banner/'.$res->id; ?>


                                {{ Form::open(['url'=>$deleteurl,'method'=>'DELETE','id'=>$delete_id])}}
                                 <a class="btn btn-danger btn-sm"
                                 onclick="deleteconfirm('<?php echo $delete_id;?>');" >
                                  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                  <span><strong>Delete</strong></span>
                                </a>
                                {{Form::close()}}
                            </td>
                            
                        </tr>    
                       @endforeach
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
  function deleteconfirm(id){
    var conf = confirm("Are you sure you want to delete");
    if(conf){
      $("#"+id).submit();
    }
  }
  </script>