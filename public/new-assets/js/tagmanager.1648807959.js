//when first time service purchase called step1
// Google TagManager for checkout
function checkout_step1(servicename, serviceid, serviceprice, restnameaslist ){
    /*dataLayer.push({
        'event': 'addToCart',
        'ecommerce': {
          'currencyCode': 'INR',
          'add': {                                // 'add' actionFieldObject measures.
            'actionField': {'list': restnameaslist},      // Optional list property.
            'products': [{                        //  adding a product to a shopping cart.
              'name': servicename,
              'id': serviceid,
              'price': serviceprice,
              'brand': 'petpooja',
              'category': 'services',
              'quantity': 1
             }]
          }
        }
    });
    dataLayer.push({
        'event': 'checkout',
        'ecommerce': {
          'checkout': {
            'actionField': {"list":restnameaslist,"step":1, "option" : servicename},
            'products': [{                        //  adding a product to a shopping cart.
              'name': servicename,
              'id': serviceid,
              'price': serviceprice,
              'brand': 'petpooja',
              'category': 'services',
              'quantity': 1
             }]
         }
       }
    });*/
}

//step 3 for service renew 
//Google TagManager for checkout
function checkout_step3(servicename, serviceid, serviceprice, restnameaslist ){
    /*dataLayer.push({
        'event': 'checkout',
        'ecommerce': {
          'checkout': {
            'actionField': {"list":restnameaslist,"step":3, "option" : servicename},
            'products': [{                        //  adding a product to a shopping cart.
              'name': servicename,
              'id': serviceid,
              'price': serviceprice,
              'brand': 'petpooja',
              'category': 'services',
              'quantity': 1
             }]
         }
       }
    });
    dataLayer.push({
        'event': 'addToCart',
        'ecommerce': {
          'currencyCode': 'INR',
          'add': {                                // 'add' actionFieldObject measures.
            'actionField': {'list': restnameaslist},      // Optional list property.
            'products': [{                        //  adding a product to a shopping cart.
              'name': 'Renew_'+servicename,
              'id': serviceid,
              'price': serviceprice,
              'brand': 'petpooja',
              'category': 'services',
              'quantity': 1
             }]
          }
        }
    });*/
}
//step2 call when payment is going to success..
//success
//Google TagManager for checkout
function checkout_step2(servicename, serviceid, serviceprice, restnameaslist ){
    /*dataLayer.push({
        'event': 'checkout',
        'ecommerce': {
          'checkout': {
            'actionField': {"list":restnameaslist,"step":2, "option" : servicename},
            'products': [{                        //  adding a product to a shopping cart.
              'name': servicename,
              'id': serviceid,
              'price': serviceprice,
              'brand': 'petpooja',
              'category': 'services',
              'quantity': 1
             }]
         }
       }
    });
    dataLayer.push({
        'event': 'checkout',
        'ecommerce': {
          'checkout': {
            'actionField': {"list":restnameaslist,"step":1, "option" : servicename},
            'products': [{                        //  adding a product to a shopping cart.
              'name': servicename,
              'id': serviceid,
              'price': serviceprice,
              'brand': 'petpooja',
              'category': 'services',
              'quantity': 1
             }]
         }
       }
    });*/
}

function checkout_step4(servicename, serviceid, serviceprice, restnameaslist ){
    /*dataLayer.push({
        'event': 'checkout',
        'ecommerce': {
          'checkout': {
            'actionField': {"list":restnameaslist,"step":4, "option" : servicename},
            'products': [{                        //  adding a product to a shopping cart.
              'name': servicename,
              'id': serviceid,
              'price': serviceprice,
              'brand': 'petpooja',
              'category': 'services',
              'quantity': 1
             }]
         }
       }
    });
    dataLayer.push({
        'event': 'checkout',
        'ecommerce': {
          'checkout': {
            'actionField': {"list":restnameaslist,"step":1, "option" : servicename},
            'products': [{                        //  adding a product to a shopping cart.
              'name': 'Renew_'+servicename,
              'id': serviceid,
              'price': serviceprice,
              'brand': 'petpooja',
              'category': 'services',
              'quantity': 1
             }]
         }
       }
    });*/
}