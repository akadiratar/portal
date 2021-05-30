@extends('yonetim.kalip')

@section('icerik')

<script type="text/javascript">
jQuery(document).ready(function ($) {

  $("#secilitur").change(function(event) {
        var deger = $(this).val();

         $.ajax({

             url: deger, 

             type: "GET", 

             contentType: false, 

             cache: false, 

             processData:false, 

             success: function(data) 

             {

                $("#modeller").html(data); 
          }
        });

        return false;
    });
});

</script>

      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
            <li>Detaylı Sorgu</li>
        </ul>
      </div>
<hr>
<form class="form-horizontal" role="form" enctype="multipart/form-data" action="" method="post" >

  <div class="form-group">
    <label class="col-sm-1 control-label">Tür: </label>
    <div class="col-sm-11">
      <select name="tur_id" class="form-control" id="secilitur" required>
          <option disabled selected value="">Seçiniz</option>
          @foreach ($turler as $tur)
            <option value="{{ route('secilitur',$tur->id) }}">{{ $tur->tur_adi }}</option>
          @endforeach
      </select>
    </div>
  </div>

  <div class="form-group" id="modeller">
    
  </div>
    <button type="submit" class="btn btn-primary">Sorgula</button>
  </div>
</form>
@stop