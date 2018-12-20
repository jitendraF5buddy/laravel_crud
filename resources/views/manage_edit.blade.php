@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Session Flash Start-->
                  @foreach (['danger', 'warning', 'success', 'info'] as $key)
                   @if(Session::has($key))
                    <div class="col-md-12">
                    <div class="row">
                       <div  style="margin-bottom:3%;" class="alert alert-{{ $key }} alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        <p>{{ Session::get($key) }}</p>
                      </div>
                    </div>
                    </div>
                   @endif
                  @endforeach
            <!-- Session Flash End-->    

            <!-- Form Validation Error  -->

              @if ($errors->any())
                <div class="col-md-12">
              <div class="row">
                  <div style="margin-bottom:3%;" class="alert alert-danger alert-dismissible show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                  </div>
                </div>
                </div>
              @endif 

  <!-- Form Validation Error  -->


            <div class="card">
                <div class="card-header">Manage Edit</div>
                <?php $deleteurl = 'manage/'.$allrecord->id; ?>

                {{ Form::open(['url' =>$deleteurl, 'method' => 'PUT','id'=>$allrecord->id]) }}

                <?php echo Form::token(); ?>
                <div class="card-body">
                    <table border="1">
                        <tr><td>Name</td><td>
                           {{ Form::text('name',$allrecord->name, ['class' => 'awesome']) }}

                            </td></tr>
                        <tr><td>Description</td><td>{{ Form::text('description',$allrecord->description)}}</td></tr>
                        <tr><td>Name</td><td>{{ Form::text('datee',$allrecord->datee)}}</td></tr>
                        <tr><td colspan="2"><button type="submit" class="btn" name="submit" value="submit">Submit</button></td></tr>
                   
                      
                </table>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection