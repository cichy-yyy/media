<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\journalist;
use App\Models\media;
use App\Http\Requests\AddJournalistRequest;
use App\Repository\JournalistRepositoryInterface;

class journalistController extends Controller
{
    private $journalistRepository;

    public function __construct(JournalistRepositoryInterface $repository)
    {
        $this->journalistRepository = $repository;
    }


    public function Add()
    {
        return view('journalist.add',[
            'getMedia' => $this->journalistRepository->GetMediaId()
        ]);
    }

    public function AddData(AddJournalistRequest $request)
    {
        return redirect()->route('journalist.add')->with('message', $this->journalistRepository->AddJournalist($request->validated()) );
    }


    public function Edit()
    {
        $journalist = $this->journalistRepository->GetJournalists();
        // dd($journalist);
        if($journalist->isEmpty())
        {
            return view('message', [
                'message' => 'Brak agencji medialnych do edycji'
            ]);
        }

        return view('journalist.edit',[
            'journalist' => $journalist,
            'details' => false
         ]);
    }


    public function EditData(Request $request, $id = NULL)
    {
        $id ??= $request['dziennikarz_edytowany'];

        foreach($this->journalistRepository->GetOneJournalist($id)->media as $role){
           $journalistMedia[] = $role->id;
        }

        $journalistMedia = $journalistMedia??[];
        return view('journalist.edit',[
            'journalist' => $this->journalistRepository->GetJournalists(),
            'journalistEdited' => $this->journalistRepository->GetOneJournalist($id),
            'details' => true,
            'getMedia' => $this->journalistRepository->GetMediaId(),
            'journalistMedia' => $journalistMedia
         ]);
    }

    public function SaveData(AddJournalistRequest $request)
    {
        return redirect()->route('journalist.edit')->with('message', $this->journalistRepository->SaveJournalist($request->validated()) );
    }


    public function showTable()
    {
        return view('journalist.showTable', [
            'journalists' => $this->journalistRepository->selectJournalists()
        ]);
    }
}


