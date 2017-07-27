@include('layouts.partials.form')
@include('errors.partials.show')

<div class="form-group">
    {!!Form::label('name', 'Name:')!!}
    {!!Form::text('name','', array('class'=>'form-control'))!!}
</div>

<div class="form-group">
    {!!Form::label('email', 'Email:')!!}
    {!!Form::text('email','', array('class'=>'form-control'))!!}
</div>

<div class="form-group">
    {!!Form::label('password', 'Password:')!!}
    {!!Form::password('password', array('class'=>'form-control'))!!}
</div>

<div class="form-group">
    {!!Form::label('password_confirmation', 'Confirm Password:')!!}
    {!!Form::password('password_confirmation', array('class'=>'form-control'))!!}
</div>

@if(Auth::check() && Auth::user()->isadmin)
    <div class="form-group">
        {!!Form::label('admin', 'Admin:')!!}
        {!!Form::checkbox('admin')!!}
    </div>
@endif
