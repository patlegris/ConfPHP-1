<div class="comment well">
    <p>
        <strong>
            {{ $comment->email }}
        </strong>
    </p>

    <p>
        {{ $comment->message }}
    </p>

    <div class="text-right">
        <small>
            <em>
                <time datetime="{{ $comment->updated_at }}">{{ $comment->updated_at }}</time>
            </em>
        </small>
    </div>
</div>