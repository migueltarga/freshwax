@extends('layouts.master')
@section('content')
<article id="home">
    <section>
        <header>
            <h1>An Open Source Label</h1>
            <h2>Built For Your Music</h2>
        </header>
        <p class="l-3c">
            <span class="c-1">
                @include('layouts.partials.brand')  will promote your music, tour, a new video, and even your label. <br />
            </span>
            <span class="c-2">
                @include('layouts.partials.brand') is built for musicians, by a musician. <br />
            </span>
            <span class="c-3">
                @include('layouts.partials.brand') is about independence. <br />
            </span>
        </p>
    </section>
    <section>
        <header>
            <h1>What is @include('layouts.partials.brand')?</h1>
        </header>
    </section>
</article>
@stop
