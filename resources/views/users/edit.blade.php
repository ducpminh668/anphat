@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Đổi mật khẩu</h5>

    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <form action="{{route('users.update', $user->id)}}" method="post">
                    @csrf
                    @method('put')
                    <fieldset class="mb-3">

                        <div class="form-group row"><label class="col-md-2 col-form-label">Mật khẩu</label>
                            <div class="col-md-12">
                                <input name="password" id="password" type="password" name="password" placeholder="Mật khẩu" class="form-control">
                                @error('password')
                                <span class="form-text text-warning">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </fieldset>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@stop