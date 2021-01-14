<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class DirektIzinTanimla extends Component
{

    public $selectedList = [];
    public $unselectedList = [];
    public $data;

    public $kullanici;

    public $izinler;

    public function mount($kullanici)
    {
        $this->izinler = Permission::orderBy('name', 'ASC')->get();
        $this->kullanici = $kullanici;
        foreach ($this->izinler as $key) {
            if ($kullanici->hasAnyDirectPermission($key->name)) {
                array_push($this->selectedList, $key->name);
            } else {
                array_push($this->unselectedList, $key->name);
            }
        }
    }


    public function render()
    {
        return view('livewire.direkt-izin-tanimla');
    }

    public function selectedItem($item)
    {
        array_push($this->selectedList, $item);
        
        if (($key = array_search($item, $this->unselectedList)) !== false) {
            unset($this->unselectedList[$key]);
        }

    }
    
    public function unselectedItem($item){
        array_push($this->unselectedList, $item);
    
        if (($key = array_search($item, $this->selectedList)) !== false) {
            unset($this->selectedList[$key]);
        }

    }

    public function gonder(){
        $this->data = $this->selectedList;
        $this->kullanici->syncPermissions($this->selectedList); 
        
        request()->session()->flash(
            'success',
            'Kullanıcı izinleri başarıyla güncellendi.'
        );
        return redirect()->route('riy_kullanici_detay', $this->kullanici->id);
    }

}
