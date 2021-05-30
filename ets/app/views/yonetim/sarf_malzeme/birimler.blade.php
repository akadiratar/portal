<label class="col-sm-2 control-label">Birim: </label>
<div class="col-sm-10">
  <select name="sm_birim_id" class="form-control" required>
      <option disabled selected value="">Seçiniz</option>
      @foreach ($birimler as $birim)
        <option value="{{ $birim->id }}">{{ $birim->birim_adi }}</option>
      @endforeach
  </select>
</div>