<h1>Time Logs for {{ $user->name }}</h1>

<table border="1" cellpadding="5">
  <thead>
    <tr>
      <th>Date</th>
      <th>Time In</th>
      <th>Time Out</th>
    </tr>
  </thead>
  <tbody>
    @forelse ($timeLogs as $log)
      <tr>
        <td>{{ \Carbon\Carbon::parse($log->time_in)->format('Y-m-d') }}</td>
        <td>{{ \Carbon\Carbon::parse($log->time_in)->format('h:i A') }}</td>
        <td>
          @if ($log->time_out)
            {{ \Carbon\Carbon::parse($log->time_out)->format('h:i A') }}
          @else
            <em>Still Logged In</em>
          @endif
        </td>
      </tr>
    @empty
      <tr><td colspan="3">No time logs found.</td></tr>
    @endforelse
  </tbody>
</table>

<a href="{{ route('users.index') }}">← Back to Users</a>
