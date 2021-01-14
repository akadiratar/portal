        @csrf
      	<div class="kt-portlet__body">
            <h1><code>{{$oda->oda_kodu}}</code></h1><br>
            <div class="form-group row">
              <label>Birim:</label>
              <select name="birim_id" class="form-control kt-selectpicker @error('birim_id') is-invalid @enderror" data-size="7" data-live-search="true" tabindex="-98">
                <option disabled="disabled" selected="selected">Seçiniz!</option>
                @foreach($birimler as $secili_birim)
                  <option value="{{$secili_birim->id}}" @if(old('birim_id') == $secili_birim->id || $oda->birim_id == $secili_birim->id) selected="selected" @endif>{{$secili_birim->birim_adi}}</option>
                @endforeach
              </select>
              <span class="form-text text-muted">Lütfen oda tanımlamak istediğiniz birimi seçin.</span>
              @error('birim_id')
                <div class="error" style="color: red;">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group row">
              <label>Oda Tipi:</label>
              <select name="oda_tipi_id" class="form-control kt-selectpicker @error('oda_tipi_id') is-invalid @enderror" data-size="7" data-live-search="true" tabindex="-98">
                <option disabled="disabled" selected="selected">Seçiniz!</option>
                @foreach($oda_tipleri as $secili_oda_tipi)
                  <option value="{{$secili_oda_tipi->id}}" @if(old('oda_tipi_id') == $secili_oda_tipi->id || $oda->oda_tipi_id == $secili_oda_tipi->id) selected="selected" @endif>{{$secili_oda_tipi->oda_tipi_adi}}</option>
                @endforeach
              </select>
              <span class="form-text text-muted">Lütfen tanımlamak istediğiniz odanın tipini seçin.</span>
              @error('oda_tipi_id')
                <div class="error" style="color: red;">{{ $message }}</div>
              @enderror
            </div>

        </div>