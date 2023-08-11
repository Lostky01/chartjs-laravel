@extends('app-front')

@section('styles')
    <style>
        .my-custom-scrollbar {
            position: inherit;
            height: 790px;
            overflow: scroll;
        }

        .table-wrapper-scroll-y {
            display: block;
        }

        body {
            font-family: 'Roboto', Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            padding: 30px;
        }

        h2 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .card {
            background-color: #f8f8f8;
            border-radius: 15px;
            /* Adjust the radius value as needed */
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            /* Adjust the shadow properties as needed */
            padding: 20px;
            margin-bottom: 20px;
            overflow: hidden;
            /* This ensures the shadow doesn't overflow */
        }

        .btn {
            border: none;
            border-radius: 6px;
            font-weight: bold;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-success {
            background-color: #28a745;
            color: #fff;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .chart-container {
            margin-top: 20px;
        }

        /* Customize scrollbars */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background-color: #f0f0f0;
        }

        ::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }



        body {
            background: linear-gradient(135deg, rgb(255, 255, 255) 0%, #ffffff 100%);
            color: rgb(24, 24, 24);
        }
           /* Outer and Inner Boxes */
           .outer-box {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .inner-box {
            background-color: #f8f8f8;
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <h2>Data</h2>
                <div class="table-container">
                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                        <table id="studentTable" class="table table-bordered table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr style="height: 0px">
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $classNames[$item->class] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group sm-6">
                        <select class="select-button form-control" id="select_project" placeholder="Pilih Project">
                            <option value="" disabled selected hidden>Pilih Kelas</option>
                            <option value="">Semua kelas</option>
                            @foreach ($list_kelas as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="col-md-6">
                        <h2>Import Data</h2>
                        <form action="{{ route('import.excel') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="file" class="form-label">Choose Excel File</label>
                                <input type="file" class="form-control" id="file" name="file"
                                    accept=".xls, .xlsx" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Import</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h2>Export Data</h2>
                        <a href="{{ route('export.excel') }}" class="btn btn-success">Export Excel</a>
                        <a href="{{ route('export.pdf') }}" class="btn btn-danger">Export PDF</a>
                    </div> --}}
                </div>
            </div>
            <div class="col-md-6">
                <h2>Charts</h2>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="circles">
                                <div class="c"></div>
                                <div class="c"></div>
                                <div class="c"></div>
                            </div>
                            <div class="browser">
                                <div class="chevrons">
                                    <svg viewBox="0 0 20 20" height="16" width="16"
                                        xmlns="http://www.w3.org/2000/svg" data-name="20" id="_20">
                                        <path transform="translate(6.25 3.75)"
                                            d="M0,6.25,6.25,0l.875.875L1.75,6.25l5.375,5.375L6.25,12.5Z" id="Fill">
                                        </path>
                                    </svg>
                                    <svg viewBox="0 0 20 20" height="16" width="16"
                                        xmlns="http://www.w3.org/2000/svg" data-name="20" id="_20">
                                        <path transform="translate(6.625 3.75)"
                                            d="M7.125,6.25,0.875,12.5,0,11.625,5.375,6.25,0,.875.875,0Z" id="Fill">
                                        </path>
                                    </svg>
                                </div>
                                <div class="search-bar">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="7.89" height="7.887"
                                        viewBox="0 0 16.89 16.887">
                                        <path id="Fill"
                                            d="M16.006,16.887h0l-4.743-4.718a6.875,6.875,0,1,1,.906-.906l4.719,4.744-.88.88ZM6.887,1.262a5.625,5.625,0,1,0,5.625,5.625A5.631,5.631,0,0,0,6.887,1.262Z"
                                            transform="translate(0.003 0)"></path>
                                    </svg>
                                    chart data
                                </div>
                            </div>
                            <div class="chart">
                                <canvas id="myChart"></canvas>
                            </div>
                            <div class="chart">
                                <canvas id="pieChart"></canvas>
                            </div>
                            <div class="chart">
                                <canvas id="radarChart"></canvas>
                            </div>
                            <div class="chart">
                                <canvas id="lineChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Repeat for other charts -->
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
                    backgroundColor: [
                        'rgb(255, 99, 132)', // Red
                        'rgb(54, 162, 235)', // Blue
                        'rgb(255, 205, 86)', // Yellow
                        'rgb(75, 192, 192)', // Teal
                        'rgb(153, 102, 255)', // Purple
                        'rgb(255, 159, 64)', // Orange
                        'rgb(0, 204, 102)', // Green
                        'rgb(255, 77, 77)', // Light Red
                        'rgb(0, 153, 153)', // Dark Teal
                        'rgb(255, 153, 204)', // Pink
                        'rgb(46, 204, 113)', // Emerald Green
                        'rgb(241, 196, 15)', // Yellow (Vibrant)
                        'rgb(52, 152, 219)', // Light Blue
                        'rgb(243, 156, 18)', // Orange (Vibrant)
                        'rgb(22, 160, 133)', // Green Sea
                        'rgb(230, 126, 34)', // Carrot Orange
                        'rgb(192, 57, 43)', // Pomegranate
                        'rgb(155, 89, 182)', // Wisteria Purple
                        'rgb(26, 188, 156)', // Turquoise
                        'rgb(41, 128, 185)', // Belize Hole Blue
                        // Add more colors here
                    ],
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
                    backgroundColor: [
                        'rgb(255, 99, 132)', // Red
                        'rgb(54, 162, 235)', // Blue
                        'rgb(255, 205, 86)', // Yellow
                        'rgb(75, 192, 192)', // Teal
                        'rgb(153, 102, 255)', // Purple
                        'rgb(255, 159, 64)', // Orange
                        'rgb(0, 204, 102)', // Green
                        'rgb(255, 77, 77)', // Light Red
                        'rgb(0, 153, 153)', // Dark Teal
                        'rgb(255, 153, 204)', // Pink
                        'rgb(46, 204, 113)', // Emerald Green
                        'rgb(241, 196, 15)', // Yellow (Vibrant)
                        'rgb(52, 152, 219)', // Light Blue
                        'rgb(243, 156, 18)', // Orange (Vibrant)
                        'rgb(22, 160, 133)', // Green Sea
                        'rgb(230, 126, 34)', // Carrot Orange
                        'rgb(192, 57, 43)', // Pomegranate
                        'rgb(155, 89, 182)', // Wisteria Purple
                        'rgb(26, 188, 156)', // Turquoise
                        'rgb(41, 128, 185)', // Belize Hole Blue
                        // Add more colors here
                    ],
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
                    backgroundColor: [
                        'rgb(255, 99, 132)', // Red
                        'rgb(54, 162, 235)', // Blue
                        'rgb(255, 205, 86)', // Yellow
                        'rgb(75, 192, 192)', // Teal
                        'rgb(153, 102, 255)', // Purple
                        'rgb(255, 159, 64)', // Orange
                        'rgb(0, 204, 102)', // Green
                        'rgb(255, 77, 77)', // Light Red
                        'rgb(0, 153, 153)', // Dark Teal
                        'rgb(255, 153, 204)', // Pink
                        'rgb(46, 204, 113)', // Emerald Green
                        'rgb(241, 196, 15)', // Yellow (Vibrant)
                        'rgb(52, 152, 219)', // Light Blue
                        'rgb(243, 156, 18)', // Orange (Vibrant)
                        'rgb(22, 160, 133)', // Green Sea
                        'rgb(230, 126, 34)', // Carrot Orange
                        'rgb(192, 57, 43)', // Pomegranate
                        'rgb(155, 89, 182)', // Wisteria Purple
                        'rgb(26, 188, 156)', // Turquoise
                        'rgb(41, 128, 185)', // Belize Hole Blue
                        // Add more colors here
                    ],
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
                    backgroundColor: [
                        'rgb(255, 99, 132)', // Red
                        'rgb(54, 162, 235)', // Blue
                        'rgb(255, 205, 86)', // Yellow
                        'rgb(75, 192, 192)', // Teal
                        'rgb(153, 102, 255)', // Purple
                        'rgb(255, 159, 64)', // Orange
                        'rgb(0, 204, 102)', // Green
                        'rgb(255, 77, 77)', // Light Red
                        'rgb(0, 153, 153)', // Dark Teal
                        'rgb(255, 153, 204)', // Pink
                        'rgb(46, 204, 113)', // Emerald Green
                        'rgb(241, 196, 15)', // Yellow (Vibrant)
                        'rgb(52, 152, 219)', // Light Blue
                        'rgb(243, 156, 18)', // Orange (Vibrant)
                        'rgb(22, 160, 133)', // Green Sea
                        'rgb(230, 126, 34)', // Carrot Orange
                        'rgb(192, 57, 43)', // Pomegranate
                        'rgb(155, 89, 182)', // Wisteria Purple
                        'rgb(26, 188, 156)', // Turquoise
                        'rgb(41, 128, 185)', // Belize Hole Blue
                        // Add more colors here
                    ],
                    borderColor: 'rgb(205,133,63)',
                    borderWidth: 1
                }]
            }
        });
        document.getElementById('select_project').addEventListener('change', function() {
            var selectedClass = this.value.toLowerCase(); // Convert to lowercase
            var tableRows = document.querySelectorAll('#studentTable tbody tr');
            tableRows.forEach(function(row) {
                var rowClass = row.querySelector('td:last-child').textContent
                    .toLowerCase(); // Convert to lowercase
                row.style.display = (selectedClass === '' || rowClass === selectedClass) ? '' : 'none';
            });
        });
    </script>
@endsection
