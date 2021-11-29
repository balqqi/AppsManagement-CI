

$(document).ready(function() {
  real='';

  $('#global-modal').on('show.bs.modal', function (e) {
    $("#searchModal1").focus();
  })

  $('#table_list').DataTable( {
      dom: 'Bfrtip',
      buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
      ]
  } );

  $(".date").css("text-align","center");
  var d = new Date();
  now = d.getDate()+'/'+(d.getMonth()+1)+'/'+d.getFullYear();
  
  /*$(".datetime").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});  
  $(".time").mask("99:99",{placeholder:"00:00"});  
  $(".datetime").css('text-align','center'); 
  */

  $("button[id^='cetak-action'],a[id^='cetak-action'],button[id^='cetak-lapor']").click(function(event) {

      if (typeof $("#blok-key").html() !== 'undefined'){
        if(!$("#blok-key").is(':visible'))
        {
          jAlert('Simpan transaksi terlebih dahulu...!','Warning');

          event.stopPropagation();
          preventDefault();

        }  
      }      
    });
   $(".notempty").each(function() {
       var val = $(this).val();
       if(val == "") {
         $(this).val('');         
       }
    });
    $(".page-header").css('display','none');
    $(".panel-heading label").html('<h2>'+$('.panel-heading label').html()+'</h2>');
    

    //$(".fa-search").parent().css("opacity","0");
    // $(".fa-search").parent().attr("disabled","disabled");
    $('#btn-add-row').attr('data-toggle','tooltip');
    $('#btn-add-row').attr('data-placement','top');
    $('#btn-add-row').attr('title','Tambah Baris');

    $('#btn-new').attr('data-toggle','tooltip');
    $('#btn-new').attr('data-placement','top');
    $('#btn-new').attr('title','Transaksi Baru');

    $('#btn-delete').attr('data-toggle','tooltip');
    $('#btn-delete').attr('data-placement','top');
    $('#btn-delete').attr('title','Hapus Transaksi');

    $('#btn-simpan').attr('data-toggle','tooltip');
    $('#btn-simpan').attr('data-placement','top');
    $('#btn-simpan').attr('title','Simpan Transaksi');

    $(document).ajaxStart(function(){
        $(".backdrop").show();
        $(".modals").show();   
    });

    $(document).ajaxStop(function(){
        $(".backdrop").hide();
        $(".modals").hide();   
    });

   /* $(window).load(function() {
        // Animate loader off screen
        $(".backdrop").css("display","none");
        $(".modals").css("display","none");
    });
    */    
    //only number allowed
    $("#currency").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });  

    // bind after close modal
    $('.modal').on('hidden.bs.modal', function () {
        $('.modal').css('overflow-y','scroll');
        clearSearch();
    })

    //action search modal
    $(document).on('click', 'button[id^="search_modal"]' ,function() {

        var target = $(this).attr('title').split("#");
        var valuex = $("#"+target[1]).val();
        var value = $.trim(valuex.toUpperCase());

        $("#"+target[0]+" tr").each(function(index) {
            var match = 0;
            var found = 0;
            var row = $(this).find('td').map(function() {
               return $(this).text();
            }).get();

            $.each(row,function(i, val) {
                match = $.trim(val.toUpperCase()).indexOf(value);  

                if (match >= 0) {
                    found += 1;
                };
            });

            if (found > 0) {
                $(this).show();
            }else{
                $(this).hide();
            }
        });
    });

    $(document).on('keypress', 'input[id^="searchModal"]' ,function(e) {
        if(e.which == 13) {
          var target = $(this).next().find('button').attr('title').split("#");
          var valuex = $(this).val();
          var value = $.trim(valuex.toUpperCase());

          $("#"+target[0]+" tr").each(function(index) {
              var match = 0;
              var found = 0;
              var row = $(this).find('td').map(function() {
                 return $(this).text();
              }).get();

              $.each(row,function(i, val) {
                  //match = $.trim(val).indexOf(value);  
                  match = $.trim(val.toUpperCase()).indexOf(value);  
                  if (match >= 0) {
                      found += 1;
                  };
              });

              if (found > 0) {
                  $(this).show();
              }else{
                  $(this).hide();
              }
          });
        }        
    });
    $('#btn-new').click(function(){
        var url = $(this).attr('url');
        window.open(url,"_self");
    });

    $(document).on('click', 'input[id^="check-all"]' ,function() {
        if($(this).is(":checked")){
            $('input[id^="chk-box"]').prop('checked', true);
        }else{
            $('input[id^="chk-box"]').prop('checked', false);
        }  
    });


  

    $(document).on('click', 'input[id^="fcheck-all"]' ,function() {
        if($(this).is(":checked")){
            $('input[id^="fchk-box"]').prop('checked', true);
        }else{
            $('input[id^="fchk-box"]').prop('checked', false);
        }  
    });
    
    //check all
    $(document).on('click', 'input[id^="check-all"]' ,function() {
        if($(this).is(":checked")){
            $('input[id^="input-input_chbox"]').prop('checked', true);
        }else{
            $('input[id^="input-input_chbox"]').prop('checked', false);
        }  
    });

    

  $(document).on('change',  '#table-body :input:not([type="checkbox"])' ,function() {

    var i = $(this).closest('tr').attr('index');
    if (typeof i == 'undefined'){
      var i = $(this).closest('tr').attr('id');
    }

    $('#sync'+i).css("display","");
    $('#btn-sync'+i).css("background-color","#CC0000");
    $('#de-sync'+i).css("display","none");
  });

  //clear nama dari dropdown by Aditya
  $(document).on('change',  'input:not([type="checkbox"])' ,function() {
    var id = $(this).attr('id');
    if ($(this).val() == ''){
      var n = id.indexOf("kode_npk");
      var x = id.indexOf("input-npk");
 
      if (n >= 0 || x >= 0){
        $(this).closest("div").closest("div[class^='col']").find(':nth-child(3)').find("input").val("");
      }else{
        $(this).closest("div").closest("div[class^='col']").next().find("input").val("");
      }
      
    }
  });

  $(document).on('change',"input[id^='kode_npk']" ,function() {
      calculate_pertama();
      calculate_kedua();
      calculate_ketiga();
  });
    
});
function addDays(theDate, days) {
    var someDate = new Date(theDate);
    var numberOfDaysToAdd = days;
    someDate.setDate(someDate.getDate() - numberOfDaysToAdd); 
    var dd = ("0" + someDate.getDate()).slice(-2);
    var mm = ("0" + (someDate.getMonth() + 1)).slice(-2);
    var y = someDate.getFullYear();
    return mm + '/'+ dd + '/'+ y;
    //return new Date(theDate.getTime() - days*24*60*60*1000);
}

