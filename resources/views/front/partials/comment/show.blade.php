<p>
    <strong>
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
        {{ $comment->email }}
    </strong>
</p>

<p>
    {{ $comment->message }}
</p>

<div class="text-right">
    <small>
        <em>
            <time datetime="{{ $comment->created_at }}">{{ $comment->created_at }}</time>
        </em>
    </small>
</div>