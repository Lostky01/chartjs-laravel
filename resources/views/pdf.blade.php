<!DOCTYPE html>
<html>
<head>
    <title>Data Export PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1>Data Export PDF</h1>
    <table class="table-bordered">
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
                    <td>{{ $angkatanNames[$item->angkatan] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</html>
