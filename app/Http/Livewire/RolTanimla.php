<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RolTanimla extends Component
{

    public $selectedList = [];
    public $unselectedList = [];
    public $data;

    public $kullanici;

    public $roller;

    public function mount($kullanici)
    {
        $this->roller = Role::orderBy('name', 'ASC')->get();
        $this->kullanici = $kullanici;
        foreach ($this->roller as $key) {
            if ($kullanici->hasRole($key->name)) {
                array_push($this->selectedList, $key->name);
            } else {
                array_push($this->unselectedList, $key->name);
            }
        }
    }


    public function render()
    {
        return view('livewire.rol-tanimla');
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
        $this->kullanici->roles()->detach(); 
        foreach ($this->selectedList as $key) {
            $this->kullanici->assignRole($key);
        }
        
        request()->session()->flash(
            'success',
            'Kullanıcı rolleri başarıyla güncellendi.'
        );
        return redirect()->route('riy_kullanici_detay', $this->kullanici->id);
    }

}
