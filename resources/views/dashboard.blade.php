@extends('app-front')

@section('styles')
    <style>
        .my-custom-scrollbar {
            position: inherit;
            height: 550px;
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
            background: linear-gradient(135deg, #f5fbff 0%, #fff5ff 100%);
            color: rgb(24, 24, 24);
        }

        .main {
            display: flex;
            flex-direction: column;
            gap: 0.5em;
        }

        .up {
            display: flex;
            flex-direction: row;
            gap: 0.5em;
        }

        .down {
            display: flex;
            flex-direction: row;
            gap: 0.5em;
        }

        .card1 {
            width: 90px;
            height: 90px;
            outline: none;
            border: none;
            background: white;
            border-radius: 90px 5px 5px 5px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
            transition: .2s ease-in-out;
        }

        .instagram {
            margin-top: 1.5em;
            margin-left: 1.2em;
            fill: #cc39a4;
        }

        .card2 {
            width: 90px;
            height: 90px;
            outline: none;
            border: none;
            background: white;
            border-radius: 5px 90px 5px 5px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
            transition: .2s ease-in-out;
        }

        .twitter {
            margin-top: 1.5em;
            margin-left: -.9em;
            fill: #03A9F4;
        }

        .card3 {
            width: 90px;
            height: 90px;
            outline: none;
            border: none;
            background: white;
            border-radius: 5px 5px 5px 90px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
            transition: .2s ease-in-out;
        }

        .github {
            margin-top: -.6em;
            margin-left: 1.2em;
        }

        .card4 {
            width: 90px;
            height: 90px;
            outline: none;
            border: none;
            background: white;
            border-radius: 5px 5px 90px 5px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
            transition: .2s ease-in-out;
        }

        .discord {
            margin-top: -.9em;
            margin-left: -1.2em;
            fill: #8c9eff;
        }

        .card1:hover {
            cursor: pointer;
            scale: 1.1;
            background-color: #cc39a4;
        }

        .card1:hover .instagram {
            fill: white;
        }

        .card2:hover {
            cursor: pointer;
            scale: 1.1;
            background-color: #03A9F4;
        }

        .card2:hover .twitter {
            fill: white;
        }

        .card3:hover {
            cursor: pointer;
            scale: 1.1;
            background-color: black;
        }

        .card3:hover .github {
            fill: white;
        }

        .card4:hover {
            cursor: pointer;
            scale: 1.1;
            background-color: #8c9eff;
        }

        .card4:hover .discord {
            fill: white;
        }

        .inner-box {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
            border: 2px solid black;
            position: relative;
            z-index: 1;
            position: relative;
            font-family: Arial, Helvetica, sans-serif;
        }

        .inner-box-specialv2 {
            background-color: #2088ff;
            color: white;
            padding: 20px;
            border-radius: 10px;
            border: 2px solid black;
            position: relative;
            font-family: Arial, Helvetica, sans-serif;
            box-shadow: 10px 10px 5px rgb(255, 102, 204);
        }

        .inner-box-specialcontent {
            background-color: #ffffff;
            color: white;
            padding: 20px;
            border-radius: 10px;
            border: 2px solid black;
            position: relative;
            font-family: Arial, Helvetica, sans-serif;
            box-shadow: 7px 7px rgb(255, 102, 204);
        }

        .inner-box-special {
            background-color: #f0f0f0;
            color: white;
            padding: 20px;
            border-radius: 10px;
            position: relative;
            font-family: Arial, Helvetica, sans-serif;
            /* box-shadow: 10px 10px 5px rgb(0, 153, 255); */
        }

        .buttonedit {
            padding: 0;
            margin: 0;
            border: none;
            background: none;
        }

        .buttonedit {
            --primary-color: #111;
            --hovered-color: #c84747;
            position: relative;
            display: flex;
            font-weight: 600;
            font-size: 20px;
            gap: 0.5rem;
            align-items: center;
        }

        .buttonedit p {
            margin: 0;
            position: relative;
            font-size: 20px;
            color: var(--primary-color)
        }

        .buttonedit::after {
            position: absolute;
            content: "";
            width: 0;
            left: 0;
            bottom: -7px;
            background: var(--hovered-color);
            height: 2px;
            transition: 0.3s ease-out;
        }

        .buttonedit p::before {
            position: absolute;
            /*   box-sizing: border-box; */
            content: "Edit Table";
            width: 0%;
            inset: 0;
            color: var(--hovered-color);
            overflow: hidden;
            transition: 0.3s ease-out;
        }

        .buttonedit:hover::after {
            width: 100%;
        }

        .buttonedit:hover p::before {
            width: 100%;
        }

        .buttonedit:hover svg {
            transform: translateX(4px);
            color: var(--hovered-color)
        }

        .buttonedit svg {
            color: var(--primary-color);
            transition: 0.2s;
            position: relative;
            width: 15px;
            transition-delay: 0.2s;
        }

        .btndelete {
            background-color: transparent;
            position: relative;
            border: none;
        }

        .btndelete::after {
            content: 'delete';
            position: absolute;
            top: -130%;
            left: 50%;
            transform: translateX(-50%);
            width: fit-content;
            height: fit-content;
            background-color: rgb(168, 7, 7);
            padding: 4px 8px;
            border-radius: 5px;
            transition: .2s linear;
            transition-delay: .2s;
            color: white;
            text-transform: uppercase;
            font-size: 12px;
            opacity: 0;
            visibility: hidden;
        }

        .icon {
            transform: scale(1.2);
            transition: .2s linear;
        }

        .btndelete:hover>.icon {
            transform: scale(1.5);
        }

        .btndelete:hover>.icon path {
            fill: rgb(168, 7, 7);
        }

        .btndelete:hover::after {
            visibility: visible;
            opacity: 1;
            top: -160%;
        }

        .btndeletev2 {
            background-color: transparent;
            position: relative;
            border: none;
        }

        .btndeletev2::after {
            content: 'EDIT';
            position: absolute;
            top: -130%;
            left: 50%;
            transform: translateX(-50%);
            width: fit-content;
            height: fit-content;
            background-color: rgb(60, 147, 247);
            padding: 4px 8px;
            border-radius: 5px;
            transition: .2s linear;
            transition-delay: .2s;
            color: white;
            text-transform: uppercase;
            font-size: 12px;
            opacity: 0;
            visibility: hidden;
        }

        .iconv2 {
            transform: scale(1.2);
            transition: .2s linear;
        }

        .btndeletev2:hover>.iconv2 {
            transform: scale(1.5);
        }

        .btndeletev2:hover>.iconv2 path {
            fill: rgb(60, 147, 247);
        }

        .btndeletev2:hover::after {
            visibility: visible;
            opacity: 1;
            top: -160%;
        }
    </style>
@endsection

@section('content')
    <div class="container-mt-4">
        {{-- <div class="outer-box"> --}}
        <div class="inner-box">
            <h1><strong>MY DASHBOARD</strong></h1>
            <div class="row">
                <div class="inner-box-special">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="inner-box-specialv2">
                                <h3><strong>INFO DASHBOARD</strong></h3>
                                <p>Dashboard tentang hal hal di sekolah ini akan menampilkan jumlah siswa yang ada dan ter
                                    store ke dalam bentuk chart menggunakan chart.js, yang di fecth melalui modul laravel
                                    dan menggunakan data-based, jadi bersifat dinamis.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="inner-box-specialv2">
                                <h3><strong>ASSET USED</strong></h3>
                                <p>Website ini menggunakan berbagai macam asset untuk pemrograman nya, yang semuanya sudah
                                    dibungkus dalam framework laravel dan bootstrap beserta plugin dan library function
                                    lainnya, sehingga akan memudahkan programmer untuk mendevelop website mereka</p>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="main">
                                <div class="up">
                                    <button class="card1" onclick="instagramDirect()">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            viewBox="0,0,256,256" width="30px" height="30px" fill-rule="nonzero"
                                            class="instagram">
                                            <g fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray=""
                                                stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none"
                                                text-anchor="none" style="mix-blend-mode: normal">
                                                <g transform="scale(8,8)">
                                                    <path
                                                        d="M11.46875,5c-3.55078,0 -6.46875,2.91406 -6.46875,6.46875v9.0625c0,3.55078 2.91406,6.46875 6.46875,6.46875h9.0625c3.55078,0 6.46875,-2.91406 6.46875,-6.46875v-9.0625c0,-3.55078 -2.91406,-6.46875 -6.46875,-6.46875zM11.46875,7h9.0625c2.47266,0 4.46875,1.99609 4.46875,4.46875v9.0625c0,2.47266 -1.99609,4.46875 -4.46875,4.46875h-9.0625c-2.47266,0 -4.46875,-1.99609 -4.46875,-4.46875v-9.0625c0,-2.47266 1.99609,-4.46875 4.46875,-4.46875zM21.90625,9.1875c-0.50391,0 -0.90625,0.40234 -0.90625,0.90625c0,0.50391 0.40234,0.90625 0.90625,0.90625c0.50391,0 0.90625,-0.40234 0.90625,-0.90625c0,-0.50391 -0.40234,-0.90625 -0.90625,-0.90625zM16,10c-3.30078,0 -6,2.69922 -6,6c0,3.30078 2.69922,6 6,6c3.30078,0 6,-2.69922 6,-6c0,-3.30078 -2.69922,-6 -6,-6zM16,12c2.22266,0 4,1.77734 4,4c0,2.22266 -1.77734,4 -4,4c-2.22266,0 -4,-1.77734 -4,-4c0,-2.22266 1.77734,-4 4,-4z">
                                                    </path>
                                                </g>
                                            </g>
                                        </svg>
                                    </button>
                                    <button class="card2" onclick="twitterDirect()">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="30px"
                                            height="30px" class="twitter">
                                            <path
                                                d="M42,12.429c-1.323,0.586-2.746,0.977-4.247,1.162c1.526-0.906,2.7-2.351,3.251-4.058c-1.428,0.837-3.01,1.452-4.693,1.776C34.967,9.884,33.05,9,30.926,9c-4.08,0-7.387,3.278-7.387,7.32c0,0.572,0.067,1.129,0.193,1.67c-6.138-0.308-11.582-3.226-15.224-7.654c-0.64,1.082-1,2.349-1,3.686c0,2.541,1.301,4.778,3.285,6.096c-1.211-0.037-2.351-0.374-3.349-0.914c0,0.022,0,0.055,0,0.086c0,3.551,2.547,6.508,5.923,7.181c-0.617,0.169-1.269,0.263-1.941,0.263c-0.477,0-0.942-0.054-1.392-0.135c0.94,2.902,3.667,5.023,6.898,5.086c-2.528,1.96-5.712,3.134-9.174,3.134c-0.598,0-1.183-0.034-1.761-0.104C9.268,36.786,13.152,38,17.321,38c13.585,0,21.017-11.156,21.017-20.834c0-0.317-0.01-0.633-0.025-0.945C39.763,15.197,41.013,13.905,42,12.429">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="down">
                                    <button class="card3" onclick="githubDirect()">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30px"
                                            height="30px" class="github">
                                            <path
                                                d="M15,3C8.373,3,3,8.373,3,15c0,5.623,3.872,10.328,9.092,11.63C12.036,26.468,12,26.28,12,26.047v-2.051 c-0.487,0-1.303,0-1.508,0c-0.821,0-1.551-0.353-1.905-1.009c-0.393-0.729-0.461-1.844-1.435-2.526 c-0.289-0.227-0.069-0.486,0.264-0.451c0.615,0.174,1.125,0.596,1.605,1.222c0.478,0.627,0.703,0.769,1.596,0.769 c0.433,0,1.081-0.025,1.691-0.121c0.328-0.833,0.895-1.6,1.588-1.962c-3.996-0.411-5.903-2.399-5.903-5.098 c0-1.162,0.495-2.286,1.336-3.233C9.053,10.647,8.706,8.73,9.435,8c1.798,0,2.885,1.166,3.146,1.481C13.477,9.174,14.461,9,15.495,9 c1.036,0,2.024,0.174,2.922,0.483C18.675,9.17,19.763,8,21.565,8c0.732,0.731,0.381,2.656,0.102,3.594 c0.836,0.945,1.328,2.066,1.328,3.226c0,2.697-1.904,4.684-5.894,5.097C18.199,20.49,19,22.1,19,23.313v2.734 c0,0.104-0.023,0.179-0.035,0.268C23.641,24.676,27,20.236,27,15C27,8.373,21.627,3,15,3z">
                                            </path>
                                        </svg>
                                    </button>
                                    <button class="card4" onclick="discordDirect()">
                                        <svg height="30px" width="30px" viewBox="0 0 48 48"
                                            xmlns="http://www.w3.org/2000/svg" class="discord">
                                            <path
                                                d="M40,12c0,0-4.585-3.588-10-4l-0.488,0.976C34.408,10.174,36.654,11.891,39,14c-4.045-2.065-8.039-4-15-4s-10.955,1.935-15,4c2.346-2.109,5.018-4.015,9.488-5.024L18,8c-5.681,0.537-10,4-10,4s-5.121,7.425-6,22c5.162,5.953,13,6,13,6l1.639-2.185C13.857,36.848,10.715,35.121,8,32c3.238,2.45,8.125,5,16,5s12.762-2.55,16-5c-2.715,3.121-5.857,4.848-8.639,5.815L33,40c0,0,7.838-0.047,13-6C45.121,19.425,40,12,40,12z M17.5,30c-1.933,0-3.5-1.791-3.5-4c0-2.209,1.567-4,3.5-4s3.5,1.791,3.5,4C21,28.209,19.433,30,17.5,30z M30.5,30c-1.933,0-3.5-1.791-3.5-4c0-2.209,1.567-4,3.5-4s3.5,1.791,3.5,4C34,28.209,32.433,30,30.5,30z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8" style="">
                    <div class="inner-box-specialcontent">
                        <h2 style="color: black"><strong>CHART KELAS</strong></h2>
                        <div class="row">
                            <div class="row" style="width: 50%; height: 100%;">
                                <div class="col-md-6">
                                    <div class="chart">
                                        <canvas id="myChart" width="200" height="360"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="chart">
                                        <canvas id="pieChart" width="200" height="360"></canvas>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row" style="width: 50%; height: 90%;">
                                <div class="col-md-6">
                                    <div class="chart">
                                        <canvas id="radarChart" width="250" height="360"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="chart">
                                        <canvas id="lineChart" width="250" height="360"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="inner-box-specialcontent">
                        <h2 style="color: black"><strong>TABLE KELAS</strong></h2>
                        <div class="table-container">
                            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                <table id="studentTable" class="table table-bordered table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Angkatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr style="height: 0px">
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $classNames[$item->class] }}</td>
                                                <td>{{ $angkatanNames[$item->angkatan] }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <button class="btndeletev2"
                                                                onclick="editDirect({{ $item->id }})">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="iconv2 bi bi-pencil" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <form action="{{ route('destroy', $item->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @METHOD('DELETE')
                                                                <button class="btndelete" type="submit">
                                                                    <svg viewBox="0 0 15 17.5" height="17.5"
                                                                        width="15" xmlns="http://www.w3.org/2000/svg"
                                                                        class="icon">
                                                                        <path transform="translate(-2.5 -1.25)"
                                                                            d="M15,18.75H5A1.251,1.251,0,0,1,3.75,17.5V5H2.5V3.75h15V5H16.25V17.5A1.251,1.251,0,0,1,15,18.75ZM5,5V17.5H15V5Zm7.5,10H11.25V7.5H12.5V15ZM8.75,15H7.5V7.5H8.75V15ZM12.5,2.5h-5V1.25h5V2.5Z"
                                                                            id="Fill"></path>
                                                                    </svg>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8" style="margin-top:2%">
                    <div class="inner-box-specialcontent">
                        <h2 style="color: black"><strong>CHART ANGKATAN</strong></h2>
                        <div class="row">
                            <div class="row" style="width: 50%; height: 100%;">
                                <div class="col-md-6">
                                    <div class="chart">
                                        <canvas id="myChartAngkatan" width="200" height="360"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="chart">
                                        <canvas id="pieChartAngkatan" width="200" height="360"></canvas>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row" style="width: 50%; height: 90%;">
                                <div class="col-md-6">
                                    <div class="chart">
                                        <canvas id="radarChartAngkatan" width="250" height="360"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="chart">
                                        <canvas id="lineChartAngkatan" width="250" height="360"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

@section('js-after')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function instagramDirect() {
            window.location.href = "https://www.instagram.com/lostky77/";
        }

        function discordDirect() {
            window.location.href = "https://discordlookup.com/user/972888034813030440";
        }

        function twitterDirect() {
            window.location.href = "https://twitter.com/DRifkyx";
        }

        function githubDirect() {
            window.location.href = "https://www.github.com/Lostky01";
        }

        function editDirect(id) {
            window.location.href = "{{ route('edit', ['id' => ':id']) }}".replace(':id', id);
        }


        function DeleteData(id) {
            window.location.href = "{{ route('destroy', ['id' => ':id']) }}";
        }

        //CHART FOR CLASS
        var chartData = @json($chartData);

        var labels = chartData.map(entry => entry.class_name);
        var data = chartData.map(entry => entry.student_count);

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
        //CHART FOR ANGKATAN
        var chartDataAngkatan = @json($chartDataAngkatan);

        var labelsangkatan = chartDataAngkatan.map(entry => entry.angkatan_name);
        var dataangkatan = chartDataAngkatan.map(entry => entry.angkatan_count);

        var ctxangkatan = document.getElementById('myChartAngkatan').getContext('2d');
        var myChartAngkatan = new Chart(ctxangkatan, {
            type: 'bar', // You can change the chart type if needed
            data: {
                labels: labelsangkatan,
                datasets: [{
                    label: 'Jumlah Murid',
                    data: dataangkatan,
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
                        max: 1000,
                        ticks: {
                            stepSize: 10
                        }
                    }
                }
            }
        });
        var pieCtxangkatan = document.getElementById('pieChartAngkatan').getContext('2d');
        var pieChartAngkatan = new Chart(pieCtxangkatan, {
            type: 'pie',
            data: {
                labels: labelsangkatan,
                datasets: [{
                    label: 'Jumlah Murid',
                    data: dataangkatan,
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
        var radarCtxangkatan = document.getElementById('radarChartAngkatan').getContext('2d');
        var radarChartAngkatan = new Chart(radarCtxangkatan, {
            type: 'radar',
            data: {
                labels: labelsangkatan,
                datasets: [{
                    label: 'Jumlah Murid',
                    data: dataangkatan,
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
        var lineCtxangkatan = document.getElementById('lineChartAngkatan').getContext('2d');
        var lineChartAngkatan = new Chart(lineCtxangkatan, {
            type: 'line',
            data: {
                labels: labelsangkatan,
                datasets: [{
                    label: 'Jumlah Murid',
                    data: dataangkatan,
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
