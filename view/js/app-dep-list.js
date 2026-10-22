"use strict";
$(function(){var e,a=$(".dep-list-table");
    a.length&&(e=a.DataTable({/*ajax:assetsPath+"json/invoice-list.json"
    ,columns:[{data:""},{data:"invoice_id"},{data:"invoice_status"},{data:"issued_date"},{data:"client_name"},{data:"total"},{data:"balance"},{data:"invoice_status"},{data:"action"}
    ],*/columnDefs:[{targets:0,}
        ,{targets:1,}
        ,{targets:2, orderable:!1}
        
        ],order:[[0,"desc"]]
    ,dom:'<"row ms-2 me-3"<"col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-md-start gap-2"l><"col-12 col-md-6 d-flex align-items-center justify-content-end flex-column flex-md-row pe-3 gap-md-2"f>>t<"row mx-2"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>'
    ,language:{sLengthMenu:"_MENU_",search:"",searchPlaceholder:"Rechercher"}
    ,responsive:{details:{display:$.fn.dataTable.Responsive.display.modal({header:function(e){return"Details of "+e.data().full_name}})
        ,type:"column",renderer:function(e,a,t){t=$.map(t,function(e,a){return""!==e.title?'<tr data-dt-row="'+e.rowIndex+'" data-dt-column="'+e.columnIndex+'"><td>'+e.title+":</td> <td>"+e.data+"</td></tr>":""}).join("");return!!t&&$('<table class="table"/><tbody />').append(t)
        }}}
   }))
    ,a.on("draw.dt",function(){[].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]')).map(function(e){return new bootstrap.Tooltip(e,{boundary:document.body})})}),$(".dep-list-table tbody").on("click",".delete-record",function(){e.row($(this).parents("tr")).remove().draw()}),setTimeout(()=>{$(".dataTables_filter .form-control").removeClass("form-control-sm"),$(".dataTables_length .form-select").removeClass("form-select-sm")},300)});