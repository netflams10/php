






<form action="/store-posts" method="post">
    @csrf
    <input type="text" name="title" />
    <textarea name="body"></textarea>
    <button>Save Post</button>
</form>