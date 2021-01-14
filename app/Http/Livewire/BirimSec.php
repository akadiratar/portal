<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Birim;

class BirimSec extends Component
{
	use WithPagination;
	public $searchText;
 
    public function render()
    {
    	$searchText = '%'.Birim::buyukHarfeCevir($this->searchText).'%';

        return view('livewire.birim-sec',[
            'birimler' => Birim::where('birim_adi','like', $searchText)->paginate(10)
        ]);
    }
}