@extends('layout')

@section('content')

    @foreach ($posts as $post)

        <article>
            <h1>
                <a href="/post/{{ $post->id }}">
                    {!! $post->title !!}
                </a>
            </h1>
            <p>
                By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> <a
                    href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a>
            </p>
            <div>
                {{ $post->excerpt }}
            </div>
        </article>
    @endforeach

@endsection
