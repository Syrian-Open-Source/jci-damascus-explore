<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use Laravel\Sanctum\HasApiTokens;

class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'email',
        'avatar',
        'email_verified_at',
        'is_approved',
        'fill_name_en',
        'fill_name_ar',
        'birth_date',
        'gender',
        'mobile',
        'whatsapp',
        'id_image',
        'image',
        'quote',
        'local_room',
        'food_allergy',
        'illnesses',
        'hotel_id',
        'total_cost',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hotel()
    {
        return $this->hasOneThrough(Hotel::class, UserInfo::class, "user_id", "id", "id", "hotel_id");
    }

    public static function getLocalRooms()
    {
        return [
            'Damascus',
            'Aleppo',
            'Homs',
            'Tartus',
            'Latakia',
            'Suwayda',
            'Wadi',
            'Ugarit',
            'Baniyas',
        ];
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'users_activities');
    }

    public function userInfo()
    {
        return $this->hasOne(UserInfo::class);
    }

    public function setImageAttribute($value)
    {
        $this->saveImage('image', $value);
    }

    public function setIdImageAttribute($value)
    {
        $this->saveImage('id_image', $value);
    }

    private function saveImage($attr, $value)
    {
        $attribute_name = $attr;
        // destination path relative to the disk above
        $destination_path = "public/$attr";

        // if the Cover was erased
        if ($value == null) {
            // delete the Cover from disk
            Storage::delete($this->{$attribute_name});

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // 0. Make the Cover
        $image = Image::make($value)->encode('jpg', 90);

        // 1. Generate a filename.
        $filename = md5($value.time()).'.jpg';

        // 2. Store the image on disk.
        Storage::put($destination_path.'/'.$filename, $image->stream());

        // 3. Delete the previous image, if there was one.
        Storage::delete(Str::replaceFirst('storage/', 'public/', $this->{$attribute_name}));


        $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
        $this->attributes[$attr] = $public_destination_path.'/'.$filename;
    }
}
