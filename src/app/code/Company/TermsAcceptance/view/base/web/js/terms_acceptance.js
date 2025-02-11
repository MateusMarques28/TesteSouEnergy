define([
    'jquery',
    'Magento_Ui/js/modal/modal'
], function($, modal) {
    'use strict';

    return function(config, element) {
        var options = {
            type: 'popup',
            responsive: true,
            buttons: []
        };

        var popup = modal(options, $(element));
        $(element).modal('openModal');

        $('#accept-terms').on('click', function() {
            $.ajax({
                url: '/termsacceptance/index/accept', // URL corrigido
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        $(element).modal('closeModal');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Erro ao aceitar os termos:', error);
                }
            });
        });
    };
});
