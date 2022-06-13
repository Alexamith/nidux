@include('welcome')
<div class="container mt-5">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="title-container text-center mb-3">
                    <h5 class="text-center" style="display: inline-block;">CRUD CUSTOM COUNTRIES</h5>
                    <a  class="btn btn-primary" href="/">
                    <i class="bi bi-plus-circle"></i>
                    </a>
                </div>
                @isset($message)
                    <div class="alert alert-success" role="alert">
                    {{$message}}
                    </div>
                @endisset
                @if (@isset($customCountry))
                    
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Code</th>
                            <th scope="col">Population</th>
                            <th scope="col">Demonym</th>
                            <th scope="col">Religion</th>
                            <th scope="col">Description</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $customCountry as $user )

                        <tr>
                            <th>{{ $user['id'] }}</th>
                            <th>{{ $user['name'] }}</th>
                            <th>{{ $user['code'] }}</th>
                            <th>{{ $user['population'] }}</th>
                            <th>{{ $user['demonym'] }}</th>
                            <th>{{ $user['religion'] }}</th>
                            <th>{{ $user['description'] }}</th>
                            <td>
                            <form action="/delete-custom-country/{{$user['id']}}" method ="POST" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>

                            <a href="/custom-country/{{$user['id']}}" class="btn btn-success">
                                 <i class="bi bi-pencil-square"></i>
                            </a>
                            

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    No hay datos
                @endif

    
            </div>
        </div>
    </div>
</div>