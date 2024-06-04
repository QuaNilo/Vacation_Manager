<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Image\Enums\CropPosition;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Demo
 *
 * @property int $id
 * @property int|null $demo_id
 * @property int|null $user_id
 * @property string $name
 * @property string $body
 * @property string|null $phone
 * @property string|null $vat
 * @property string|null $zip
 * @property string|null $optional
 * @property string|null $body_optional
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $date
 * @property \Illuminate\Support\Carbon|null $datetime
 * @property bool $checkbox
 * @property bool $privacy_policy
 * @property int $status 1 - Active | 2 - Disable | 3 - Draft
 * @property int $order_column
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read mixed|string $status_label
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\DemoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Demo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Demo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Demo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Demo whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demo whereBodyOptional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demo whereCheckbox($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demo whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demo whereDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demo whereDemoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demo whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demo whereOptional($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demo wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demo wherePrivacyPolicy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demo whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demo whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demo whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demo whereVat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demo whereZip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Demo ordered(string $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Demo whereOrderColumn($value)
 * @property-read Demo|null $demo
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @mixin \Eloquent
 */
class Demo extends Model implements Auditable, HasMedia, Sortable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;
    use InteractsWithMedia;
    use HasFactory;
    use SortableTrait;

    public $table = 'demos';

    const STATUS_ACTIVE = 1;
    const STATUS_DISABLE = 2;
    const STATUS_DRAFT = 3;

    public array $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];

    public $fillable = [
        'demo_id',
        'user_id',
        'name',
        'body',
        'phone',
        'vat',
        'zip',
        'optional',
        'body_optional',
        'value',
        'date',
        'datetime',
        'checkbox',
        'privacy_policy',
        'status',
        'order_column'
    ];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'body' => 'string',
            'phone' => 'string',
            'vat' => 'string',
            'zip' => 'string',
            'optional' => 'string',
            'body_optional' => 'string',
            'value' => 'decimal:2',
            'date' => 'date:Y-m-d',
            'datetime' => 'datetime:Y-m-d H:i',
            'checkbox' => 'boolean',
            'privacy_policy' => 'boolean',
            'status' => 'integer',
            'order_column' => 'integer'
        ];
    }

    public static function rules(): array
    {
        return [
            'demo_id' => 'nullable',
            'user_id' => 'nullable',
            'name' => 'required|string|max:255',
            'body' => 'required|string|max:65535',
            'phone' => 'nullable|string|max:32',
            'vat' => 'nullable|string|max:32',
            'zip' => 'nullable|string|max:16',
            'optional' => 'nullable|string|max:255',
            'body_optional' => 'nullable|string|max:65535',
            'value' => 'nullable|numeric',
            'date' => 'nullable|date',
            'datetime' => 'nullable|date',
            'checkbox' => 'required|boolean',
            'privacy_policy' => 'required|boolean',
            'status' => 'required',
            'order_column' => 'nullable|integer',
            'created_at' => 'nullable',
            'updated_at' => 'nullable'
        ];
    }

    /**
     * Attribute labels
     *
     * @return array
     */
    public static function attributeLabels()
    {
        return [
            'id' => __('Id'),
            'demo_id' => __('Demo'),
            'user_id' => __('User'),
            'name' => __('Name'),
            'body' => __('Body'),
            'phone' => __('Phone'),
            'vat' => __('Vat'),
            'zip' => __('Zip'),
            'optional' => __('Optional'),
            'body_optional' => __('Body Optional'),
            'value' => __('Value'),
            'date' => __('Date'),
            'datetime' => __('Datetime'),
            'checkbox' => __('Checkbox'),
            'privacy_policy' => __('Privacy Policy'),
            'status' => __('Status'),
            'order_column' => __('Order'),
            'created_at' => __('Created At'),
            'updated_at' => __('Updated At'),
            'cover' => __('Cover'),
            'files' => __('Files'),
            'template' => __('Template'),
        ];
    }

    /**
     * Return the attribute label
     * @param string $attribute
     * @return string
     */
    public function getAttributeLabel($attribute)
    {
        $attributeLabels = static::attributeLabels();
        return isset($attributeLabels[$attribute]) ? $attributeLabels[$attribute] : __($attribute);
    }

    /**
     * Return an array with the values of status field
     * @return array
     */
    public static function getStatusArray()
    {
        return [
            self::STATUS_ACTIVE => __('Active'),
            self::STATUS_DISABLE => __('Disable'),
            self::STATUS_DRAFT => __('Draft'),
        ];
    }

    /**
     * Return an array with the values of status field
     * @return array
     */
    public function getStatusOptions()
    {
        return static::getStatusArray();
    }

    /**
     * Return the status label
     * @return mixed|string
     */
    public function getStatusLabelAttribute()
    {
        $array = self::getStatusOptions();
        return $array[$this->status] ?? "";
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function demo(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Demo::class, 'demo_id');
    }

    /**
     * Register the media collection for this model
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('files');
        $this->addMediaCollection('cover')
            ->singleFile()
            ->useFallbackUrl(asset('images/placeholders/800x800.jpg'))
            ->useFallbackPath(public_path('/images/placeholders/800x800.jpg'))
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('original')
                    ->fit(Fit::Max, 1024, 1024)
                    ->keepOriginalImageFormat();
                $this
                    ->addMediaConversion('square')
                    ->crop(512, 512, CropPosition::Center);
                $this
                    ->addMediaConversion('retangular')
                    ->crop(512, 384, CropPosition::Center);
            });
        //->useFallbackUrl(asset('images/placeholders/amt.jpg'));;
        //->useFallbackUrl('/images/anonymous-user.jpg')
        //->useFallbackPath(public_path('/images/anonymous-user.jpg'));
        /*->useFallbackPath(public_path('/default_avatar.jpg'))
        ->useFallbackPath(public_path('/default_avatar_thumb.jpg'), 'thumb')
        ->registerMediaConversions(function (Media $media) {
            $this
                ->addMediaConversion('thumb')
                ->width(50)
                ->height(50);

            $this
                ->addMediaConversion('thumb_2')
                ->width(100)
                ->height(100);
        });*/
    }
}
