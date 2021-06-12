<table class="table  table-borderless table-responsive">
    <tbody>
        <tr>
            <th>
                ID
            </th>
            <td>
                {{ $user->id ?? ''}}
            </td>
            <th class="border-left">
                Roles
            </th>
            <td>
                @forelse($user->roles as $id => $role)
                    <span class="badge badge-info">{{ $role->name }}</span>
                @empty
                    <span class="badge">No Role Assigned to this user</span>
                @endforelse
            </td>
        </tr>
        <tr>
            <th>
                Name
            </th>
            <td>
                {{ $user->name ?? ''}}
            </td>
            <th class="border-left">
                Email
            </th>
            <td>
                {{ $user->email ?? ''}}
            </td>
        </tr>
        <tr >
            <th>
                Created at
            </th>
            <td>
                {{ $user->created_at->format('Y-m-d')  ?? ''}}
            </td>
        </tr>
    </tbody>
</table>
