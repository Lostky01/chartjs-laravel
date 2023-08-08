<!DOCTYPE html>
<html>
<head>
    <title>Web Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Custom styling for file input */
        .custom-file-label::after {
            content: "Choose file";
        }

        .custom-file-input:focus~.custom-file-label::after {
            content: "Choose another file";
        }

        .custom-file-input:lang(en)~.custom-file-label::after {
            content: "Browse";
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">DASHBOARD</a>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <h2>Data Chart</h2>
                <div class="card">
                    <div class="card-body">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2>Data Table</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <form class="mb-3" action="{{ route('import-excel') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="fileInput" name="file" required>
                            <label class="custom-file-label" for="fileInput">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Import Excel</button>
                        </div>
                    </div>
                </form>

                <a href="{{ route('export-excel') }}" class="btn btn-success">Export to Excel</a>
                <a href="{{ route('export-pdf') }}" class="btn btn-danger">Export to PDF</a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <h2>Pie Chart</h2>
                <div class="card">
                    <div class="card-body">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2>Radar Chart</h2>
                <div class="card">
                    <div class="card-body">
                        <canvas id="radarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <h2>Line Chart</h2>
                <div class="card">
                    <div class="card-body">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Data chart statis
        var staticData = [
            { name: 'Data 1', value: 30 },
            { name: 'Data 2', value: 45 },
            { name: 'Data 3', value: 25 },
            { name: 'Data 4', value: 20 },
            { name: 'Data 5', value: 15 }
        ];

        var labels = staticData.map(item => item.name);
        var values = staticData.map(item => item.value);

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Data Values',
                    data: values,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Data for Pie Chart
        var pieData = {
            labels: labels,
            datasets: [{
                data: values,
                backgroundColor: ['red', 'green', 'blue', 'yellow', 'purple']
            }]
        };

        var ctxPie = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctxPie, {
            type: 'pie',
            data: pieData
        });

        // Data for Radar Chart
        var radarData = {
            labels: labels,
            datasets: [{
                label: 'Data Values',
                data: values,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        var ctxRadar = document.getElementById('radarChart').getContext('2d');
        var radarChart = new Chart(ctxRadar, {
            type: 'radar',
            data: radarData
        });

        // Data for Line Chart
        var lineData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Data Values',
                data: [10, 20, 15, 30, 25, 40, 35],
                fill: false,
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2
            }]
        };

        var ctxLine = document.getElementById('lineChart').getContext('2d');
        var lineChart = new Chart(ctxLine, {
            type: 'line',
            data: lineData
        });

        document.getElementById('fileInput').addEventListener('change', function() {
            var fileName = this.files[0].name;
            var label = document.getElementById('fileLabel');
            label.textContent = fileName;
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
