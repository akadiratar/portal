        @csrf
      	<div class="kt-portlet__body">
      		<div class="form-group row">
              <label>Kat Seç:</label>
              <select name="kat_id" class="form-control kt-selectpicker @error('kat_id') is-invalid @enderror" data-size="7" data-live-search="true" tabindex="-98">
          			<option disabled="disabled" selected="selected">Seçiniz!</option>
            		@foreach($katlar as $kat)
        					<option value="{{$kat->id}}" @if(old('kat_id') == $kat->id || $oda->kat_id == $kat->id) selected="selected" @endif>{{$kat->blok->blok_adi}} BLOK - {{$kat->kat_adi}}. KAT</option>
        				@endforeach
            	</select>
              <span class="form-text text-muted">Lütfen oda eklemek istediğiniz kat seçimini yapın.</span>
              @error('kat_id')
                <div class="error" style="color: red;">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group row">
              <label>Oda Numarası:</label>
              <input type="text" class="form-control @error('oda_numarasi') is-invalid @enderror" name="oda_numarasi" autocomplete="off" value="{{ old('oda_numarasi') ?? $oda->oda_numarasi }}" >
              <span class="form-text text-muted">Lütfen oda numarasını yazın. </span><br>
              @error('oda_numarasi')
                <div class="error" style="color: red;">{{ $message }}</div>
              @enderror
            </div>