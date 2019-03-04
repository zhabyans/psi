<footer class="footer">
            <div class="container-fluid">
                
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">TIF_C '15 Team</a>, Outlet SIP
                </p>
            </div>
        </footer>

    </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit</h4>
      </div>
      <div class="modal-body">
		  <form action="<?php echo base_url()?>/index.php/home/edit_barang" method="post">
			Nama barang
			<input id="nama" class="form-control" readonly><br>
			<input id="id" name="id" class="form-control" readonly><br>
			Tanggal masuk
			<input id="tanggal" class="form-control" readonly><br>
			Stok
			<input id="stok" name="stok" class="form-control"><br>
			<em>*anda hanya bisa mengubah stok</em>
      </div>
      <div class="modal-footer">
		<button type="submit" class="btn btn-info btn-fill">Iya</button>
        <button type="button" class="btn btn-danger btn-fill" data-dismiss="modal">Tidak</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi</h4>
      </div>
      <div class="modal-body">
	  <form action="<?php echo base_url()?>/index.php/home/hapus_barang" method="post">
        Apakah anda akan menghapus <em id="nama1"></em> pada tanggal <em id="tgl"></em>?<br>
        <input id="id_data" name="id_data"><br>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info btn-fill">Iya</button>
        <button type="button" class="btn btn-danger btn-fill" data-dismiss="modal">Tidak</button>
	  </form>
      </div>
    </div>

  </div>
</div>
<div id="hapusin" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Konfirmasi</h4>
      </div>
      <div class="modal-body">
	  <form action="<?php echo base_url()?>/index.php/home/hapus_transaksi" method="post">
        <label>Apakah anda akan menghapus barang dengan detail :</label><br>
        <input id="nama2" class="form-control" readonly name="nama2"><br>
        <input id="tanggal2" class="form-control" readonly name="tanggal2"><br>
        <input id="harga2" class="form-control" readonly name="harga2"><br>
        <input id="jumlah" class="form-control" readonly name="jumlah"><br>
        <input id="total" class="form-control" readonly name="total">
        <input id="id2" class="form-control" readonly name="id" type="hidden">
        <input id="id3" class="form-control" readonly name="id_trans" type="hidden">
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info btn-fill">Iya</button>
        <button type="button" class="btn btn-danger btn-fill" data-dismiss="modal">Tidak</button>
	  </form>
      </div>
    </div>

  </div>
</div>
</body>

	<script>
		function edit(nama,stok,id,tgl){
			document.getElementById('nama').value=nama;
			document.getElementById('stok').value=stok;
			document.getElementById('id').value=id;
			document.getElementById('tanggal').value=tgl;
		}
		function hapus(nama,id,tgl){
			document.getElementById('nama1').innerHTML=nama;
			document.getElementById('tgl').innerHTML=tgl;
			document.getElementById('id_data').value=id;
		}
	</script>
	<script>
		function hapusin(nama, tanggal, harga, jumlah, total, id, id_trans){
			document.getElementById('nama2').value=nama;
			document.getElementById('tanggal2').value=tanggal;
			document.getElementById('harga2').value=harga;
			document.getElementById('jumlah').value=jumlah;
			document.getElementById('total').value=total;
			document.getElementById('id2').value=id;
			document.getElementById('id3').value=id_trans;
		}
	</script>
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="<?php echo base_url()?>/assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>-->
    <script src="<?php echo base_url()?>/assets/js/jquery-2.0.2.min.js" type="text/javascript"></script>
	<link href="<?php echo base_url()?>/assets/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
	<link href="<?php echo base_url()?>/assets/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
	<script src="<?php echo base_url()?>/assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>/assets/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>/assets/datatables-responsive/dataTables.responsive.js"></script>
	<script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true,
			"ordering": false
        });
    });
    </script>

    <!--   Core JS Files   -->
	<script src="<?php echo base_url()?>/assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="<?php echo base_url()?>/assets/js/chartist.min.js"></script>
	<script>
	$(document).ready(function(){
		$("#bulanan").click(function(){
			$("#hari").hide();
			$("#bln").show();
			$("#thn").show();
			$('#bln').removeAttr('required');
			//$('#bln').attr('required', true);
		});
		$("#harian").click(function(){
			$("#bln").hide();
			$("#thn").hide();
			$("#hari").show();
			$('#hari').removeAttr('required');
			//$('#hari').attr('required', true);
		});
	});
	</script>
    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url()?>/assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="<?php echo base_url()?>/assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script>
type = ['','info','success','warning','danger'];


