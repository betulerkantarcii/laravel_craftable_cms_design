<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Brackets\Translatable\Traits\HasTranslations;

class Logo extends Model implements HasMedia
{
    use HasTranslations;
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;

    protected $table = 'logo';

    protected $fillable = [
        'title',
        'description',
        'link',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    // these attributes are translatable
    public $translatable = [
        'title',
        'description',
        'link',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/logos/'.$this->getKey());
    }
    public function registerMediaCollections(): void
    {

        $this->addMediaCollection('cover')
            ->acceptsMimeTypes([
                'image/jpeg',
                'image/jpg',
                'image/png'
            ])
            ->maxFilesize(10*1024*1024)
            ->singleFile();
        

    }

    public function getCoverAttribute()
    {
        return $this->getFirstMediaUrl('cover', 'thumb_square') ?: false;
    }



    public function registerMediaConversions(Media $media = null): void
    {
        $this->autoRegisterThumb200();
    }
}
