"use strict";
$(function(){let t,a,n;n=(isDarkStyle?(t=config.colors_dark.borderColor,a=config.colors_dark.bodyBg,config.colors_dark):(t=config.colors.borderColor,a=config.colors.bodyBg,config.colors)).headingColor;
    var e,s=$(".datatables-emps-list");
    s.length&&(e=s.DataTable({/*ajax:assetsPath+"json/user-list.json"
    ,columns:[{data:""},{data:"full_name"},{data:"role"},{data:"current_plan"},{data:"billing"},{data:"status"},{data:"action"}]
    ,*/columnDefs:[/*{className:"control",searchable:!1,orderable:!1,responsivePriority:2,targets:0,render:function(e,t,a,n){return""}}
    ,*/{targets:0,responsivePriority:0},
    {targets:1,responsivePriority:1},
    {targets:2,responsivePriority:3},
    {targets:3,responsivePriority:4},
    {targets:4,responsivePriority:5},
    {targets:5,responsivePriority:13},
    {targets:6,responsivePriority:11},
    {targets:7,responsivePriority:12},
    {targets:8,responsivePriority:10},
    {targets:9,responsivePriority:8},
    {targets:10,responsivePriority:9},
    {targets:11,responsivePriority:6},
    {targets:12,responsivePriority:7},
    {targets:13,orderable:!1,responsivePriority:2}
    
    ],order:[[0,"desc"]]
    ,dom:'<"row ms-2 me-3"<"col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-2"l<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start mt-md-0 mt-3"B>><"col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row pe-3 gap-md-2"f<"dep_for_chefs mb-3 mb-md-0">>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>'
    ,language:{sLengthMenu:"_MENU_",search:"",searchPlaceholder:"Rechercher..."}
    ,buttons:[{text:'<i class="bx bx-plus me-md-1"></i><span class="d-md-inline-block d-none">Ajouter Employ&eacute;</span>'
        ,className:"btn btn-primary",action:function(e,a,t,s){window.location="index.php?m=adminajtemp"}}]
    ,responsive:{details:{display:$.fn.dataTable.Responsive.display.modal({header:function(e){return" D&eacute;tails d'employ&eacute; "}}),
        type:"none",target:".responsive"
        ,renderer:function(e,a,t){t=$.map(t,function(e,a){return""!==e.title?'<tr data-dt-row="'+e.rowIndex+'" data-dt-column="'+e.columnIndex+'"><td>'+e.title+":</td> <td>"+e.data+"</td></tr>":""}).join("");return!!t&&$('<table class="table"/><tbody />').append(t)}
    }}
   }))
    ,$(".datatables-emps-list tbody").on("click",".delete-record",function(){e.row($(this).parents("tr")).remove().draw()})
    ,$(".Actionslistemps [data-toogle='tooltip']").tooltip({placement:"bottom",html:true})
    ,setTimeout(()=>{$(".dataTables_filter .form-control").removeClass("form-control-sm"),$(".dataTables_length .form-select").removeClass("form-select-sm")},300)
});
    