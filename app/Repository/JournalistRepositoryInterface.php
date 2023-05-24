<?php

namespace App\Repository;

interface JournalistRepositoryInterface
{
    public function GetMediaId();
    public function AddJournalist($data);
    public function GetJournalists();
    public function GetOneJournalist($id);
    public function SaveJournalist($data);
    public function selectJournalists();
}
