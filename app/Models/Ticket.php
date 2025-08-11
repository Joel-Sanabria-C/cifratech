<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'tickets';
    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'usuario_id',
        'categoria_id',
        'tecnico_id',
        'titulo',
        'descripcion',
        'estado',
        'prioridad',
    ];
    //Relación con el usuario que creó el ticket
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
    //Relación con el técnico 
    public function tecnico()
    {
        return $this->belongsTo(User::class, 'tecnico_id');
    }
    //Relación con la categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
