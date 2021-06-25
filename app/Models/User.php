<?php

namespace App\Models;

use Parental\HasChildren;
use App\Http\Filters\Filterable;
use App\Http\Filters\UserFilter;
use Laravel\Sanctum\HasApiTokens;
use App\Support\Traits\Selectable;
use App\Models\Helpers\UserHelpers;
use App\Http\Resources\CustomerResource;
use App\Models\Presenters\UserPresenter;
use Illuminate\Notifications\Notifiable;
use Astrotomic\Translatable\Translatable;
use Laracasts\Presenter\PresentableTrait;
use App\Models\Translations\UserTranslation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use AhmedAliraqi\LaravelMediaUploader\Entities\Concerns\HasUploader;

class User extends Authenticatable
{
    use HasFactory,
        Notifiable,
        UserHelpers,
        HasChildren,
        HasApiTokens,
        PresentableTrait,
        Filterable,
        Selectable,
        Translatable;

    public $translatedAttributes = ['about'];

    /**
     * The code of admin type.
     *
     * @var string
     */
    const ADMIN_TYPE = 'admin';

    /**
     * The code of customer type.
     *
     * @var string
     */
    const CUSTOMER_TYPE = 'customer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'remember_token',
        'specialization_id',
        'active',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['translations'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array
     */
    protected $childTypes = [
        self::ADMIN_TYPE => Admin::class,
        self::CUSTOMER_TYPE => Customer::class,
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The presenter class name.
     *
     * @var string
     */
    protected $presenter = UserPresenter::class;

    /**
     * The model filter name.
     *
     * @var string
     */
    protected $filter = UserFilter::class;

    /**
     * user translation model.
     * @var string
     */
    public $translationModel = UserTranslation::class;

    /**
     * Get the number of models to return per page.
     *
     * @return int
     */
    public function getPerPage()
    {
        return request('perPage', parent::getPerPage());
    }

    /**
     * Get the resource for customer type.
     *
     * @return \App\Http\Resources\CustomerResource
     */
    public function getResource()
    {
        return new CustomerResource($this);
    }

    /**
     * Get the access token currently associated with the user. Create a new.
     *
     * @param string|null $device
     * @return string
     */
    public function createTokenForDevice($device = null)
    {
        $device = $device ?: 'Unknown Device';

        $this->tokens()->where('name', $device)->delete();

        return $this->createToken($device)->plainTextToken;
    }
}
