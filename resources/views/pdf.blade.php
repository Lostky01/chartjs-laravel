<!DOCTYPE html>
<html>
<head>
    <title>Data Export PDF</title>
</head>
<body>
    <h1>Data Export PDF</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Class</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $classNames[$item->class] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
