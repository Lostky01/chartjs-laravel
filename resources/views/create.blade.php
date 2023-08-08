@extends('app-front')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
    <section class="service-one my-5 desktop-show">
        <div class="container-fluid">
            <div class="row justify-content-left">
                <div class="col-lg-12">
                    <div class="outer-box p-3 shadow-lg rounded ">
                        <div class="block-title text-left">
                            <div class="block-title__text"><span>Input</span></div>
                        </div>
                        <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-sm-4">
                                <label for="title" class="form-label">Nama Siswa</label>
                                <textarea style="height: 218px" class="form-control" name="name">{{ old('name') }}</textarea>
                            </div>
                            <div class="col-sm-3 select-input">
                                <label for="project" class="form-label">Nama Kelas</label>
                                <select class="js-example-basic-single form-control" id="select-project" name="class">
                                    <option value="" selected disabled>Pilih Kelas</option>
                                    @foreach ($datakelas as $class)
                                        <option value="{{ $class }}">{{ $class }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="submit-button text-right responsive-button">
                                <button type="submit" class="btn btn-primary" id="tomboladd"
                                    style=" float: right; background-color: #FFB22B">+ Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js_after')
    <script src="https://cdn.tiny.cloud/1/iaklx4npf5s3iruz98j0rjkzc7j45t421qjfu97jd0fmmzvs/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea_pertanyaan, #mytextarea_jawaban'
        });

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
    </script>

    <style>
        .custom-dropify {
            width: 100%;
            height: 100%;
        }
    </style>
@endsection
