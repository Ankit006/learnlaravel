<x-layout>
    <x-slot name="content">
        <article>
            <h1>
                {!! $post->title !!}
            </h1>
            <p>
                By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> <a
                    href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a>
            </p>
            <div>
                {!! $post->body !!}
            </div>
        </article>

    </x-slot>
</x-layout>
