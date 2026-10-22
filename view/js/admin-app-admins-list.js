"use strict";
$(function(){let t,a,n;n=(isDarkStyle?(t=config.colors_dark.borderColor,a=config.colors_dark.bodyBg,config.colors_dark):(t=config.colors.borderColor,a=config.colors.bodyBg,config.colors)).headingColor;
    var e,s=$(".datatables-admins-list");
    s.length&&(e=s.DataTable({/*ajax:assetsPath+"json/user-list.json"
    ,columns:[{data:""},{data:"full_name"},{data:"role"},{data:"current_plan"},{data:"billing"},{data:"status"},{data:"action"}]
    ,*/columnDefs:[/*{className:"control",searchable:!1,orderable:!1,responsivePriority:2,targets:0,render:function(e,t,a,n){return""}}
    ,*/{targets:0,responsivePriority:0},
    {targets:1,responsivePriority:3},
    {targets:2,responsivePriority:1},
    {targets:3,responsivePriority:2},
    {targets:4,responsivePriority:7},
    {targets:5,responsivePriority:6},
    {targets:6,responsivePriority:8},
    {targets:7,responsivePriority:9},
    {targets:8,responsivePriority:4},
    {targets:9,responsivePriority:5},
    
    ],order:[[0,"desc"]]
    ,dom:'<"row ms-2 me-3"<"col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-2"l<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start mt-md-0 mt-3"B>><"col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row pe-3 gap-md-2">>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>'
    ,language:{sLengthMenu:"_MENU_",search:"",searchPlaceholder:"Rechercher..."}
    ,buttons:[{text:'<i class="bx bx-plus me-md-1"></i><span class="d-md-inline-block d-none">Ajouter Admin</span>'
        ,className:"btn btn-primary",action:function(e,a,t,s){window.location="index.php?m=adminajtemp"}}]
    ,responsive:{details:{display:$.fn.dataTable.Responsive.display.modal({header:function(e){return"Details of "+e.data().full_name}})
        ,type:"column",renderer:function(e,a,t){t=$.map(t,function(e,a){return""!==e.title?'<tr data-dt-row="'+e.rowIndex+'" data-dt-column="'+e.columnIndex+'"><td>'+e.title+":</td> <td>"+e.data+"</td></tr>":""}).join("");return!!t&&$('<table class="table"/><tbody />').append(t)
        }}}
    }))
    ,a.on("draw.dt",function(){[].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function(e){return new bootstrap.Tooltip(e,{boundary:document.body})})}),$(".datatables-admins-list tbody").on("click",".delete-record",function(){e.row($(this).parents("tr")).remove().draw()}),setTimeout(()=>{$(".dataTables_filter .form-control").removeClass("form-control-sm"),$(".dataTables_length .form-select").removeClass("form-select-sm")},300)});