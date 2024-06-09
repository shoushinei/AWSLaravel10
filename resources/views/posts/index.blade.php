<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
     <x-app-layout>
     <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Index') }}
        </h2>
    </x-slot>
    <body>
       
        <h1>Blog Name</h1>
        <a href='/posts/create'>create</a>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    <p class='body'>{{ $post->body }}</p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <div class='login'>
            ログインユーザー：{{ Auth::user()->name }}
        </div>
    </body>
     </x-app-layout>
</html>