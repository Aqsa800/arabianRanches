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
use App\Observers\PropertyObserver;

class Property extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia, HasRichText, HasSlug;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'sub_title',
        'status',
        'bathrooms',
        'built_area',
        'unit_measure',
        'slug',
        'is_feature',
        'user_id',
        'offer_type_id',
        'developer_id',
        'completion_status_id',
        'category_id',
        'reference_number',
        'permit_number',
        'parking',
        'price',
        'address_longitude',
        'address_latitude',
        'property_source',
        'emirate',
        'rating'
    ];
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
        'features_description',
        'amenties_description'
    ];

    /**
     * The attributes that should be append with arrays.
     *
     * @var array
     */
    protected $appends = [
        'qr',
        'mainImage',
        'subImages',
        'floorPlan',
        'brochure',
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
    public function getQrAttribute()
    {
        return $this->getFirstMediaUrl('qrs', 'resize_qr_images');
    }
    public function getMainImageAttribute()
    {
        if(url_exists($this->getFirstMediaUrl('mainImages', 'resize'))){
            return $this->getFirstMediaUrl('mainImages', 'resize');
        }else{
            return asset('frontend/assets/images/no-image.webp');
        }
        
        //return $this->getFirstMediaUrl('mainImages', 'resize');
    }
    public function getSubImagesAttribute()
    {
        $subImages = array();
        foreach($this->getMedia('subImages') as $image){
            if($image->hasGeneratedConversion('resize_images') && url_exists($image->getUrl('resize_images'))){
                array_push($subImages, ['id'=> $image->id, 'path'=>$image->getUrl('resize_images')]);
            }elseif(url_exists($image->getUrl('resize_images'))){
                array_push($subImages, ['id'=> $image->id, 'path'=>$image->getUrl()]);
            }
        }
       return $subImages;
    }
    public function registerMediaConversions(Media $media = null) : void
    {
        $this->addMediaConversion('resize')
            ->format(Manipulations::FORMAT_WEBP)
            ->performOnCollections('mainImages')
            ->nonQueued();

        $this->addMediaConversion('resize_images')
            ->format(Manipulations::FORMAT_WEBP)
            ->performOnCollections('subImages')
            ->nonQueued();

            $this->addMediaConversion('resize_qr_images')
            ->format(Manipulations::FORMAT_WEBP)
            ->performOnCollections('qrs')
            ->nonQueued();
    }
    public function getFloorPlanAttribute()
    {
        return $this->getFirstMediaUrl('floorPlans');
    }
    public function getBrochureAttribute()
    {
        return $this->getFirstMediaUrl('brochures');
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
    public function offerType()
    {
        return $this->belongsTo(OfferType::class, 'offer_type_id', 'id');
    }
    public function developer()
    {
        return $this->belongsTo(Developer::class, 'developer_id', 'id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function communities()
    {
        return $this->belongsTo(Community::class, 'community_id', 'id');
    }
    public function subcommunities()
    {
        return $this->belongsTo(Subcommunity::class, 'subcommunity_id', 'id');
    }
    public function completionStatus()
    {
        return $this->belongsTo(CompletionStatus::class, 'completion_status_id', 'id');
    }
    public function accommodations()
    {
        return $this->belongsTo(Accommodation::class, 'accommodation_id', 'id');
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'property_amenities', 'property_id', 'amenity_id');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id', 'id');
    }
    public function details()
    {
        return $this->hasMany(PropertyDetail::class);
    }
    public function bedroomss()
    {
        return $this->hasMany(PropertyBedroom::class, 'property_id', 'id');
    }
    public function propertyDetails()
    {
        return $this->hasMany(PropertyDetail::class, 'property_id', 'id');
    }
    public function imagegalleries(){
        return $this->hasMany(Imagegallery::class, 'property_id', 'id');
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
    public static function boot()
    {
        parent::boot();
        Property::observe(PropertyObserver::class);
    }
}
