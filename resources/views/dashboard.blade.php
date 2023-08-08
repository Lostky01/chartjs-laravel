@extends('app-front')

@section('content')
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
                <div class="col-md-6">
                    <h2>Import Data</h2>
                    <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="file" class="form-label">Choose Excel File</label>
                            <input type="file" class="form-control" id="file" name="file" accept=".xls, .xlsx"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <h2>Export Data</h2>
                    <a href="{{ route('export.excel') }}" class="btn btn-success">Export Excel</a>
                    <a href="{{ route('export.pdf') }}" class="btn btn-danger">Export PDF</a>
                </div>
            </div>
            <div class="container mt-4">
                <div class="row">
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
                    <div class="col-md-6">
                        <h2>Line Chart</h2>
                        <div class="card">
                            <div class="card-body">
                                <canvas id="lineChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-after')
    <!-- Include your custom JS for chart rendering -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var chartData = @json($chartData);

        var labels = chartData.map(entry => entry.class_name);
        var data = chartData.map(entry => entry.student_count);

        // Get canvas element and create the chart
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar', // You can change the chart type if needed
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Murid',
                    data: data,
                    backgroundColor: 'rgb(255,215,0)', // Adjust color as needed
                    borderColor: 'rgb(205,133,63)', // Adjust color as needed
                    borderWidth: 1
                }]
            },

            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        min: 0, 
                        max: 50, 
                        ticks: {
                            stepSize: 10 
                        }
                    }
                }
            }
        });
        var pieCtx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Murid',
                    data: data,
                    backgroundColor: 'rgb(255,215,0)',
                    borderColor: 'rgb(205,133,63)',
                    borderWidth: 1
                }]
            }
        });

        // Radar Chart
        var radarCtx = document.getElementById('radarChart').getContext('2d');
        var radarChart = new Chart(radarCtx, {
            type: 'radar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Murid',
                    data: data,
                    backgroundColor: 'rgb(255,215,0)',
                    borderColor: 'rgb(205,133,63)',
                    borderWidth: 1
                }]
            }
        });

        // Line Chart
        var lineCtx = document.getElementById('lineChart').getContext('2d');
        var lineChart = new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Murid',
                    data: data,
                    backgroundColor: 'rgb(255,215,0)',
                    borderColor: 'rgb(205,133,63)',
                    borderWidth: 1
                }]
            }
        });
    </script>
@endsection
