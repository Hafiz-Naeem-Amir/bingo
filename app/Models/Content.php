<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'page_contents';

    protected $fillable = [
        'page_id',
        'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
        'p1', 'p2',
        'title', 'keyword', 'meta_description',
        'content', 'image',
    ];

    /**
     * Relation: Each content belongs to one page.
     */
    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
