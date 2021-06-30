<?php

namespace App\Http\Controllers;

use App\Models\Episode;

class EpisodesController extends BaseController
{
   public function __construct() 
   {
       $this->class = Episode::class;
   }

   public function searchSerie($id)
   {
       $episodes = Episode::query()->where('serie_id', $id)->paginate(10);

       return $episodes;
   }
}