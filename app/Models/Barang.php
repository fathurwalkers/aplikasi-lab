<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penawaran;
use App\Models\Lab;

class Barang extends Model
{
    use HasFactory;
    protected $table = "barang";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function penawaran()
    {
        return $this->hasMany(Penawaran::class);
    }

    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }
}
