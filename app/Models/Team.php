<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 *
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $category
 * @property int $members_max_vacation_days
 * @property int $members_max_on_vacation
 * @property int $members_vacation_days_regen_monthly
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserTeamRequest> $userTeamRequests
 * @property-read int|null $user_team_requests_count
 * @method static \Illuminate\Database\Eloquent\Builder|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team query()
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereMembersMaxOnVacation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereMembersMaxVacationDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereMembersVacationDaysRegenMonthly($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Team extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    public $table = 'teams';

    public $fillable = [
        'name',
        'category',
        'members_max_vacation_days',
        'members_max_on_vacation',
        'members_vacation_days_regen_monthly'
    ];

    protected function casts(): array
    {
        return [
            'name' => 'string',
        'category' => 'string'
        ];
    }

    public static function rules(): array
    {
        return [
            'name' => 'nullable|string|max:255',
        'category' => 'nullable|string|max:255',
        'members_max_vacation_days' => 'required',
        'members_max_on_vacation' => 'required',
        'members_vacation_days_regen_monthly' => 'required',
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
        'members_max_vacation_days' => __('Members Max Vacation Days'),
        'members_max_on_vacation' => __('Members Max On Vacation'),
        'members_vacation_days_regen_monthly' => __('Members Vacation Days Regen Monthly'),
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

    public function userTeamRequests(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\UserTeamRequests::class, 'team_id');
    }

    public function company(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Company::class, 'company_id');
    }

}
