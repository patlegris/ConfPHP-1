<div class="comment well">
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
                <time datetime="{{ $comment->updated_at }}">{{ $comment->updated_at }}</time>
            </em>
        </small>
    </div>
</div>