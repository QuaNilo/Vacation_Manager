<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    public $table = 'companies';

    public $fillable = [
        'name',
        'category',
        'email',
        'telephone'
    ];

    protected function casts(): array
    {
        return [
            'name' => 'string',
        'category' => 'string',
        'email' => 'string',
        'telephone' => 'string'
        ];
    }

    public static function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
        'category' => 'nullable|string|max:255',
        'email' => 'nullable|string|max:255',
        'telephone' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
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
            'id' => __('Id'),
        'name' => __('Name'),
        'category' => __('Category'),
        'email' => __('Email'),
        'telephone' => __('Telephone'),
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

    // Many-to-Many relationship with User
    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    // One-to-Many relationship with Team
    public function teams(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Team::class);
    }


}
