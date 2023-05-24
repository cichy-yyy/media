<?php

namespace App\Repository;

interface MediaRepositoryInterface
{
    public function create($data);
    public function SaveEdited($data);
    public function Delete($data);
    public function GetMedia($request);
    public function GetAjax($idB);
    public function GetTable();
    public function GetMediaData($dataFind);
}
