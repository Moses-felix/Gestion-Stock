<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CrmNote extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'crm_notes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'note',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
