<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
<h1>Home</h1>
<ul>
    <li><a href="{{ route('users.last_purchase_date') }}">Users with Last Purchase Date</a></li>
    <li><a href="{{ route('users.sorted_by_birthday') }}">Users Sorted by Birthday</a></li>
    <li><a href="{{ route('users.birthdays_this_week') }}">Users with Birthdays This Week</a></li>
</ul>
</body>
</html>
