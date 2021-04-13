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
                <div class="col-sm-10 mx-auto">
                    <br>
                    <div class="card border-1 shadow card-body">
                        <p class="display-4">Crear Usuario</p>
                        <form action="{{ route('users.store') }}" method="POST" style="padding: 15px">
                            <div class="row card-body">
                                @if($errors->any())
                                <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                - {{ $error }} <br>
                                @endforeach
                                </div>
                                @endif
                                <div class="col-sm-3">
                                    <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name') }}">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" name="telefono" class="form-control" placeholder="Telefono" value="{{ old('telefono') }}">
                                </div>
                                <div class="col-sm-3">
                                    <input type="password" name="password" class="form-control" placeholder="Passwrod">
                                </div>
                                <br><br>
                                <div class="col-auto">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Crear</button>
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
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->telefono }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input
                                        type="submit"
                                        value="Eliminar"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('¿Desea eliminar el usuario?')">
                                        <input
                                        type="submit"
                                        value="Modificar"
                                        class="btn btn-sm btn-success">
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
