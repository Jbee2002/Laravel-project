<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    // protected $table = 'category'; // đổi tên bảng thành category vì mặc định là categories
    protected $fillable = ['name', 'status'];
    protected $dates=['deleted_at'];
    //1 category - n product
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function scopeSearch($query)
    {
        if (request('key')) {
            $key = request('key');
            $query = $query->where('name', 'like', '%' . $key . '%');
        }
        return $query;
    }

    public function scopeAdd()
    {
        return $this->create(request()->only('name', 'status'));
    }
    public function scopeUpdateCategory()
    {
        return $this->update(request()->only('name', 'status'));
    }
}
