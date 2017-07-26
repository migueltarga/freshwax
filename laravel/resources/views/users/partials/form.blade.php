@include('layouts.partials.form')
@include('errors.partials.show')

<p>
    {!!Form::label('name', 'Name:')!!}
    {!!Form::text('name')!!}
</p>

<p>
    {!!Form::label('email', 'Email:')!!}
    {!!Form::text('email')!!}
</p>
<p>
    {!!Form::label('password', 'Password:')!!}
    {!!Form::password('password')!!}
</p>

<p>
    {!!Form::label('password_confirmation', 'Confirm Password:')!!}
    {!!Form::password('password_confirmation')!!}
</p>

@if(Auth::check() && Auth::user()->isadmin)
    <p>
        {!!Form::label('admin', 'Admin:')!!}
        {!!Form::checkbox('admin')!!}
    </p>
@endif
