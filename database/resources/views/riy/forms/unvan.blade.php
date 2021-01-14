        @csrf
        <div class="kt-portlet__body">
            <div class="form-group">
              <label>Ünvan Adı:</label>
              <input type="text" class="form-control @error('unvan_adi') is-invalid @enderror" name="unvan_adi" autocomplete="off" value="{{ old('unvan_adi') ?? $unvan->unvan_adi }}">
              <span class="form-text text-muted">Lütfen ünvan adını yazın.</span>
              @error('unvan_adi')
                <div class="error" style="color: red;">{{ $message }}</div>
              @enderror
            </div>
        </div>