function formatDays(theDate) {
    var someDate = new Date(theDate);
    var dd = ("0" + someDate.getDate()).slice(-2);
    var mm = ("0" + (someDate.getMonth() + 1)).slice(-2);
    var y = someDate.getFullYear();
    return dd + '/'+ mm + '/'+ y;
    //return new Date(theDate.getTime() - days*24*60*60*1000);
}

function reformatDays(theDate){
    var arrayDate = theDate.split('/');
    var day = arrayDate[0];
    var month = arrayDate[1];
    var year = arrayDate[2];
    return month+"/"+day+"/"+year;
}

$(document).on('change',  '#tbl-input-row :input:not([type="checkbox"])' ,function() {

    var i = $(this).closest('tr').attr('index');
    if (typeof i == 'undefined'){
      var i = $(this).closest('tr').attr('id');
    }


    $('#sync'+i).css("display","");
    $('#btn-sync'+i).css("background-color","#CC0000");
    $('#de-sync'+i).css("display","none");
});




$(document).on('change',  '#tbl-input-dis :input:not([type="checkbox"]),#table-body :input:not([type="checkbox"])' ,function() {

    var i = $(this).closest('tr').attr('index');
    if (typeof i == 'undefined'){
      var i = $(this).closest('tr').attr('id');
    }

    $('#sync'+i).css("display","");
    $('#btn-sync'+i).css("background-color","#CC0000");
    $('#de-sync'+i).css("display","none");
});

