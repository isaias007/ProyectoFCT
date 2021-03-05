@extends('layouts.master')


@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left text-white">

            <h2>Users Management</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-warning" href="{{ route('users.create') }}"> Create New User</a>

        </div>

    </div>
    <hr style="height: 5px; background-color: white;">
</div>


@if ($message = Session::get('success'))

<div class="alert alert-success">

    <p>{{ $message }}</p>

</div>

@endif


<table class="table bg-white table-bordered">

    <tr>

        <th>No</th>

        <th>Name</th>

        <th>Email</th>

        <th>Roles</th>

        <th width="280px">Action</th>

    </tr>

    @foreach ($data as $key => $user)

    <tr>

        <td>{{ ++$i }}</td>

        <td>{{ $user->name }}</td>

        <td>{{ $user->email }}</td>

        <td class="text-dark">

            @if(!empty($user->getRoleNames()))

            @foreach($user->getRoleNames() as $v)

            {{ $v }}

            @endforeach

            @endif

        </td>

        <td>

            <a class="btn btn-success" href="{{ route('users.show',$user->id) }}">Show</a>

            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>

            {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}

            <button class="btn btn-danger">Delete</button>

            {!! Form::close() !!}

        </td>

    </tr>

    @endforeach

</table>


{!! $data->render() !!}



@endsection