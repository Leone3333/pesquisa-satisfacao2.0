<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Acessos extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'email',
        'senha'
    ];

    public static function usuarios()
    {
        $users = DB::select('SELECT email, senha FROM acessos');

        return $users;
    }

    use HasFactory;
}
