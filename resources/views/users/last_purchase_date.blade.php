<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users with Last Purchase Date</title>
</head>
<body>
<h1>Users with Last Purchase Date</h1>
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Birthdate</th>
        <th>Last Purchase Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->birthdate }}</td>
            <td>{{ $user->last_purchase_date }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
