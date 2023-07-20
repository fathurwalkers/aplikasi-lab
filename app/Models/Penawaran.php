<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use App\Models\Jasa;
use App\Models\Data;

class Penawaran extends Model
{
    use HasFactory;
    protected $table = "penawaran";
    protected $guarded = [];
    protected $primaryKey = "id";

    public function invoice()
    {
        return $this->belongsToMany(Invoice::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function jasa()
    {
        return $this->belongsTo(Jasa::class);
    }

    public function data()
    {
        return $this->belongsTo(Data::class);
    }

}
