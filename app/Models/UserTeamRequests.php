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
 * @property int $user_id
 * @property int $team_id
 * @property int $approved 0 - Not Approved, 1 - Approved, 2 - Pending
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Team $team
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeamRequests newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeamRequests newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeamRequests query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeamRequests whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeamRequests whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeamRequests whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeamRequests whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeamRequests whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserTeamRequests whereUserId($value)
 * @mixin \Eloquent
 */
class UserTeamRequests extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    public $table = 'user_team_requests';

    public $fillable = [
        'user_id',
        'team_id',
        'approved'
    ];

    protected function casts(): array
    {
        return [
            
        ];
    }

    public static function rules(): array
    {
        return [
            'user_id' => 'required',
        'team_id' => 'required',
        'approved' => 'required',
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
        'user_id' => __('User Id'),
        'team_id' => __('Team Id'),
        'approved' => __('Approved'),
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

    public function team(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Team::class, 'team_id');
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }


}
