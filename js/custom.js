$(document).ready(function(){

	// tạo sự kiện click nút Sửa nhà cung cấp
	$("body").on("click", ".btn-show", function(){
		$this = $(this);
		$modal = $("#SuaNCC");
		// lấy id
		var id = $this.data("id");
		// ajax lay data tu id
		$.ajax({

			url: "./controller/suanhacungcap_ajax.php?id=" + id,
			type: "json"
		}).done(function(resp){
			// neu thanh cong
			if(resp.result){
				// fill data lay tu api
				$modal.find("input[name=ncc_id]").val(resp.data.ncc_id);
				$modal.find("input[name=ncc_name]").val(resp.data.ncc_name);
				$modal.find("input[name=ncc_address]").val(resp.data.ncc_address);
				$modal.find("input[name=ncc_matchday]").val(resp.data.ncc_matchday.slice(0,10));
				console.log(resp.data.ncc_matchday.slice(0,10));
				$modal.find("input[name=ncc_note]").val(resp.data.ncc_note);
				// hien modal
				$modal.modal("show");
			}else{
				alert(resp.message);
			}
			
		}).fail(function(err){
			// thong bao loi
			// code in here
			// alert()
		});
		
	});

	// tạo sự kiện click nút Xóa nhà cung cấp
	$("body").on("click", ".btn-xoa", function(){
		$this = $(this);
		$modal = $("#XoaNcc");
		// lấy id
		var id = $this.data("id");
		// ajax lay data tu id
		$.ajax({

			url: "./controller/suanhacungcap_ajax.php?id=" + id,
			type: "json"
		}).done(function(resp){
			// neu thanh cong
			if(resp.result){
				// fill data lay tu api
				$modal.find("input[name=ncc_id]").val(resp.data.ncc_id);
				$modal.find("input[name=ncc_name]").val(resp.data.ncc_name);
				$modal.find("input[name=ncc_address]").val(resp.data.ncc_address);
				$modal.find("input[name=ncc_matchday]").val(resp.data.ncc_matchday);
				$modal.find("input[name=ncc_note]").val(resp.data.ncc_note);
				// hien modal
				$modal.modal("show");
			}else{
				alert(resp.message);
			}
			
		}).fail(function(err){
			// thong bao loi
			// code in here
			// alert()
		});
		
	});


	// tạo sự kiện click nút Sửa NHÂN VIÊN
	$("body").on("click", ".btn-suanv", function(){
		$this = $(this);
		$modal = $("#SuaNV_Modal");
		// lấy id
		var id = $this.data("id");
		// ajax lay data tu id
		$.ajax({

			url: "./controller/suanhanvien_ajax.php?id=" + id,
			type: "json"
		}).done(function(resp){
			// neu thanh cong
			if(resp.result){
				// fill data lay tu api
				$modal.find("input[name=u_id]").val(resp.data.id);
				$modal.find("input[name=u_fn]").val(resp.data.first_name);
				$modal.find("input[name=u_ln]").val(resp.data.last_name);
				$modal.find("input[name=u_dob]").val(resp.data.dob.slice(0,10));
				$modal.find("input[name=u_email]").val(resp.data.email);
				$modal.find("input[name=u_user]").val(resp.data.username);
				$modal.find("input[name=u_pwd]").val(resp.data.pwd);
				$modal.find("input[name=u_salary]").val(resp.data.staff_salary);
				$modal.find("input[name=u_role]").val(resp.data.role);
				$modal.find("option[value='"+resp.data.role+"']").attr('selected','true')
				// $modal.find("input[name=u_isActive]").val(resp.data.isActive);
				$modal.find("option[value='"+resp.data.isActive+"']").attr('selected','true')
				// hien modal
				$modal.modal("show");
			}else{
				alert(resp.message);
			}
			
		}).fail(function(err){
			// thong bao loi
			// code in here
			// alert()
		});
		
	});

	// tạo sự kiện click nút XÓA NHÂN VIÊN
	$("body").on("click", ".btn-xoanv", function(){
		$this = $(this);
		$modal = $("#DeteteNV_Modal");
		// lấy id
		var id = $this.data("id");
		// ajax lay data tu id
		$.ajax({

			url: "./controller/suanhanvien_ajax.php?id=" + id,
			type: "json"
		}).done(function(resp){
			// neu thanh cong
			if(resp.result){
				// fill data lay tu api
				$modal.find("input[name=u_id]").val(resp.data.id);
				$modal.find("input[name=u_fn]").val(resp.data.first_name);
				$modal.find("input[name=u_ln]").val(resp.data.last_name);
				$modal.find("input[name=u_dob]").val(resp.data.dob.slice(0,10));
				$modal.find("input[name=u_user]").val(resp.data.username);
				$modal.find("input[name=u_pwd]").val(resp.data.pwd);
				$modal.find("input[name=u_salary]").val(resp.data.staff_salary);
				$modal.find("input[name=u_role]").val(resp.data.role);
				$modal.find("option[value='"+resp.data.role+"']").attr('selected','true')
				// hien modal
				$modal.modal("show");
			}else{
				alert(resp.message);
			}
			
		}).fail(function(err){
			// thong bao loi
			// code in here
			// alert()
		});
		
	});

	// THIẾT BỊ
	// XỬ LÝ SỰ KIỆN XEM THÔNG TIN THIẾT BỊ
	$("body").on("click", ".btn-showtb", function(){
		$this = $(this);
		$modal = $("#DetailEquipment");
		// lấy id
		var id = $this.data("id");
		// ajax lay data tu id
		$.ajax({
			url: "./controller/thietbi_xem.php?id=" + id,
			type: "json"
		}).done(function(resp){
			// neu thanh cong
			if(resp.result){
				// fill data lay tu api
				console.log("data" + resp.data.name)

				$modal.find("input[name=eq_id]").val(resp.data.eq_id);
				$modal.find("input[name=eq_name]").val(resp.data.eq_name);
				$modal.find("input[name=eq_quantity]").val(resp.data.eq_quantity);
				$modal.find("input[name=eq_ngaynhaphang]").val(resp.data.eq_ngaynhaphang.slice(0,10));
				$modal.find("input[name=eq_ngayhethanbaohanh]").val(resp.data.eq_ngayhethanbaohanh.slice(0,10));
				$modal.find("input[name=eq_dongia]").val(resp.data.eq_dongia);
				$modal.find("option[value='"+resp.data.eq_status+"']").attr('selected','true')
				$modal.find("img").attr("src", "./assets/thietbi/"+resp.data.eq_image+"")
				// hien modal
				$modal.modal("show");
			}else{
				alert(resp.message);
			}
			
		}).fail(function(err){
			// thong bao loi
			// code in here
			// alert()
		});
		
	});

	// XỬ LÝ SỰ KIỆN SỬA THIẾT BỊ
	$("body").on("click", ".btn-edittb", function(){
		$this = $(this);
		$modal = $("#EditEquipment");
		// lấy id
		var id = $this.data("id");
		// ajax lay data tu id
		$.ajax({
			url: "./controller/thietbi_sua_ajax.php?id=" + id,
			type: "json"
		}).done(function(resp){
			// neu thanh cong
			if(resp.result){
				// fill data lay tu api
				console.log("data" + resp.data.name)

				$modal.find("input[name=eq_id]").val(resp.data.eq_id);
				$modal.find("input[name=eq_name]").val(resp.data.eq_name);
				$modal.find("input[name=eq_quantity]").val(resp.data.eq_quantity);
				$modal.find("input[name=eq_ngaynhaphang]").val(resp.data.eq_ngaynhaphang.slice(0,10));
				$modal.find("input[name=eq_ngayhethanbaohanh]").val(resp.data.eq_ngayhethanbaohanh.slice(0,10));
				$modal.find("input[name=eq_dongia]").val(resp.data.eq_dongia);
				$modal.find("option[value='"+resp.data.eq_status+"']").attr('selected','true')
				// hien modal
				$modal.modal("show");
			}else{
				alert(resp.message);
			}
			
		}).fail(function(err){
			// thong bao loi
			// code in here
			// alert()
		});
		
	});


	 // XỬ LÝ SỰ KIỆN XÓA THIẾT BỊ
	$("body").on("click", ".btn-xoatb", function(){
		debugger;
		$this = $(this);
		$modal = $("#DeleteEquipment");
		// lấy id
		var id = $(this).attr("data-id");
		var id = $this.data("id");
		$modal.find("input[name=eq_id]").val(id);
	});

	// HÓA ĐƠN

	// XỬ LÝ SỰ KIỆN XEM HÓA ĐƠN
	$("body").on("click", ".btn-showhd", function(){
		$this = $(this);
		$modal = $("#DetailHoaDon");
		// lấy id
		var id = $this.data("id");
		$.ajax({
			url: "./controller/hoadon_sua_ajax.php?id=" + id,
			type: "json"
		}).done(function(resp){
			// neu thanh cong
			if(resp.result){
				// fill data lay tu api
				$modal.find("input[name=hd_id]").val(resp.data.hoadon_id);
				$modal.find("input[name=hd_by]").val(resp.data.hoadon_CreactedBy);
				$modal.find("input[name=hd_eq_name]").val(resp.data.eq_name);
				$modal.find("input[name=hd_eq_ncc]").val(resp.data.ncc_name);
				$modal.find("input[name=hd_createDate]").val(resp.data.ngaylaphoadon.slice(0,10));
				$modal.find("input[name=hd_quantity]").val(resp.data.soluong);
				$modal.find("input[name=hd_unit]").val(resp.data.hoadon_dongia);
				$modal.find("input[name=hd_total]").val(resp.data.total);
				$modal.find("option[value='"+resp.data.hoadon_type+"']").attr('selected','true')
				// hien modal
				$modal.modal("show");
			}else{
				alert(resp.message);
			}
			
		}).fail(function(err){
			// thong bao loi
			// code in here
			alert("Lay that bai")
		});
	});

	// XỬ LÝ SỰ KIỆN SỬA HÓA ĐƠN
	$("body").on("click", ".btn-edithd", function(){
		debugger;
		$this = $(this);
		$modal = $("#EditHoaDon");
		// lấy id
		var id = $this.data("id");
		$.ajax({
			url: "./controller/hoadon_sua_ajax.php?id=" + id,
			type: "json"
		}).done(function(resp){
			// neu thanh cong
			if(resp.result){
				// fill data lay tu api
				$modal.find("input[name=hd_id]").val(resp.data.hoadon_id);
				$modal.find("input[name=hd_by]").val(resp.data.hoadon_CreactedBy);
				$modal.find("input[name=hd_eq_name]").val(resp.data.eq_name);
				$modal.find("input[name=hd_eq_ncc]").val(resp.data.ncc_name);
				$modal.find("input[name=hd_createDate]").val(resp.data.ngaylaphoadon.slice(0,10));
				$modal.find("input[name=hd_quantity]").val(resp.data.soluong);
				$modal.find("input[name=hd_unit]").val(resp.data.hoadon_dongia);
				$modal.find("input[name=hd_total]").val(resp.data.total);
				$modal.find("option[value='"+resp.data.hoadon_type+"']").attr('selected','true')
				// hien modal
				$modal.modal("show");
			}else{
				alert(resp.message);
			}
			
		}).fail(function(err){
			// thong bao loi
			// code in here
			alert("Lay that bai")
		});
	});

	// XỬ LÝ SỰ KIỆN XÓA HÓA ĐƠN
	$("body").on("click", ".btn-xoahd", function(){
		$this = $(this);
		$modal = $("#DeleteHoaDon");
		// lấy id
		var id = $this.data("id");
		$.ajax({
			url: "./controller/hoadon_sua_ajax.php?id=" + id,
			type: "json"
		}).done(function(resp){
			// neu thanh cong
			if(resp.result){
				// fill data lay tu api
				$modal.find("input[name=hd_id]").val(resp.data.hoadon_id);
				$modal.find("input[name=hd_by]").val(resp.data.hoadon_CreactedBy);
				$modal.find("input[name=hd_eq_name]").val(resp.data.eq_name);
				$modal.find("input[name=hd_eq_ncc]").val(resp.data.ncc_name);
				$modal.find("input[name=hd_createDate]").val(resp.data.ngaylaphoadon.slice(0,10));
				$modal.find("input[name=hd_quantity]").val(resp.data.soluong);
				$modal.find("input[name=hd_unit]").val(resp.data.hoadon_dongia);
				$modal.find("input[name=hd_total]").val(resp.data.total);
				$modal.find("option[value='"+resp.data.hoadon_type+"']").attr('selected','true')
				// hien modal
				$modal.modal("show");
			}else{
				alert(resp.message);
			}
			
		}).fail(function(err){
			// thong bao loi
			// code in here
			alert("Lay that bai")
		});
	});

})