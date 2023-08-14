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
</head>

<body>
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
    <br><br><br><br><br><br><br>
    @yield('content')
    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include your custom JS if needed -->
    <!-- <script src="path/to/your/custom.js"></script> -->
    @yield('js-after')
</body>

<script>
    document.getElementById('importFile').addEventListener('change', function() {
        console.log("File terpanggil")
        if (this.files.length > 0) {
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
                    console.error('Error:', error);
                });
        }
    });

    document.getElementById('importButtonNavbar').addEventListener('click', function() {
        document.getElementById('importFile').click();
    });
    document.getElementById('select_project').addEventListener('change', function() {
        var selectedClass = this.value.toLowerCase();
        var tableRows = document.querySelectorAll('#studentTable tbody tr');
        tableRows.forEach(function(row) {
            var rowClass = row.querySelector('td:last-child').textContent
                .toLowerCase();
            row.style.display = (selectedClass === '' || rowClass === selectedClass) ? '' : 'none';
        });
    });
</script>

</html>
