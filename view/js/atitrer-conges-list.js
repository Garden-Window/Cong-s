"use strict";
$(function(){let t,a,n;n=(isDarkStyle?(t=config.colors_dark.borderColor,a=config.colors_dark.bodyBg,config.colors_dark):(t=config.colors.borderColor,a=config.colors.bodyBg,config.colors)).headingColor;
    var e,s=$(".datatables-conges-titre");
    s.length&&(e=s.DataTable({/*ajax:assetsPath+"json/user-list.json"
    ,columns:[{data:""},{data:"full_name"},{data:"role"},{data:"current_plan"},{data:"billing"},{data:"status"},{data:"action"}]
    ,*/columnDefs:[/*{className:"control",searchable:!1,orderable:!1,responsivePriority:2,targets:0,render:function(e,t,a,n){return""}}
    ,*/{targets:0,responsivePriority:5,},
    {targets:1,responsivePriority:0},
    {targets:2,responsivePriority:4},
    {targets:3,responsivePriority:2},
    {targets:4,responsivePriority:1},
    {targets:5,responsivePriority:3,},
    
    ],order:[[3,"asc"]]
    ,dom:'<"row ms-2 me-3"<"col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-2"l'/*<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start mt-md-0 mt-3"B>*/+'><"col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row pe-3 gap-md-2"f<"atitrer_conge_status mb-3 mb-md-0">>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>'
    ,language:{sLengthMenu:"_MENU_",search:"",searchPlaceholder:"Rechercher"}
    
    ,responsive:{details:{display:$.fn.dataTable.Responsive.display.modal({header:function(e){return"Details of "+e.data().full_name}})
        ,type:"none",target:'.responsive'
        ,renderer:function(e,a,t){t=$.map(t,function(e,a){return""!==e.title?'<tr data-dt-row="'+e.rowIndex+'" data-dt-column="'+e.columnIndex+'"><td>'+e.title+":</td> <td>"+e.data+"</td></tr>":""}).join("");return!!t&&$('<table class="table"/><tbody />').append(t)
        }}}
    ,initComplete:function(){this.api().columns(4).every(function(){var a=this,t=$('<select id="SelectEtat" class="form-select"><option value=""> Select Etat </option></select>').appendTo(".atitrer_conge_status").on("change",function(){var e=$.fn.dataTable.util.escapeRegex($(this).val());a.search(e?"^"+e+"$":"",!0,!1).draw()})
        ;a.data().unique().sort().each(function(e,a){
            switch (e) {
                case '<span class="badge bg-label-success">titrée</span>':
                    e="titrée"
                    break;
                case '<span class="badge bg-label-danger">non titrée</span>':
                    e="non titrée"
                    break;
            
                default:
                    break;
            }
            t.append('<option value="'+e+'" class="text-capitalize">'+e+"</option>")})})}
}))
    ,$(".historique-table tbody").on("click",/*".delete-record"*/'',function(){e.row($(this).parents("tr")).remove().draw()})
    ,setTimeout(()=>{$(".dataTables_filter .form-control").removeClass("form-control-sm"),$(".dataTables_length .form-select").removeClass("form-select-sm")},300)
});