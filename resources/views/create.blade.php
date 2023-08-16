@extends('app-front')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
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
            background-color: #f0f4f8;
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

        .buttonadd {
            background-color: white;
            color: black;
            border-radius: 10em;
            font-size: 17px;
            font-weight: 600;
            padding: 1em 2em;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            border: 1px solid black;
            box-shadow: 0 0 0 0 black;
        }

        .buttonadd:hover {
            transform: translateY(-4px) translateX(-2px);
            box-shadow: 2px 5px 0 0 rgb(255, 102, 204);
        }

        ;

        .buttonadd:active {
            transform: translateY(2px) translateX(1px);
            box-shadow: 0 0 0 0 black;
        }

        ;

        .button {
            margin: 0;
            height: auto;
            background: transparent;
            padding: 0;
            border: none;
        }

        /* button styling */
        .button {
            --border-right: 6px;
            --text-stroke-color: rgba(255, 255, 255, 0.6);
            --animation-color: rgb(255, 102, 204);
            --fs-size: 2em;
            letter-spacing: 3px;
            text-decoration: none;
            font-size: var(--fs-size);
            border-radius: 2px;
            font-family: "Arial";
            position: relative;
            text-transform: uppercase;
            color: transparent;
            -webkit-text-stroke: 1px var(--text-stroke-color);
        }

        /* this is the text, when you hover on button */
        .hover-text {
            position: absolute;
            box-sizing: border-box;
            content: attr(data-text);
            color: var(--animation-color);
            width: 0%;
            inset: 0;
            border-right: var(--border-right) solid var(--animation-color);
            overflow: hidden;
            transition: 1.5s;
            -webkit-text-stroke: 1px var(--animation-color);
        }

        /* hover */
        .button:hover .hover-text {
            width: 100%;
            filter: drop-shadow(0 0 23px var(--animation-color))
        }

        #input {
            --input-focus: #2d8cf0;
            --font-color: #323232;
            --font-color-sub: #666;
            --bg-color: #fff;
            --main-color: #323232;
            width: 300px;
            height: 40px;
            border-radius: 5px;
            border: 2px solid var(--main-color);
            background-color: var(--bg-color);
            box-shadow: 4px 4px var(--main-color);
            font-size: 15px;
            font-weight: 600;
            color: var(--font-color);
            padding: 5px 10px;
            outline: none;
        }

        #input::placeholder {
            color: var(--font-color-sub);
            opacity: 0.8;
        }

        #input:focus {
            border: 2px solid var(--input-focus);
        }

        #select-project {
            /* --input-focus: #2d8cf0; */
            --font-color: #323232;
            --font-color-sub: #666;
            --bg-color: #fff;
            --main-color: #323232;
            width: 500px;
            height: 40px;
            border-radius: 5px;
            border: 2px solid var(--main-color);
            background-color: var(--bg-color);
            box-shadow: 4px 4px var(--main-color);
            font-size: 15px;
            font-weight: 600;
            color: var(--font-color);
            padding: 5px 10px;
            outline: none;
        }

        #select-project::placeholder {
            color: var(--font-color-sub);
            opacity: 0.8;
        }

        #select-project {
            border: 2px solid var(--input-focus);
        }

        #select-angkatan {
            /* --input-focus: #2d8cf0; */
            --font-color: #323232;
            --font-color-sub: rgb(255, 102, 204);
            --bg-color: #fff;
            --main-color: #323232;
            width: 790px;
            height: 40px;
            border-radius: 5px;
            border: 2px solid var(--main-color);
            background-color: var(--bg-color);
            box-shadow: 4px 4px var(--main-color);
            font-size: 15px;
            font-weight: 600;
            color: var(--font-color);
            padding: 5px 10px;
            outline: none;
        }

        #select-angkatan::placeholder {
            color: var(--font-color-sub);
            opacity: 0.8;
        }

        #select-angkatan {
            border: 2px solid var(--input-focus);
        }

        .buttonback {
            width: 140px;
            height: 56px;
            overflow: hidden;
            border: none;
            margin-left: 90%;
            color: #000000;
            background: none;
            position: relative;
            padding-bottom: 2em;
        }

        .buttonback>div,
        .buttonback>svg {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
        }

        .buttonback:before {
            content: "";
            position: absolute;
            height: 2px;
            bottom: 0;
            left: 0;
            width: 100%;
            transform: scaleX(0);
            transform-origin: bottom right;
            background: currentColor;
            transition: transform 0.25s ease-out;
        }

        .buttonback:hover:before {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        .buttonback .clone>*,
        .buttonback .text>* {
            opacity: 1;
            font-size: 1.3rem;
            color: 
            transition: 0.2s;
            margin-left: 4px;
        }

        .buttonback .clone>* {
            transform: translateY(60px);
        }

        .buttonback:hover .clone>* {
            opacity: 1;
            transform: translateY(0px);
            transition: all 0.2s cubic-bezier(0.215, 0.61, 0.355, 1) 0s;
        }

        .buttonback:hover .text>* {
            opacity: 1;
            transform: translateY(-60px);
            transition: all 0.2s cubic-bezier(0.215, 0.61, 0.355, 1) 0s;
        }

        .buttonback:hover .clone> :nth-child(1) {
            transition-delay: 0.15s;
        }

        .buttonback:hover .clone> :nth-child(2) {
            transition-delay: 0.2s;
        }

        .buttonback:hover .clone> :nth-child(3) {
            transition-delay: 0.25s;
        }

        .buttonback:hover .clone> :nth-child(4) {
            transition-delay: 0.3s;
        }

        /* icon style and hover */
        .buttonback svg {
            width: 20px;
            right: 0;
            top: 50%;
            transform: translateY(-50%) rotate(-50deg);
            transition: 0.2s ease-out;
        }

        .buttonback:hover svg {
            transform: translateY(-50%) rotate(-90deg);
        }
    </style>
@endsection

@section('content')
    <div class="container mt-4">
        <div class="outer-box">
            <div class="col-sm-12">
                <button class="buttonback" onclick="DataHome()">
                    <div class="text">
                        <span><strong>Back</strong></span>
                        <span><strong>to</strong></span>
                        <span><strong>top</strong></span>
                    </div>
                    <div class="clone">
                        <span><strong>Back</strong></span>
                        <span><strong>to</strong></span>
                        <span><strong>top</strong></span>
                    </div>
                    <svg width="20px" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </button>
            </div>
            <button data-text="Awesome" class="button" style="margin-left: 2%">
                <span class="actual-text">&nbsp;create&nbsp;</span>
                <span class="hover-text" aria-hidden="true">&nbsp;create&nbsp;</span>
            </button>
            <div class="inner-box">
                <div class="inner-box-specialcontent">
                    <div class="col-sm-12">
                    </div>
                    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="inner-box-specialv2">
                                    <div class="col-sm-4">
                                        <label for="title" class="form-label">
                                            <h2 style="color: black"><strong>NAMA SISWA</strong></h2>
                                        </label>
                                        <input type="text" id="input" class="form-control" name="name"
                                            class="input" value="{{ old('name') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="inner-box-specialv2">
                                    <div class="col-sm-3 select-input">
                                        <label for="title" class="form-label">
                                            <h2 style="color: black"><strong>NAMA KELAS</strong></h2></label>
                                            <select class="js-example-basic-single form-control" id="select-project"
                                                name="class">
                                                <option value="" selected disabled>Pilih Kelas</option>
                                                @foreach ($datakelas as $class)
                                                    <option value="{{ $class }}">{{ $class }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-10">
                            <div class="inner-box-specialv2" style=>
                                <div class="col-sm-3 select-input">
                                    <label for="title" class="form-label">
                                        <h2 style="color: black"><strong>ANGKATAN</strong></h2>
                                    </label>
                                    <select class="js-example-basic-single form-control" id="select-angkatan"
                                        name="angkatan">
                                        <option value="" selected disabled>Pilih Angkatan</option>
                                        @foreach ($dataangkatan as $angkatan)
                                            <option value="{{ $angkatan }}">{{ $angkatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-sm-3">
                            <div class="submit-button text-right responsive-button">
                                <button type="submit" class="buttonadd">
                                    ADD TO LIST
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_after')
    <script src="https://cdn.tiny.cloud/1/iaklx4npf5s3iruz98j0rjkzc7j45t421qjfu97jd0fmmzvs/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea_pertanyaan, #mytextarea_jawaban'
        });

        function DataHome() {
            window.location.href = "{{ route('dashboard') }}"
        }

        $("#select-project").on('change', function() {
            var id = this.value;
            console.log(id);
            $.ajax({
                method: 'get',
                url: "{{ route('getkelas', ':id') }}".replace(':id', id), // Pass the id parameter
                success: function(result) {
                    if (result.msg == 'berhasil') {
                        $('#select-domain').find('option').remove().end();
                        $('#select-domain').append(result.data);
                    } else {
                        $('#select-domain').find('option').remove().end();
                        $('#select-domain').append(result.data);
                        $('#select-domain').trigger('change');
                        $('#select-domain').select2({
                            theme: "bootstrap",
                            width: "100%"
                        });
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.responseText);
                    alert(xhr.responseText);
                }
            });
        });
        $("#select-angkatan").on('change', function() {
            var id = this.value;
            console.log(id);
            $.ajax({
                method: 'get',
                url: "{{ route('getangkatan', ':id') }}".replace(':id', id), // Pass the id parameter
                success: function(result) {
                    if (result.msg == 'berhasil') {
                        $('#select-domain').find('option').remove().end();
                        $('#select-domain').append(result.data);
                    } else {
                        $('#select-domain').find('option').remove().end();
                        $('#select-domain').append(result.data);
                        $('#select-domain').trigger('change');
                        $('#select-domain').select2({
                            theme: "bootstrap",
                            width: "100%"
                        });
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(xhr.responseText);
                    alert(xhr.responseText);
                }
            });
        });
    </script>

    <style>
        .custom-dropify {
            width: 100%;
            height: 100%;
        }
    </style>
@endsection
