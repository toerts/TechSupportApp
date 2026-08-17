<h1>User Management</h1>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

@if (session('error'))
    <p>{{ session('error') }}</p>
@endif

<table border="1" cellpadding="8">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>

                <td>
                    {{ $user->role }}
                </td>

                <td>
                    @if ($user->id === auth()->id())
                        Current Account
                    @else
                        <form method="POST" action="{{ route('admin.users.updateRole', $user) }}">
                            @csrf
                            @method('PATCH')

                            <select name="role">
                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>
                                    User
                                </option>

                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>
                                    Admin
                                </option>
                            </select>

                            <button type="submit">Update</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>