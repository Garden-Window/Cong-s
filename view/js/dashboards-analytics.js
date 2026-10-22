"use strict";
!function(){
    let o,e,r,t,a,s;s=isDarkStyle?(
        o=config.colors_dark.cardColor,e=config.colors_dark.headingColor
        ,r=config.colors_dark.textMuted,t=config.colors_dark.bodyColor
        ,a=config.colors_dark.borderColor,"dark"
        ):(o=config.colors.cardColor
            ,e=config.colors.headingColor,r=config.colors.textMuted,t=config.colors.bodyColor
            ,a=config.colors.borderColor,"light");
    var i=(document.querySelector("#impressionDonutChart"))
    ,l={chart:{height:185,width:"100%",fontFamily:"IBM Plex Sans",type:"donut"},dataLabels:{enabled:!1}
        ,grid:{padding:{bottom:-10}},series:[12,4,7],labels:[" Validées","Refusées","En attentes"]
        ,stroke:{width:0,lineCap:"round"},colors:[config.colors.success,config.colors.danger,config.colors.warning]
        ,plotOptions:{pie:{donut:{size:"90%",labels:{show:!0,name:{fontSize:"0.938rem",offsetY:20}
            ,value:{show:!0,fontSize:"1.625rem",fontFamily:"Rubik",fontWeight:"500",color:e
            ,offsetY:-20,formatter:function(o){return o}},total:{show:!0,label:"Demandes"
                ,color:t,formatter:function(o){return o.globals.seriesTotals.reduce(function(o,e){return o+e},0)}}}}}}
        ,legend:{show:!0,position:"bottom",horizontalAlign:"center"
            ,labels:{colors:t,useSeriesColors:!1},markers:{width:30,height:10,offsetX:-3}}}
    ;null!==i&&new ApexCharts(i,l).render()
}
();