$(document).on('change',  '#tbl-input-row2 :input:not([type="checkbox"])' ,function() {

    var i = $(this).closest('tr').attr('index');
    if (typeof i == 'undefined'){
      var i = $(this).closest('tr').attr('id');
    }
    $('#brsync'+i).css("display","");
    $('#btn-brsync'+i).css("background-color","#CC0000");
    $('#de-brsync'+i).css("display","none");
});

$(document).on('change',  '#body1-mandor-sel-id :input' ,function() {

    var i = $(this).closest('tr').attr('index');
    if (typeof i == 'undefined'){
      var i = $(this).closest('tr').attr('id');
    }
    $('#sync-a'+i).css("display","");
    $('#btn-sync-a'+i).css("background-color","#CC0000");
    $('#de-sync-a'+i).css("display","none");
});

$(document).on('change',  '#body2-mandor-sel-id :input' ,function() {

    var i = $(this).closest('tr').attr('index');
    if (typeof i == 'undefined'){
      var i = $(this).closest('tr').attr('id');
    }
    $('#sync-b'+i).css("display","");
    $('#btn-sync-b'+i).css("background-color","#CC0000");
    $('#de-sync-b'+i).css("display","none");
});



function is_show_sync(is_true,tipe,index){
    var btn = "";
    var sync = "";
    var de_sync = "";
    if (tipe == 0) {
        sync = '#sync'+index;
        de_sync = '#de-sync'+index;
        btn = '#btn-sync'+index;
    }else if(tipe == 1){
        sync = '#sync-b'+index;
        de_sync = '#de-sync-b'+index;
        btn = '#btn-sync-b'+index;
    }else if(tipe == 2){
        sync = '#sync-a'+index;
        de_sync = '#de-sync-a'+index;
        btn = '#btn-sync-a'+index;
    }else if(tipe == 3){
        sync = '#brsync-a'+index;
        de_sync = '#de-brsync-a'+index;
        btn = '#btn-brsync-a'+index;
    }
    if (is_true == true) {
        $(sync).css("display","");
        $(de_sync).css("display","none");
        $(btn).css("background-color","#CC0000");

    }else{
        $(sync).css("display","none");
        $(de_sync).css("display","");
        $(btn).css("background-color","#009900");
    }
}


//show all row after search modal
function showAllrow(idtarget){
 $("#"+idtarget+" tr").each(function(index) {
        $(this).show();
    });
}

//clear search modal
function clearSearch(){
    $("input[id^='searchModal']").val("");
}

// fungsi convert date mm/dd/yyyy
function convertDate(dateStr){
  if (dateStr !=null){
    year = dateStr.substr(0,4);
    month = dateStr.substr(5,2);
    date = dateStr.substr(8,2);
    return date+"/"+month+"/"+year;
  }else{
    conDate = "";
    return conDate;
  }
}

function loadNumber(){
     $(".number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
}

function Padder(len, pad) {
  if (len === undefined) {
    len = 1;
  } else if (pad === undefined) {
    pad = '0';
  }

  var pads = '';
  while (pads.length < len) {
    pads += pad;
  }

  this.pad = function (what) {
    var s = what.toString();
    return pads.substring(0, pads.length - s.length) + s;
  };
}

function disabledHeading(){
    $(".heading").attr('disabled','disabled');
 }
function enabledHeading(){
    $(".heading").removeAttr('disabled');    
}
function disabledDetail(){
    $(".detail").attr('disabled','disabled');
}
function EnabledDetail(){
    $(".detail").removeAttr('disabled');
}



function number_format(number, decimals, dec_point, thousands_sep){
  number = (number + '')
    .replace(/[^0-9+\-Ee.]/g, '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + (Math.round(n * k) / k)
        .toFixed(prec);
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
    .split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '')
    .length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1)
      .join('0');
  }
  return s.join(dec);
  
}

