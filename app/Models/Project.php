<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'project_url', 'is_published', 'tags'];

    public function getShortDescription($project)
    {
        $words = explode(' ', $project->description);
        $arr_words = array_slice($words, 0, 15);
        $short_description = implode(' ', $arr_words);

        return $short_description;
    }
}
