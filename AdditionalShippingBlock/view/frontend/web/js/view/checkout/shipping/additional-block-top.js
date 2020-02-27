define([
    'uiComponent'
], function (Component) {
    'use strict';
    var show_hide_custom_blockConfig = window.checkoutConfig.show_hide_custom_block;
    return Component.extend({
        defaults: {
            template: 'Codelegacy_AdditionalShippingBlock/checkout/shipping/additional-block-top'
        },
        canVisibleBlock: show_hide_custom_blockConfig
    });
});
