<div class="content-wrapper">
	<div class="container-fluid">
		<div class="content-header">
			<div class="alert alert-success">
				<i class="fas fa-file-invoice-dollar mr-1"></i>
				Form Tagihan
			</div>
			<?= $this->session->flashdata('pesan') ?>
			<label>Filter Berdasarkan</label>
			<select name="" class="form-control" id="filters">
				<option value="0">Tidak Ada Filter</option>
				<option value="1">Pembayaran dibawah 50%</option>
				<option value="2">Pembayaran diatas 50%</option>
				<option value="3">Sudah Lunas</option>
			</select>
		</div>
		<table class="table table-striped table-hover table-bordered">
			<thead>
                <tr>
    				<th>NO</th>
    				<th>USER ID</th>
    				<th>PRICE</th>
    				<th>ARP</th>
    				<th>ARO</th>
    				<th>STATUS</th>
    				<th>PERSENTASE</th>
    			</tr>	
            </thead>
			<tbody id="demo">
                
            </tbody>	
		</table>
	</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
        $("#filters").change(function(){

            tampil_data_tagihan();
        });
    });
    function tampil_data_tagihan(){
 
        var filter = document.getElementById('filters');
        if(filter.value == "0"){
            $( "#demo" ).load( "<?= base_url('tagihan/tampil_semua') ?>" );
        } else if(filter.value == "1"){
            $( "#demo" ).load( "<?= base_url('tagihan/tampil_dibawah50') ?>" );
        } else if(filter.value == "2"){
            $( "#demo" ).load( "<?= base_url('tagihan/tampil_diatas50') ?>" );
        } else if(filter.value == "3"){
            $( "#demo" ).load( "<?= base_url('tagihan/tampil_lunas') ?>" );
        }
    }
	
</script>
