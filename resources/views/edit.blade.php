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
    </style>
@endsection

@section('content')
    <div class="container mt-4">
        <div class="outer-box">
            <button data-text="Awesome" class="button" style="margin-left: 2%">
                <span class="actual-text">&nbsp;edit&nbsp;</span>
                <span class="hover-text" aria-hidden="true">&nbsp;edit&nbsp;</span>
            </button>
            <div class="inner-box">
                <div class="inner-box-specialcontent">
                    <div class="col-sm-12"></div>
                    <form action="{{ route('update', $kelas->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="inner-box-specialv2">
                                    <div class="col-md-6">
                                        <label for="title" class="form-label">
                                            <h2 style="color: black"><strong>NAMA SISWA</strong></h2>
                                        </label>
                                        <input type="text" id="input" value="{{ $kelas->name }}" name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="inner-box-specialv2">
                                    <div class="col-sm-3 select-input">
                                        <label for="title" class="form-label">
                                            <h2 style="color: black"><strong>NAMA KELAS</strong></h2>
                                        </label>
                                        <select class="js-example-basic-single form-control" id="select-project" name="class">
                                            <option value="" selected disabled>Pilih Kelas</option>
                                            @foreach ($dataKelas as $classId => $className)
                                                <option value="{{ $classId }}"
                                                    {{ $kelas->class == $classId ? 'selected' : '' }}>
                                                    {{ $className }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10 mb-3">
                                <div class="inner-box-specialv2">
                                    <div class="col-sm-3 select-input">
                                        <label for="title" class="form-label">
                                            <h2 style="color: black"><strong>ANGKATAN</strong></h2>
                                        </label>
                                        <select class="js-example-basic-single form-control" id="select-angkatan" name="angkatan">
                                            <option value="" selected disabled>Pilih Angkatan</option>
                                            @foreach ($dataAngkatan as $angkatanId => $angkatanName)
                                                <option value="{{ $angkatanId }}"
                                                    {{ $kelas->angkatan == $angkatanId ? 'selected' : '' }}>
                                                    {{ $angkatanName }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 mb-3">
                                <div class="submit-button text-right responsive-button">
                                    <button type="submit" class="buttonadd">
                                        ADD TO LIST
                                    </button>
                                </div>
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
    </script>

    <style>
        .custom-dropify {
            width: 100%;
            height: 100%;
        }
    </style>
@endsection
