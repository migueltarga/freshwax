@include('errors.partials.show')

<p>
{!!Form::label('name', 'Name:')!!}
{!!Form::text('name')!!}
</p>

<p>
{!!Form::label('caption', 'Caption:')!!}
{!!Form::textarea('caption')!!}
</p>

<p>
{!!Form::label('banner', 'Banner:')!!}
{!!Form::checkbox('banner')!!}

{!!Form::label('background', 'Background:')!!}
{!!Form::checkbox('background')!!} 
</p>

<p>
{!!Form::label('photo', 'Photo:')!!}
{!!Form::file('photo')!!}
</p>
