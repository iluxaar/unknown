(function ($) {
    let choiceOpened = false;
    let setItems = function (selector) {
        let items = [];
        let checkedCount = selector.find('.checkboxes input[type="checkbox"]:checked').length;
        let count = selector.find('.checkboxes input[type="checkbox"]').length;
        if (checkedCount === count || checkedCount === 0) {
            if (checkedCount === count) {
                selector.find('.select-all').prop('checked', true);
            }
            selector.children('.selected-items').html(selector.data('all'));
        } else {
            selector.find('input[type="checkbox"]:checked').each(function(index, element) {
                items.push($(element).siblings('.perfect').html());
            });
            selector.children('.selected-items').html(items.join(', '));
        }
    };

    $(document).on('click', function(e) {
        let container = $('.checkbox-items:not(.hidden)').closest('.choice-container');
        if (!$(e.target).closest(container).length) {
            container.find('.checkbox-items').addClass('hidden');
            container.find('.select-show-items').removeClass('active');
            setItems(container);
            if (choiceOpened !== false) {
                choiceOptions.callback();
                choiceOpened = false;
            }
        }
    });

    $.fn.choice_reset = function () {
        let container = $(this).closest('.choice-container');
        container.find('.checkboxes input[type="checkbox"]:checked').val('0');
        setItems(container);
    };

    let choiceOptions = {
        callback: function () {}
    };

    $.fn.choice = function (prop) {
        choiceOptions = $.extend({
            callback: function () {},
        }, prop);

        this.children('.select-show-items').click(function(e) {
            e.preventDefault();
            choiceOpened = $('.checkbox-items:not(.hidden)').closest('.choice-container');
            choiceOpened.find('.checkbox-items').addClass('hidden');
            choiceOpened.find('.select-show-items').removeClass('active');
            setItems(choiceOpened);

            let container = $(e.target).closest('.choice-container');
            if (container.get(0) !== choiceOpened.get(0)) {
                container.find('.checkbox-items').toggleClass('hidden');
                container.find('.select-show-items').toggleClass('active');
            }
        });

        this.find('input.select-all').change(function() {
            let checkboxes = $(this).closest('span').find('.checkboxes input[type="checkbox"]');
            if($(this).is(':checked')) {
                checkboxes.prop('checked', true);
            } else {
                checkboxes.prop('checked', false);
            }
        });

        this.find('div input[type="checkbox"]').change(function(e) {
            let container = $(e.target).closest('.choice-container');
            let checkedCount = container.find('.checkboxes input[type="checkbox"]:checked').length;
            let count = container.find('.checkboxes input[type="checkbox"]').length;
            if (checkedCount === count) {
                container.find('.select-all').prop('checked', true);
            } else {
                container.find('.select-all').prop('checked', false);
            }
        });

        this.find('.checkbox-items-close').click(function(e) {
            let container = $(e.target).closest('.choice-container');
            container.find('.checkbox-items').toggleClass('hidden');
            container.find('.select-show-items').toggleClass('active');
            setItems(container);

        });

        return setItems(this);
    };
})(jQuery);