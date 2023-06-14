<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Login;
use App\Models\Penawaran;

class Data extends Model
{
    use HasFactory;
    protected $table = "data";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function login()
    {
        return $this->belongsTo(Login::class);
    }

    public function penawaran()
    {
        return $this->hasMany(Penawaran::class);
    }
}
