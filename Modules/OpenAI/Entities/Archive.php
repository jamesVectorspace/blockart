<?php

namespace Modules\OpenAI\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\MediaManager\Http\Models\ObjectFile;
use App\Traits\ModelTraits\{hasFiles, Metable};
use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelTrait;

class Archive extends Model
{
    use HasFactory, Metable, hasFiles, ModelTrait;

    protected $metaTable = 'archives_meta';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public static function clearFootprints(Archive $archive): void
    {
        ObjectFile::where('object_type', '=', 'archives')->where('object_id', $archive->id)->delete();
    }
}
