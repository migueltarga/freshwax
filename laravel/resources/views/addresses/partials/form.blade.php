@include('layouts.partials.form')
@include('errors.partials.show')

	<p>
		{!!Form::label('street', 'Street:')!!}
		{!!Form::text('street')!!}
	</p>

	<p>
		{!!Form::label('street_additional', 'Street 2:')!!}
		{!!Form::text('street_additional')!!}
	</p>

	<p>
		{!!Form::label('zip', 'Zip Code:')!!}
		{!!Form::text('zip')!!}
	</p>
	<div class="row">
		<div class="six columns">
			{!!Form::label('billing', 'Billing:')!!}
			{!!Form::checkbox('billing')!!}
		</div>

		<div class="six columns">
			{!!Form::label('shipping', 'Shipping:')!!}
			{!!Form::checkbox('shipping')!!}
		</div>
	</div>
	<p>
		{!!Form::hidden('user_id', Auth::user()->id)!!}
		{!!Form::hidden('order_id', $order->id)!!}
	</p>
