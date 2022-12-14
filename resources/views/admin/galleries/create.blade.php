@extends('layouts.admin.master')
@section('title')
    Gallery Management
@endsection
@section('content')
    <div class="row card card-outline card-success ">
        <div class="card-header">
            <h2 class="card-title">Add Gallery</h2>
            <div class="card-tools">
                <a class="btn btn-primary" href="{{ route('admin.galleries.index') }}"> Back</a></i></a>
            </div>
        </div>
        <div class="card-body col-6">
            <form method="POST" action="{{ route('admin.galleries.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group">
                        <label class="label" for="title">Gallery Title</label>
                        <input type="text" name="title" value="{{ old('title') }}"
                            class="form-control  @error('title') is-invalid @enderror" minlength="3"
                            placeholder="Enter Title" required>
                        @error('title')
                            <span class=" text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group  d-flex">
                        <div class="col-md-6">
                            <label for="exampleInputFile">Upload Image</label>
                            <div class="input-group ">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="image" required>
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img id="preview-image-before-upload" src="{{ asset('image/noimgavialable.png') }}"  width="150">
                        </div>
                    </div>
                    @error('image')
                    <span class=" text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary  mt-3">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
<script type="text/javascript">

    $(document).ready(function (e) {
        bsCustomFileInput.init();

       $('#image').change(function(){

        let reader = new FileReader();

        reader.onload = (e) => {

          $('#preview-image-before-upload').attr('src', e.target.result);
        }

        reader.readAsDataURL(this.files[0]);

       });

    });

    </script>
@endsection
