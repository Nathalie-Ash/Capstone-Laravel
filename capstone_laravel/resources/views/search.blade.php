@if ($users->isEmpty())
    <p>No users found for "{{ $query }}".</p>
@else
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
@endif
