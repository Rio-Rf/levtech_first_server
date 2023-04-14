<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    
        protected $fillable = [//保存できる値の指定
        'title',
        'body',
    ];
    
    public function getPaginateByLimit(int $limit_count = 1)
{
    // updated_atで降順に並べたあと、limitで件数制限をかける
    return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
}
}
