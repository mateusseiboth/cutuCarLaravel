<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Ticket extends Model
{
    use HasFactory;
    protected $table = 'ticket';

    public function carro(): BelongsTo
    {
       return $this->belongsTo(Carro::class);
    }
    public function vaga(): BelongsTo
    {
       return $this->belongsTo(Vagas::class);
    }

    public function tipo(): BelongsTo
    {
       return $this->belongsTo(Tipo::class);
    }

}
