@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-15">
                <h2>Lista de Aprendices</h2>
                <div class="container">
                    <table id="example" class="table table-light table-striped table-hover table-bordered table-datatable"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre Completo</th>
                                <th>N° Documento</th>
                                <th>N° Ficha</th>
                                <th>Nombre Ficha</th>
                                <th>Telefono</th>
                                <th>Correo</th>
                                <th>Direccion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($aprendices as $aprendiz)
                                <tr>
                                    <td>{{ $aprendiz->id }}</td>
                                    <td>{{ $aprendiz->nombre_aprendiz }}</td>
                                    <td>{{ $aprendiz->n_documento }}</td>
                                    <td>{{ $aprendiz->n_ficha }}</td>
                                    <td class="align-top">{{ $aprendiz->nombre_ficha }}</td>
                                    <td>{{ $aprendiz->telefono }}</td>
                                    <td>{{ $aprendiz->correo }}</td>
                                    <td>{{ $aprendiz->direccion }}</td>
                                    <td><button data-bs-toggle="modal" data-bs-target="#UpdateForm{{ $aprendiz->id }}"
                                            class="btn btn-outline-warning  btn-sm">Editar</button>{{--
                                    <form action="{{route("Aprendiz.destroy",["Aprendiz"=>$aprendiz->id])}}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button onclick="return confirm('Seguro que quieres borrar?'); " type="submit" class="btn btn-outline-danger btn-sm"> Borrar </button>
                                    </form> --}}
                                        <button type="button" onclick="edit({{ $aprendiz }},)">Editar </button>
                                    </td>
                                    @include('aprendices.edit')
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="9" class="table-active">{{ __('no data available') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <button onclick="create()" class="btn btn-outline-primary">{{ __('Register') }}</button>
                </div>
                @if (session('mensaje'))
                    <div class="alert alert-{{ session('mensaje')['type'] }} alert-dismissible fade show" role="alert">
                        {{ session('mensaje')['title'] }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                @endif
                <script src="../assets/js/edit.js"></script>
            </div>
        </div>
    </div>
    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
        <script>
            new DataTable('#example');
        </script>
        <script>
            function create() {
                const formulario = `
        <form method="post" action="{{ url('Aprendiz') }}">
        @csrf
        <label for="nombre_apendiz">Nombre Completo</label>
        <input type="text" name="nombre_aprendiz" id="nombre_aprendiz" class="swal2-input" required>
        <label for="n_documento">N° de documento</label>
        <input type="number" name="n_documento" id="n_documento" class="swal2-input" required>
        <label for="n_ficha"> N° de ficha</label>
        <input type="number" name="n_ficha" id="n_ficha" class="swal2-input" required>
        <label for="nombre_ficha">Nombre de ficha</label>
        <input type="text" name="nombre_ficha" id="nombre_ficha" class="swal2-input" required>
        <label for="telefono">Telefono</label>
        <input type="text" name="telefono" id="telefono" class="swal2-input" required>
        <label for="correo">Correo</label>
        <input type="text" name="correo" id="correo" class="swal2-input" required>
        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" id="direcion" class="swal2-input" required>
        <button type="submit" class="btn btn-primary"> Registrar </button>
        </form>
        `;
                Swal.fire({
                    title: "<h2>Registro de Aprendiz</h2>",
                    icon: "info",
                    html: formulario,
                    showConfirmButton: false,
                });
            };
        </script>
    @endsection
@endsection
