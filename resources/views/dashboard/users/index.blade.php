@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>User Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><b>Edit</b></a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>User Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

@endsection


@section('scripts')
    <script src="admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="admin/plugins/jszip/jszip.min.js"></script>
    <script src="admin/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="admin/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script src="admin/dist/js/adminlte.min.js"></script>

    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
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