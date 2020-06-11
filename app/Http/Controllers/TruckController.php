<?php

namespace App\Http\Controllers;

use App\Rules\ModelName;
use App\Rules\OwnerNameSurname;
use App\Rules\ManufactorYear;
use App\Truck;
use Illuminate\Http\Request;

class TruckController extends Controller
{
    public function index()
    {
        $trucks = Truck::all();

        $trucks = Truck::sortable()->paginate(20);

        return view('trucks.index', compact('trucks'));
    }

    public function create()
    {
        $trucks = Truck::all();

        return view('trucks.create', compact('trucks'));

    }

    public function store(Request $request)
    {
        $trucks = new Truck();
        $trucks->model = $request->input('model');
        $trucks->manufacter_year = $request->input('manufacter_year');
        $trucks->owner_name_surname = $request->input('owner_name_surname');
        $trucks->owners_amount = $request->input('owners_amount');
        $trucks->comments = $request->input('comments');

        session()->flash('message', 'Sunkvežimis sėkmingai pridėtas');

        $request->validate([
            'model' => ['required', new ModelName()],
            'manufacter_year' =>  ['required', new ManufactorYear],
            'owner_name_surname' => ['required', new OwnerNameSurname],
        ]);

        $trucks->save();

        return redirect()->route('trucks.index');
    }

}

