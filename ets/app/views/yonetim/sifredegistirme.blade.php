@extends('yonetim.kalip')

@section('icerik')

      <div class="breadcrumb-line" style="margin: 0;">
        <ul class="breadcrumb">
          <li><a href="{{route('index')}}">Anasayfa</a></li>
          <li>Şifre Değiştir</li>
        </ul>
      </div>
<hr>
<form class="form-horizontal" role="form" enctype="multipart/form-data" action="" method="post" >

    <div class="panel panel-default">
        <div class="panel-heading"><h6 class="panel-title"><i class="icon-bubble4"></i> Şifre Değiştirme Formu</h6></div>
        <div class="panel-body">

          <div class="form-group">
            <label class="col-sm-2 control-label">Eski Şifre: </label>
            <div class="col-sm-10">
              <input type="password" name="eskisifre" class="form-control" value="" required autocomplete="off">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Yeni Şifre: </label>
            <div class="col-sm-10">
              <input type="password" name="yenisifre" id="s1" class="form-control" value="" required autocomplete="off">
            </div>
          </div>


          <div class="form-group">
            <label class="col-sm-2 control-label">Yeni Şifre Tekrar: </label>
            <div class="col-sm-10">
              <input type="password" name="yenisifretekrar" id="s2" class="form-control" value="" required autocomplete="off">
            </div>
          </div>
          
          <div class="form-actions text-right">
            <button type="submit"  id="btnEkle" class="btn btn-primary">Şifre Değiştir</button>
          </div>
        </div>
    </div>
</form>
<script>
     $(function(){
         $( "#btnEkle" ).click(function() {
             var sif1=$("#s1").val();
             var sif2=$("#s2").val();

             if (sif1!=sif2) {
                 alert("Girdiğiniz Şifreler Uyuşmuyor.");
                 return false;
             };
         });
     });
</script>
@stop