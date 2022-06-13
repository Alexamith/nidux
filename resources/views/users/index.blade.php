@include('welcome')
<div class="container mt-5">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="title-container text-center mb-3">
                    <h5 class="text-center" style="display: inline-block;">CRUD USERS</h5>
                    <a  class="btn btn-primary" href="new-user">
                    <i class="bi bi-plus-circle"></i>
                    </a>
                </div>
                @isset($message)
                    <div class="alert alert-success" role="alert">
                    {{$message}}
                    </div>
                @endisset
                @if (@isset($users))
                    
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $users as $user )

                        <tr>
                            <th>{{ $user['id'] }}</th>
                            <th>{{ $user['name'] }}</th>
                            <th>{{ $user['email'] }}</th>
                            <td>
                            <form action="delete-user/{{$user['id']}}" method ="POST" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>

                            <a href="user/{{$user['id']}}" class="btn btn-success">
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