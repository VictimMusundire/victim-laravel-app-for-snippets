@extends('layouts/admin')

@section('heading')
    Create User
@endsection

@section('description')
    Fill in the fields to create user.
@endsection

@section('vic-heading-icon')
    <i class="pe-7s-user icon-gradient bg-mean-fruit"></i>
@endsection

@section('content')

    {{--    Vic Displaying Errors--}}
    @include('./includes/vic-form-errors')


        <form method = "POST" action = "{{url('/admin/users ')}}" enctype="multipart/form-data">

           @csrf
                <div class="position-relative form-group"><label for="exampleEmail" class="">Name</label><input name= "name" id="exampleEmail" placeholder="Enter name" type="text" class="form-control"></div>
                <div class="position-relative form-group"><label for="exampleEmail" class="">Email</label><input name= "email" id="exampleEmail" placeholder="Enter email" type="email" class="form-control"></div>


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

                <button class="mt-1 btn btn-primary">Submit</button>
                <br><br>
            </form>

@endsection
