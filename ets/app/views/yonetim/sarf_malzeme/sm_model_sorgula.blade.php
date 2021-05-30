@extends('yonetim.kalip')

@section('icerik')

<script type="text/javascript">
jQuery(document).ready(function ($) {

  $("#smsecilitur").change(function(event) {
        var deger = $(this).val();

         $.ajax({

             url: deger, 

             type: "GET", 

             contentType: false, 

             cache: false, 

             processData:false, 

             success: function(data) 

             {

                $("#smaltturler").html(data); 
          }
        });

        return false;
    });
});

</script>

      <!-- Breadcrumbs line -->
      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
            <li>Sarf Malzeme Model Sorgula</li>
        </ul>
      </div>
      <!-- /breadcrumbs line -->
<hr>
<form class="form-horizontal" role="form" enctype="multipart/form-data" action="" method="post" >

  <div class="form-group">
    <label class="col-sm-2 control-label">Tür: </label>
    <div class="col-sm-10">
      <select name="sm_tur_id" class="form-control" id="smsecilitur" required>
          <option disabled selected value="">Seçiniz</option>
          @foreach ($smturler as $smtur)
            <option value="{{ route('sm_secili_tur',$smtur->id) }}">{{ $smtur->sm_tur_adi }}</option>
          @endforeach
      </select>
    </div>
  </div>

  <div class="form-group" id="smaltturler">

  </div>
  <div class="form-actions text-right">
    <button type="submit" class="btn btn-primary">Sorgula</button>
  </div>
</form>
@stop