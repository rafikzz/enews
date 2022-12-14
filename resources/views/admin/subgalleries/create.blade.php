@extends('layouts.admin.master')
@section('title')
    Gallery Management
@endsection
@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
@endsection
@section('content')
    <div class="row card card-outline card-success ">
        <div class="card-header">
            <h2 class="card-title">Add Images</h2>
            <div class="card-tools">
                <a class="btn btn-primary" id="back" href="{{ route('admin.galleries.show', $gallery->id) }}">
                    Back</a></i></a>
            </div>
        </div>
        <div class="card-body ">
            <form method="POST" action="{{ route('admin.subgalleries.store') }}" enctype="multipart/form-data"
                id="image-upload" class="dropzone">
                @csrf
                <input hidden name="gallery_id" value="{{ $gallery->id }}">

            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        Dropzone.options.imageUpload = {
            maxFilesize: 4,
            init: function() {
                // Set up any event handlers
                this.on("queuecomplete", function(file) {
                    Swal.fire({
                        title: 'Are You Done Uploading Image?',
                        text: "Go Back?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var href = $('#back').attr('href');
                            window.location.href = href;
                        }
                    });
                });
            }
        };
    </script>
@endsection
