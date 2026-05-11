var last_loaded_url = '';
/**
 * Load page via ajax instead of whole page load
 * @param {type} url
 * @param {type} add_history
 * @returns {undefined}
 */
function load_page_ajax(url,add_history) {
    if(l_type != 3) {
        if(true) { //l_type == 2
            window.location.href = url;
            return false;
        }
    }
    if(add_history === undefined) add_history = 1;
    var selected_restaurant_id = 0;
    if($('#selected_restaurant_id').length > 0) selected_restaurant_id = $('#selected_restaurant_id').val();
    $('#whole_page_loader').removeClass('hidden');
    $.ajax({
        type : "post",
        url : url,
        data : 'selected_restaurant_id='+selected_restaurant_id,
        success:function(data) {
            $('#whole_page_loader').addClass('hidden');
            if(data == '9') {
                window.location.href = url;
                return false;
            }
            if($('#content').length > 0) {
                var min_height = $('#content').css('min-height');
                $('#content').html('');
                if($('.content-scrolling-wrapper').length > 0) {
                    $('.content-scrolling-wrapper').scrollTop(0); 
                }
                $('#content').replaceWith(data);
                $('#content').css('min-height',min_height);
                if(l_type != 3) {
                    if($('.page-main-title').length > 0) {
                        document.title = $.trim($('.page-main-title').html())+' - Petpooja';
                    } else if($('.page-head-title').length > 0) {
                        document.title = $.trim($('.page-head-title').html())+' - Petpooja';
                    } else if(url.indexOf('users/dashboard') !== -1) {
                        document.title = 'Dashboard - Petpooja';
                    } else if(url.indexOf('inventories/inventory_dashboard') !== -1) {
                        document.title = 'Inventory Dashboard - PetPooja';
                    } else { 
                        document.title = default_site_title;
                    }
                    ChangeUrl(url,add_history);
                }
            } /*else if($('#contentwrapper').length > 0) {
                $('#contentwrapper').html('');
                $('#contentwrapper').replaceWith(data);
                ChangeUrl(url,add_history);
            } */else {
                window.location.href = url;
            }
        },
        error: function(xhr, textStatus, errorThrown) {
            $('#whole_page_loader').addClass('hidden');
            window.location.href = url;
        }
    });
}
/**
 * Add url to browser history
 * @param {type} url
 * @param {type} add_history
 * @returns {undefined}
 */
function ChangeUrl(url,add_history) {
    if(add_history === undefined) add_history = 1;
    if(add_history == 1) {
        if (typeof (history.pushState) != "undefined") {
            if(last_loaded_url != url) {
                var obj = { Url: url };
                history.pushState(obj, '', obj.Url);
                last_loaded_url = url;
//                var gurl = '/'+url.replace(site_url,'');
//                gtag('event', 'page_view', {
//                page_location: gurl,
//                send_to: gtagsendto,
//                'user_id': gtaguserid
//                });
                //ga('send', 'pageview',gurl);
                
                //track moengage page view event
                // if(typeof Moengage !== "undefined") {
                //     Moengage.track_event("MOE_PAGE_VIEWED");
                // }
            }
        } else {
            alert("Browser does not support HTML5.");
        }
    }
}
/**
 * Handle browser back and forward event
 */
$(window).on("popstate", function () {
    // if the state is the page you expect, pull the name and load it.
    if (history.state && typeof history.state == 'object') {
        load_page_ajax(history.state.Url,0);
    } else {
        //history.back();
        window.location.reload();
    }
});
/**
 * Any of the left side url if we want to load on ajax then we can do that by giving ajax_load_url class
 * @type type
 */
$(document).off('click', '.ajax_load_url');
$(document).on('click', '.ajax_load_url', function() {
    if($(this).attr('data-active') !== undefined) {
        var id = $(this).attr('data-active');
    } else {
        var id = $(this).attr('id');
    }
    $('.sidebar').find('a').removeClass('active');
    $('#'+id).addClass('active');
    $('#'+id).parents('.sidebar-dropdown').each(function () {
        $(this).find('a').first().addClass('active');
    });
    var url = $(this).attr('href');
    
    if (typeof url != "undefined" && typeof (history.pushState) != "undefined") {
        load_page_ajax(url);
        return false;
    }
    return true;
});

function ajax_load_function(url,left_link_id) {
    $('.sidebar').find('a').removeClass('active');
    $('#'+left_link_id).addClass('active');
    $('#'+left_link_id).parents('.sidebar-dropdown').each(function () {
        $(this).find('a').first().addClass('active');
    });
    if (typeof (history.pushState) != "undefined") {
        load_page_ajax(url);
        return true;
    }
    window.location.href = url;
}
// to track price discovery page view for supplier marketplace
function price_discovery_page_view_track(from) {
    $.ajax({ 
        url : site_url+'supplier_marketplace/price_discovery_page_view_details', 
        type : 'post', 
        data : {from : from},
    }); 
}