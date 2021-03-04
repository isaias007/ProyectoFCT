@extends('layouts.master')


@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left text-white">

            <h2> Show Role</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-warning" href="{{ route('roles.index') }}"> Back</a>

        </div>

    </div>
    <hr style="height: 5px; background-color: white;">
</div>


<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 text-white">
        <h4>
            <div class="form-group">

                <strong>Name:</strong>

                {{ $role->name }}

            </div>
        </h4>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-white">
        <h4>
            <div class="form-group">

                <strong>Permissions:</strong>

                @if(!empty($rolePermissions))

                @foreach($rolePermissions as $v)

                <label class="label label-success">{{ $v->name }},</label>

                @endforeach

                @endif

            </div>
        </h4>

    </div>

</div>

@endsection