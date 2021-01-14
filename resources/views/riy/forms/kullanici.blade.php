@csrf
        <div class="kt-portlet__body">
            <div class="form-group">
              <label>Kullanıcı Adı:</label>
              <input type="text" class="form-control @error('kullanici_adi') is-invalid @enderror" name="kullanici_adi" autocomplete="off" value="{{ old('kullanici_adi') ?? $kullanici->kullanici_adi }}">
              <span class="form-text text-muted">Lütfen kullanıcı adını yazın.</span>
              @error('kullanici_adi')
                <div class="error" style="color: red;">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label>Kullanıcı Soyadı:</label>
              <input type="text" class="form-control @error('kullanici_soyadi') is-invalid @enderror" name="kullanici_soyadi" autocomplete="off" value="{{ old('kullanici_soyadi') ?? $kullanici->kullanici_soyadi }}">
              <span class="form-text text-muted">Lütfen kullanıcı soyadını yazın.</span>
              @error('kullanici_soyadi')
                <div class="error" style="color: red;">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label>Kullanıcı Sicili:</label>
              <input type="text" class="form-control @error('kullanici_sicili') is-invalid @enderror" name="kullanici_sicili" autocomplete="off" value="{{ old('kullanici_sicili') ?? $kullanici->kullanici_sicili }}">
              <span class="form-text text-muted">Lütfen kullanıcı soyadını yazın.</span>
              @error('kullanici_sicili')
                <div class="error" style="color: red;">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
                <label>Kullanıcı Ünvanı:</label>
                <select name="unvan_id" class="form-control kt-selectpicker @error('unvan_id') is-invalid @enderror" data-size="7" data-live-search="true" tabindex="-98">
          			<option disabled="disabled" selected="selected">SEÇİNİZ!</option>
            		@foreach($unvanlar as $unvan)
                        <option value="{{$unvan->id}}" @if(old('unvan_id') == $unvan->id || $kullanici->unvan_id == $unvan->id) selected="selected" @endif>{{$unvan->unvan_adi}}</option>
                    @endforeach
            	</select>
                <span class="form-text text-muted">Lütfen yukarıda bulunan kullanıcı ünvanlarından seçim yapın.</span>
                @error('unvan_id')
                    <div class="error" style="color: red;">{{ $message }}</div>
                @enderror
            </div>
        </div>