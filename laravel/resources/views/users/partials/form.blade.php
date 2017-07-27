@include('layouts.partials.form')
@include('errors.partials.show')

<div class="input-group">
    <div class=" input-group-addon">
        {!!Form::label('name', 'Name:')!!}
    </div>
        {!!Form::text('name','', array('class'=>'form-control'))!!}
</div>

<div class="input-group">
    <div class=" input-group-addon">
    {!!Form::label('email', 'Email:')!!}
    </div>
    {!!Form::text('email','', array('class'=>'form-control'))!!}
</div>

<div class="input-group">
    <div class=" input-group-addon">
    {!!Form::label('password', 'Password:')!!}
    </div>
    {!!Form::password('password', array('class'=>'form-control'))!!}
</div>

<div class="input-group">
    <div class=" input-group-addon">
    {!!Form::label('password_confirmation', 'Confirm Password:')!!}
    </div>
    {!!Form::password('password_confirmation', array('class'=>'form-control'))!!}
</div>

@if(Auth::check() && Auth::user()->isadmin)
    <div class="input-group">
        {!!Form::label('admin', 'Admin:')!!}
        {!!Form::checkbox('admin')!!}
    </div>
@endif
