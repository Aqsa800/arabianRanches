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
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Carbon\Carbon;

class Community extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia, HasRichText, HasSlug;
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
        'description',
        'short_description'
    ];
    /**
     * The attributes that should be append with arrays.
     *
     * @var array
     */
    protected $appends = [
        'mainImage',
        'imageGallery',
        'video',
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
    public function getMainImageAttribute()
    {
        if(url_exists($this->getFirstMediaUrl('mainImages', 'resize'))){
            return $this->getFirstMediaUrl('mainImages', 'resize');
        }
        return false;
        //return $this->getFirstMediaUrl('mainImages', 'resize');
    }
    public function getImageGalleryAttribute()
    {
        $subImages = array();
        foreach($this->getMedia('imageGalleries') as $image){
            if($image->hasGeneratedConversion('resize_images')){
                array_push($subImages, ['id'=> $image->id, 'path'=>$image->getUrl('resize_images')]);
            }else{
                array_push($subImages, ['id'=> $image->id, 'path'=>$image->getUrl()]);
            }
        }
       return $subImages;
    }
    public function getvideoAttribute()
    {
        return $this->getFirstMediaUrl('videos');
    }
    public function registerMediaConversions(Media $media = null) : void
    {
        $this->addMediaConversion('resize')
            ->format(Manipulations::FORMAT_WEBP)
            ->performOnCollections('mainImages')
            ->nonQueued();

        $this->addMediaConversion('resize_images')
            ->format(Manipulations::FORMAT_WEBP)
            ->performOnCollections('imageGalleries')
            ->nonQueued();
    }
    public function getFormattedCreatedAtAttribute($value)
    {
        return Carbon::parse($this->created_at)->format('d m Y');
    }
    /**
     * FIND Relationship
     */
    public function stats()
    {
        return $this->morphMany(Stat::class, 'statable');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'community_categories', 'community_id', 'category_id');
    }
    // public function developers()
    // {
    //     return $this->belongsToMany(Developer::class, 'agent_communities', 'community_id', 'agent_id');
    // }
    public function communities()
    {
        return $this->belongsToMany(Developer::class, 'agent_communities', 'community_id', 'agent_id');
    }
    public function tags()
    {
        return $this->morphMany(Tag::class, 'tagable');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function properties()
    // {
    //     return $this->belongsToMany(Property::class, 'property_communities', 'community_id', 'property_id');
    // }
    public function subCommunities()
    {
        return $this->hasMany(Subcommunity::class, 'community_id', 'id');
    }
    // public function communities()
    // {
    //     return $this->belongsTo(Community::class, 'community_id', 'id');
    // }
    public function communityDevelopers()
    {
        return $this->belongsToMany(Developer::class, 'community_developers', 'community_id', 'developer_id');
    }
    public function floorplans()
    {
        return $this->hasMany(FloorPlan::class);
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
