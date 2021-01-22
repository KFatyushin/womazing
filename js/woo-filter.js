jQuery(function($)
{

    function getCats()
    {
        var cats = []; //Setup empty array

        $(".filter .filter__item input:checked").each(function() {
            var val = $(this).val();
            cats.push(val); //Push value onto array
        });

        return cats; //Return all of the selected genres in an array
    }

    $(".filter .filter__item input").on('change', function () {
        womazing_get_posts();
    })

    function womazing_get_posts(paged)
    {
        var paged_value = paged; //Store the paged value if it's being sent through when the function is called
        var ajax_url = womazing_sittings.ajax_url; //Get ajax url (added through wp_localize_script)

        $.ajax({
            type: 'GET',
            url: ajax_url,
            data: {
                action: 'womazing_filter',
                category: getCats,
                // genres: getSelectedGenres, //Get array of values from previous function
                // search: getSearchValue(), //Retrieve search value using function
                paged: paged_value //If paged value is being sent through with function call, store here
            },
            beforeSend: function ()
            {
                //You could show a loader here
            },
            success: function(data)
            {
                //Hide loader here
                $('.product-list .row').html(data);
            },
            error: function()
            {
                //If an ajax error has occured, do something here...
                $(".product-list .row").html('<p>There has been an error</p>');
            }
        });
    }
});