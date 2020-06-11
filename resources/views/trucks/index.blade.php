@extends('layouts.app')

@section('content')

    <head>
        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
        <script src="https://unpkg.com/isotope-layout@3.0.6/dist/isotope.pkgd.min.js"></script>
        <title></title>
    </head>

    <div class="container">
        <div class="row">
            <div class="text-center">
                <h1>Sunkvežimiai</h1>
            </div>
        </div>

        <div class="row">

            <div class="form-group mr-2">
                <select name="filter_model" id="filter_model" class="form-control" required>
                    <option value="marke">Pasirinkite markę</option>
                    @foreach($trucks as $truck)
                        <option value="{{ $truck->model }}">{{ $truck->model }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mr-2">
                <select name="filter_manufactor_year" id="filter_manufactor_year" class="form-control" required>
                    <option value="metai">Pasirinkite gamybos metus</option>
                    @foreach($trucks as $truck)
                        <option value="{{ $truck->manufactor_year }}">{{ $truck->manufactor_year }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mr-2">
                <select name="filter_owner_name_surname" id="filter_owner_name_surname" class="form-control" required>
                    <option value="savininkai">Pasirinkite savininką</option>
                    @foreach($trucks as $truck)
                        <option value="{{ $truck->owner_name_surname }}">{{ $truck->owner_name_surname }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mr-2">
                <select name="filter_owners_amount" id="filter_owners_amount" class="form-control" required>
                    <option value="savininku_skaicius">Pasirinkite savininkų skaičių</option>
                    @foreach($trucks as $truck)
                        <option value="{{ $truck->owners_amount }}">{{ $truck->owners_amount }}</option>
                    @endforeach
                </select>
            </div>

            <form class="form-group" align="center"
                  action="{{ action('CustomSearchController@index') }}" method="POST">
                @csrf
                <button type="button" name="filter" id="filter" class="btn btn-info">Filtruoti</button>
                <button type="button" name="reset" id="reset" class="btn btn-danger">Atšaukti</button>
            </form>

            <table class="col-sm-12 table table-bordered grid">
                <tr>
                    <th>@sortablelink('Markė')</th>
                    <th>@sortablelink('Gamybos metai')</th>
                    <th>@sortablelink('Savininko vardas pavardė')</th>
                    <th>@sortablelink('Savininkų skaičius')</th>
                    <th>@sortablelink('Komentarai')</th>
                </tr>

                @if($trucks->count())
                    @foreach($trucks as $truck)
                        <tr>
                            <td class="grid-item">{{ $truck->model }}</td>
                            <td>{{ $truck->manufactor_year }}</td>
                            <td>{{ $truck->owner_name_surname }}</td>
                            <td>{{ $truck->owners_amount }}</td>
                            <td>{{ $truck->comments }}</td>
                        </tr>
                    @endforeach
                @endif
            </table>
            {!! $trucks->appends(\Request::except('page'))->render() !!}
        </div>
    </div>

@endsection
