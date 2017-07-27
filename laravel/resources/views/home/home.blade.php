@extends('layouts.master')
@section('content')
<article id="home" class="container-fluid">
    <section class="row">
        <header class="row jumbotron">
            <h1>An Open Source Label</h1>
            <h2>Built For Your Music</h2>
        </header>
        <div class="row">
            <div class="col-md-4">
                <p>
                    @include('layouts.partials.brand')  will promote your music, tour, a new video, and even your label. <br />
                </p>
            </div>
            <div class="col-md-4">
                <p>
                    @include('layouts.partials.brand') is built for musicians, by a musician. <br />
                </p>
            </div>
            <div class="col-md-4">
                <p>
                    @include('layouts.partials.brand') is about independence. <br />
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
