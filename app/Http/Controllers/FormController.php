<?php

namespace App\Http\Controllers;

use App\Http\Requests\Rules;
use App\Models\Client;
use App\Exports\MyExcelExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class FormController extends Controller
{
    public function Submit(Rules $request)
    {
        $clientList = DB::table('clients')
            ->where('surname', '=', $request->input('surname'))
            ->where('name', '=', $request->input('name'))
            ->where('otch', '=', $request->input('otch'))
            ->where('snils', '=', $request->input('snils'))
            ->get();
        if ($clientList->first() != null) {
            $client = Client::find($clientList->first()->id);
            $client->polis = $request->input('polis');
            $client->save();
            return 'Polis changed';
        }

        $clientList2 = DB::table('clients')
            ->where('snils', '=', $request->input('snils'))
            ->get();
        if ($clientList2->first() != null) {
            $client = Client::find($clientList2->first()->id);
            $client->surname = $request->input('surname');
            $client->name = $request->input('name');
            $client->otch = $request->input('otch');
            $client->birthdate = $request->input('birthdate');
            $client->polis = $request->input('polis');
            $client->save();
            return 'FIO polis changed';
        }


        $client = new Client;
        $client->surname = $request->input('surname');
        $client->name = $request->input('name');
        $client->otch = $request->input('otch');
        $client->birthdate = $request->input('birthdate');
        $client->snils = $request->input('snils');
        $client->polis = $request->input('polis');

        if ($client->save()) {
            return 'Saved';
        } else
            return redirect()->route('home');
    }

    public function Search(Request $request)
    {
        $a = $request->except('_token');
        $b = false;
        foreach ($a as $element) {
            if ($element != null) {
                $b = true;
            }
        }
        if ($b) {
            $client = DB::table('clients')
                ->select('*')
                ->where("surname", "LIKE", $a['surname'] . "%")
                ->where("name", "LIKE", $a['name'] . "%")
                ->where("otch", "LIKE", $a['otch'] . "%")
                ->where("birthdate", "LIKE", $a['birthdate'])
                ->where("snils", "LIKE", $a['snils'] . "%")
                ->where("polis", "LIKE", $a['polis'])
                ->get();
            return json_encode($client);
        } else {
            return 'empty';
        }
    }

    public function export()
    {
        return Excel::download(new MyExcelExport, 'clients.xlsx');
    }
}
