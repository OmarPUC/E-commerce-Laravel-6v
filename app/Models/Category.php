<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   /**
   * @var string
   */
    protected $table = 'categories';

    /**
     * @var array
     */
    protected $fillable = [
      'name', 'slug', 'description', 'parent_id', 'featured', 'manu', 'image'
    ];

    /**
     * @var array
     */
     protected $casts = [
       'parent_id'  =>  'integer',
       'featured'   =>  'boolean',
       'manu'       =>  'boolean'
     ];

     /**
     * @param $value
     */
     public function setNameAttribute($value)
     {
       $this->attributes['name']  = $value;
       $this->attributes['slug']  = str_slug($value);
     }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
     public function parent()
     {
       return $this->belongsTo(Category::class, 'parent_id');
     }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
     public function children()
     {
       return $this->hasMany(Category::class, 'parent_id');
     }
}
