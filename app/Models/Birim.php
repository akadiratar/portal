<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use App\User;
use App\Models\Oda;
use Illuminate\Database\Eloquent\SoftDeletes;

class Birim extends Model
{
    //TANIMLAMALAR
    use SoftDeletes;
    protected $table = 'yapi_birimler';
    protected $guarded = [];

    //İLİŞKİLER
    public function kullanicilar()
    {
        return $this->hasMany('App\User', 'birim_id', 'id');
    }

    public function odalar()
    {
        return $this->hasMany('App\Models\Oda', 'birim_id', 'id');
    }

    public function birim()
    {
        return $this->belongsTo('App\Models\Birim', 'ust_birim_id', 'id');
    }




    //FONKSİYONLAR

    //Büyük harfe çevirme fonksiyonu
    public static function buyukHarfeCevir($data)
    {
        $search=array("i");
        $replace=array("İ");
        return mb_convert_case(str_replace($search,$replace,$data), MB_CASE_UPPER, "UTF-8");
    }

    //Birime bağlı alt birim var mı diye kontrol eden fonksiyon
    public function altBirimKontrol()
    {
      $birimler = Birim::where('ust_birim_id', $this->id)->get();
      if (count($birimler)>0) {
        return true;
      } else {
        return false;
      }
    }

    //Birime bağlı kullanıcı var mı diye kontrol eden fonksiyon
    public function kullaniciKontrol()
    {
      $kullanicilar = User::where('birim_id', $this->id)->get();
      if (count($kullanicilar)>0) {
        return true;
      } else {
        return false;
      }
    }

    //Birime bağlı oda var mı diye kontrol eden fonksiyon
    public function odaKontrol()
    {
      $odalar = Oda::where('birim_id', $this->id)->get();
      if (count($odalar)>0) {
        return true;
      } else {
        return false;
      }
    }

    //Envanter Takip Sisteminde bulunan sol taraftaki menü için temel birimler
    public static function temel_birimler()
    {
      return Birim::where('ust_birim_id', 0)->orderBy('birim_adi')->get();
    }

    //Treeview yapısı için birimleri iç içe dizi şekline getiriyor
     public static function birim_yapisi($birimler)
    {
        $yapi = array();
        foreach ($birimler as $birim) {
            $birimler = Birim::where('ust_birim_id', $birim->id)->get()->sortBy('birim_adi', SORT_NATURAL, false);
            $children = Birim::birim_yapisi($birimler);
            if ($children) {
                $birim['children'] = $children;
            } else {
                $birim['children'] = array();
            }
            $yapi[] = $birim;
        }
        return $yapi;
    }

    //Treeview yapısına uygun şekilde ul ve li yapısını ekliyor
    public static function treeview($birimler)
    {
    	echo '<ul role="group" class="jstree-children">';
    	foreach ($birimler as $birim) {
    		echo '<li role="treeitem" aria-selected="false" aria-labelledby="j2_'.$birim->id.'_anchor" aria-expanded="true" id="j2_'.$birim->id.'" class="jstree-node jstree-open"><i class="jstree-icon jstree-ocl" role="presentation"></i><a class="jstree-anchor" href="#" tabindex="-1" id="j2_'.$birim->id.'_anchor"><i class="jstree-icon jstree-themeicon fa fa-folder kt-font-warning jstree-themeicon-custom" role="presentation"></i>'.$birim->birim_adi.'</a>';
    		if (sizeof($birim->children)>0) {
    			Birim::treeview($birim->children);
    			echo "</li>";
    		} else {
    			echo "</li>";
    		}
    	}
    	echo '</ul>';
    }

    //Gelen birimi en üst birimine kadar getirip, linke de rotadan geleni yazıyor
    public static function birimUstbirimGetir($birim, $rota)
    {
        $yapi = array();
        if ($birim->ust_birim_id <> 0) {
            while (1 == 1) {
                if ($birim->ust_birim_id <> 0) {
                    $yapi[] = ' > <a href="'.route($rota, $birim->id).'">'.$birim->birim_adi.'</a>';
                } else {
                    $yapi[] = '<a href="'.route($rota, $birim->id).'">'.$birim->birim_adi.'</a>';
                }
                if (is_null($birim) || $birim->ust_birim_id == 0) {
                    break;
                }
                $birim = Birim::where('id', $birim->ust_birim_id)->first();
            }
        } else {
            $yapi[] = '<a href="'.route($rota, $birim->id).'">'.$birim->birim_adi.'</a>';
        }
        $yapi = array_reverse($yapi);
        $ust_birimler_tum = "";
        foreach ($yapi as $ust_birim) {
            $ust_birimler_tum .= $ust_birim;
        }
        return $ust_birimler_tum;
    }
    
