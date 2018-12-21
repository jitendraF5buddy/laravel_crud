@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Deal Add</div>
                <div class="card-body">
                      <div class="card-body">
                      <a href="{{url('deal-manage')}}" class="btn btn-primary btn-sm">Manage Deals </a>
                      
                      {{Form::open(['url'=> 'deal-manage','method'=>'POST','enctype'=>'multipart/form-data'])}}

                      <?php echo Form::token(); ?>
                              <div class="form-group">
                                {!! Form::label('Store Name', '', ['for' => 'Store Name']) !!}
                     
                                {{ Form::select('stores_id',$getallStore, ['class' => 'form-control']) }}
                              </div>

                              <div class="form-group">
                                {!! Form::label('Title', 'Title', ['for' => 'Title']) !!}
                     
                                {{ Form::text('title',null, ['class' => 'form-control']) }}
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
                                {!! Form::label('Code', '', ['for' => 'Code']) !!}
                     
                                {{ Form::text('code',null, ['class' => 'form-control']) }}
                              </div>

                              <div class="form-group">
                                {!! Form::label('Deals Link', '', ['for' => 'Deals Link']) !!}
                     
                                {{ Form::text('deals_link',null, ['class' => 'form-control']) }}
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