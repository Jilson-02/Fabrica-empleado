@extends('plantilla.app')

@section('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('contenido')
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">:: Ingresar Empleados ::</h3>
            </div>

            <form action="{{ url('empleado', $empleado->id) }}" method="post">
                @method('put')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Fabrica</label>
                        <select name="fabri_id">
                            @foreach ($fabrica as $item)
                                <option value="{{ $item->id }}">{{ $item->nombreFa }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="nombreEm" class="form-control" value="{{ $empleado->nombreEm }}">
                    </div>
                    <div class="form-group">
                        <input type="text" name="apellidoEm" class="form-control" value="{{ $empleado->apellidoEm }}">
                    </div>
                    <div class="form-group">
                        <input type="date" name="fecha_nacimiento" class="form-control" value="{{ $empleado->fecha_nacimiento }}">
                    </div>
                    <div class="form-group">
                        <input type="number" name="cantidadHijos" class="form-control" value="{{ $empleado->cantidadHijos }}">
                    </div>
                    <div class="form-group">
                        <input type="number" name="sueldo" class="form-control" value="{{ $empleado->sueldo }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">ACTUALIZAR</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <!-- DataTables  & Plugins -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
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
