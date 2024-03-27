@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit DG Message</h3>
                        </div>
                        <!-- /.card-header -->
                        <form method="POST" action="{{ route('dgmessages.update') }}" enctype="multipart/form-data" id="edit_dg_message_form">
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
                                            <label for="name" class="required">Name</label>
                                            <input type="text" id="name" name="name" class="form-control" value="{{ $dgMessage->name }}" required autofocus>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name_mr" class="required">Name (Marathi)</label>
                                            <input type="text" id="name_mr" name="name_mr" class="form-control" value="{{ $dgMessage->name_mr }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name_hi">Name (Hindi)</label>
                                            <input type="text" id="name_hi" name="name_hi" class="form-control" value="{{ $dgMessage->name_hi }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="post" class="required">Post</label>
                                            <input type="text" id="post" name="post" class="form-control" value="{{ $dgMessage->post }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="post_mr" class="required">Post (Marathi)</label>
                                            <input type="text" id="post_mr" name="post_mr" class="form-control" value="{{ $dgMessage->post_mr }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="post_hi">Post (Hindi)</label>
                                            <input type="text" id="post_hi" name="post_hi" class="form-control" value="{{ $dgMessage->post_hi }}">
                                        </div>
                                    </div>

                                    

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="about" class="required">About</label>
                                            <textarea id="about" name="about" class="form-control" required>{{ $dgMessage->about }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="about_mr" class="required">About (Marathi)</label>
                                            <textarea id="about_mr" name="about_mr" class="form-control" required>{{ $dgMessage->about_mr }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="about_hi">About (Hindi)</label>
                                            <textarea id="about_hi" name="about_hi" class="form-control">{{ $dgMessage->about_hi }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="photo">Photo</label>
                                            <input type="file" id="photo" name="photo" class="form-control">
                                            @if($dgMessage->photo)
                                            <p><img src='{{ asset("storage/$dgMessage->photo") }}'' style="width: 200px;height: 200px;"></p>
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
        $('#edit_dg_message_form').validate({
            rules: {
                name: {
                    required: true
                },
                name_mr: {
                    required: true
                },
                name_hi: {
                    // No specific rule for Hindi name
                },
                post: {
                    required: true
                },
                post_mr: {
                    required: true
                },
                post_hi: {
                    // No specific rule for Hindi post
                },
                about: {
                    required: true
                },
                about_mr: {
                    required: true
                },
                about_hi: {
                    // No specific rule for Hindi about
                },
                photo: {
                    // No specific rule for photo
                }
            },
            messages: {
                name: {
                    required: "Please enter a name"
                },
                name_mr: {
                    required: "Please enter a name in Marathi"
                },
                post: {
                    required: "Please enter a post"
                },
                post_mr: {
                    required: "Please enter a post in Marathi"
                },
                about: {
                    required: "Please enter about information"
                },
                about_mr: {
                    required: "Please enter about information in Marathi"
                },
                // Add messages for other fields
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
