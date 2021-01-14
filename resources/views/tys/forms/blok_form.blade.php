        @csrf
      	<div class="kt-portlet__body">
            <div class="form-group row">
              <label>Blok Adı:</label>
              <input type="text" class="form-control @error('blok_adi') is-invalid @enderror" name="blok_adi" autocomplete="off" value="{{ old('blok_adi') ?? $blok->blok_adi }}" >
              <span class="form-text text-muted">Lütfen yeni blok adını yazın. </span><br>
              @error('blok_adi')
                <div class="error" style="color: red;">{{ $message }}</div>
              @enderror
            </div>
        </div>