@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Slider</h3>
                            <a href="{{ route('sliders.index') }}" class="btn btn-warning btn-block btn-flat btn-sm" style="float: right;width:150px;color: black;"><i class="fa fa-users"></i> Slider List</a>
                        </div>
                        <!-- /.card-header -->
                        <form method="POST" action="{{ route('sliders.update', $slider->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                @if(session('message'))
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        {{ session('message') }}
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="title" class="required">Title</label>
                                            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $slider->title) }}" required autofocus>
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="title_mr" class="required">Title In Marathi</label>
                                            <input type="text" id="title_mr" name="title_mr" class="form-control @error('title_mr') is-invalid @enderror" value="{{ old('title_mr', $slider->title_mr) }}" required>
                                            @error('title_mr')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="title_hi">Title In Hindi</label>
                                            <input type="text" id="title_hi" name="title_hi" class="form-control @error('title_hi') is-invalid @enderror" value="{{ old('title_hi', $slider->title_hi) }}">
                                            @error('title_hi')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="photo" class="required">Photo</label>
                                            <input type="file" id="photo" name="photo" class="form-control @error('photo') is-invalid @enderror">
                                            @error('photo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            @if($slider->photo)
                                                <img src="{{ asset('gallery/' . $slider->photo) }}" alt="Slider Photo" style="width: 100px; height: auto;">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="priority" class="required">Priority</label>
                                            <input type="number" id="priority" name="priority" class="form-control @error('priority') is-invalid @enderror" value="{{ old('priority', $slider->priority) }}" required>
                                            @error('priority')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="link" class="required">Slider Link</label>
                                          <input type="text" id="link" name="link" class="form-control @error('link') is-invalid @enderror" value="{{ old('link',$slider->link) }}" required>
                                          @error('link')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('script')
<script>
    $(function () {
      $.validator.setDefaults({
        submitHandler: function () {
          $('#add_slider').submit();
        }
      });
      $('#add_slider').validate({
        rules: {
          title: {
            required: true
          },
          title_mr: {
            required: true
          },
          photo: {
            required: true,
            extension: "jpg|png|jpeg|svg|webp"
          },
          priority: {
            required: true,
            number: true
          }
        },
        messages: {
          title: {
            required: "Please enter a title"
          },
          title_mr: {
            required: "Please enter a title in Marathi"
          },
          photo: {
            required: "Please select a photo",
            extension: "Please select a valid image file (jpg, png, jpeg, svg, or webp)"
          },
          priority: {
            required: "Please enter a priority",
            number: "Please enter a valid priority"
          }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
</script>
@endsection
