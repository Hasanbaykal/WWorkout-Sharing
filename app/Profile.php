<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/0aQGcmNhrHbZ7uD2pgKkNfxaCQscfVEoAktdCBm4.png';
        return '/storage/' .  $imagePath;
    }

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
