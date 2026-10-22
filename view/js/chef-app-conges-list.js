"use strict";
$(function(){let t,a,n;n=(isDarkStyle?(t=config.colors_dark.borderColor,a=config.colors_dark.bodyBg,config.colors_dark):(t=config.colors.borderColor,a=config.colors.bodyBg,config.colors)).headingColor;
    var e,s=$(".datatables-conges-validation");
    s.length&&(e=s.DataTable({/*ajax:assetsPath+"json/user-list.json"
    ,columns:[{data:""},{data:"full_name"},{data:"role"},{data:"current_plan"},{data:"billing"},{data:"status"},{data:"action"}]
    ,*/columnDefs:[/*{className:"control",searchable:!1,orderable:!1,responsivePriority:2,targets:0,render:function(e,t,a,n){return""}}
    ,*/{targets:0,className:"control",searchable:!1,orderable:!1,responsivePriority:0},
    {targets:1,responsivePriority:9},
    {targets:2,responsivePriority:1},
    {targets:3,responsivePriority:5},
    {targets:4,responsivePriority:4},
    {targets:5,responsivePriority:6},
    {targets:6,responsivePriority:7},
    {targets:7,responsivePriority:8},
    {targets:8,responsivePriority:2},
    {targets:9,orderable:!1,searchable:!1,responsivePriority:3},
    
    ],order:[[4,"desc"]],
    dom:'<"row mx-2"<"col-md-2"<"me-3"l>><"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"f>>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>'
    ,language:{sLengthMenu:"_MENU_",search:"",searchPlaceholder:"Rechercher..."}

    ,responsive:{
      details:{//display:$.fn.dataTable.Responsive.display.modal({header:function(e){return"D&eacute;tails de demande"}})
       //,
       type:"none",target:'.responsive'
      // ,renderer:function(e,t,a){a=$.map(a,function(e,t){
      //   if (!e.title.includes("Actions")) {
      //     alert(e.title+" : "+e.rowIndex+" : "+e.columnIndex+" : "+e.data);
      //     return""!==e.title?'<tr data-dt-row="'+e.rowIndex+'" data-dt-column="'+e.columnIndex+'"><td>'+e.title+":</td> <td>"+e.data+"</td></tr>":""
      //  }
      //     }).join("");return!!a&&$('<table class="table"/><tbody />').append(a)
      // }
   }
   }, refuserForm:function(e) {
    //var note=e.parentNode.parentNode.nextElementSibling.querySelector('textarea');
    // var note = e.closest('tr').querySelector('textarea');
    var tr = e.closest('tr');
    if (tr.classList.contains('dt-hasChild')){
      tr=tr.nextElementSibling;
    }
    var note=tr.querySelector('textarea');
    note.focus(); alert("jj");
    note.required=true;
  }

    ,initComplete:function(){this.api().columns(3).every(function(){var t=this,a=$('<select id="CongeType" class="form-select text-capitalize"><option value=""> Select Type </option></select>').appendTo(".conge_type").on("change",function(){var e=$.fn.dataTable.util.escapeRegex($(this).val());t.search(e?"^"+e+"$":"",!0,!1).draw()});t.data().unique().sort().each(function(e,t){
      if (e!="") {
         a.append('<option value="'+e+'">'+e+"</option>")
    } })})
    ,this.api().columns(8).every(function(){var t=this,att="en attente",at=t.search(att?"^"+att+"$":"",!0,!1).draw(),a=$('<select id="CongeEtat" class="form-select text-capitalize"><option value=""> Select Etat </option></select>').appendTo(".conge_etat").on("change",function(){var e=$.fn.dataTable.util.escapeRegex($(this).val());t.search(e?"^"+e+"$":"",!0,!1).draw()});t.data().unique().sort().each(function(e,t){
      switch (e) {
         case '<span class="badge bg-label-success">validée</span>':
             e='validée';
             break;
         case '<span class="badge bg-label-warning">en attente</span>':
             e='en attente';
             break;
         case '<span class="badge bg-label-danger">refusée</span>':
             e='refusée';
             break;
         default:
             break;
     } 
      if (e=='en attente') {
        a.append('<option selected value="'+e+'">'+e+"</option>")
       } else {
        a.append('<option value="'+e+'">'+e+"</option>")
       } 
    })})}
    }
    ))
    //,
    ,$(".ActionsChef [data-toogle='tooltip']").tooltip({placement:"bottom",html:true})
    // ,$(".datatables-conges-validation tbody").on("click",".delete-demande",function(){e.row($(this).parents("tr")).remove().draw()})
    ,setTimeout(()=>{$(".dataTables_filter .form-control").removeClass("form-control-sm"),$(".dataTables_length .form-select").removeClass("form-select-sm")},300)
    ,setTimeout(() => {
      $(".alert").hide('fade')
    }, 1000);
  })
    ();
    // function refuserForm(e) {
    //   //var note=e.parentNode.parentNode.nextElementSibling.querySelector('textarea');
    //   // var note = e.closest('tr').querySelector('textarea');
    //   var tr = e.closest('tr');
    //   if (tr.classList.contains('dt-hasChild')){
    //     tr=tr.nextElementSibling;
    //   }
    //   var note=tr.querySelector('textarea');
    //   note.focus(); alert("jj");
    //   note.required=true;
    // }