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
                        <p class="display-4">Editar Usuario  "{{ $user->name }}"</p>
                        <form style="padding: 15px" action="{{ route('users.update', $user->id) }}" method="POST">
                            <div class="row card-body">
                                @csrf

                                @method('put')
                                @if($errors->any())
                                <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                - {{ $error }} <br>
                                @endforeach
                                </div>
                                @endif
                                <div class="col-sm-3">
                                    <label for="name"><strong>Nombre *</strong></label>
                                    <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ $user->name }}">
                                </div>
                                <div class="col-sm-2">
                                    <label for="email"><strong>Correo electronico *</strong></label>
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                                </div>
                                <div class="col-sm-2">
                                    <label for="telefono"><strong>Tel??fono *</strong></label>
                                    <input type="text" name="telefono" class="form-control" placeholder="Telefono" value="{{ $user->telefono }}">
                                </div>
                                <div class="col-sm-3">
                                <label for="department_id"><strong>Area *</strong></label>
                                    <select class="form-select" aria-label="Default select example" name="department_id" value="{{ $user->department_id }}">
                                        <option value="{{ $user->department_id }}" select></option></option>
                                        <option value="1">Administraci??n</option>
                                        <option value="2">Mercadeo</option>
                                        <option value="3">Proyectos</option>
                                        <option value="4">Soporte</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <label for="password"><strong>Password *</strong></label>
                                    <input type="password" name="password" class="form-control" placeholder="Contrase??a">
                                </div>
                                <div class="col-auto" style="padding: 10px">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Editar</button>
                                    <a href="{{ route('index') }}" class="btn btn-default">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
