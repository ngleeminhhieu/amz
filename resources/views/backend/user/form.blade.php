@extends('backend.master')
@section('content')
<div class="row">
    <div class="col stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="form-sample" method="POST" action="{{$action??''}}" novalidate>
                    <p class="card-description">User's Information</p>
                    @if (session('msg'))
                    <div class="col-12 alert alert-{{session('status')}}">
                        {{session('msg')}}
                    </div>
                    @endif
                    @if($errors->any())
                    <div class="col-12 alert alert-danger">
                        @foreach ($errors->all() as $er)
                        {{$er}}<br>
                        @endforeach
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">UserName</label>
                                <div class="col-sm-10">
                                    <input type="text" name="username" value="{{$item->username??old('username')}}"
                                        class="form-control">
                                </div>
                                <label class="col-sm-2 col-form-label">FullName</label>
                                <div class="col-sm-10">
                                    <input type="text" name="fullname" value="{{$item->ten??old('fullname')}}"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">IMG</label>
                                <div class="col-sm-10">
                                    <img style="padding:10px;" width="60" height="60" src="{{$item->hinh??''}}" />
                                    <input type="hidden" name="fimg" id="fimg" value="{{$item->hinh??old('fimg')}}"
                                        class="form-control">
                                    <button class="btn btn-primary" onclick="openfile('fimg')" type="button">Please
                                        choose IMG</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" value="{{$item->password??old('password')}}" name="password" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status"
                                                id="membershipRadios1" value="1" checked>Display<i
                                                class="input-helper"></i></label>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="status"
                                                id="membershipRadios2" value="0"> Hidden <i
                                                class="input-helper"></i></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @csrf
                    @method($method??'')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row float-right">
                                <a href="{{route($route.'.index')}}" class="btn btn-md btn-dark mr-2">Back</a> <button
                                    type="submit" class="btn btn-md btn-primary">{{$title}}</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
