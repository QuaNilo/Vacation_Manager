@php
    echo "<?php".PHP_EOL;
@endphp

namespace {{ $config->namespaces->model }};

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;
@if($config->options->softDelete) {{ 'use Illuminate\Database\Eloquent\SoftDeletes;' }}@endif
@if($config->options->tests or $config->options->factory) {{ 'use Illuminate\Database\Eloquent\Factories\HasFactory;' }}@endif


@if(isset($swaggerDocs)){!! $swaggerDocs  !!}@endif
class {{ $config->modelNames->name }} extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;
@if($config->options->softDelete) {{ infy_tab().'use SoftDeletes;' }}@endif
@if($config->options->tests or $config->options->factory){{ infy_tab().'use HasFactory;' }}@endif

@if($haveStatusField)
    const STATUS_DISABLE = 0;
    const STATUS_ACTIVE = 1;
@endif

    public $table = '{{ $config->tableName }}';

@if($customPrimaryKey)@tab()protected $primaryKey = '{{ $customPrimaryKey }}';@nls(2)@endif
@if($config->connection)@tab()protected $connection = '{{ $config->connection }}';@nls(2)@endif
@if(!$timestamps)@tab()public $timestamps = false;@nls(2)@endif
@if($customSoftDelete)@tab()protected $dates = ['{{ $customSoftDelete }}'];@nls(2)@endif
@if($customCreatedAt)@tab()const CREATED_AT = '{{ $customCreatedAt }}';@nls(2)@endif
@if($customUpdatedAt)@tab()const UPDATED_AT = '{{ $customUpdatedAt }}';@nls(2)@endif
    public $fillable = [
        {!! $fillables !!}
    ];

    protected function casts(): array
    {
        return [
            {!! $casts !!}
        ];
    }

    public static function rules(): array
    {
        return [
            {!! $rules !!}
        ];
    }

    /**
    * Attribute labels
    *
    * @return array
    */
    public static function attributeLabels() : array
    {
        return [
            {!! $attributeLabels !!}
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

    {!! $relations !!}

@if($haveStatusField)
    /**
    * Return an array with the values of status field
    * @return array
    */
    public static function getStatusArray() : array
    {
        return [
            self::STATUS_ACTIVE =>  __('Active'),
            self::STATUS_DISABLE =>  __('Disable'),
        ];
    }

    /**
    * Return the status label
    * @return string
    */
    public function getStatusLabelAttribute() : string
    {
        $array = static::getStatusArray();
        return $array[$this->status] ?? "";
    }
@endif

}
