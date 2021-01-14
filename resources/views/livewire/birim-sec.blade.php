<div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <input type="text"  class="form-control" placeholder="Ara" wire:model="searchText" />
            <br>
            {{ $birimler->links() }}
            <table class="table table-bordered" style="margin: 10px 0 10px 0;">
                <tr>
                	<th>Birim</th>
                </tr>
                @foreach($birimler as $birim)
                <tr>
                	<td>
                		{{ \App\Models\Birim::birimUstbirimGetir2($birim) }}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
</div>
