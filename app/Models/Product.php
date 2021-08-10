<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'products';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'quantite',
        'price',
        'categorie_id',
        'rangement_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function categorie()
    {
        return $this->belongsTo(ProductCategory::class, 'categorie_id');
    }

    public function rangement()
    {
        return $this->belongsTo(Rangement::class, 'rangement_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
