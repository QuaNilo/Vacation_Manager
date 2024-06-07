<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\LoadDefaults;
use OwenIt\Auditing\Contracts\Auditable;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 *
 *
 * @property int $id
 * @property int $user_id
 * @property int $approved 0 - Not Approved, 1 - Approved, 2 - Pending
 * @property \Illuminate\Support\Carbon $start
 * @property \Illuminate\Support\Carbon $end
 * @property int $vacation_days
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Vacation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vacation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Vacation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Vacation whereApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vacation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vacation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vacation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vacation whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vacation whereVacationDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vacation whereVacationEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Vacation whereVacationStart($value)
 * @mixin \Eloquent
 */
class Vacation extends Model implements Auditable
{
    use LoadDefaults;
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    const STATUS_APPROVED = 1;
    const STATUS_REJECTED = 0;
    const STATUS_PENDING = 2;

    public $table = 'vacations';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($vacation) {
            // Calculate the difference in days between start and end
            $start = Carbon::parse($vacation->start);
            $end = Carbon::parse($vacation->end);
            $durationInDays = abs($end->diffInDays($start));
            // Set the duration_in_days attribute in the model
            $vacation->vacation_days = $durationInDays;
            $vacation->title = __("Ferias do") . ' ' . $vacation->user->name;
        });
    }

    public $fillable = [
        'user_id',
        'approved',
        'start',
        'end',
    ];

    protected function casts(): array
    {
        return [
            'start' => 'date',
            'end' => 'date'
        ];
    }

    public static function rules(): array
    {
        return [
            'user_id' => 'required',
            'approved' => 'required',
            'title' => 'nullable',
            'start' => 'required',
            'end' => 'required',
            'vacation_days' => 'nullable',
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
            'title' => __('Title'),
            'user_id' => __('User Id'),
            'approved' => __('Approved'),
            'start' => __('Vacation Start'),
            'end' => __('Vacation End'),
            'vacation_days' => __('Vacation Days'),
            'created_at' => __('Created At'),
            'updated_at' => __('Updated At')
        ];
    }

    public static function getApprovedArray() : array
    {
        return [
            self::STATUS_PENDING =>  __('Pendente'),
            self::STATUS_APPROVED =>  __('Aprovado'),
            self::STATUS_REJECTED =>  __('Rejeitado'),
        ];
    }


        public function getApprovedLabelAttribute() : string
    {
        $array = static::getApprovedArray();
        return $array[$this->approved] ?? "";
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

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
