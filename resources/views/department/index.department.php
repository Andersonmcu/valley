<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Crud Valley</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 mx-auto">
                    <br>
                    <div class="card border-1 shadow card-body">
                        <p class="display-4">Crear Usuario</p>
                        <form action="{{ route('department.store') }}" method="POST" style="padding: 15px">
                            <div class="row card-body">
                                @if($errors->any())
                                <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                - {{ $error }} <br>
                                @endforeach
                                </div>
                                @endif
                                <div class="col-sm-3">
                                    <label for="name"><strong>Nombre *</strong></label>
                                    <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name') }}">
                                </div>
                                <div class="col-sm-2">
                                    <label for="email"><strong>Correo electronico *</strong></label>
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                </div>
                                <div class="col-sm-2">
                                    <label for="telefono"><strong>Teléfono *</strong></label>
                                    <input type="text" name="telefono" class="form-control" placeholder="Telefono" value="{{ old('telefono') }}">
                                </div>
                                <div class="col-sm-3">
                                <label for="department_id"><strong>Area *</strong></label>
                                    <select class="form-select" aria-label="Default select example" name="department_id" value="{{ old('department_id') }}">
                                        <option value="1">Administración</option>
                                        <option value="2">Mercadeo</option>
                                        <option value="3">Proyectos</option>
                                        <option value="4">Soporte</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="password"><strong>Password *</strong></label>
                                    <input type="password" name="password" class="form-control" placeholder="Contraseña">
                                </div>
                                <div class="col-auto" style="padding: 10px">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table shadow">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Area</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($department as $area)
                            <tr>

                                <td>{{ $area->department_id }}</td>
                                <td>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <input type="submit" value="Eliminar" class="btn btn-sm btn-danger" onclick="return confirm('¿Desea eliminar el usuario?')">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