function loadDelimiter(){
    $(".currency").autoNumeric('init', {mDec:'',aSep: '.', aDec: ','});
    $(".currency2").autoNumeric('init', {mDec:'2',aSep: '.', aDec: ','});
    $(".date").mask("99/99/9999",{placeholder:"dd/mm/yyyy"});
    $(".account").mask("9-9-99-99-99",{placeholder:"0-0-00-00-00"});
    $(".activity").mask("9-99-99-99-99",{placeholder:"0-00-00-00-00"});
    $(".time").mask("99:99",{placeholder:"HH:MM"});
}



function to_text(bilangan) {
     bilangan = Math.floor(bilangan);
     //debugger;
     bilangan    = String(bilangan);
     var angka   = new Array('0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
     var kata    = new Array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan');
     var tingkat = new Array('','Ribu','Juta','Milyar','Triliun');
     
     var panjang_bilangan = bilangan.length;
     
     /* pengujian panjang bilangan */
     if (panjang_bilangan > 15) {
       kaLimat = "Diluar Batas";
       return kaLimat;
     }
     
     /* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
     for (i = 1; i <= panjang_bilangan; i++) {
       angka[i] = bilangan.substr(-(i),1);
     }
     
     i = 1;
     j = 0;
     kaLimat = "";
     
     
     /* mulai proses iterasi terhadap array angka */
     while (i <= panjang_bilangan) {
     
       subkaLimat = "";
       kata1 = "";
       kata2 = "";
       kata3 = "";
     
       /* untuk Ratusan */
       if (angka[i+2] != "0") {
         if (angka[i+2] == "1") {
           kata1 = "Seratus";
         } else {
           kata1 = kata[angka[i+2]] + " Ratus";
         }
       }
     
       /* untuk Puluhan atau Belasan */
       if (angka[i+1] != "0") {
         if (angka[i+1] == "1") {
           if (angka[i] == "0") {
             kata2 = "Sepuluh";
           } else if (angka[i] == "1") {
             kata2 = "Sebelas";
           } else {
             kata2 = kata[angka[i]] + " Belas";
           }
         } else {
           kata2 = kata[angka[i+1]] + " Puluh";
         }
       }
     
       /* untuk Satuan */
       if (angka[i] != "0") {
         if (angka[i+1] != "1") {
           kata3 = kata[angka[i]];
         }
       }
     
       /* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
       if ((angka[i] != "0") || (angka[i+1] != "0") || (angka[i+2] != "0")) {
         subkaLimat = kata1+" "+kata2+" "+kata3+" "+tingkat[j]+" ";
       }
     
       /* gabungkan variabe sub kaLimat (untuk Satu blok 3 angka) ke variabel kaLimat */
       kaLimat = subkaLimat + kaLimat;
       i = i + 3;
       j = j + 1;
     
     }
     
     /* mengganti Satu Ribu jadi Seribu jika diperlukan */
     if ((angka[5] == "0") && (angka[6] == "0")) {
       kaLimat = kaLimat.replace("Satu Ribu","Seribu");
     }
      
     if (bilangan == 0){
      kaLimat = 'nol';
     }
     return kaLimat ;
}

function datediff(fromDate,toDate,interval) { 
    /*
     * DateFormat month/day/year hh:mm:ss
     * ex.
     * datediff('01/01/2011 12:00:00','01/01/2011 13:30:00','seconds');
     */   
    var second=1000, minute=second*60, hour=minute*60, day=hour*24, week=day*7; 
    var numbers = fromDate.match(/\d+/g); 
    var fromDate = new Date(numbers[1]+'/'+numbers[0]+'/'+numbers[2]);
    var numbers2 = toDate.match(/\d+/g);
    toDate = new Date(numbers2[1]+'/'+numbers2[0]+'/'+numbers2[2]);
    var timediff = toDate - fromDate; 
    if (isNaN(timediff)) return '0'; 
    switch (interval) { 
        case "years": return toDate.getFullYear() - fromDate.getFullYear(); 
        case "months": return ( 
            ( toDate.getFullYear() * 12 + toDate.getMonth() ) 
            - 
            ( fromDate.getFullYear() * 12 + fromDate.getMonth() ) 
        ); 
        case "weeks"  : return Math.floor(timediff / week); 
        case "days"   : return Math.floor(timediff / day);  
        case "hours"  : return Math.floor(timediff / hour);  
        case "minutes": return Math.floor(timediff / minute); 
        case "seconds": return Math.floor(timediff / second); 
        default: return '0'; 
    }  
}

function changeDateFormat(str_date){
      var _date = $("#"+str_date).val();
      explode1 = _date.split('/');
      _date = explode1[1]+"/"+explode1[0]+"/"+explode1[2];
      var string_date = new Date(_date);
      return string_date;
    }

function reload_datetime(){
  $(".datetime").mask("99/99/9999",{placeholder:"dd/mm/yyyy"}); 
  $(".datetime").css('text-align','center'); 
}

function getBulan(bulan){
    if (bulan =='01'){
        bln='Januari';
    }else if (bulan =='02'){
        bln='Februari';
    }else if (bulan =='03'){
          bln='Maret';
    }else if (bulan =='04'){
        bln='April';
    }else if (bulan =='05'){
         bln='Mei';
    }else if (bulan =='06'){
         bln='Juni';
    }else if (bulan =='07'){
        bln='Juli';
    }else if (bulan =='08'){
        bln='Agustus';
    }else if (bulan =='09'){
         bln='September';
    }else if (bulan =='10'){
        bln='Oktober';
    }else if (bulan =='11'){
          bln='November';
    }else if (bulan =='12'){
          bln='Desember';
    } 
    return bln;
} 

function get_site_name(url,site,name,id){

   $.ajax({ // ajax call starts
      type : 'POST',
      url: url+'/'+site, // JQuery loads serverside.php
      dataType: 'json', // Choosing a JSON datatype
      data: null,
      success: function(data) // Variable data contains the data we get from serverside
      {   

         var dor =  new Array;
         var n = data.data.length;
         if (n != 0) {
            var nama = $.trim(data.data[0].nama_pt);
            if (typeof id === "undefined") {
               $('#nama_pt').val(nama+' - '+name);
            }else{
               $('#'+id).val(nama+' - '+name);
            }    
         }
      }
   });
}

function numberFormat(yourNumber) {
    //Seperates the components of the number
    var components = yourNumber.toString().split(",");
    //Comma-fies the first part
    components [0] = components [0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    //Combines the two sections
    return components.join(",");
}

function getNumberFormat(yourNumber) {
    //Seperates the components of the number
    var components = yourNumber.toString().split(",");
    //Comma-fies the first part
    components [0] = components [0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    //Combines the two sections
    return components.join(",");
}

 function showDays(firstDate,secondDate){             

  var startDay = new Date(firstDate);
  var endDay = new Date(secondDate);
  var millisecondsPerDay = 1000 * 60 * 60 * 24;

  var millisBetween = startDay.getTime() - endDay.getTime();
  var days = millisBetween / millisecondsPerDay;

  // Round down.
  alert( Math.floor(days));

}

function check_detail(){
    var toReturn;

    var len = $('#table-body tr').length;
    var $nonempty = $('#table-body tr:first').find('.primary-key').filter(function() {
        return this.value != ''
    });

    if (len > 1 || ($nonempty.val() != "" && $nonempty.val() != '-')) {
        jAlert("HAPUS DETAIL TERLEBIH DAHULU","Warning");
        return false;
        toReturn = false;
    }

    if (toReturn == false) {
        return false;
    }else{
        return true;
    }
}
