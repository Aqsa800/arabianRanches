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
class Banners extends Model implements HasMedia
{
  
    use HasFactory, SoftDeletes, InteractsWithMedia, HasRichText;
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
        'image',
        'videoPC',
        'VideoMob',
        'formattedCreatedAt'
    ];
    /**
     * SET Attributes
     */
    /**
     * GET Attributes
     */
    public function getImageAttribute()
    {
        return $this->getFirstMediaUrl('images');
    }
    public function getVideoPcAttribute()
    {
        return $this->getVideoPcMediaUrl('videoPC');
    }
    public function getVideoMobAttribute()
    {
        return $this->getVideoMobMediaUrl('VideoMob');
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
