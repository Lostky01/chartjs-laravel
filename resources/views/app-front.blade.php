<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHART LARAVEL</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        nav.navbar {
            background: linear-gradient(135deg, rgb(250, 156, 156)5) 0%, #ffffff 100%);
            color: white;
        }
    </style>

    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    @yield('styles')
    <!-- Include your custom CSS if needed -->
    <!-- <link href="path/to/your/custom.css" rel="stylesheet"> -->
    <header>
        <nav class="navbar navbar-expand-lg fixed-top bg-light navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('R.png') }}" draggable="false" height="60" />
                </a>
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto align-items-center">
                        <li class="nav-item ms-3">
                            <a class="btn btn-black btn-rounded" href="{{ route('dashboard') }}">Home</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a class="btn btn-black btn-rounded" href="{{ route('create') }}">Add new data</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a href="{{ route('export.excel') }}" class="btn btn-black btn-rounded">Export data ke
                                Excel</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a href="{{ route('export.pdf') }}" class="btn btn-black btn-rounded">Export data ke PDF</a>
                        </li>
                        <li class="nav-item ms-3">
                            <a href="#" class="btn btn-black btn-rounded" id="importButtonNavbar">Import data dari
                                Excel</a>
                            <input type="file" id="importFile" accept=".xls, .xlsx" style="display: none;">
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</head>

<body>
    <br><br><br><br><br>
    @yield('content')
    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include your custom JS if needed -->
    <!-- <script src="path/to/your/custom.js"></script> -->
    @yield('js-after')
</body>

<script>
    document.getElementById('importButtonNavbar').addEventListener('click', function() {
        document.getElementById('importFile').click();
    });

    document.getElementById('importFile').addEventListener('change', function() {
        console.log("File terpanggil")
        if (this.files.length > 1) {
            let file = this.files[0];
            let formData = new FormData();
            formData.append('file', file);

            fetch('{{ route('import.excel') }}', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                })
                .catch(error => {
                    // Handle errors
                    console.error('Error:', error);
                });
        }
    });
    
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

</html>
