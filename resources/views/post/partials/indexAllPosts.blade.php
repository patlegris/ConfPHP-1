@foreach($posts as $post)
    <tr id="{{ $post->id }}" class="{{ $post->status == 'publish' ? 'info' : 'success' }}">
        @include('post.partials.showDashboard')
    </tr>
@endforeach