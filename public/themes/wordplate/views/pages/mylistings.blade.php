@extends('layouts.main')
@section('content')

@if (have_posts())
    @while (have_posts())
        {{ the_post() }}
        <div class="header-image support bg-dark d-flex flex-column" >
            <div class="container mt-auto">
                <h1 class="text-white display-3 text-center text-md-left">{{ $headline != '' ? $headline : the_title() }}</h1>
            </div>
        </div>
        <main role="main" class="pb-5">
            <div class="container-wide">
                <article class="support">
                    {{ the_content() }}
                </article>

                @if(count($results) > 0)
                    <hr>
                    <div class="row justify-content-between mb-4">
                        <div class="col-auto">
                            <small class="text-muted">
                                Showing {{ $numResults }} properties
                            </small>
                        </div>
                        <div class="col-auto text-md-right">
                            <sort-form field-value="{{ $currentSort }}" :search-terms='{{ $currentRequest}}' class="sort-form" ></sort-form>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($results as $miniListing)
                            <div class="col-md-6 col-lg-4 col-xl-3 mb-4 mt-1" >
                            @include('partials.minilisting')
                            </div>
                        @endforeach
                    </div>

                    <div class="pager d-flex justify-content-center my-2">
                        {{-- {!! $pagination !!} --}}
                    </div>

                    @include('partials.disclaimer')

                @else

                    <p>There were no properties found using your search criteria. Please broaden your search and try again.</p>

                @endif

            </div>

        </main>
    @endwhile
@else
    @include('pages.404')
@endif
@endsection