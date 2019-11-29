@extends('layouts/admin')

@section('heading')
    Edit User
@endsection

@section('description')
    Alter the fields to edit user.
@endsection

@section('vic-heading-icon')
    <i class="pe-7s-user icon-gradient bg-mean-fruit"></i>
@endsection

@section('content')

    {{--    Vic Displaying Errors--}}
    @include('./includes/vic-form-errors')



    <div class="row">

        <div class="col-md-3 col-lg-3">
            <a class="btn btn-primary" href="{{route('users.index')}}"><< Back to Users</a><br/><br/>
            <img height="250" width="250" style="border-radius: 5%;" src="/images/{{$user->photo ? $user->photo->file : "nothing" }}" alt="">
        </div>

        <div class="col-md-9 col-lg-9">
            <form method = "POST" action = "{{action('AdminUsersController@update', $user->id)}}" enctype="multipart/form-data">

                {{csrf_field()}}
                <input type="hidden" name="_method" value="patch">

                <div class="position-relative form-group"><label for="exampleEmail" class="">Name</label><input name= "name" value="{{old('username', $user->name)}}" id="exampleEmail" placeholder="Enter name" type="text" class="form-control"></div>
                <div class="position-relative form-group"><label for="exampleEmail" class="">Email</label><input name= "email" value="{{old('username', $user->email)}}" id="exampleEmail" placeholder="Enter email" type="email" class="form-control"></div>


                <div class="position-relative form-group"><label for="exampleSelect" class="">Role</label>
                    <select name="role_id" id="exampleSelect" class="form-control">
                        @foreach($roles as $role)
                            <option >{{$role}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="position-relative form-group"><label for="exampleSelect" class="">Status</label>
                    <select name="is_active" id="exampleSelect" class="form-control">
                        <option>0</option>
                        <option>1</option>

                    </select>
                </div>

                <div class="position-relative form-group"><label for="exampleEmail" class="">Password</label><input name="password" id="exampleEmail" placeholder="Enter password" type="password" class="form-control"></div>

                <div class="position-relative form-group">
                    <label for="exampleFile" class="">File</label>
                    <input name ="photo_id" id="exampleFile" type="file" class="form-control-file">
                </div>

                <button class="mt-1 btn btn-primary">Update User</button>
                <br><br>
            </form>
        </div>

    </div>



@endsection

