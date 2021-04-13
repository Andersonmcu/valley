<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Crud Nexura</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 mx-auto">
                    <br>
                    <div class="card border-0 shadow">
                        <form action="{{ route('users.store') }}" method="POST">
                            <div class="form-row">
                                <div class="col-sm-4">
                                    <input type="text" name="name" class="form-control" placeholder="Nombre">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" name="telefono" class="form-control" placeholder="Telefono">
                                </div>
                                <div class="col-sm-4">
                                    <input type="password" name="password" class="form-control" placeholder="Passwrod">
                                </div>
                                <br>
                                <div class="col-auto">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Crear</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table">
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
