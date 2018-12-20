@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Update Banner Setting</div>

                <div class="card-body">
                    <a href="{{url('manage-banner')}}" class="btn btn-primary btn-sm">Manage </a>
                     <?php $editurl = "manage-banner/".$getRecord->id; ?> 
                    {{Form::open(['url'=> $editurl,'method'=>'PUT','enctype'=>'multipart/form-data'])}}

                    <?php echo Form::token(); ?>
                            <div class="form-group">
                              {!! Form::label('Title', 'Title', ['for' => 'title']) !!}
                   
                              {{ Form::text('title',$getRecord->title, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                              {!! Form::label('Description', 'Description', ['for' => 'Description']) !!}
                   
                              {{ Form::text('description',$getRecord->description, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                              {!! Form::label('Extra Description', '', ['for' => 'extra_description']) !!}
                   
                              {{ Form::text('extra_description',$getRecord->extra_description, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                              {!! Form::label('Banner Type', '', ['for' => 'Banner Type']) !!}
                   
                              {{ Form::text('banner_type',$getRecord->banner_type, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                              {!! Form::label('Status', '', ['for' => 'Status']) !!}

                              {{ Form::select('status',array('1'=>'Publish','2'=>'Unpublish'),$getRecord->status, ['class' => 'form-control']) }}
                            </div>

                            <div class="form-group">
                              {!! Form::label('Banner Image', '', ['for' => 'Banner Image']) !!}
                   
                              {{ Form::file('banner_image',null, ['class' => 'form-control']) }}
                              
                              <img src="{{$getRecord->banner_image}}" width="200" />
                            </div>

                            <input type="submit" name="submit" value="Submit" class="btn btn-primary">

                 
                    {{ Form::close() }}
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection