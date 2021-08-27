jQuery(function($) {
    let categories = [];
    let tags = [];
    const ajaxPostsList = (categories, tags) => {
        $.ajax({
            url: wp.ajaxUrl,
            type: 'POST',
            data: {
                action: 'postsList',
                category: categories,
                tag: tags
            },
            beforeSend: () => {
                $('.progress').removeClass('d-none');
            }
        })
        .done((response) => {
            $('.posts-list').html('');
            $('.progress').addClass('d-none');
            $('.posts-list').html(response);
        })
        .fail(() => {
            $('.progress').addClass('d-none');
        });
    };

    //ajaxPostsList();

    $("input[name='category']").on('click', function() {
        let selectedCategories = [];
        $.each($("input[name='category']:checked"), function(){
            selectedCategories.push($(this).val());
        });
        categories = selectedCategories
        ajaxPostsList(categories, tags);
    });

    $("input[name='tag']").on('click', function() {
        let selectedTags = [];
        $.each($("input[name='tag']:checked"), function(){
            selectedTags.push($(this).val());
        });
        tags = selectedTags
        ajaxPostsList(categories, tags);
    });
});