demo = {

    initChartist: function(){

        var dataSales = {
          labels: ['9:00AM', '12:00AM', '3:00PM', '6:00PM', '9:00PM', '12:00PM', '3:00AM', '6:00AM'],
          series: [
             [287, 385, 490, 492, 554, 586, 698, 695, 752, 788, 846, 944],
            [67, 152, 143, 240, 287, 335, 435, 437, 539, 542, 544, 647],
            [23, 113, 67, 108, 190, 239, 307, 308, 439, 410, 410, 509]
          ]
        };

        var optionsSales = {
          lineSmooth: false,
          low: 0,
          high: 800,
          showArea: true,
          height: "245px",
          axisX: {
            showGrid: false,
          },
          lineSmooth: Chartist.Interpolation.simple({
            divisor: 3
          }),
          showLine: false,
          showPoint: false,
        };

        var responsiveSales = [
          ['screen and (max-width: 640px)', {
            axisX: {
              labelInterpolationFnc: function (value) {
                return value[0];
              }
            }
          }]
        ];

        Chartist.Line('#chartHours', dataSales, optionsSales, responsiveSales);


        var data = {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          series: [
            [<?php echo $g_jan->jlh?>,<?php echo $g_feb->jlh?>,<?php echo $g_mar->jlh?>,<?php echo $g_apr->jlh?>,<?php echo $g_mei->jlh?>,<?php echo $g_jun->jlh?>,<?php echo $g_jul->jlh?>,<?php echo $g_ags->jlh?>,<?php echo $g_sep->jlh?>,<?php echo $g_okt->jlh?>,<?php echo $g_nov->jlh?>,<?php echo $g_des->jlh?> ],
            [<?php echo $r_jan->jlh?>,<?php echo $r_feb->jlh?>,<?php echo $r_mar->jlh?>,<?php echo $r_apr->jlh?>,<?php echo $r_mei->jlh?>,<?php echo $r_jun->jlh?>,<?php echo $r_jul->jlh?>,<?php echo $r_ags->jlh?>,<?php echo $r_sep->jlh?>,<?php echo $r_okt->jlh?>,<?php echo $r_nov->jlh?>,<?php echo $r_des->jlh?> ]
          ]
        };

        var options = {
            seriesBarDistance: 10,
            axisX: {
                showGrid: false
            },
            height: "245px"
        };

        var responsiveOptions = [
          ['screen and (max-width: 640px)', {
            seriesBarDistance: 5,
            axisX: {
              labelInterpolationFnc: function (value) {
                return value[0];
              }
            }
          }]
        ];

        Chartist.Bar('#chartActivity', data, options, responsiveOptions);

        var dataPreferences = {
            series: [
                [25, 30, 20, 25]
            ]
        };

        var optionsPreferences = {
            donut: true,
            donutWidth: 40,
            startAngle: 0,
            total: 100,
            showLabel: false,
            axisX: {
                showGrid: false
            }
        };

        Chartist.Pie('#chartPreferences', dataPreferences, optionsPreferences);

        Chartist.Pie('#chartPreferences', {
          labels: ['<?php echo 32?>%','<?php echo 32?>%'],
          series: [<?php echo 32?>, <?php echo 32?>]
        });
    },
	/*showNotification: function(from, align){
    	color = Math.floor((Math.random() * 4) + 1);

    	$.notify({
        	icon: "pe-7s-gift",
        	message: "Welcome to <b>Light Bootstrap Dashboard</b> - a beautiful freebie for every web developer."

        },{
            type: type[color],
            timer: 4000,
            placement: {
                from: from,
                align: align
            }
        });
	}*/


}

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#barang').on('change', function() {
            var stateID = $('#barang').val();
            if(stateID) {
                $.ajax({
                    url: '<?php echo base_url()?>/index.php/home/cari_tanggal',
                    type: "POST",
					data: {'id':stateID},
                    success:function(data) {
                        $("#tgl").html(data);
                    },error:function(){
						alert('euh');
					}
                });
            }else{
                $('#tgl').empty();
            }
        });
    });
</script>
<script>
	$(document).ready(function()
	{
	 $("#tgl").change(function()
	 {
		var barang = $("#barang").val();
		var tanggal = $("#tgl").val();
		if(barang == '' && tanggal==''){
			$("#stok").prop("disabled", true );
		}else{
			$("#stok").prop("disabled", false );
			$.ajax({
				type: "POST", 
				url: "<?php echo base_url(); ?>/index.php/home/cari_stok", 
				data: {"barang" : barang, "tanggal" : tanggal},
				success:function(data){
					document.getElementById('ha').value=data;
				},
				error: function(){
					alert('askjghkja');
				}
			});
		}
	 })
	});
</script>
	<script type="text/javascript">
    	$(document).ready(function(){
        	demo.initChartist();
    	});
	</script>

</html>
