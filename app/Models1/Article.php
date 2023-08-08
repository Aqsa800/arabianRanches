<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Manipulations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;
use Illuminate\Support\Str;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Carbon\Carbon;

class Article extends Model  implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia, HasRichText, HasSlug;
    /**
     * The dates attributes
     *
     * @var array
     */
    protected $dates = [
        'publish_at',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    /**
     * The richtext attributes
     *
     * @var array
     */
    protected $richTextFields = [
        'content'
    ];
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
    /**
     * The attributes that should be append with arrays.
     *
     * @var array
     */
    protected $appends = [
        'mainImage',
        'formattedPublishAt',
        'formattedCreatedAt'
    ];
    /**
     * SET Attributes
     */
    /**
     * GET Attributes
     */
    public function getMainImageAttribute()
    {
        if($this->getFirstMediaUrl('mainImages', 'resize')){
            return $this->getFirstMediaUrl('mainImages', 'resize');
        }else{
            return asset('frontend/assets/images/blog-no-image.webp');
        }
    }
    public function registerMediaConversions(Media $media = null) : void
    {
        $this->addMediaConversion('resize')
            ->format(Manipulations::FORMAT_WEBP)
            ->performOnCollections('mainImages')
            ->nonQueued();
    }

    public function getFormattedCreatedAtAttribute($value)
    {
        return Carbon::parse($this->created_at)->format('d m Y');
    }
    public function getFormattedPublishAtAttribute($value)
    {
        return Carbon::parse($this->publish_at)->format('d m Y');
    }
    /**
     * FIND Relationship
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
    * FIND local scope
    */
    public function scopeActive($query)
    {
        return $query->where('status', config('constants.active'));
    }
    public function scopeDeactive($query)
    {
        return $query->where('status',  config('constants.Inactive'));
    }
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
    /**
     *
     * Filters
     */
    public function scopeApplyFilters($query, array $filters)
    {
        $filters = collect($filters);
        if ($filters->get('status')) {
            $query->whereStatus($filters->get('status'));
        }
    }
}

