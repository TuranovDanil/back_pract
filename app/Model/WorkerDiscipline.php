<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerDiscipline extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_worker',
        'id_discipline'
    ];
}
