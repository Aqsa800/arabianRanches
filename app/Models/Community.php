<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;
use Carbon\Carbon;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

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
        'description'
    ];
    /**
     * The attributes that should be append with arrays.
     *
     * @var array
     */
    protected $appends = [
        'mainImage',
        'subImages',
        'formattedCreatedAt'
    ];
    /**
     * SET Attributes
     */
    /**
     * GET Attributes
     */
    /* Get the options for generating the slug.
    */
   public function getSlugOptions() : SlugOptions
   {
       return SlugOptions::create()
           ->generateSlugsFrom('name')
           ->saveSlugsTo('slug');
   }
    public function getMainImageAttribute()
    {
        return $this->getFirstMediaUrl('mainImages');
    }
    public function getSubImagesAttribute()
    {
        $subImages = array();
        foreach($this->getMedia('subImages') as $image){
            array_push($subImages, $image->getUrl());
        }
       return $subImages;
    }
    public function getFormattedCreatedAtAttribute($value)
    {
        return Carbon::parse($this->created_at)->format('d m Y');
    }
    /**
     * FIND Relationship
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function properties()
    {
        return $this->belongsToMany(Property::class, 'property_communities', 'community_id', 'property_id');
    }
    public function subcommunities()
    {
        return $this->belongsTo(Subcommunity::class, 'subcommunity_id', 'id');
    }
    public function developers()
    {
        return $this->belongsTo(Developer::class, 'developer_id', 'id');
    }
    public function completionStatus()
    {
        return $this->belongsTo(CompletionStatus::class, 'construction_status', 'id');
    }
    public function accommodations()
    {
        return $this->belongsToMany(Accommodation::class, 'community_accommodations', 'community_id', 'accomodation_id');
    }
    public function proximities()
    {
        return $this->belongsToMany(Neighbour::class, 'community_proximities', 'community_id', 'neighbour_id')->withPivot('value','id');
    }
    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'community_amenities', 'community_id', 'amenity_id');
    }
    public function facilities()
    {
        return $this->belongsToMany(Amenity::class, 'community_facilities', 'community_id', 'facility_id');
    }
    public function offerType()
    {
        return $this->belongsToMany(OfferType::class, 'community_offertype', 'community_id', 'offerType_id');
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
        return $query->where('status',  config('constants.deactive'));
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
