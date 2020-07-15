(function($)
{
    function csm_calculate_shipping_method()
    {
        // Add up all the shipping amounts from existing shipping rows.
        var shipping_total= 0;
        $('table tr.shipping td span.amount').each(function()
        {
            shipping_total+= parseFloat($(this).text().replace('$','').replace(',',''));
        });

        // Saving this commented out code for when/if the client wants to use most expensive shipping method.
        // var maxAmount= 0;
        // var maxID= '';
        // $('table tr.shipping #shipping_method li').each(function()
        // {
        // 	amount= parseFloat($(this).find('.amount').text().replace('$','').replace(',',''));
        // 	if(amount > maxAmount)
        // 	{
        // 		maxAmount= amount;
        // 		maxID= $(this).children('.shipping_method').attr('id');
        // 	}
        // });
        // $('#'+maxID).trigger('click');
        // shipping_total= maxAmount;


        // Create and place shipping total into a new shipping row.
        if(!$('table tr.hg_shipping_total').length)
        {
            $('table tr.order-total').before('<tr class="hg_shipping_total"><th>Shipping</th><td></td></tr>');
        }
        $('table tr.hg_shipping_total td').html('<span class="amount">'+((shipping_total > 0)?'$'+shipping_total.toFixed(2):'')+'</span>');
        $('table tr.hg_shipping_total td').append($('table tr.shipping td form:first').clone());

        // Display none on old shipping rows.
        $('table tr.shipping').each(function()
        {
            $(this).css('display','none');
        });
    }

    $(document).ready(function()
    {
        setTimeout(function()
        {
            csm_calculate_shipping_method();
        },1000);
        setInterval(function()
        {
            if($('.hg_shipping_total').length == 0)
            {
                csm_calculate_shipping_method();
            }
        }, 3000);
    });
})(jQuery);