@extends('layouts.master')


@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left text-white">

            <h2>Create New User</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-warning" href="{{ route('users.index') }}"> Back</a>

        </div>

    </div>
    <hr style="height: 5px; background-color: white;">
</div>


@if (count($errors) > 0)

  <div class="alert alert-danger">

    <strong>Whoops!</strong> There were some problems with your input.<br><br>

    <ul>

       @foreach ($errors->all() as $error)

         <li>{{ $error }}</li>

       @endforeach

    </ul>

  </div>

@endif



{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 text-white">

        <div class="form-group">

            <strong>Name:</strong>

            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'ml-4 form-control')) !!}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-white">

        <div class="form-group">

            <strong>Email:</strong>

            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-white">

        <div class="form-group">

            <strong>Password:</strong>

            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-white">

        <div class="form-group">

            <strong>Confirm Password:</strong>

            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-white">

        <div class="form-group">

            <strong>Role:</strong>

            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control custom-select','multiple', )) !!}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

        <button class="mt-5 btn btn-warning">Submit</button>

    </div>

</div>

{!! Form::close() !!}



@endsection