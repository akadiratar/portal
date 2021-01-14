        @csrf
        <div class="kt-portlet__body">
            <div class="form-group">
              <label>Rol Adı:</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="off" value="{{ old('name') ?? $rol->name }}" >
              <span class="form-text text-muted">Lütfen rol adını yazın. (Örnek: bilgi-islem-depo-sefi)</span>
              @error('name')
                <div class="error" style="color: red;">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Açıklama:</label>
              <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="off" value="{{ old('description') ?? $rol->description }}">
              <span class="form-text text-muted">Lütfen açıklamayı yazın. (Örnek: Bilgi işlem depo biriminde yapılmakta olan işlemlerle alakalı tüm yetkilere sahip rol.)</span>
              @error('description')
                <div class="error" style="color: red;">{{ $message }}</div>
              @enderror
            </div>
        </div>