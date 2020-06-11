@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('trucks.store') }}">
        @csrf
        <div class="container">

            <div class="row">
                <div class="col-8">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h4>Pridėti naują sunkvežimį</h4>

                    <div class="alert-primary">Įveskite vieną iš automobilio markių: Volvo, VAZ, Mercedes, GAZ
                    </div>

                    <input class="form-control" name="model" value="{{ old('model') }}"
                           placeholder="Markė*"/>

                    <input type="number" class="form-control mt-3" name="manufactor_year"
                           value="{{ old('manufactor_year') }}"
                           placeholder="Gamybos metai*"/>

                    <input class="form-control mt-3" name="owner_name_surname"
                           value="{{ old('owner_name_surname') }}"
                           placeholder="Savininko vardas pavardė*"/>

                    <input type="number" class="form-control mt-3" name="owners_amount" value="{{ old('owners_amount') }}"
                           placeholder="Savininkų skaičius"/>

                    <input class="form-control mt-3" name="comments" value="{{ old('comments') }}"
                           placeholder="Komentarai"/>

                    <div class="mt-2">* būtini laukai</div>

                    <input type="submit" class="btn btn-success mt-3"/>

                </div>

            </div>
        </div>
    </form>

@endsection


