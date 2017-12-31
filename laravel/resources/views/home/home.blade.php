@extends('layouts.master')
@section('content')
<article id="home" class="container-fluid">
    <section class="row">
        <header class="row jumbotron">
			<h1><i class="fa fa-eye"></i> Discover</h1>
		</header>
        <div class="row">
            <div class="col-md-4">
                <p>
                    @include('layouts.partials.brand') is built for labels. <br />
                </p>
            </div>
            <div class="col-md-4">
                <p>
                    @include('layouts.partials.brand') is built for musicians. <br />
                </p>
            </div>
            <div class="col-md-4">
                <p>
                    @include('layouts.partials.brand') is built for listeners. <br />
                </p>
            </div>
        </div>
    </section>
    <!--
    <section>
        <header>
            <h1>What is @include('layouts.partials.brand')?</h1>
        </header>
    </section>
    -->
</article>
@stop
