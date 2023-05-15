<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Carro extends Model
{
    use HasFactory;
    protected $table = 'carro';

    public $timestamps = false;

    public function cliente(): BelongsTo
    {
       return $this->belongsTo(Cliente::class);
    }

}
