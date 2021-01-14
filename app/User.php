<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, HasRoles;
    use SoftDeletes;
    protected $table = 'kullanicilar';

    protected $guarded = [];

    protected $hidden = [
        'parola', 'remember_token',
    ];

    public function unvan()
    {
        return $this->belongsTo('App\Models\Unvan', 'unvan_id', 'id');
    }

    public function birim()
    {
        return $this->belongsTo('App\Models\Birim', 'birim_id', 'id');
    }

    public function donanimlar()
    {
        return $this->hasMany('App\Models\Donanim', 'kullanici_id', 'id');
    }

    public static function kullanici_ara($request)
    {
        //isimden veya sicilden kullanıcı bulma fonksiyonu
        return User::where('kullanici_adi', 'like', '%'.$request->search.'%')->orWhere('kullanici_soyadi', 'like', '%'.$request->search.'%')->orWhere(DB::raw("CONCAT(kullanici_adi, ' ', kullanici_soyadi)"), 'like', '%'.$request->search.'%')->orWhere('kullanici_sicili', 'like', '%'.$request->search.'%')->orderBy('kullanici_adi', 'ASC')->orderBy('kullanici_soyadi', 'ASC')->get();
    }

    public static function checkAdminControl($data)
    {
        //admin mi diye kontrol eden fonksiyon
        if ($data->hasRole('administrator')) {
            return true;
        } else {
            return false;
        }
    }
}
