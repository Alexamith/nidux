@include('welcome')
<div class="container mt-5">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-center pt-8 sm:justify-start sm:pt-0" style=" text-align: center;">
            <img src="https://secureservercdn.net/45.40.148.234/95x.51e.myftpupload.com/wp-content/themes/nidux/assets/img/Nidux@2x.png" alt="" srcset="">
        </div>

        <form class="form-inline my-2 my-lg-0" action="/getCountryByName">
            <div class="row justify-content-md-center" >

                <div class="col-md-8  m-2">
                    <input class="form-control mr-sm-2" type="search" placeholder="Country name" id="name" name="name">
                    <button class="btn btn-outline-success mt-1" style="width: 100%;" type="submit">Search</button>
                </div>
            </div>
        </form>


    </div>
</div>

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Country</th>
                                <th scope="col">Code</th>
                                <th scope="col">Population</th>
                                <th scope="col">Region</th>
                                <th scope="col">Flag</th>
                                <th scope="col">Go</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $countriesArray as $ca )

                            <tr>
                                <th>{{ $ca['name'] }}</th>
                                <th>{{ $ca['alpha2Code'] }}</th>
                                <td>{{ $ca['population'] }}</td>
                                <td>{{ $ca['region'] }}</td>
                                <td>
                                    <img src="{{ $ca['flag'] }}" style="width: 25px;">

                                </td>
                                <td>
                                    <a href="create-country-description/{{$ca['name']}}" class="btn btn-success">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>