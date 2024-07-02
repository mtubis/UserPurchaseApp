<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Sorted by Birthday</title>
</head>
<body>
<h1>Users Sorted by Birthday</h1>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Birthdate</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->birthdate->format('d-m-Y') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