    //Gelen birimi en üst birimine kadar getirip, linke de rotadan geleni yazıyor
    public static function birimUstbirimGetir2($birim)
    {
        $yapi = array();
        if ($birim->ust_birim_id <> 0) {
            while (1 == 1) {
                if ($birim->ust_birim_id <> 0) {
                    $yapi[] = ' > '.$birim->birim_adi;
                } else {
                    $yapi[] = $birim->birim_adi;
                }
                if (is_null($birim) || $birim->ust_birim_id == 0) {
                    break;
                }
                $birim = Birim::where('id', $birim->ust_birim_id)->first();
            }
        } else {
            $yapi[] = $birim->birim_adi;
        }
        $yapi = array_reverse($yapi);
        $ust_birimler_tum = "";
        foreach ($yapi as $ust_birim) {
            $ust_birimler_tum .= $ust_birim;
        }
        return $ust_birimler_tum;
    }

    //Gelen birimlerin adını, üst birimlerini ve idsini ayırarak sıralayıp dönderiyor
    public static function birimlerUstbirimGetir($birimler)
    {
        $islenmis_birimler = array();
        foreach ($birimler as $birim) {
            $ust_birimler = array();
            $birim_adi = "";
            $i = 1;
            $id_ler_icin = $birim;
            while (1 == 1) {
                if ($birim->ust_birim_id <> 0) {
                    if ($i <> 1) {
                        $ust_birimler[] = ' > '.$birim->birim_adi;
                    } else {
                        $birim_adi = $birim->birim_adi;
                    }
                } else {
                    if ($i <> 1) {
                        $ust_birimler[] = $birim->birim_adi;
                    } else {
                        $birim_adi = $birim->birim_adi;
                    }
                }
                if (is_null($birim) || $birim->ust_birim_id == 0) {
                    break;
                }
                $birim = Birim::where('id', $birim->ust_birim_id)->first();
                $i = $i+1;
            }
            $ust_birimler = array_reverse($ust_birimler);
            $ust_birimler_tum = "";
            foreach ($ust_birimler as $ust_birim) {
                $ust_birimler_tum .= $ust_birim;
            }

            if ($ust_birimler_tum <> "") {
                $islenmis_birimler[] = ['siralama' => $ust_birimler_tum.' > '.$birim_adi, 'ust_birimler' => $ust_birimler_tum, 'birim_adi' => $birim_adi, 'id' => $id_ler_icin->id, 'ust_birim_id' => $id_ler_icin->ust_birim_id];
            } else {
                $islenmis_birimler[] = ['siralama' => $birim_adi, 'ust_birimler' => 'TEMEL BİRİM', 'birim_adi' => $birim_adi, 'id' => $id_ler_icin->id, 'ust_birim_id' => $id_ler_icin->ust_birim_id];
            }
        }
        $islenmis_birimler = collect($islenmis_birimler)->sortBy('siralama', SORT_NATURAL, false);
        return $islenmis_birimler;
    }

    //Gelen birime bağlı alt birimler dışındaki birimlerin adını, üst birimlerini ve idsini ayırarak sıralayıp dönderiyor
    public static function secilebilirUstbirimler($secili_birim)
    {
        $birimler = Birim::all();
        $islenmis_birimler = array();
        foreach ($birimler as $birim) {
            $ust_birimler = array();
            $birim_adi = "";
            $gecerli_birim = true;
            $i = 1;
            $id_ler_icin = $birim;
            while (1 == 1) {
                if ($birim->id <> $secili_birim->id) {
                    if ($birim->ust_birim_id <> 0) {
                        if ($i <> 1) {
                            $ust_birimler[] = ' > '.$birim->birim_adi;
                        } else {
                            $birim_adi = $birim->birim_adi;
                        }
                    } else {
                        if ($i <> 1) {
                            $ust_birimler[] = $birim->birim_adi;
                        } else {
                            $birim_adi = $birim->birim_adi;
                        }
                    }
                } else {
                    $gecerli_birim = false;
                }
                
                if (is_null($birim) || $birim->ust_birim_id == 0) {
                    break;
                }
                $birim = Birim::where('id', $birim->ust_birim_id)->first();
                $i = $i+1;
            }
            if ($gecerli_birim == true) {
                $ust_birimler = array_reverse($ust_birimler);
                $ust_birimler_tum = "";
                foreach ($ust_birimler as $ust_birim) {
                    $ust_birimler_tum .= $ust_birim;
                }

                if ($ust_birimler_tum <> "") {
                    $islenmis_birimler[] = ['siralama' => $ust_birimler_tum.' > '.$birim_adi, 'ust_birimler' => $ust_birimler_tum, 'birim_adi' => $birim_adi, 'id' => $id_ler_icin->id, 'ust_birim_id' => $id_ler_icin->ust_birim_id];
                } else {
                    $islenmis_birimler[] = ['siralama' => $birim_adi, 'ust_birimler' => 'TEMEL BİRİM', 'birim_adi' => $birim_adi, 'id' => $id_ler_icin->id, 'ust_birim_id' => $id_ler_icin->ust_birim_id];
                }
            }
        }
        $islenmis_birimler = collect($islenmis_birimler)->sortBy('siralama', SORT_NATURAL, false);
        return $islenmis_birimler;
    }

}
