@extends('layouts.app')

@section('title')
{{ Auth::user()->name }}的个人中心
@stop

@section('style')
<style>
.wallpaper {
    height: 120px;
    background: #8A6D3B;
    color: white;
    line-height: 120px;
    font-size: 22px;
    margin-bottom: 30px;
}
</style>
@stop

@section('content')
<div class="wallpaper text-center">
    {{ Auth::user()->name }}的个人中心
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <form action="{{ route('profile.update') }}" method="POST">
                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name">用户名 <i class="required">*</i></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?: Auth::user()->name }}">

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" disabled value="{{ Auth::user()->email }}">
                </div>

                <!-- Old_password field -->
                <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                    <label for="old_password">当前密码</label>
                    <input type="password" class="form-control" name="old_password" id="old_password">

                    @if ($errors->has('old_password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('old_password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password">新密码</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <!-- Password_confirmation field -->
                <div class="form-group">
                    <label for="password_confirmation">确认密码</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                </div>

                <input type="submit" class="btn btn-danger" value="确认">
            </form>
        </div>
    </div>
</div>
@stop
