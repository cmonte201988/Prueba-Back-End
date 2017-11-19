@extends('layouts.web')

@section('style-custom')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
@endsection

@section('script-custom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script> 

    <script>
        $(document).ready(function(){
            //--
            $("#skill").select2({
                tags: true,
                tokenSeparators: [',', ' ']
            });
            //--
            $("#form-employee").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    age: {
                        number: true
                    },
                },
                messages: {
                    name: {
                        required: "The name is required",
                        minlength: "At least the name must have 5 characters",
                    },
                    email: {
                        required: "The email is required",
                        email: "The email is invalid"
                    },
                    age: {
                        number: "The age is invalid"
                    },
                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    error.addClass( "help-block" );
                    error.insertAfter( element );
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
                },
            });
        });
    </script>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h4>@if(!is_null($id)) Edit @else New @endif Employee</h4>
                <div class="pull-right">
                    <a href="{{ route('employee.index') }}" class="btn btn-warning btn-sm">back to list</a>                 
                </div>
            </div>
            <div class="ibox-content">
            {!! Form::model($employee, ['files'=>'true', 'method'=>'post', 'class' => '', 'id' => 'form-employee', 'route' => 'employee.proccess']) !!}
            {!! Form::hidden('id_user',  $id) !!} 
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group has-error">
                        @if($errors->any())
                        <ul class="containerErrorMessages">
                            @foreach($errors->all() as $error)
                            <li class="form-group has-error help-block">{{$error}}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <fieldset>
                        <legend>Información General</legend>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="font-normal">Name <span style="color:red">*</span></label>
                                    {!! Form::text('name', null , ['class' => 'form-control required', 'id' => 'name', 'maxlength' => '250']) !!}
                                </div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-group">
                                            <label for="name" class="font-normal">Position</label>
                                            {!! Form::text('position', null , ['class' => 'form-control', 'id' => 'position', 'maxlength' => '250']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="name" class="font-normal">Salary ($)</label>
                                            {!! Form::text('salary', null , ['class' => 'form-control', 'id' => 'salary', 'maxlength' => '11']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="name" class="font-normal">Is online</label>
                                            {!! Form::select('isOnline', ['INACTIVE', 'ACTIVE'], null , ['class' => 'form-control', 'id' => 'isOnline']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="name" class="font-normal">Age</label>
                                            {!! Form::text('age', null , ['class' => 'form-control', 'id' => 'age', 'maxlength' => '2']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="font-normal">Address </label>
                                    {!! Form::text('address', null , ['class' => 'form-control ', 'id' => 'address', 'maxlength' => '250']) !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="font-normal">Email <span style="color:red">*</span></label>
                                    {!! Form::text('email', null , ['class' => 'form-control required', 'id' => 'email', 'maxlength' => '250']) !!}
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name" class="font-normal">Gender</label>
                                            {!! Form::select('gender', ['male' => 'MALE', 'female' => 'FEMALE'], null , ['class' => 'form-control', 'id' => 'gender']) !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="name" class="font-normal">Phone</label>
                                            {!! Form::text('phone', null , ['class' => 'form-control', 'id' => 'phone', 'maxlength' => '24']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="font-normal">Skills </label>
                                    {!! Form::select('skill[]', $listSkills, $listSkills, ['class' => 'form-control', 'id' => 'skill', 'multiple']) !!}
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>

            <div class="row">
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="text-center">
                            <button class="btn btn-success btn-sm" id="btn-register" type="submit"><i class="fa fa-fw fa-save"></i> Save Information</button>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection