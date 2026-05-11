 var gtmEvent = "petpooja";
 
 function GTMDatalayer(EventCategory = "", EventAction = "", Eventlabel = "", EventCurrentTab = ""){
    if(IDENTIFIER_JS == "live" && addtagamagerscript == 1){ //live local
        EventCategory = (EventCategory !== "") ? EventCategory : "NA";
        EventAction = (EventAction !== "") ? EventAction : "NA";
        Eventlabel = (Eventlabel !== "") ? Eventlabel : "NA";
        if($('.page-head-title').length > 1){
            var HeaderSectionName = "Dashboard";
            if(document.title !== "" && document.title !== undefined){
                var strHeader = document.title.replace('- Petpooja','');
                HeaderSectionName = strHeader;
            }
        } else {
            var HeaderSectionName = ($('.page-head-title').text().trim() !== "undefined" && $('.page-head-title').text().trim() !== "") ? $('.page-head-title').text().trim() : 'Dashboard';
        }
        var HeaderCategory = "Dashboard";
        var HeaderSubCategory = "NA";
        if(EventCurrentTab == ""){
            var CurrentTab = ($('.tabs .nav-tabs li.active, #content-slider li.active').text().trim() !== "undefined" && $('.tabs .nav-tabs li.active, #content-slider li.active').text().trim() !== "") ? $('.tabs .nav-tabs li.active, #content-slider li.active').text().trim() : 'NA';
        } else {
            var CurrentTab = EventCurrentTab;
        }
        var subCatArray = [];
        if($('ol.breadcrumb.page-head-nav:last li.breadcrumb-item').length > 1){$('ol.breadcrumb.page-head-nav:last li.breadcrumb-item').each(function(i){subCatArray.push($(this).text());});}
        if(subCatArray.length > 0){
            HeaderCategory = (1 in subCatArray && subCatArray[1] !== "") ? subCatArray[1] : "Dashboard";
            HeaderSubCategory = (2 in subCatArray && subCatArray[2] !== "") ? subCatArray[2] : "NA";
            if(CurrentTab == "NA"){
                CurrentTab = (3 in subCatArray && subCatArray[3] !== "") ? subCatArray[3] : "NA";
            }
        }
        //case for toggle menu open & close
        if(Eventlabel == "Hamburger"){
           if($('.c-hamburger--htla.tagmanagerheader').hasClass('is-active') == false){
               Eventlabel = "Hamburger - open";
           } else {
               Eventlabel = "Hamburger - close";
           }
        }
        //case for toggle menu open & close
         
        var activeservicemoengage = '';
        if(userservicegtm == 1){
            activeservicemoengage = activeservicefordatalayer;
        }

        dataLayer.push({
            'event': gtmEvent,
            'eventCategory':EventCategory,
            'eventAction':EventAction,
            'eventLabel': Eventlabel,
            category: HeaderCategory,
            sub_category: HeaderSubCategory,
            current_tab: CurrentTab,
            section_name: HeaderSectionName,
            outlet_name: decodeURI(outletName), //define in structure_new.ctp
            login_user_id: userId, //define in structure_new.ctp
            login_user_phone: userPhone, //define in structure_new.ctp
            login_user_phone_second : secondaryuserPhone,
            login_user_email: userEmail, //define in structure_new.ctp
            reasurant_ID: restId, //define in structure_new.ctp
            is_mobile : is_mobile,
            login_user_name : username,
            activeservicemoengage : activeservicemoengage,
            login_outlet_country_name : gtmcountryname,
            login_outlet_state_name : gtmstatename,
            login_outlet_city_name : gtmcityname,
        });
    } else {
        return true;
    }
    
//    alert("event ="+gtmEvent+" \n eventCategory ="+EventCategory+"\neventAction ="+EventAction+"\n eventLabel ="+Eventlabel+"\n category ="+HeaderCategory+"\n sub_category ="+HeaderSubCategory+"\n current_tab ="+CurrentTab+"\n section_name ="+HeaderSectionName+"\n outlet_name ="+decodeURI(outletName)+"\n user_id ="+userId+"\n reasurant_ID ="+restId);
 }
 
 //header bar billing & mobile number in footer & marketplace servcie box
 $('.tagmanagerheader').click(function(){ 
    var HeadereventCategory = $(this).attr('data-eventcategory');
    var HeadereventAction = $(this).attr('data-eventaction');
    var HeadereventLabel = $(this).attr('data-eventlabel');
    GTMDatalayer(HeadereventCategory , HeadereventAction , HeadereventLabel );
});

 //header bar billing & mobile number in footer & marketplace servcie box
 $('.marketplacebanner').click(function(){ 
    var HeadereventCategory = $(this).attr('data-eventcategory');
    var HeadereventAction = $(this).attr('data-eventaction');
    var HeadereventLabel = $(this).attr('data-eventlabel');
    GTMDatalayer(HeadereventCategory , HeadereventAction , HeadereventLabel );
});
 

//marketplace I'm interested
// $('.interested_btn_moe').click(function(e){
//     e.preventDefault;
//     var serviceName = $('.card-actions').find('.banner-title').text();
//     if(serviceName !== '' && serviceName !== undefined){ 
//         GTMDatalayer("Market","I'm Interested",serviceName);
//     }
// });

//marketplace Plan section
$('.plan-rates-section .btn-primary').click(function(e){
    e.preventDefault;
    var serviceName = $('.card-actions').find('.banner-title').text();
    var btntxt = $(this).parent().parent().find('.card-actions').text();
    var btnLabel = btntxt.trim();
    //ignore click event if service plan is activated
    if(btnLabel !== "Activated"){
        GTMDatalayer("MarketBuynow","Product Click",serviceName);
    }
 });

