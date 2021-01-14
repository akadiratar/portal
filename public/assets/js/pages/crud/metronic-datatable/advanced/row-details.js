"use strict";var KTDatatableAutoColumnHideDemo={init:function(){var t;t=$(".kt-datatable").KTDatatable({data:{type:"remote",source:{read:{url:""}},pageSize:10,saveState:!1,serverPaging:!0,serverFiltering:!0,serverSorting:!0},layout:{scroll:!0,height:550},sortable:!0,pagination:!0,search:{input:$("#generalSearch")},columns:[{field:"OrderID",title:"Order ID"},{field:"Country",title:"Country",template:function(t){return t.Country+" "+t.ShipCountry}},{field:"CompanyEmail",title:"Email",width:"auto"},{field:"ShipDate",title:"Ship Date",type:"date",format:"MM/DD/YYYY"},{field:"CompanyName",title:"Company Name",width:"auto"},{field:"ShipAddress",title:"Ship Address"},{field:"Website",title:"Website"},{field:"TotalPayment",title:"Payment"},{field:"Notes",title:"Notes",width:"auto"},{field:"Status",title:"Status",template:function(t){var e={1:{title:"Pending",class:"kt-badge--brand"},2:{title:"Delivered",class:" kt-badge--danger"},3:{title:"Canceled",class:" kt-badge--primary"},4:{title:"Success",class:" kt-badge--success"},5:{title:"Info",class:" kt-badge--info"},6:{title:"Danger",class:" kt-badge--danger"},7:{title:"Warning",class:" kt-badge--warning"}};return'<span class="kt-badge '+e[t.Status].class+' kt-badge--inline kt-badge--pill">'+e[t.Status].title+"</span>"}},{field:"Type",title:"Type",template:function(t){var e={1:{title:"Online",state:"danger"},2:{title:"Retail",state:"primary"},3:{title:"Direct",state:"success"}};return'<span class="kt-badge kt-badge--'+e[t.Type].state+' kt-badge--dot"></span>&nbsp;<span class="kt-font-bold kt-font-'+e[t.Type].state+'">'+e[t.Type].title+"</span>"}},{field:"Actions",title:"Actions",sortable:!1,width:110,overflow:"visible",autoHide:!1,template:function(){return'\t\t\t\t\t\t\t<div class="dropdown">\t\t\t\t\t\t\t\t<a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown">\t                                <i class="la la-ellipsis-h"></i>\t                            </a>\t\t\t\t\t\t\t    <div class="dropdown-menu dropdown-menu-right">\t\t\t\t\t\t\t        <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>\t\t\t\t\t\t\t        <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>\t\t\t\t\t\t\t        <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>\t\t\t\t\t\t\t    </div>\t\t\t\t\t\t\t</div>\t\t\t\t\t\t\t<a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit details">\t\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t\t</a>\t\t\t\t\t\t\t<a href="javascript:;" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete">\t\t\t\t\t\t\t\t<i class="la la-trash"></i>\t\t\t\t\t\t\t</a>\t\t\t\t\t\t'}}]}),$("#kt_form_status").on("change",function(){t.search($(this).val().toLowerCase(),"Status")}),$("#kt_form_type").on("change",function(){t.search($(this).val().toLowerCase(),"Type")}),$("#kt_form_status,#kt_form_type").selectpicker()}};jQuery(document).ready(function(){KTDatatableAutoColumnHideDemo.init()});