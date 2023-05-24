<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\media;
use App\Http\Requests\AddMediaRequest;
use App\Repository\MediaRepositoryInterface;
use Faker\Factory;

class mediaController extends Controller
{
    private  $mediaRepository;

    public function __construct(MediaRepositoryInterface $repository)
    {
        $this->mediaRepository = $repository;
    }

    public function add(): View
    {
        return view('media.add');
    }


    public function addData(AddMediaRequest $request)
    {
        return redirect()->route('media.edit')->with('message', $this->mediaRepository->create($request->validated()) );
    }


    public function Edit(int $idMedia = NULL)
    {
        $IdName = $this->mediaRepository->GetMediaIdName();
        if ($IdName==NULL) {
            return view('message', [
                'message' => 'Brak agencji medialnych do edycji'
            ]);
        }
        if (isset($idMedia)){
                $medium = $this->mediaRepository->ShowOneMediaData($idMedia);
                if($medium->count() == 0) return redirect()->route('media.edit')->with('message', 'Podana agencja medialna nie istnieje.');

                return view('media.edit', [
                    'name' => $IdName,
                    'details' => true,
                    'data' => $medium
                ]);
        }else{
            return view('media.edit', ['name' => $IdName]);
        }

    }


    public function EditData(Request $request)
    {
        return view('media.edit', [
            'name' => $this->mediaRepository->GetMediaIdName(),
            'details' => true,
            'data' => $this->mediaRepository->ShowOneMediaData($request['MediumSelectedID'])
        ]);
    }

    public function EditDataSave(AddMediaRequest $request)
    {
        return redirect()->route('media.edit')->with('message', $this->mediaRepository->SaveEdited($request->validated()));
    }


    public function DeleteData(Request $request)
    {
        if($request->has('accept_delete_media'))
        {
            return redirect()->route('media.edit')->with('message', $this->mediaRepository->Delete($request->input('id_delete')));
        }
        return view('delete',[
            'id_media' => $request->input('id'),
            'nazwa' => $request->input('nazwa')
        ]);
    }

    public function ShowMediaForm()
    {
        if ($this->mediaRepository->GetMediaIdName()==NULL) {
            return view('message', [
                'message' => 'Brak agencji medialnych do edycji'
            ]);
        }

        return view('media.showDetail', [
            'regions' => $this->mediaRepository->GetMediaData('region'),
            'opiekuni' => $this->mediaRepository->GetMediaData('opiekun')
        ]);
    }

    public function ShowMedia(Request $request)
    {
        return view('media.showDetail', [
            'regions'           => $this->mediaRepository->GetMediaData('region'),
            'opiekuni'          => $this->mediaRepository->GetMediaData('opiekun'),
            'details'           => true,
            'selectedRegion'     => $request->filtrRegion??FALSE,
            'selectedOpiekun'   => $request->filtrOpiekun??FALSE,
            'media'             => $this->mediaRepository->GetMedia($request)
        ]);
    }


    public function ShowMediaAjax(Request $request)
    {
        return view('media.ajaxMedia', [
            'mediaDetails' => $this->mediaRepository->GetAjax($request->idB)
        ]);
    }


    public function showTable()
    {
        if ($this->mediaRepository->GetMediaIdName()==NULL) {
            return view('message', [
                'message' => 'Brak agencji medialnych do edycji'
            ]);
        }
        return view('media.showTable', [
            'media' => $this->mediaRepository->GetTable()
        ]);
    }

}
