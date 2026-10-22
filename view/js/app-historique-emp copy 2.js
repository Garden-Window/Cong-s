"use strict";
$(function(){var e,a=$(".historique-table");
    a.length&&(e=a.DataTable({/*ajax:assetsPath+"json/invoice-list.json"
    ,columns:[{data:""},{data:"invoice_id"},{data:"invoice_status"},{data:"issued_date"},{data:"client_name"},{data:"total"},{data:"balance"},{data:"invoice_status"},{data:"action"}
    ],columnDefs:[{className:"control",responsivePriority:2,searchable:!1,orderable:!1,targets:0,render:function(e,a,t,s){return""}}
        ,{targets:1,render:function(e,a,t,s){}}
        ,{targets:2,render:function(e,a,t,s){}}
        ,{targets:3,responsivePriority:4,render:function(e,a,t,s){}}
        ,{targets:4,render:function(e,a,t,s){}}
        ,{targets:5,render:function(e,a,t,s){}}
        ,{targets:6,orderable:!1,render:function(e,a,t,s){}}
        ,{targets:7,visible:1}
        ,{targets:-1,title:"Actions",searchable:!1,orderable:!1,render:function(e,a,t,s){return'<div class="d-flex align-items-center"><a href="javascript:;" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" title="Send Mail"><i class="bx bx-send mx-1"></i></a><a href="app-invoice-preview.html" data-bs-toggle="tooltip" class="text-body" data-bs-placement="top" title="Preview Invoice"><i class="bx bx-show mx-1"></i></a><div class="dropdown"><a href="javascript:;" class="btn dropdown-toggle hide-arrow text-body p-0" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></a><div class="dropdown-menu dropdown-menu-end"><a href="javascript:;" class="dropdown-item">Download</a><a href="app-invoice-edit.html" class="dropdown-item">Edit</a><a href="javascript:;" class="dropdown-item">Duplicate</a><div class="dropdown-divider"></div><a href="javascript:;" class="dropdown-item delete-record text-danger">Delete</a></div></div></div>'}}
    ],*/order:[[3,"desc"]]
    ,dom:'<"row ms-2 me-3"<"col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-2"l'/*<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start mt-md-0 mt-3"B>*/+'><"col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row pe-3 gap-md-2"f<"histo_conge_status mb-3 mb-md-0">>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>'
    ,language:{sLengthMenu:"_MENU_",search:"",searchPlaceholder:"Rechercher"}
    ,buttons:[/*{text:'<i class="bx bx-plus me-md-1"></i><span class="d-md-inline-block d-none">Create Invoice</span>'
,className:"btn btn-primary",action:function(e,a,t,s){window.location="app-invoice-add.html"}}*/]
    ,responsive:{details:{display:$.fn.dataTable.Responsive.display.modal({header:function(e){return"Details of "+e.data().full_name}})
        ,type:"column",renderer:function(e,a,t){t=$.map(t,function(e,a){return""!==e.title?'<tr data-dt-row="'+e.rowIndex+'" data-dt-column="'+e.columnIndex+'"><td>'+e.title+":</td> <td>"+e.data+"</td></tr>":""}).join("");return!!t&&$('<table class="table"/><tbody />').append(t)
        }}}
    ,initComplete:function(){this.api().columns(6).every(function(){var a=this,i="i",ii=a.search(i?"^"+i+"$":"",!0,!1).draw(),t=$('<select id="SelectEtat" class="form-select"><option value=""> Select Etat </option></select>').appendTo(".histo_conge_status").on("change",function(){var e=$.fn.dataTable.util.escapeRegex($(this).val());a.search(e?"^"+e+"$":"",!0,!1).draw()});a.data().unique().sort().each(function(e,a){
        if (e=="i") {
            t.append('<option selected value="'+e+'" class="text-capitalize">'+e+"</option>")
        }else{
            t.append('<option value="'+e+'" class="text-capitalize">'+e+"</option>")
        }
        })})}
}))
    ,a.on("draw.dt",function(){[].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function(e){return new bootstrap.Tooltip(e,{boundary:document.body})})}),$(".historique-table tbody").on("click",".delete-record",function(){e.row($(this).parents("tr")).remove().draw()}),setTimeout(()=>{$(".dataTables_filter .form-control").removeClass("form-control-sm"),$(".dataTables_length .form-select").removeClass("form-select-sm")},300)});