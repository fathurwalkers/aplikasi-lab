<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use App\Models\Lab;

class Penawaran extends Model
{
    use HasFactory;
    protected $table = "penawaran";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }
}
