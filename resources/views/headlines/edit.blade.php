@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Headline</h3>
                            <a href="{{ route('headlines.index') }}" class="btn btn-warning btn-block btn-flat btn-sm" style="float: right;width:150px;color: black;"><i class="fa fa-users"></i> Slider List</a>
                        </div>
                        <!-- /.card-header -->
                        <form method="POST" action="{{ route('headlines.update', $headline->id) }}" enctype="multipart/form-data">
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
                                            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $headline->title }}" required autofocus>
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
                                            <input type="text" id="title_mr" name="title_mr" class="form-control @error('title_mr') is-invalid @enderror" value="{{ $headline->title_mr }}" required>
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
                                            <input type="text" id="title_hi" name="title_hi" class="form-control @error('title_hi') is-invalid @enderror" value="{{ $headline->title_hi }}">
                                            @error('title_hi')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="priority" >Priority</label>
                                            <input type="number" id="priority" name="priority" class="form-control @error('priority') is-invalid @enderror" value="{{ $headline->priority }}" >
                                            @error('priority')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="link" >Headline Link</label>
                                          <input type="text" id="link" name="link" class="form-control @error('link') is-invalid @enderror" value="{{ $headline->link }}" >
                                          @error('link')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <!-- Other fields -->
                                  <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="file">File</label>
                                        
                                        <input type="file" id="file" name="file" class="form-control @error('file') is-invalid @enderror">
                                        @error('file')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        @if($headline->file)
                                            <p><a href="{{ asset('storage/' . $headline->file) }}" target="_blank">{{ $headline->file }}</a></p>
                                        @endif
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
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
          priority: {
            number: true
          },
          file: {
            extension: "pdf|doc|jpg|png|jpeg|svg|webp"
          }
        },
        messages: {
          title: {
            required: "Please enter a title"
          },
          title_mr: {
            required: "Please enter a title in Marathi"
          },
          priority: {
            number: "Please enter a valid priority"
          },
          file: {
            extension: "Please select a valid file (pdf, doc, jpg, png, jpeg, svg, or webp)"
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
