@extends('layouts/admin')

@section('heading')
        Manage Users
    @endsection

@section('description')
        This is where you configure users.
    @endsection

@section('vic-heading-icon')
    <i class="pe-7s-user icon-gradient bg-mean-fruit"></i>
    @endsection

@section('content')
        <a class="mt-1 btn btn-primary" href="{{route('users.create')}}">Add User</a>
    <hr/>
        @if(Session::has('deleted_user'))

            <div class="alert alert-success fade show" role="alert">
                {{session('deleted_user')}}
            </div>

            @endif



  <table class="table table-striped">
              <thead>
                  <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Photo</th>
                      <th scope="col">Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Role</th>
                      <th scope="col">Status</th>
                      <th scope="col">Created</th>
                      <th scope="col">Updated</th>
                      <th scope="col">Action</th>
                      <th scope="col"></th>
                  </tr>
              </thead>

              <tbody>
              @if($users)

                  @foreach($users as $user)

                      <tr>
                          <td>{{$user->id}}</td>
                          <td><img height="50" width="50" style="border-radius: 50%" src="/images/{{$user->photo ? $user->photo->file : 'no photo'}}" alt=""></td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->role_id}}</td>
                          <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                          <td>{{$user->created_at->diffForHumans()}}</td>
                          <td>{{$user->updated_at->diffForHumans()}}</td>
                          <td>
                              <form  method="POST" action="{{action('AdminUsersController@destroy', $user->id)}}">
                                  {{csrf_field()}}
                                  <input type="hidden" name="_method" value="DELETE">
                                  <button class="btn btn-danger">Delete</button>

                              </form>

                          </td>
                          <td><a class="btn btn-primary" href="{{route('users.edit', $user->id)}}">Edit</a></td>

                      </tr>

                  @endforeach

              @endif
              </tbody>
          </table>

@endsection
