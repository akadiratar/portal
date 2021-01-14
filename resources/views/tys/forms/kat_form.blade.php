        @csrf
      	<div class="kt-portlet__body">
      		<div class="form-group row">
              <label>Blok:</label>
              <select name="blok_id" class="form-control kt-selectpicker @error('blok_id') is-invalid @enderror" data-size="7" data-live-search="true" tabindex="-98">
          			<option disabled="disabled" selected="selected">Seçiniz!</option>
            		@foreach($bloklar as $blok)
        					<option value="{{$blok->id}}" @if(old('blok_id') == $blok->id || $kat->blok_id == $blok->id) selected="selected" @endif>{{$blok->blok_adi}}</option>
        				@endforeach
            	</select>
              <span class="form-text text-muted">Lütfen kat eklemek istediğiniz blok seçimini yapın.</span>
              @error('blok_id')
                <div class="error" style="color: red;">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group row">
              <label>Kat Adı:</label>
              <input type="text" class="form-control @error('kat_adi') is-invalid @enderror" name="kat_adi" autocomplete="off" value="{{ old('kat_adi') ?? $kat->kat_adi }}" >
              <span class="form-text text-muted">Lütfen kat adını yazın. </span><br>
              @error('kat_adi')
                <div class="error" style="color: red;">{{ $message }}</div>
              @enderror
            </div>
        </div>