<!-- modal ganti password -->
<div class="modal fade" id="ubah_password">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<form>
				<div class="modal-body">
					<div class="form-group form-float">
						<div class="form-line">
							<input type="password" name="password" class="form-control" required="" autofocus="">
							<label class="form-label">Masukkan katasandi</label>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="pull-left"><div class="loading-container"></div></div>
					<div class="pull-right">
						<button class="btn bg-pink btn-sm waves-effect" type="submit">Ganti</button>
						<button class="btn btn-default btn-sm waves-effect" data-dismiss="modal">Batal</button>
					</div>
					<div class="clearfix"></div>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).on("click", "#export", function(){
		let dir = "<?php echo str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']) ?>"+"backup";
		let excelExport = (data) => {
			$.ajax({
				url : "<?php echo base_url('report/excel/export') ?>",
				type : "POST",
				data : {ekspor : data},
				beforeSend : function() {
					notif("Sedang mengekspor ke direktori "+dir+" silahkan tunggu....");
				},
				success : function(data) {
					data = JSON.parse(data);
					(data.status == "ok") ? notif(data.msg) : notif("terjadi error saat mengekspor");
				}
			})
		}

		switch($(this).attr("data-export")) {
			case "pelanggan" :
				return excelExport("pelanggan");
				break;
			case "menu_resto" :
				return excelExport("menu_resto");
				break;
			case "pesanan" :
				return excelExport("pesanan");
				break;
			case "transaksi" :
				return excelExport("transaksi");
				break;
		}
	})

	$(document).on("keyup", "#numberFormat", function() {
		this.value = accounting.formatMoney(this.value, "Rp ", ".");
	})

	// ubah password
	$("#ubah_password").find($("form")).submit(function(e) {
		
		let parent = $("#ubah_password");

		e.preventDefault();

		$.ajax({
			url : "<?php echo base_url('init/touch/c_pass') ?>",
			data : $(this).serialize(),
			type : "POST",
			beforeSend : function() {
				parent.find($(".loading-container")).html(loading());
			},
			success : function(data) {
				data = JSON.parse(data);

				if(parent.modal("hide")) {
					if(data.status == "ok") notif(data.msg);
					else console.log(data);
				}
			},
			complete : function() {
				parent.find($(".loading-container")).html("");	
			}
		})
	})

</script>