<?php

namespace App\Repository;

use Illuminate\Http\Request;
use App\Models\journalist;
use App\Models\media;
use App\Http\Requests\AddJournalistRequest;
use App\Repository\JournalistRepositoryInterface;


class JournalistRepository implements JournalistRepositoryInterface
{
    public function GetMediaId()
    {
        return media::select('id', 'nazwa')->get();
    }


    public function AddJournalist($data)
    {
        $journalist = journalist::create([
            'imie' => $data['imie'],
            'nazwisko' => $data['nazwisko'],
            'stanowisko' => $data['stanowisko'],
            'region' => $data['region'],
            'opiekun' => $data['opiekun'],
            'telefon1' => $data['telefon1'],
            'telefon2' => $data['telefon2'],
            'email1' => $data['email1'],
            'email2' => $data['email2'],
            'email3' => $data['email3'],
            'info' => $data['informacje']
        ]);

        $journalist->media()->attach($data['checklist']);

        return 'Dziennikarz: '.$data['imie'].' '.$data['nazwisko'].' został dodany';
    }


    public function GetJournalists()
    {
        return journalist::select('id', 'imie', 'nazwisko')->get();
    }


    public function GetOneJournalist($id)
    {
        return journalist::where('id', $id)->get()->first();
    }


    public function SaveJournalist($data)
    {
        $journalistEdited = journalist::find($data['id']);
        $journalistEdited->imie = $data['imie'];
        $journalistEdited->nazwisko = $data['nazwisko'];
        $journalistEdited->stanowisko = $data['stanowisko'];
        $journalistEdited->region = $data['region'];
        $journalistEdited->opiekun = $data['opiekun'];
        $journalistEdited->telefon1 = $data['telefon1'];
        $journalistEdited->telefon2 = $data['telefon2'];
        $journalistEdited->email1 = $data['email1'];
        $journalistEdited->email2 = $data['email2'];
        $journalistEdited->email3    = $data['email3'];
        $journalistEdited->info = $data['informacje'];
        if(isset($data['checklist']))
        {
            $journalistEdited->media()->sync($data['checklist']    );
        }else
        {
            $journalistEdited->medium = NULL;
        };
        $journalistEdited->save();

        return 'Dane dziennikarza: '.$data['imie'].' '.$data['nazwisko'].' zostały zaktualizowane.';
    }


    public function selectJournalists()
    {
        return  journalist::select('id', 'imie', 'nazwisko', 'region', 'opiekun')->get();
    }
}
