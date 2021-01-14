        @csrf
      	<div class="kt-portlet__body">
      		  <div class="form-group row">
              <label>Üst Birim:</label>
              <select name="ust_birim_id" class="form-control kt-selectpicker @error('ust_birim_id') is-invalid @enderror" data-size="7" data-live-search="true" tabindex="-98">
          			<option disabled="disabled" selected="selected">Seçiniz!</option>
                <option value="0" @if(old('ust_birim_id') <> null || $birim->ust_birim_id === 0) selected="selected" @endif>TEMEL BİRİM</option>
            		@foreach($birimler as $secili_birim)
        					<option value="{{$secili_birim['id']}}" @if(old('ust_birim_id') == $secili_birim['id'] || $birim->ust_birim_id == $secili_birim['id']) selected="selected" @endif>{{$secili_birim['siralama']}}</option>
        				@endforeach
            	</select>
              <span class="form-text text-muted">Lütfen yukarıda bulunan birim yapısından eklemek istediğiniz birimin üst birimini seçin.</span>
              @error('ust_birim_id')
                <div class="error" style="color: red;">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group row">
              <label>Birim Adı:</label>
              <input type="text" class="form-control @error('birim_adi') is-invalid @enderror" name="birim_adi" autocomplete="off" value="{{ old('birim_adi') ?? $birim->birim_adi }}" >
              <span class="form-text text-muted">Lütfen yeni birim adını yazın. </span><br>
              @error('birim_adi')
                <div class="error" style="color: red;">{{ $message }}</div>
              @enderror
            </div>
        </div>