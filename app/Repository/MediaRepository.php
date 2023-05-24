<?php

namespace App\Repository;

use Illuminate\Http\Request;
use App\Models\media;
use App\Http\Requests\AddMediaRequest;
use App\Repository\MediaRepositoryInterface;


class MediaRepository implements MediaRepositoryInterface
{

    private media $mediaModel;

    public function __construct(media  $mediaClass)
    {
        $this->mediaModel = $mediaClass;
    }

    public function create($data)
    {
        $media = $this->mediaModel::create([
            'nazwa' => $data['nazwa'],
            'region' => $data['region'],
            'miasto' => $data['miasto'],
            'ulica' => $data['ulica'],
            'kod' => $data['kod_pocztowy'],
            'strona' => $data['strona'],
            'telefon1' => $data['telefon1'],
            'telefon2' => $data['telefon2'],
            'telefon3' => $data['telefon3'],
            'info' => $data['informacje'],
            'email' => $data['email'],
            'email2' => $data['email2'],
            'email3' => $data['email3'],
            'email4' => $data['email4'],
            'opiekun' => $data['opiekun']
        ]);

         return  'Medium: '.$data['nazwa'].' zostało dodane' ;
    }


    public function ShowOneMediaData($id)
    {
        return media::OneMedia($id);
    }

    public function SaveEdited($data)
    {
        $media = media::find($data['id']);
        $media->nazwa = $data['nazwa'];
        $media->region = $data['region'];
        $media->opiekun = $data['opiekun'];
        if($data['miasto'])$media->miasto = $data['miasto'];
        if($data['ulica'])$media->ulica = $data['ulica'];
        if($data['kod_pocztowy'])$media->kod = $data['kod_pocztowy'];
        if($data['strona'])$media->strona = $data['strona'];
        if($data['telefon1'])$media->telefon1 = $data['telefon1'];
        if($data['telefon2'])$media->telefon2 = $data['telefon2'];
        if($data['telefon3'])$media->telefon3 = $data['telefon3'];
        if($data['informacje'])$media->info = $data['informacje'];
        if($data['email'])$media->email = $data['email'];
        if($data['email2'])$media->email2 = $data['email2'];
        if($data['email3'])$media->email3 = $data['email3'];
        if($data['email4'])$media->email4 = $data['email4'];
        $media->save();

        return 'Edycja medium: '.$data['nazwa'].' zakończona powodzeniem.';
    }

    public function Delete($data)
    {
        $media = media::find($data);
        if($media->journalist->isEmpty())
        {
            $media->delete();
            return 'Wpis został usunięty';
        }else{
            return 'Nie można usuwać mediów, do których są przypisani dziennikarze. Proszę w pierwszej kolejności usunąć powiązanie z dziennikarzem.';
        }



    }


    public function GetMedia($request)
    {
        if(isset($request->filtrRegion) && $request->filtrRegion != 'all'){
            if($request->filtrOpiekun != 'all'){
                $media = media::where(['region' => $request->filtrRegion, 'opiekun' => $request->filtrOpiekun])->get();
            }else{
                $media = media::where('region', $request->filtrRegion)->get();
            }
        }elseif(isset($request->filtrRegion) && $request->filtrRegion = 'all'){
                if($request->filtrOpiekun != 'all'){
                    $media = media::where('opiekun', $request->filtrOpiekun)->get();
                }else{
                    $media = media::all();
                }
        }
        return $media;
    }


    public function GetAjax($idB)
    {
        return media::find($idB);
    }


    public function GetTable()
    {
        return media::select('id', 'nazwa', 'region', 'opiekun', 'miasto')->get();
    }


    public function GetMediaData($dataFind)
    {
        return  media::select($dataFind)->distinct()->orderBy($dataFind, 'asc')->get();
    }


    public function GetMediaIdName()
    {
        $media = media::all();
        $i = 0;
        foreach($media as $row)
        {
            $data[$i]['id'] =  $row->id;
            $data[$i]['nazwa'] =  $row->nazwa;
            $i++ ;
        }
        return $data??NULL;
    }

}
