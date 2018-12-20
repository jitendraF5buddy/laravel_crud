@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add Store</div>

                  <div class="card-body">
                      <div class="card-body">
                      <a href="{{url('store-manage')}}" class="btn btn-primary btn-sm">Manage </a>
                      
                      {{Form::open(['url'=> 'store-manage','method'=>'POST','enctype'=>'multipart/form-data'])}}

                      <?php echo Form::token(); ?>
                              <div class="form-group">
                                {!! Form::label('Store Name', '', ['for' => 'Store Name']) !!}
                     
                                {{ Form::text('store_name',null, ['class' => 'form-control']) }}
                              </div>

                              <div class="form-group">
                                {!! Form::label('Description', 'Description', ['for' => 'Description']) !!}
                     
                                {{ Form::text('description',null, ['class' => 'form-control']) }}
                              </div>

                              <div class="form-group">
                                {!! Form::label('Extra Description', '', ['for' => 'extra_description']) !!}
                     
                                {{ Form::text('extra_description',null, ['class' => 'form-control']) }}
                              </div>

                              <div class="form-group">
                                {!! Form::label('More_about_cms', '', ['for' => 'More About Cms']) !!}
                     
                                {{ Form::text('more_about_cms',null, ['class' => 'form-control']) }}
                              </div>

                              <div class="form-group">
                                {!! Form::label('Description Sidebar', '', ['for' => 'Description sidebar']) !!}
                     
                                {{ Form::text('description_sidebar',null, ['class' => 'form-control']) }}
                              </div>

                              <div class="form-group">
                                {!! Form::label('Store Image', '', ['for' => 'Store Image']) !!}
                              
                                {{ Form::file('store_image',null, ['class' => 'form-control']) }}
                              </div>

                              <div class="form-group">
                                {!! Form::label('Side Bar Image', '', ['for' => 'Side Bar Image']) !!}
                              
                                {{ Form::file('side_bar_image',null, ['class' => 'form-control']) }}
                              </div>

                              <div class="form-group">
                                {!! Form::label('Status', '', ['for' => 'Status']) !!}
                     
                                {{ Form::select('status',array('1'=>'Publish','2'=>'Unpublish'), ['class' => 'form-control']) }}
                              </div>

                              <input type="submit" name="submit" value="Submit" class="btn btn-primary">

                      {{ Form::close() }}
                     
                  </div>
                  
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection