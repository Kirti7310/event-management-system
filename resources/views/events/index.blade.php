<!DOCTYPE html>
<html>
<head>
    <title>Event Management</title>
</head>
<body>
    <h1>Event List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Date</th>
        </tr>
        @foreach($events as $event)
        <tr>
            <td>{{ $event->id }}</td>
            <td>{{ $event->title }}</td>
            <td>{{ $event->Descriptions }}</td>
            <td>{{ $event->date }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
