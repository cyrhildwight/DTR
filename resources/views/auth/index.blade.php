<h1>Users</h1>
<table border="1" cellpadding="5">
  <thead>
    <tr>
      <th>Name</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($users as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>
          <a href="{{ route('users.show', $user->id) }}">View History</a>
        </td>
      </tr>
    @empty
      <tr><td colspan="2">No users found.</td></tr>
    @endforelse
  </tbody>
</table>
