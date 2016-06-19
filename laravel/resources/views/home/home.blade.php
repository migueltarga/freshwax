@extends('layouts.master')
@section('content')
<article id="home">
    <section>
        <header>
            <h1>An Open Source Label</h1>
            <h2>Built For Your Music</h2>
        </header>
        <p>
            @include('layouts.partials.brand')  will promote your music, tour, a new video, and even your label. <br />
            @include('layouts.partials.brand') is built for musicians, by a musician. <br />
            @include('layouts.partials.brand') is about independence. <br />
        </p>
    </section>
    <section>
        <header>
            <h1>What is @include('layouts.partials.brand')?</h1>
        </header>
    </section>
</article>
@stop
