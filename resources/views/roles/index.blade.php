@extends('layouts.master')


@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left text-light">

            <h2>Role Management</h2>

        </div>

        <div class="pull-right">

        @can('role-create')

            <a class="btn btn-warning" href="{{ route('roles.create') }}"> Create New Role</a>

            @endcan

        </div>

    </div>
    <hr style="height: 5px; background-color: white;">
</div>


@if ($message = Session::get('success'))

    <div class="alert alert-success">

        <p>{{ $message }}</p>

    </div>

@endif


<table class="table table-bordered bg-white">

  <tr>

     <th>No</th>

     <th>Name</th>

     <th width="280px">Action</th>

  </tr>

    @foreach ($roles as $key => $role)

    <tr>

        <td>{{ ++$i }}</td>

        <td>{{ $role->name }}</td>

        <td>

            <a class="btn btn-success" href="{{ route('roles.show',$role->id) }}">Show</a>

            @can('role-edit')

                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>

            @endcan

            @can('role-delete')

                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}

                <button class="btn btn-danger">Delete</button>

                {!! Form::close() !!}

            @endcan

        </td>

    </tr>

    @endforeach

</table>


{!! $roles->render() !!}




@endsection