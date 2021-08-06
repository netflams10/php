





@foreach ($posts as $post)
    {{$post->title}}
    {{ \Illuminate\Support\Str::limit($post->body) }}
    <a href="/post/{{$post->id}}">View Post Details</a>
@endforeach