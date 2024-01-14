<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\inscriptions;

class inscription extends Controller
{

    public function inscrire(Request $request)
    {

        $nomPrenom = $request->input("nomprenom");
        $sexe = $request->input("sexe");
        $formation = $request->input("formation");


        if ($request->has('lp')) {
            $languages = $request->input('lp');
        } else {
            if ($request->has('web')) {
                $languages = $request->input('web');
            } else {
                $languages = "unselected";
            }
        }

        $languagesStr = implode(", ", $languages);


        $inscription = new inscriptions;
        $inscription->nomprenom = $nomPrenom;
        $inscription->sexe = $sexe;
        $inscription->typeFor = $formation;
        $inscription->languages = $languagesStr;
        $inscription->save();

        $nb = inscriptions::where('languages', $languagesStr)->where('sexe', $sexe)->get()->count();

        return view("stats", ['formation' => $formation, 'languages'=>$languagesStr ,  'sexe' => $sexe, 'nb' => $nb]);

    }

}
