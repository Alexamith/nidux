@include('welcome')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                @if (isset($country))
                <div class="card-body" >
                @foreach ( $country as $coun )
    
                    <form method="POST" action="/register-custom-country">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$coun['name']}}" required readonly>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="code" class="col-md-4 col-form-label text-md-end">Code</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{$coun['alpha2Code']}}" required readonly>

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="population" class="col-md-4 col-form-label text-md-end">Population</label>

                            <div class="col-md-6">
                                <input  type="number" class="form-control @error('population') is-invalid @enderror" id="population" name="population" value="{{$coun['population']}}" required readonly>

                                @error('population')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="demonym" class="col-md-4 col-form-label text-md-end">Demonym</label>

                            <div class="col-md-6">
                                <input  type="text" class="form-control @error('demonym') is-invalid @enderror" id="demonym" name="demonym" required autocomplete="new-demonym">

                                @error('demonym')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="population" class="col-md-4 col-form-label text-md-end">Religion</label>

                            <div class="col-md-6">
                                <select class="form-select" id="religion" name="religion" class="form-control @error('religion') is-invalid @enderror"  required>
                                    <option value="Christianity">Christianity</option>
                                    <option value="Judaism">Judaism</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Buddhism">Buddhism</option>
                                </select>

                                @error('religion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control @error('description') is-invalid @enderror"  id="description" name="description" required autocomplete="new-description">

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

 

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                @endforeach
                </div>
                @else
                <div class="alert alert-danger" role="alert">
                    Por favor seleccione un país
                </div>
                @endif


            </div>
        </div>
    </div>
</div>