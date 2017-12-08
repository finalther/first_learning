   <div class="scroll" style="width:260px;height:435px;margin-top:6%;float:left;overflow:hidden;border-right: solid 20px white">
      <ul class="nav nav-list">
            <form action="#" method="POST" id="formku">
              <li style="font-weight:bold">Pilih Dokumen</li>
                <select style="background:white;pading:5px;width:100%; height:25px;border:1px solid gray;" id= "select_uji" name="id">
                  <option>-- Silahkan pilih dokumen --</option>
              <?php
              $i=1;
              foreach ($artikel_uji as $key => $value) {
              ?>
                <option name="id" id= "select_uji" value='<?php echo $value->id?>'> <?php echo 'Dokumen ke -' .$value->id; ?></option>;
              <?php
                }
              ?>
                </select>
              <br>
              <br>
              <li style="font-weight:bold"> Judul Artikel:
                <h5 style="font-size:12px;padding:5px;border:1px solid gray;background:white;font-weight:normal" id="title_articel"> <br/><br/></h5>
              </li>
              <li style="font-weight:bold">Centang Fitur untuk Menghitung Nilainya !</li>
              <li><input type="checkbox" name="pilih_fitur[]" value="0">Posisi Kalimat di Paragraf(F1)</li>
              <li><input type="checkbox" name="pilih_fitur[]" value="1">Posisi Keseluruhan Kalimat(F2)</li>
              <li><input type="checkbox" name="pilih_fitur[]" value="2">Data Numerik(F3)</li>
              <li><input type="checkbox" name="pilih_fitur[]" value="3">Tanda Koma Terbalik(F4)</li>
              <li><input type="checkbox" name="pilih_fitur[]" value="4">Panjang kalimat(F5)</li>
              <li><input type="checkbox" name="pilih_fitur[]" value="5">Kata kunci(F6)</li>
              <br>
              <li><button class="btn btn-primary" onclick="ringkas_sekarang()" type="button" style="float: left;border-radius:0px;background-color:#0866C6"><i class=" fa fa-refresh "> RINGKAS SEKARANG</i></button></li>
              <li>&nbsp;</li>
            </form>
                   <!-- Button trigger modal -->

        </ul>
      </div>
      <!-- /. NAV SIDE  -->
       <div id="page-wrapper">
            <div class="header"> 
                <h3 class="page-header" style="padding:10px">
                         Dokumen <small>Sebelum Diringkas</small>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         Dokumen <small>Setelah Diringkas</small>
                </h3>
            </div>
              <div id="pageku">
                  <div id="sebelum_ringkas">
                  <textarea style="border:none;font-size:12px;width:48%;height:380px;padding:20px;float:left" readonly>
                  </textarea>                  
                  </div>
                  <div id="sesudah_ringkas">
                  <textarea style="border:none;font-size:12px;width:48%;height:380px;padding:0px;float:right" readonly>
                  </textarea>
                </div>
              </div>
               <!-- /. PAGE INNER  -->
        </div>
    </div>

<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Please Wait...</h4>
      </div>
      <div class="panel-body">
          <div class="progress progress-striped active">
          <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
      </div>
</div>

    </div>
  </div>
</div>


<!-- Small modal -->
<div class="modal" id="warning" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
       <div class="modal-body">
        <h4>Silahkan check fitur..</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="<?= base_url()?>assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="<?= base_url()?>assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="<?= base_url()?>assets/js/jquery.metisMenu.js"></script>
     <!-- Morris Chart Js -->
     <script src="<?= base_url()?>assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?= base_url()?>assets/js/morris/morris.js"></script>
      <!-- Custom Js -->
    <script src="<?= base_url()?>assets/js/custom-scripts.js"></script>
    
    <script type="text/javascript">

$('select').on('change', function() {
        $("#myModal").modal('show');

        var id=$("#select_uji").val();
        $.ajax({
          type:"POST",
          url:"<?php echo site_url()?>/c_index/get_data_uji/"+id,
          dataType:'json',  
          success:function(data) {
            $("#myModal").modal('hide');
            $("#title_articel").html(data.judul);
            $("#sebelum_ringkas").html("<textarea style='text-align:justify;padding:20px;border:none;font-size:12px;width:48%;height:380px;float:left' readonly >"+data.file+"</textarea>");
            $("#sesudah_ringkas").html("<textarea style='text-align:justify;padding:20px;border:none;font-size:12px;width:48%;height:380px;float:right' readonly> </textarea>");

          }
        });
      
})

function ringkas_sekarang(){
          var formdata=$("#formku").serialize();
          if( formdata.indexOf('pilih_fitur')==-1 ) {
              alert('Anda belum memilih fitur !');
              // $("#warning").modal('show');
              return false;
          }

          $("#myModal").modal('show');
          // var id=$("#select_uji").val();    
          $.ajax({
          type:"POST",
          url:"<?php echo site_url()?>/c_index/hitung_knn",
          data: $("#formku").serialize(),
          success:function(data) {
          $("#myModal").modal('hide');
          $("#sesudah_ringkas").html("<textarea style='text-align:justify;padding:20px;border:none;font-size:12px;width:48%;height:380px;float:right' readonly >"+data+"</textarea>");
          }
        });
}

</script>
</body>
</html>