/*
// woocommerce message modal auto start
*/

window.addEventListener('load', () =>{

    jQuery("#modal-success").modal("show");
    jQuery("#modal-warning").modal("show");
    jQuery("#modal-notice").modal("show");

},true);


/*
// Shop bar ajax filters
*/

function update_filters ( joiner ) {

    let joint = joiner=='plus'?'+':',';

    document.querySelectorAll('.form-check>.form-check-input').forEach( checkbox => {

        var querytype   = checkbox.dataset.type

        var queryfilter = querytype.includes('categor')
                        ? 'in_categories'
                        : 'filter_'+querytype

        var query_string = window.location.search.toString()

        checkbox.addEventListener( 'click' , () => {
            
            //update checks

            ! checkbox.checked
                ? checkbox.setAttribute('checked','true')
                : checkbox.removeAttribute('checked')

            //check if >1
            var checker = 0;
            document.querySelectorAll('.form-check>.form-check-input').forEach( checkbox => {

                if (checkbox.checked) checker++

            })

            if(checker>0) {

                //update query values

                let adds = ''

                checkbox.closest('ul').querySelectorAll('.form-check>.form-check-input').forEach( checkasseen => {

                    if ( checkasseen.checked )
                    adds += checkasseen.value+joint

                })

                adds = adds.replace(/\+$|\,$/, '')


                //go to new queried filter

                let new_query = ''

                if( query_string.includes( queryfilter ) ) {

                    let string_role = new RegExp('('+queryfilter+'\=)(.*?)[^\&]+');
                    new_query = query_string.replace( string_role, (queryfilter+'='+adds) )

                } else if (query_string.includes('?') && checker>0) {

                    new_query = query_string+'&'+queryfilter+'='+adds

                } else {

                    new_query = '?'+queryfilter+'='+adds

                }

                window.location = new_query.replace(/[^=&]+=(&|$)/g,"").replace(/&$/,"");

            } else {

                window.history.pushState({}, document.title, window.location.pathname)
                window.location.reload()

            }



        },false)

    })
}

document.addEventListener("DOMContentLoaded", () => {
    
    if ( document.readyState === "complete" || document.readyState === "interactive" ) {


        //get query
        var querystring = window.location.search
        var queryparams = new URLSearchParams(querystring)

        // set reset action
        document.querySelectorAll('#form-query-reset')[0].addEventListener('click',()=>{
            window.history.pushState({}, document.title, window.location.pathname)
            window.location.reload()
        },false)


        //set Price Slider
        let min = queryparams.get('min_price')
        let max = queryparams.get('max_price')

        if(max>0) {

            document.querySelectorAll('#min_price')[0].setAttribute('value',min)
            document.querySelectorAll('#max_price')[0].setAttribute('value',max)

            document.querySelectorAll('.price_label>.from')[0].innerText = min
            document.querySelectorAll('.price_label>.from')[0].innerText = max

        }


        //set Filters Selector active from query

        if(querystring){

            let queried_list = querystring.toString().split('?')[1].split('&')

            queried_list.forEach( queries => {

                let queried_value = queries.split('=')[1].split(/[\,|\+]/)

                queried_value.forEach( queried_value => {

                    document.querySelectorAll('.form-check>.form-check-input').forEach( checkbox => {

                        if(queried_value==checkbox.value)
                        checkbox.setAttribute('checked','true')

                    })

                })

            })

        }


        update_filters( 'plus' )


    }

},false)