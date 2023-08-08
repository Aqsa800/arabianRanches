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

class Project extends Model implements HasMedia
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
        'features_description',
        'short_description',
        'long_description'
    ];

    /**
     * The attributes that should be append with arrays.
     *
     * @var array
     */
    protected $appends = [
        'mainImage',
        'video',
        'interiorGallery',
        'exteriorGallery',
        'factsheet',
        'brochure',
        'paymentPlan',
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
        return $this->getFirstMediaUrl('mainImages', 'resize');
    }
    public function getVideoAttribute()
    {
        return $this->getFirstMediaUrl('videos');
    }
    public function getInteriorGalleryAttribute()
    {
        $interiorGallery = array();
        foreach($this->getMedia('interiorGallery') as $image){
            if($image->hasGeneratedConversion('resize_images')){
                array_push($interiorGallery, ['id'=> $image->id, 'path'=>$image->getUrl('resize_images')]);
            }else{
                array_push($interiorGallery, ['id'=> $image->id, 'path'=>$image->getUrl()]);
            }
        }
       return $interiorGallery;
    }
    public function getExteriorGalleryAttribute()
    {
        $exteriorGallery = array();
        foreach($this->getMedia('exteriorGallery') as $image){
            if($image->hasGeneratedConversion('resize_images')){
                array_push($exteriorGallery, ['id'=> $image->id, 'path'=>$image->getUrl('resize_images')]);
            }else{
                array_push($exteriorGallery, ['id'=> $image->id, 'path'=>$image->getUrl()]);
            }
        }
       return $exteriorGallery;
    }
    public function registerMediaConversions(Media $media = null) : void
    {
        $this->addMediaConversion('resize')
            ->height(1920)
            ->format(Manipulations::FORMAT_WEBP)
            ->performOnCollections('mainImages')
            ->nonQueued();

        $this->addMediaConversion('resize_images')
            ->height(1000)
            ->format(Manipulations::FORMAT_WEBP)
            ->performOnCollections('interiorGallery')
            ->nonQueued();

            $this->addMediaConversion('resize_images')
            ->height(1000)
            ->format(Manipulations::FORMAT_WEBP)
            ->performOnCollections('exteriorGallery')
            ->nonQueued();
    }
  /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }
    public function getPaymentPlanAttribute()
    {
        return $this->getFirstMediaUrl('paymentPlans');
    }
    public function getFactSheetAttribute()
    {
        return $this->getFirstMediaUrl('factsheets');
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
    public function stats()
    {
        return $this->morphMany(Stat::class, 'statable');
    }
    public function tags()
    {
        return $this->morphMany(Tag::class, 'tagable');
    }
    // public function subProjects()
    // {
    //     return $this->hasMany(Project::class, 'parent_project_id', 'id')->with('projects');
    // }

    public function subProjects()
    {
        return $this->hasMany(Project::class, 'parent_project_id')->with('subProjects');
    }

    public function parentProject()
    {
        return $this->belongsTo(Project::class, 'parent_project_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function developer()
    {
        return $this->belongsTo(Developer::class, 'developer_id', 'id');
    }
    public function mainCommunity()
    {
        return $this->belongsTo(Community::class, 'community_id', 'id');
    }
    public function subCommunity()
    {
        return $this->belongsTo(Subcommunity::class, 'sub_community_id', 'id');
    }
    public function accommodations()
    {
        return $this->belongsToMany(Accommodation::class, 'project_accommodations', 'project_id' , 'accommodation_id');
    }
    public function amenities()
    {

        return $this->belongsToMany(Amenity::class, 'project_amenities', 'project_id' , 'amenity_id');
    }
    public function highlighted_amenities()
    {
        return $this->amenities()->where('highlighted','=', 1);
    }
    public function unhighlighted_amenities()
    {
        return $this->amenities()->where('highlighted','=', 0);
    }
    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id', 'id');
    }
    public function agents()
    {
        return $this->belongsToMany(Agent::class, 'agent_projects', 'project_id', 'agent_id');
    }
    public function projectBedrooms()
    {
        return $this->hasMany(ProjectBedroom::class, 'project_id', 'id');
    }
    public function floorPlan()
    {
        return $this->hasOne(FloorPlan::class, 'project_id', 'id');
    }
    public function details()
    {
        return $this->hasMany(PropertyDetail::class, 'project_id', 'id');
    }
    public function paymentPlans()
    {
        return $this->morphMany(MetaDetail::class, 'detailable');
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
    public function scopeMainProject($query)
    {
        return $query->where('is_parent_project', true);
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
