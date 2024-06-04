<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use Illuminate\Support\Facades\Cache;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\Image\Enums\CropPosition;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Setting
 *
 * @property int $id
 * @property int $type 1 - textfield | 2 - textarea | 3 - checkbox | 4 - select | 5 - integer | 6 - decimal | 7 - currency | 8 - percentage | 9 - color | 10 - range | 11 - json_array
 * @property string|null $group
 * @property string $name
 * @property string $slug
 * @property string|null $options
 * @property string|null $value
 * @property int $order_column
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting ordered(string $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereOrderColumn($value)
 * @mixin \Eloquent
 */
class Setting extends Model implements Auditable, HasMedia, Sortable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;
    use InteractsWithMedia;
    use SortableTrait;

    const TYPE_TEXTFIELD = 1;
    const TYPE_TEXTAREA = 2;
    const TYPE_CHECKBOX = 3;
    const TYPE_SELECT = 4;
    const TYPE_INTEGER = 5;
    const TYPE_DECIMAL = 6;
    const TYPE_CURRENCY = 7;
    const TYPE_PERCENTAGE = 8;
    const TYPE_COLOR = 9;
    const TYPE_RANGE = 10;
    const TYPE_JSON_ARRAY = 11;
    const TYPE_IMAGE = 12;
    const TYPE_FILE = 13;

    public $table = 'settings';

    public array $sortable = [
        'order_column_name' => 'order_column',
        'sort_when_creating' => true,
    ];

    public $fillable = [
        'type',
        'group',
        'name',
        'slug',
        'options',
        'value',
        'order_column',
    ];

    protected function casts(): array
    {
        return [
            'group' => 'string',
            'name' => 'string',
            'slug' => 'string',
            'options' => 'string',
            'value' => 'string'
        ];
    }

    public static function rules(): array
    {
        return [
            'type' => 'required',
            'group' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'options' => 'nullable|string|max:65535',
            'value' => 'nullable|string|max:65535',
            'order_column' => 'nullable|integer',
            'created_at' => 'nullable',
            'updated_at' => 'nullable'
        ];
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saved(function ($model) {
            Cache::forget('setting-params');
            Cache::forget('setting-options');
        });
    }

    /**
     * Attribute labels
     *
     * @return array
     */
    public static function attributeLabels() : array
    {
        return [
            'id' => __('Id'),
            'type' => __('Type'),
            'group' => __('Group'),
            'name' => __('Name'),
            'slug' => __('Slug'),
            'options' => __('Options'),
            'value' => __('Value'),
            'order_column' => __('Order'),
            'created_at' => __('Created At'),
            'updated_at' => __('Updated At')
        ];
    }

    /**
     * Return the attribute label
     * @param string $attribute
     * @return string
     */
    public function getAttributeLabel($attribute) : string
    {
        $attributeLabels = static::attributeLabels();
        return isset($attributeLabels[$attribute]) ? $attributeLabels[$attribute] : __($attribute);
    }

    /**
     * Return an array with the values of type field
     * @return array
     */
    public static function getTypeArray() : array
    {
        return [
            self::TYPE_TEXTFIELD =>  __('Textfield'),
            self::TYPE_TEXTAREA =>  __('Textarea'),
            self::TYPE_CHECKBOX =>  __('Checkbox'),
            self::TYPE_SELECT =>  __('Select'),
            self::TYPE_INTEGER =>  __('Integer'),
            self::TYPE_DECIMAL =>  __('Decimal'),
            self::TYPE_CURRENCY =>  __('Currency'),
            self::TYPE_PERCENTAGE =>  __('Percentage'),
            self::TYPE_COLOR =>  __('Color'),
            self::TYPE_RANGE =>  __('Range'),
            self::TYPE_JSON_ARRAY =>  __('Json Array'),
            self::TYPE_IMAGE =>  __('Image'),
            self::TYPE_FILE =>  __('File'),
        ];
    }

    /**
     * Return the first name of the user
     * @return mixed|string
     */
    public function getTypeLabelAttribute()
    {
        $array = self::getTypeArray();
        return $array[$this->type] ?? "";
    }


    /**
     * Register the media collection for this model
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')->registerMediaConversions(function (Media $media) {
            $this
                ->addMediaConversion('original')
                ->crop(1440, 525, CropPosition::Center)
                //->fit( Fit::Max, 1440, 525)
                ->keepOriginalImageFormat();
        });
        $this->addMediaCollection('files');
    }


}
