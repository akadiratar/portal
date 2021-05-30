<label class="col-sm-2 control-label">Alttür: </label>
<div class="col-sm-10">
  <select name="sm_alttur_id" class="form-control" required>
      <option disabled selected value="">Seçiniz</option>
      @foreach ($altturler as $alttur)
        <option value="{{ $alttur->id }}">{{ $alttur->sm_alttur_adi }}</option>
      @endforeach
  </select>
</div>