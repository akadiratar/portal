        @csrf
      	<div class="kt-portlet__body">
            <div class="form-group row">
              <label>Oda Tipi Adı:</label>
              <input type="text" class="form-control @error('oda_tipi_adi') is-invalid @enderror" name="oda_tipi_adi" autocomplete="off" value="{{ old('oda_tipi_adi') ?? $oda_tipi->oda_tipi_adi }}" >
              <span class="form-text text-muted">Lütfen yeni oda tipi adını yazın. </span><br>
              @error('oda_tipi_adi')
                <div class="error" style="color: red;">{{ $message }}</div>
              @enderror
            </div>
        </div>