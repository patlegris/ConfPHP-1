<thead>
<tr>
    <th>Statut</th>
    <th>Email</th>
    <th>Message</th>
    <th>Conférence</th>
    <th>Date de création</th>
    <th class="text-center">Changer le statut</th>
    <th class="text-center">Supprimer</th>
</tr>
</thead>

<tbody>
@foreach($comments as $comment)
    <tr id="{{ $comment->id }}">
        @include('dashboard.partials.comment.show')
    </tr>
@endforeach
</tbody>