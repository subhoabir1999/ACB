@extends('admin.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Headline List</h3>
                  <a href="{{ route('headlines.create') }}" class="btn btn-warning btn-block btn-flat btn-sm" style="float: right;width:150px;color: black;"><i class="fa fa-plus"></i> Add Headlines</a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                  @if(session('message'))
                  <div class="alert alert-success alert-dismissible">
                    <a href="javascript:" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> {{ session('message') }}
                  </div>
                  @endif
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Title</th>
                          <th>Title In Marathi</th>
                          <th>Title In Hindi</th>
                          <th>Link</th>
                          <th>File</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($headline as $headlines )
                            <tr>
                                <td>{{ $headlines->title }}</td>
                                <td>{{ $headlines->title_mr }}</td>
                                <td>{{ $headlines->title_hi }}</td>
                                <td>{{ $headlines->link }}</td>
                                <td>
                                    @if($headlines->file)
                                    <img src="{{ asset('storage/'.$headlines->file) }}" alt="Gallery Photo" style="width: 100px; height: auto;">
                                    @else
                                    No File
                                    @endif
                                </td>
                                <td>  
                                  <div class="btn-group">
                                      <button type="button" onclick="location.href='{{ route('headlines.edit', $headlines->id) }}';" class="btn btn-success btn-block btn-sm"><i class="fa fa-edit"></i></button>                           
                                      <form type="submit" method="POST" style="display: inline"
                                          action="{{ route('headlines.destroy', $headlines->id) }}"
                                          onsubmit="return confirmDelete(event)">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger btn-block btn-sm"><i class="fa fa-trash"></i></button>
                                      </form>
                                  </div>                             
                            </td>
                              </tr>
                            @endforeach
                       
                        </tbody>
                      </table>
                </div>
                
              </div>
              <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection
