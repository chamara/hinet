<?php

//<<<<--- NAMESPACE --->>>>//
namespace App\Http\Controllers;

//<<<<--- USE --->>>>//
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

//<<<<--- START CLASS --->>>>//
class Controller extends BaseController{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
