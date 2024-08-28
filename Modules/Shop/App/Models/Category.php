<?php

namespace Modules\Shop\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Shop\Database\factories\CategoryFactory;
use App\Traits\UuidTrait;

class Category extends Model
{
    use HasFactory, UuidTrait;

    protected $table = 'shop_categories';

    protected $fillable = [
        'parent_id',
        'slug',
        'name',
    ];

    protected static function newFactory()
    {
        return CategoryFactory::new();
    }

    public function children()
    {
        return $this->$this->hasMany('Modules\Shop\Entities\Category', 'parent_id');
    }

    public function parent()
    {
        return $this->$this->belongsTo('Modules\Shop\Entities\Category', 'parent_id');
    }

    public function products()
    {
        return $this->$this->belongsToMany('Modules\Shop\Entities\Category', 'shop_categories_products', 'product_id', 'category_id');
    }
}
