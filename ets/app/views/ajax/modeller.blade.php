<label class="col-sm-1 control-label">Model: </label>
<div class="col-sm-11">
  <select name="model" class="form-control" required>
      <option disabled selected value="">Seçiniz</option>
      <option value="tumu">Tümü</option>
      @foreach ($modeller as $model)
        <option value="{{ $model->id }}" data-module="{{ $model->tur_id }}">{{ $model->model_adi }}</option>
      @endforeach
  </select>
</div>