"use strict";
$(function(){var e,a=$(".historique-table"),
l={1:{title:"en attente",class:"bg-label-warning"},2:{title:"validé",class:"bg-label-success"},3:{title:"refusé",class:"bg-label-danger"}};
;a.length&&(e=a.DataTable({/*ajax:assetsPath+"json/invoice-list.json"
    ,columns:[{data:""},{data:"invoice_id"},{data:"invoice_status"},{data:"issued_date"},{data:"client_name"},{data:"total"},{data:"balance"},{data:"invoice_status"},{data:"action"}
    ],*/columnDefs:[{targets:0,responsivePriority:0}
        ,{targets:1,responsivePriority:1}
        ,{targets:2,responsivePriority:3}
        ,{targets:3,responsivePriority:9,visible:!1}
        ,{targets:4,responsivePriority:4}
        ,{targets:5,responsivePriority:5}
        ,{targets:6,responsivePriority:8}
        ,{targets:7,responsivePriority:2}
        ,{targets:8,responsivePriority:6}
        ,{targets:9,responsivePriority:7}
        ,{targets:10,responsivePriority:10,visible:!1}
        
        ],order:[[2,"desc"],[3,"desc"]]
        ,scrollX:true
    ,dom:'<"row ms-2 me-3"<"col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-2"l'/*<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start mt-md-0 mt-3"B>*/+'><"col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row pe-3 gap-md-2"f<"histo_conge_status mb-3 mb-md-0">>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>'
    ,language:{sLengthMenu:"_MENU_",search:"",searchPlaceholder:"Rechercher..."}
     ,responsive:{details:{display:$.fn.dataTable.Responsive.display.modal({header:function(e){return"détails de demande "}}),
        type:"none",target:"tr"
        ,renderer:function(e,a,t){t=$.map(t,function(e,a){return""!==e.title?'<tr data-dt-row="'+e.rowIndex+'" data-dt-column="'+e.columnIndex+'"><td>'+e.title+":</td> <td>"+e.data+"</td></tr>":""}).join("");return!!t&&$('<table class="table"/><tbody />').append(t)}
    }}
    ,initComplete:function(){this.api().columns(7).every(function(){var a=this,t=$('<select id="SelectEtat" class="form-select"><option value=""> Select Etat </option></select>').appendTo(".histo_conge_status").on("change",function(){var e=$.fn.dataTable.util.escapeRegex($(this).val());a.search(e?"^"+e+"$":"",!0,!1).draw()})
        ;a.data().unique().sort().each(function(e,a){ switch (e) {
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
            
            t.append('<option value="'+e+'"  class="text-capitalize" >'+e+"</option>")})})}
}))
    ,a.on("draw.dt",function(){[].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function(e){return new bootstrap.Tooltip(e,{boundary:document.body})})})
    ,$(".historique-table tbody").on("click",/*".delete-record"*/'',function(){e.row($(this).parents("tr")).remove().draw()})
    ,setTimeout(()=>{$(".dataTables_filter .form-control").removeClass("form-control-sm"),$(".dataTables_length .form-select").removeClass("form-select-sm")},300)
});
