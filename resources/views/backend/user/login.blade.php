<!DOCTYPE html>
<html lang="en">
<head>
    @include('backend.widgets.head')
</head>
<body>
    <div style="background-color: whitesmoke;" class="container-fluid">
        <div  class="container-scroller page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div style="background-color: pink;" class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <h4>AMz! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            @if (session('msg'))
                            <div class="col-12 alert alert-{{session('status')}}">
                                {{session('msg')}}
                            </div>
                            @endif
                        <form class="pt-3 needs-validation" method="post"  action="{{route('b.loginpost')}}" novalidate>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-account-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="username" id="username" class="form-control form-control-lg border-left-0"
                                            placeholder="Username">
                                            @error('username')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                                </div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend bg-transparent">
                                            <span class="input-group-text bg-transparent border-right-0">
                                                <i class="mdi mdi-lock-outline text-primary"></i>
                                            </span>
                                        </div>
                                        <input type="password" name="password" id="password"
                                            class="form-control form-control-lg border-left-0"
                                            placeholder="Password">
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                                </div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="mt-4">
                                    @csrf
                                    <input type="submit"
                                        class="btn btn-block btn-info btn-lg font-weight-medium auth-form-btn" value="SIGN IN">

                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" name="remember" value="1" class="form-check-input">
                                            Keep me signed in
                                        </label>
                                    </div>
                                    <a href="#" class="auth-link text-black">Forgot password?</a>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Don't have an account? <a href="register.html" class="text-primary">Create</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.widgets.js')
</body>
</html>