//marketplace payment gatway popup
$('.new-fancybox-wrapper .popup-footer .new-btn-save').click(function(e){
    e.preventDefault;
    var btntxt = $(this).text();
    var btnLabel = btntxt.trim();
    if(btnLabel !== '' && btnLabel !== undefined){
        GTMDatalayer("Market","CTAs",btnLabel);
    }
});

//sidebar menu billing & inventory
var dataArray = [];
$('#sidebarCookie li a').click(function(e){
     e.preventDefault;
     var selectedLI = $(this).text().trim();//selected li value
    if($(this).parent().find('li').length > 0){ 
        //check old parent LI & new parent LI are same or not
        if(dataArray.length > 0){ if($.inArray(selectedLI, dataArray[0]) === -1) { dataArray = [];dataArray.push(selectedLI);} }
        if($.inArray(selectedLI, dataArray) === -1){
            dataArray.push(selectedLI);
        }
    } else {
        if(selectedLI !== "Back To Billing"){
            if($(this).parent().parent().parent().find('a').hasClass('active') == true && dataArray.length <= 1){
                if($.inArray($(this).parent().parent().parent().find('a .menu-title').html().trim(), dataArray) === -1 && $(this).parent().parent().parent().find('a .menu-title').html().trim() !== 'Dashboard' && $(this).parent().parent().parent().find('a .menu-title').html().trim() !== 'Back To Billing'){
                    dataArray.push($(this).parent().parent().parent().find('a .menu-title').html().trim());
                }
            }
            dataArray.push(selectedLI);
            var itemsSelected = dataArray.join(' - ');
            if(dataArray[0] == 'Payments'){
                itemsSelected = "Accounting - "+itemsSelected;
            }
            if($(this).parent().parent().parent().hasClass('report-icon svg-stroke')){
                GTMDatalayer('Report','View',selectedLI);
            } else if($(this).parent().hasClass('supplier-hub-icon')){
                GTMDatalayer('Supplier Hub','Click',$(this).find('.menu-title').text().trim());
            } else {
                GTMDatalayer("Navigation","Menu",itemsSelected);
            }
            dataArray = [];
        }
    }
});

//marketplace sidebar headers listing click
$(".tagmanagermarketplace").mousedown(function(){
    var HeadereventCategory = $(this).attr('data-eventcategory');
    var HeadereventAction = $(this).attr('data-eventaction');
    var HeadereventLabel = $(this).attr('data-eventlabel');
    GTMDatalayer(HeadereventCategory , HeadereventAction , HeadereventLabel );
}); 


//reports section
$('.page-card .card-link.report-view-btn').click(function(e){
    e.preventDefault;
    var reportname = $(this).find('.card-item-title').html().trim();
    if(reportname !== '' && reportname !== undefined){
        GTMDatalayer('Report','View',reportname);
    }
});

//search button in reports
$('.re_final_search_div, button#order_search, button#order_search1').click(function(e){
    e.preventDefault;
    GTMDatalayer('Export','Click','Export Data');
});

// Web User Dashboard events
$('.marketplace-card-one,.marketplace-card-two .market-knw-more-btn,.marketplace-card-two .market-intrested-btn,#request-call-back,.mobile-marketplace-link').on('click',function(){
    var labelName = "";
    var buttonLabel = "";
    //supplier hub box
    if($(this).is('.marketplace-card-one') == true){ //marketplace box
        labelName = $(this).find('.marketplace-widget-text').text().trim();
    } else if($(this).is('.marketplace-card-two .market-knw-more-btn') == true){ //marketplace marketing service
        labelName = $(this).parent().parent().find('.marketplace-widget-text').text().trim();
        buttonLabel = $(this).text().trim(); //know more
    } else if($(this).is('.marketplace-card-two .market-intrested-btn') == true){ //marketplace marketing service
        labelName = $(this).parent().parent().find('.marketplace-widget-text').text().trim();
        buttonLabel = $(this).text().trim(); //intrested
    } else if($(this).is('#request-call-back') == true){ // request-call-back
        labelName = $(this).text().trim();
    } else if($(this).is('.marketplace-card-two .market-knw-more-btn') == true){ 
        labelName = 'Marketplace';
    }
    
    if(labelName !== '' && labelName !== undefined && buttonLabel !== '' && buttonLabel !== undefined){
        GTMDatalayer('Page Interaction','CTA',labelName+' - '+buttonLabel);
    } else if(labelName !== '' && labelName !== undefined) {
        GTMDatalayer('Page Interaction','CTA',labelName);
    }
});

$(document).ready(function(){
    if(IDENTIFIER_JS == "live" && addtagamagerscript == 1){ //live local
        var activeservicemoengage = '';
        if(userservicegtm == 1){
            activeservicemoengage = activeservicefordatalayer;
        }
        dataLayer.push({
            outlet_name: decodeURI(outletName), //define in structure_new.ctp
            login_user_id: userId, //define in structure_new.ctp
            login_user_phone: userPhone, //define in structure_new.ctp
            login_user_phone_second : secondaryuserPhone,
            login_user_email: userEmail, //define in structure_new.ctp
            reasurant_ID: restId, //define in structure_new.ctp
            is_mobile : is_mobile,
            login_user_name : username,
            activeservicemoengage : activeservicemoengage,
            login_outlet_country_name : gtmcountryname,
            login_outlet_state_name : gtmstatename,
            login_outlet_city_name : gtmcityname,
        });

        // if (userEmail && userEmail.indexOf('@petpooja.com') === -1) {
        //     dataLayer.push({
        //         'event': 'clevartap',
        //         login_user_id: userId,
        //         login_user_email: userEmail
        //     });
        // }
    }
});