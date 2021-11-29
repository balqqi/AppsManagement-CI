

$(document).ready(function() {
  $(document).on('click', '#global-sel-id tr' ,function() {
        var row = $(this).find('td').map(function() {
           return $(this).text();
        }).get();

        if (modalTipe == "list_employee") {
            if (typeof row[0] !== "undefined") {
                $('#employee_id').val($.trim(row[0])).change();
                $('#employee_name').val($.trim(row[1]));
                $('#global-modal').modal('hide');
            }
        }else if (modalTipe == "list_user") {
            if (typeof row[0] !== "undefined") {
                $('#user_id').val($.trim(row[0])).change();
                $('#username').val($.trim(row[1])).change();
                $('#global-modal').modal('hide');
            }
        }else if (modalTipe == 2) {
            if (typeof row[0] !== "undefined") {
                $('#input-tahun').val($.trim(row[0])).change();
                $('#global-modal').modal('hide');
            }
        }else if (modalTipe == 3) {
            if (typeof row[0] !== "undefined") {
                $('#input-bulan').val($.trim(row[0])).change();
                $('#input-bulan-name').val($.trim(row[1])).change();
                $('#input-bulan2').val($.trim(row[0])).change();
                $('#input-bulan-name2').val($.trim(row[1])).change();
                $('#global-modal').modal('hide');
            }
        }
        else if (modalTipe ==4) {
            if (typeof row[0] !== "undefined") {
                $('#input-jenis-id').val($.trim(row[0])).change();
                $('#input-jenis-name').val($.trim(row[1])).change();
                $('#global-modal').modal('hide');
            }
        }else if (modalTipe == 5) {

            if($.trim(row[3]) == '5'){
                var index = $("#temp-id-perkiraan").val();
                var id = $.trim(row[0]);
                if (typeof row[0] !== "undefined") {
        

                var list = new Array();

                $("input[id^='input-account']").each(function() {
                    var param = $(this).val()+'#'+$(this).closest('tr').find("input[id^='lokasi']").val()+'#'+$(this).closest('tr').find("input[id^='tm']").val();
                    list.push(param);
                });

                var position = $('#input-lokasi'+index).val();
                var tm = $('#input-tm'+index).val();
                if(jQuery.inArray($.trim(row[0])+'#'+position+'#'+tm,list) != -1){
                    jAlert('Kode aktivitas dengan lokasi tersebut sudah dipilih!!!','Warning');
                    return false;
                }else{
                    $('#input-account'+index).val($.trim(row[0])).change();
                    $('#input-account'+index).focus();
                    $('#input-desc'+index).val($.trim(row[1])).change();
                    $('#input-sts'+index).val($.trim(row[2])).change();
                    
                }
                    loadDelimiter();
                    $('#global-modal').modal('hide');
                }
            }
        }else if (modalTipe == 6) {
            var index = $("#temp-id-aktivitas").val();
            if (typeof row[0] !== "undefined") {
                $('#input-kode-aktv'+index).val($.trim(row[0])).change();
                $('#input-kode-aktv'+index).focus();
                $('#global-modal').modal('hide');
            }
        }else if (modalTipe == 7) {
            if (typeof row[0] !== "undefined") {
                $('#input-dept-id').val($.trim(row[0])).change();
                $('#input-dept-name').val($.trim(row[1])).change();
                $('#global-modal').modal('hide');
            }
        }else if (modalTipe == 8) {
            
            if (typeof row[0] !== "undefined") {
                $('#input-modul-id').val($.trim(row[0])).change();
                $('#input-modul-name').val($.trim(row[1])).change();       
                $('#input-noref').val("");
                $('#btn-proses').attr('disabled','disabled');
                $('#global-modal').modal('hide');
                if($.trim(row[0]) == '99'){
                    $("#input-noref").removeAttr("readonly");
                }
                else{
                    $("#input-noref").attr("readonly","readonly");
                } 

                if (typeof changedetail !== 'undefined' && $.isFunction(changedetail)) {
                    changedetail($.trim(row[0]));
                }
            }
        }else if (modalTipe == 9) {
    
            if (typeof row[0] !== "undefined") {
                
                $('#input-kepada1').val($.trim(row[2])).change();
                $('#input-kepada2').val($.trim(row[2])).change();
                $('#input-keterangan').val($.trim(row[1])).change();
                $('#input-total').val($.trim(row[3])).change();
                $('#input-dept-id').val($.trim(row[4])).change();
                $('#input-dept-name').val($.trim(row[5])).change();
                $('#persen_retensi').val($.trim(row[6])).change();
                $('#lama_retensi').val($.trim(row[7])).change();
                $('#tgl_kontrak').val($.trim(row[8])).change();
                $('#kode_suplier').val($.trim(row[9])).change();
                $('#input-noref').val($.trim(row[0])).change();

                harga = row[3];
                total = harga.replace(/\./g,'');
                var terbilang = '('+$.trim(to_text(total))+' Rupiah)';
                $('#input-terbilang-id').val(terbilang);
                $('#btn-proses').removeAttr('disabled');
                $('#global-modal').modal('hide');
            }
        }else if (modalTipe == 10) {
            var index = $("#temp-id-lokasi").val();
            if($("#dynamic-header1").text() !='Kd Assets')
            {
                if($.trim(row[2]) =='' || $.trim(row[2])=='-' || $.trim(row[2])=='null'){
                    jAlert("Kode blok belum diproses potensi panen pada aplikasi GRL, Proses potensi terlebih dahulu","Warning");
                }else{
                   
                    if (typeof row[0] !== "undefined") {

                        
                        $('#input-lokasi'+index).val($.trim(row[0]));
                        $('#input-tm'+index).val($.trim(row[2]));
                        $('#bulan_tanam'+index).val($.trim(row[3]));
                        $('#tahun_tanam'+index).val($.trim(row[4]));
                        $('#periode_panen'+index).val($.trim(row[5]));
                        $('#global-modal').modal('hide');
                    }
                }
            }
            else
            {
                $('#input-lokasi'+index).val($.trim(row[0]));
                $('#input-tm'+index).val($.trim(row[1]));
                $('#global-modal').modal('hide');
            }
        }else if (modalTipe == 11) {
            if (typeof row[0] !== "undefined") {
                $('#input-template-id').val($.trim(row[0])).change();
                $('#global-modal').modal('hide');
            }
        }else if (modalTipe == 12) {
            if (typeof row[0] !== "undefined") {
                $('#input-refjurnal-id').val($.trim(row[0])).change();
                $('#global-modal').modal('hide');
            }
        }else if (modalTipe == 13) {
            if (typeof row[0] !== "undefined") {
                $('#input-pp-id').val($.trim(row[0])).change();
                $('#global-modal').modal('hide');
            }
        }else if (modalTipe == 14) {
            if (typeof row[0] !== "undefined") {
                $('#input-pp-id2').val($.trim(row[0])).change();
                $('#global-modal').modal('hide');
            }
        }
        else if (modalTipe == 15) {
            if (typeof row[0] !== "undefined") {
                $('#input-lokasi-id').val($.trim(row[0])).change();
                $('#input-lokasi-name').val($.trim(row[1])).change();
                $('#global-modal').modal('hide');
            }
        }else if (modalTipe == 16) {
            if (typeof row[0] !== "undefined") {
                $('#input-activity-id').val($.trim(row[0])).change();
                $('#input-activity-name').val($.trim(row[1])).change();
                $('#global-modal').modal('hide');
            }
        }else if (modalTipe == 17) {
            if (typeof row[0] !== "undefined") {
                $('#input-refjurnal-id2').val($.trim(row[0])).change();
                $('#global-modal').modal('hide');
            }
        }else if (modalTipe == 18) {
            if (typeof row[0] !== "undefined") {
                $('#input-posting').val($.trim(row[0])).change();
                $('#global-modal').modal('hide');
            }
        }else if (modalTipe == 19) {
            if (typeof row[0] !== "undefined") {
                $('#input-bulan2').val($.trim(row[0])).change();
                $('#input-bulan-name2').val($.trim(row[1])).change();
                $('#global-modal').modal('hide');
            }
        }else if (modalTipe == 20) {
            if (typeof row[0] !== "undefined") {
                $('#input-level').val($.trim(row[0])).change();
                $('#global-modal').modal('hide');
            }
        }else if (modalTipe == 21) {
            if (typeof row[0] !== "undefined") {
                $('#input-perkiraan-id2').val($.trim(row[0])).change();
                $('#input-perkiraan-name2').val($.trim(row[1])).change();
                $('#global-modal').modal('hide');
            }
        }else if (modalTipe == 23) {
            if (typeof row[0] !== "undefined") {
                $('#tm').val($.trim(row[0])).change();
                $('#nama_tm').val($.trim(row[1])).change();
                $('#global-modal').modal('hide');
            }
        }else if (modalTipe == 24) {  
            if (typeof row[0] !== "undefined") {
                $('#input-npk1').val($.trim(row[0]));
                $('#nama_npk1').val($.trim(row[1]));
                $('#bagian_npk1').html($.trim(row[2]));
                $('#global-modal').modal('hide');
            }
        }else if (modalTipe == 25) {  
            if (typeof row[0] !== "undefined") {
                $('#input-npk2').val($.trim(row[0]));
                $('#nama_npk2').val($.trim(row[1]));
                $('#bagian_npk2').html($.trim(row[2]));
                $('#global-modal').modal('hide');
            }
        }else if (modalTipe == 26) {  
            if (typeof row[0] !== "undefined") {
                $('#input-npk3').val($.trim(row[0]));
                $('#nama_npk3').val($.trim(row[1]));
                $('#bagian_npk3').html($.trim(row[2]));
                $('#global-modal').modal('hide');
            }
        }else if (modalTipe == 27) {

            if($.trim(row[3]) == '5'){
                var index = $("#temp-id-perkiraan").val();
                var id = $.trim(row[0]);
                if (typeof row[0] !== "undefined") {
        

                var list = new Array();

                $("input[id^='input-account']").each(function() {
                    var param = $(this).val()+'#'+$(this).closest('tr').find("input[id^='lokasi']").val()+'#'+$(this).closest('tr').find("input[id^='tm']").val();
                    list.push(param);
                });

                var position = $('#input-lokasi'+index).val();
                var tm = $('#input-tm'+index).val();
                if(jQuery.inArray($.trim(row[0])+'#'+position+'#'+tm,list) != -1){
                    jAlert('Kode aktivitas dengan lokasi tersebut sudah dipilih!!!','Warning');
                    return false;
                }else{
                    $('#input-account'+index).val($.trim(row[0])).change();
                    $('#input-account'+index).focus();
                    $('#input-desc'+index).val($.trim(row[1])).change();                   
                }
                    loadDelimiter();
                    $('#global-modal').modal('hide');
                }
            }
        }else if (modalTipe == 28) {  
            if (typeof row[0] !== "undefined") {
                $('#input-lokasi').val($.trim(row[0]));
                var index = $("#temp-index-akt").val();
                var site_id = $("#input-site-id").val();
                var tahun = $("#input-tahun").val();       
                var bulan = $("#input-bulan").val(); 
                var perkiraan =  $("#input-account"+index).val();
                var kode_blok =  $("#input-lokasi").val();  

                loadSaldo(site_id,bulan,tahun,perkiraan,kode_blok);
                $('#global-modal').modal('hide');
            }
        }else if (modalTipe == 'kode_perkiraan_hutang') {  
            if (typeof row[0] !== "undefined") {
                $('#kode_perkiraan').val($.trim(row[0]));
                $('#nama_perkiraan').val($.trim(row[1]));
                
                $('#global-modal').modal('hide');
            }
        }else if(modalTipe == 'journal_pp'){
             if (typeof row[0] !== "undefined") {
                $('#journal_pp').val($.trim(row[0]));
                $('#global-modal').modal('hide');
            }


        }
    });

 
})
