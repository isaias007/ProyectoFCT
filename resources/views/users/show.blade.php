@extends('layouts.master')


@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left text-white">

            <h2> Show User</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-warning" href="{{ route('users.index') }}"> Back</a>

        </div>

    </div>
    <hr style="height: 5px; background-color: white;">
</div>


<div class="mt-2 row">

    <div class="col-xs-12 col-sm-12 col-md-12 text-white">

        <div class="form-group">
            <h4>
                <strong>Name:</strong>

                {{ $user->name }}
            </h4>


        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-white">

        <div class="form-group">
            <h4>
                <strong>Email:</strong>

                {{ $user->email }}
            </h4>


        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-white">

        <div class="form-group">
            <h4>
                <strong>Roles:</strong>

                @if(!empty($user->getRoleNames()))

                @foreach($user->getRoleNames() as $v)

                <label class="badge badge-success">{{ $v }}</label>

                @endforeach

                @endif


            </h4>

        </div>

    </div>

</div>

@endsection