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
                {{-- 
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                 --}}
            </div>

            <form action="{{ url('empleado') }}" method="post">
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
                        <input type="text" name="nombreEm" class="form-control" placeholder="Nombre del Empleado">
                    </div>
                    <div class="form-group">
                        <input type="text" name="apellidoEm" class="form-control" placeholder="Apellido del empleado">
                    </div>
                    <div class="form-group">
                        <input type="date" name="fecha_nacimiento" class="form-control" placeholder="Fecha de nacimiento">
                    </div>
                    <div class="form-group">
                        <input type="number" name="cantidadHijos" class="form-control" placeholder="Cantidad de hijos del Empleado">
                    </div>
                    <div class="form-group">
                        <input type="number" name="sueldo" class="form-control" placeholder="sueldo del empleado">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Registrar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card col-md-12">
        <div class="card-header">
            <h3 class="card-title">:: Lista de Empleados ::</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped" style="text-align: center">
                <thead>
                    <tr> 
                        <th>Item</th>
                        <th>Fabrica</th>
                        <th>Nombre del empleado</th>
                        <th>Apellido del empleado</th>
                        <th>Fecha de nacimiento</th>
                        <th>Cantidad de hijos</th>
                        <th>Sueldo</th>
                        <th colspan="2"> Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($empleado as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nombreFa }}</td>
                            <td>{{ $item->nombreEm }}</td>
                            <td>{{ $item->apellidoEm }}</td>
                            <td>{{ $item->fecha_nacimiento }}</td>
                            <td>{{ $item->cantidadHijos }}</td>
                            <td>{{ $item->sueldo}}</td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Acciones">

                                <div>
                                    <a class="btn btn-info btn-sm" href="{{ url('empleado', $item->id) }}" method="get">
                                        @csrf
                                        <i class="fas fa-pencil-alt"></i> Edit
                                    </a>
                                </div> 

                                  <div style="margin-right: 10px;"></div>

                                  <form class="delete-form" action="{{ url('empleado', $item->id) }}" method="post">
                                      @method('delete')
                                      @csrf
                                      <button class="btn btn-danger btn-sm delete-btn" type="submit">
                                          <i class="fas fa-trash"></i> Delete
                                      </button>
                                  </form>
                              </div>
                          </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    {{-- <form action="{{ route('calcularTotalVentas') }}" method="post">
        @csrf
        <label for="fecha_seleccionada">Fecha Seleccionada:</label>
        <input type="date" name="fecha_seleccionada" required>
        <button type="submit">Calcular Total Ventas</button>
    </form> --}}

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
