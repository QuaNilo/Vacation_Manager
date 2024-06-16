<?php

namespace App\Models;

use App\Models\Traits\LoadDefaults;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Lab404\Impersonate\Models\Impersonate;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Traits\HasRoles;


/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property \Illuminate\Support\Carbon|null $two_factor_confirmed_at
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Demo> $demos
 * @property-read int|null $demos_count
 * @property-read mixed|string $first_name
 * @property-read string $permissions_label
 * @property-read string $roles_label
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Lock> $locks
 * @property-read int|null $locks_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements MustVerifyEmail, Auditable
{
    use HasApiTokens;
    use HasFactory;
    use HasRoles;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use \OwenIt\Auditing\Auditable;
    use LoadDefaults;
    use Impersonate;

    const STATUS_JOIN_REQUEST_DENIED = 0;
    const STATUS_JOIN_REQUEST_ACCEPTED = 1;
    const STATUS_JOIN_REQUEST_PENDING = 2;
    const STATUS_JOIN_REQUEST_NO_REQUEST = 3;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'company_id',
        'company_join_request',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected function casts(): array
    {
        return [
            'name' => 'string',
            'email' => 'string',
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'two_factor_secret' => 'string',
            'two_factor_recovery_codes' => 'string',
            'two_factor_confirmed_at' => 'datetime',
            'remember_token' => 'string',
            'profile_photo_path' => 'string'
        ];
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public static function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255|unique:users',
            'email_verified_at' => 'nullable',
            'password' => ['nullable', 'string', 'max:255', \Illuminate\Validation\Rules\Password::default(), 'confirmed'],
            'two_factor_secret' => 'nullable|string|max:65535',
            'two_factor_recovery_codes' => 'nullable|string|max:65535',
            'two_factor_confirmed_at' => 'nullable',
            'remember_token' => 'nullable|string|max:100',
            'current_team_id' => 'nullable',
            'profile_photo_path' => 'nullable|string|max:2048',
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
            'email' => __('Email'),
            'email_verified_at' => __('Email verified at'),
            'password' => __('Password'),
            'password_confirmation' => __('Confirm Password'),
            'two_factor_secret' => __('Two factor secret'),
            'two_factor_recovery_codes' => __('Two factor recovery codes'),
            'two_factor_confirmed_at' => __('Two factor confirmed at'),
            'remember_token' => __('Remember token'),
            'current_team_id' => __('Current team id'),
            'profile_photo_path' => __('Profile photo path'), // acho que vai saltar fora
            'created_at' => __('Created at'),
            'updated_at' => __('Updated at'),
            'toc' => __('Terms of service'),
            'roles' => __('Roles')
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
     * Return the first name of the user
     * @return mixed|string
     */
    public function getFirstNameAttribute() : string
    {
        $splitName = explode(' ', $this->name, 2);
        if(!empty($splitName[0]))
            return $splitName[0];
        else
            return "";
    }

        public function getCompanyJoinRequestLabelAttribute() : string
    {
        $array = static::getStatusArray();
        return $array[$this->status] ?? "";
    }

        public static function getStatusArray() : array
    {
        return [
            self::STATUS_JOIN_REQUEST_DENIED =>  __('Rejeitado'),
            self::STATUS_JOIN_REQUEST_ACCEPTED =>  __('Aprovado'),
            self::STATUS_JOIN_REQUEST_PENDING =>  __('Pendente'),
            self::STATUS_JOIN_REQUEST_NO_REQUEST =>  __('Inexistente'),
        ];
    }

    /**
     * Get the Roles string
     * @return string
     */
    public function getRolesLabelAttribute() : string
    {
        $roles = $this->getRoleNames()->toArray();

        if (\count($roles)) {
            return implode(', ', array_map(function ($item) {
                return ucwords($item);
            }, $roles));
        }

        return __('N/A');
    }

    /**
     * Get the Permissions string
     * @return string
     */
    public function getPermissionsLabelAttribute() : string
    {
        $permissions = $this->getDirectPermissions()->toArray();

        if (\count($permissions)) {
            return implode(', ', array_map(function ($item) {
                return ucwords($item['name']);
            }, $permissions));
        }

        return __('N/A');
    }


    /**
     * Return true or false if the user can impersonate an other user.
     *
     * @param void
     * @return  bool
     */
    public function canImpersonate() : bool
    {
        return $this->can(Permission::PERMISSION_ADMIN_FULL_APP);
    }

    /**
     * Return true or false if the user can be impersonate.
     *
     * @param void
     * @return  bool
     */
    public function canBeImpersonated() : bool
    {
        return !$this->can(Permission::PERMISSION_ADMIN_FULL_APP);
    }

    public function locks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Lock::class, 'user_id');
    }

    public function demos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Demo::class, 'user_id');
    }

    public function company(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function vacations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Vacation::class);
    }

    public function team(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
