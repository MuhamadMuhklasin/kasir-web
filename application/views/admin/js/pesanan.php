<script type="text/javascript">

	let tablePesanan = $(".table-pesanan").DataTable({
		processing : true,
		serverSide : true,
		ajax : '<?php echo base_url("admin/load_handle/touch/pesanan") ?>',	
		columnDefs : [
			{targets : [0], visible : false},
			{targets : "_all", visible : true}
		]
	})


	tablePesanan.on("click", "a", function() {
		let action = $(this).attr("data-action");
		let id = $(this).attr("id");

		console.log(id)

		let hapusData = () => {
			let confirm = window.confirm("Hapus pesanan ini ?");
			if(confirm) {
				$.ajax({
					url : '<?php echo base_url("admin/delete_handle/touch/pesanan") ?>',
					data : {idpesanan : id},
					type : "POST",
					beforeSend : function() {
						notif("Mohon tunggu sebentar...");
					},
					success : function(data) {
						data = JSON.parse(data);

						tablePesanan.ajax.reload();

						if(data.status == "ok") notif(data.msg);
						else alert(data);
					}
				})
			}
		}

		switch(action) {
			case "hapusData" :
				return hapusData();
				break;
		}
	})
</script>