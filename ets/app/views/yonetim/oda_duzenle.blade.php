@extends('yonetim.kalip')

@section('icerik')
<script type="text/javascript">
jQuery(document).ready(function ($) {

  $("#seciliustbirim").change(function(event) {
        var deger = $(this).val();

         $.ajax({

             url: deger, 

             type: "GET", 

             contentType: false, 

             cache: false, 

             processData:false, 

             success: function(data) 

             {

                $("#birimler").html(data); 
          }
        });

        return false;
    });
});

</script>

      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Oda Düzenle</li>
        </ul>
      </div>
<hr>

<form class="form-horizontal" role="form" enctype="multipart/form-data" action="" method="post" >

    <div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i> Oda Düzenleme Formu</h6></div>
        <div class="panel-body">

          <div class="form-group">
            <label class="col-sm-2 control-label">Blok: </label>
            <div class="col-sm-10">
                <select name="blok" class="form-control" required disabled>
                  <option value="A" <?php if($oda->blok == "A") {echo "selected";} ?>>A</option>
                  <option value="B" <?php if($oda->blok == "B") {echo "selected";} ?>>B</option>
                  <option value="C" <?php if($oda->blok == "C") {echo "selected";} ?>>C</option>
                  <option value="D" <?php if($oda->blok == "D") {echo "selected";} ?>>D</option>
                  <option value="E" <?php if($oda->blok == "E") {echo "selected";} ?>>E</option>
                  <option value="G" <?php if($oda->blok == "G") {echo "selected";} ?>>G</option>
                </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Kat: </label>
            <div class="col-sm-10">
              <select name="kat" class="form-control" required disabled>
                <option value="5" <?php if($oda->kat == "5") {echo "selected";} ?>>5</option>
                <option value="4" <?php if($oda->kat == "4") {echo "selected";} ?>>4</option>
                <option value="3" <?php if($oda->kat == "3") {echo "selected";} ?>>3</option>
                <option value="2" <?php if($oda->kat == "2") {echo "selected";} ?>>2</option>
                <option value="1" <?php if($oda->kat == "1") {echo "selected";} ?>>1</option>
                <option value="Z" <?php if($oda->kat == "Z") {echo "selected";} ?>>Z</option>
                <option value="1B" <?php if($oda->kat == "1B") {echo "selected";} ?>>1B</option>
                <option value="2B" <?php if($oda->kat == "2B") {echo "selected";} ?>>2B</option>
                <option value="2BA" <?php if($oda->kat == "2BA") {echo "selected";} ?>>2BA</option>
                <option value="3B" <?php if($oda->kat == "3B") {echo "selected";} ?>>3B</option>
                <option value="3BA" <?php if($oda->kat == "3BA") {echo "selected";} ?>>3BA</option>
                <option value="4B" <?php if($oda->kat == "4B") {echo "selected";} ?>>4B</option>
                <option value="4BA" <?php if($oda->kat == "4BA") {echo "selected";} ?>>4BA</option>
                <option value="5B" <?php if($oda->kat == "5B") {echo "selected";} ?>>5B</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Oda No: </label>
            <div class="col-sm-10">
              <input type="number" name="oda_no" class="form-control" value="{{ $oda->oda_no }}" required autocomplete="off" disabled>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Üst Birim: </label>
            <div class="col-sm-10">
              <select name="ust_birim_id" class="form-control" id="seciliustbirim" required>
                  <option disabled selected value="">Seçiniz</option>
                  @foreach ($ustbirimler as $ustbirim)
                    <option value="{{ route('seciliustbirim',$ustbirim->id) }}" <?php if($oda->birim->ustbirim->id == $ustbirim->id) {echo "selected";} ?>>{{ $ustbirim->ust_birim_adi }}</option>
                  @endforeach
              </select>
            </div>
          </div>

          <div class="form-group" id="birimler">
            <label class="col-sm-2 control-label">Birim: </label>
            <div class="col-sm-10">
              <select name="birim_id" class="form-control" required>
                  <option disabled selected value="">Seçiniz</option>
                  @foreach ($birimler as $birim)
                    <option value="{{ $birim->id }}" <?php if($oda->birim_id == $birim->id) {echo "selected";} ?>>{{ $birim->birim_adi }}</option>
                  @endforeach
              </select>
            </div>
          </div>


          <div class="form-group">
            <label class="col-sm-2 control-label">Açıklama: </label>
            <div class="col-sm-10">
              <input type="text" name="aciklama" class="form-control" value="{{ $oda->aciklama }}" required>
            </div>
          </div>


          <div class="form-actions text-right">
            <button type="submit" class="btn btn-primary">Kaydet</button>
          </div>
        </div>
    </div>
</form>

@stop