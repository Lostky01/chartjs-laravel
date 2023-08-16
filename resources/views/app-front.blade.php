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

        .buttonhovered {
            align-items: center;
            background-color: transparent;
            color: #000000;
            cursor: pointer;
            display: flex;
            font-family: ui-sans-serif, system-ui, -apple-system, system-ui, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 1rem;
            font-weight: 700;
            line-height: 1.5;
            text-decoration: none;
            text-transform: uppercase;
            outline: 0;
            border: 0;
            padding: 1rem;
        }

        .buttonhovered:before {
            background-color: rgb(213, 39, 39);
            content: "";
            display: inline-block;
            height: 1px;
            margin-right: 10px;
            transition: all .42s cubic-bezier(.25, .8, .25, 1);
            width: 0;
        }

        .buttonhovered:hover:before {
            background-color: #000000;
            width: 3rem;
        }

        .toggleWrapper {
            position: absolute;
            top: 50%;
            left: 50%;
            overflow: hidden;
            padding: 0 200px;
            transform: translate3d(-50%, -50%, 0);
            color: white;
        }

        .toggleWrapper input {
            position: absolute;
            left: -99em;
        }

        .toggle {
            cursor: pointer;
            display: inline-block;
            position: relative;
            width: 90px;
            height: 50px;
            background-color: #83d8ff;
            border-radius: 84px;
            transition: background-color 200ms cubic-bezier(0.445, 0.05, 0.55, 0.95);
        }

        .toggle:before {
            content: 'AM';
            position: absolute;
            left: -50px;
            top: 15px;
            font-size: 18px;
        }

        .toggle:after {
            content: 'PM';
            position: absolute;
            right: -48px;
            top: 15px;
            font-size: 18px;
            color: #749ed7;
        }

        .toggle__handler {
            display: inline-block;
            position: relative;
            z-index: 1;
            top: 3px;
            left: 3px;
            width: 44px;
            height: 44px;
            background-color: #ffcf96;
            border-radius: 50px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, .3);
            transition: all 400ms cubic-bezier(0.68, -0.55, 0.265, 1.55);
            transform: rotate(-45deg);
        }

        .toggle__handler .crater {
            position: absolute;
            background-color: #e8cda5;
            opacity: 0;
            transition: opacity 200ms ease-in-out;
            border-radius: 100%;
        }

        .toggle__handler .crater--1 {
            top: 18px;
            left: 10px;
            width: 4px;
            height: 4px;
        }

        .toggle__handler .crater--2 {
            top: 28px;
            left: 22px;
            width: 6px;
            height: 6px;
        }

        .toggle__handler .crater--3 {
            top: 10px;
            left: 25px;
            width: 8px;
            height: 8px;
        }

        .star {
            position: absolute;
            background-color: #fff;
            transition: all 300ms cubic-bezier(0.445, 0.05, 0.55, 0.95);
            border-radius: 50%;
        }

        .star--1 {
            top: 10px;
            left: 35px;
            z-index: 0;
            width: 30px;
            height: 3px;
        }

        .star--2 {
            top: 18px;
            left: 28px;
            z-index: 1;
            width: 30px;
            height: 3px;
        }

        .star--3 {
            top: 27px;
            left: 40px;
            z-index: 0;
            width: 30px;
            height: 3px;
        }

        .star--4,
        .star--5,
        .star--6 {
            opacity: 0;
            transition: all 300ms 0 cubic-bezier(0.445, 0.05, 0.55, 0.95);
        }

        .star--4 {
            top: 16px;
            left: 11px;
            z-index: 0;
            width: 2px;
            height: 2px;
            transform: translate3d(3px, 0, 0);
        }

        .star--5 {
            top: 32px;
            left: 17px;
            z-index: 0;
            width: 3px;
            height: 3px;
            transform: translate3d(3px, 0, 0);
        }

        .star--6 {
            top: 36px;
            left: 28px;
            z-index: 0;
            width: 2px;
            height: 2px;
            transform: translate3d(3px, 0, 0);
        }

        input:checked+.toggle {
            background-color: #749dd6;
        }

        input:checked+.toggle:before {
            color: #749ed7;
        }

        input:checked+.toggle:after {
            color: #fff;
        }

        input:checked+.toggle .toggle__handler {
            background-color: #ffe5b5;
            transform: translate3d(40px, 0, 0) rotate(0);
        }

        input:checked+.toggle .toggle__handler .crater {
            opacity: 1;
        }

        input:checked+.toggle .star--1 {
            width: 2px;
            height: 2px;
        }

        input:checked+.toggle .star--2 {
            width: 4px;
            height: 4px;
            transform: translate3d(-5px, 0, 0);
        }

        input:checked+.toggle .star--3 {
            width: 2px;
            height: 2px;
            transform: translate3d(-7px, 0, 0);
        }

        input:checked+.toggle .star--4,
        input:checked+.toggle .star--5,
        input:checked+.toggle .star--6 {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }

        input:checked+.toggle .star--4 {
            transition: all 300ms 200ms cubic-bezier(0.445, 0.05, 0.55, 0.95);
        }

        input:checked+.toggle .star--5 {
            transition: all 300ms 300ms cubic-bezier(0.445, 0.05, 0.55, 0.95);
        }

        input:checked+.toggle .star--6 {
            transition: all 300ms 400ms cubic-bezier(0.445, 0.05, 0.55, 0.95);
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
                        <button class="buttonhovered" onclick="DataHome();">
                            Home
                        </button>
                        <button class="buttonhovered" onclick="CreateData();">
                            Create new data
                        </button>
                        <button class="buttonhovered" onclick="ExportExcel();">
                            Export data to excel
                        </button>
                        <button class="buttonhovered" onclick="ExportPdf();">
                            Export data to pdf
                        </button>
                        <button class="buttonhovered" id="importButtonNavbar">
                            <input type="file" id="importFile" accept=".xls, .xlsx" style="display: none;">
                            Import data from excel
                        </button>
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
    function DataHome() {
        window.location.href = "{{ route('dashboard') }}"
    }

    function CreateData() {
        window.location.href = "{{ route('create') }}";
    }

    function ExportExcel() {
        window.location.href = "{{ route('export.excel') }}";
    }

    function ExportPdf() {
        window.location.href = "{{ route('export.pdf') }}";
    }
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
