<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['taggable_id', 'tag_name_id', 'taggable_type'];

    public function taggable()
    {
        return $this->morphTo();
    }

    public function tagName()
    {
        return $this->belongsTo(TagName::class);
    }

    public static function syncTag($taggableType, $taggableId, $tags)
    {
        foreach ($tags as $tagItem) {
            self::query()->create([
                'taggable_id' => $taggableId,
                'tag_name_id' => $tagItem,
                'taggable_type' => $taggableType
            ]);
        }
    }
}

