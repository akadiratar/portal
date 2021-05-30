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
          <li>Oda Ekle</li>
        </ul>
      </div>
<hr>

<form class="form-horizontal" role="form" enctype="multipart/form-data" action="" method="post" >

    <div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i> Oda Ekleme Formu</h6></div>
        <div class="panel-body">

          <div class="form-group">
            <label class="col-sm-2 control-label">Blok: </label>
            <div class="col-sm-10">
                <select name="blok" class="form-control" required>
                  <option disabled selected value="">Seçiniz</option>
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                  <option value="E">E</option>
                  <option value="G">G</option>
                </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Kat: </label>
            <div class="col-sm-10">
              <select name="kat" class="form-control" required>
                <option disabled selected value="">Seçiniz</option>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
                <option value="Z">Z</option>
                <option value="1B">1B</option>
                <option value="2B">2B</option>
                <option value="2BA">2BA</option>
                <option value="3B">3B</option>
                <option value="3BA">3BA</option>
                <option value="4B">4B</option>
                <option value="4BA">4BA</option>
                <option value="5B">5B</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Oda No: </label>
            <div class="col-sm-10">
              <input type="number" name="oda_no" class="form-control" value="" required autocomplete="off">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Üst Birim: </label>
            <div class="col-sm-10">
              <select name="ust_birim_id" class="form-control" id="seciliustbirim" required>
                  <option disabled selected value="">Seçiniz</option>
                  @foreach ($ustbirimler as $ustbirim)
                    <option value="{{ route('seciliustbirim',$ustbirim->id) }}">{{ $ustbirim->ust_birim_adi }}</option>
                  @endforeach
              </select>
            </div>
          </div>

          <div class="form-group" id="birimler">
            
          </div>



          <div class="form-group">
            <label class="col-sm-2 control-label">Açıklama: </label>
            <div class="col-sm-10">
              <input type="text" name="aciklama" class="form-control" value="" placeholder="Odası, Savcı Odası, Kalemi, Duruşma Salonu, Hakimi, Arşivi, Danışma, SEGBİS Odası" required>
            </div>
          </div>

          <div class="form-actions text-right">
            <button type="submit" class="btn btn-primary">Ekle</button>
          </div>
        </div>
    </div>
</form>

@stop