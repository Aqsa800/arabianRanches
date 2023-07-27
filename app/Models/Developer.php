<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Carbon\Carbon;

class Developer extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia, HasRichText,HasSlug;
    /**
     * The dates attributes
     *
     * @var array
     */
    protected $dates = [
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
        'long_description',
        'short_description'
    ];
    /**
     *
     * The attributes that should be append with arrays.
     *
     * @var array
     */
    protected $appends = [
        'logo',
        'video',
        'image',
        'formattedCreatedAt'
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    /**
     * SET Attributes
     */
    /**
     * GET Attributes
     */
    public function getLogoAttribute()
    {
        return $this->getFirstMediaUrl('logos', 'resize');
    }
    public function getImageAttribute()
    {
        return $this->getFirstMediaUrl('images', 'resize_images');
    }
    public function getVideoAttribute()
    {
        return $this->getFirstMediaUrl('videos');
    }
    public function getFormattedCreatedAtAttribute($value)
    {
        return Carbon::parse($this->created_at)->format('d m Y');
    }
    public function registerMediaConversions(Media $media = null) : void
    {
        $this->addMediaConversion('resize')
            ->height(60)
            ->format(Manipulations::FORMAT_WEBP)
            ->performOnCollections('logos')
            ->nonQueued();
        
        $this->addMediaConversion('resize_images')
            ->height(300)
            ->format(Manipulations::FORMAT_WEBP)
            ->performOnCollections('images')
            ->nonQueued();
    }
    /**
     * FIND Relationship
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function details()
    {
        return $this->morphMany(MetaDetail::class, 'detailable');
    }
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    public function tags()
    {
        return $this->morphMany(Tag::class, 'tagable');
    }

    // public function communities()
    // {
    //     return $this->belongsToMany(Community::class, 'community_developers', 'developer_id', 'community_id');
    // }
    public function developers()
    {
        return $this->belongsToMany(Developer::class, 'agent_developers', 'developer_id', 'agent_id');
    }
    public function communityDevelopers()
    {
        return $this->belongsToMany(Community::class, 'community_developers', 'developer_id', 'community_id');
    }
    public function awards()
    {
        return $this->hasMany(Award::class);
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
