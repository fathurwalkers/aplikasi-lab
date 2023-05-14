<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penawaran;
use App\Models\Barang;
use App\Models\Login;

class Lab extends Model
{
    use HasFactory;
    protected $table = "lab";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function penawaran()
    {
        return $this->hasMany(Penawaran::class);
    }

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    public function login()
    {
        return $this->belongsTo(Login::class);
    }
}
