{extends file='parent:frontend/checkout/ajax_cart.tpl'}

{block name="frontend_checkout_ajax_cart_button_container"}
	{$smarty.block.parent}
	{if $sBasket.Quantity > 0}
	<div class="paul-cart-text">
		<table class="table">
			<tr>
    			<td>Versandkosten: </td>
    			<td><small>{$sBasket.sShippingcostsWithTax|currency}</small></td>
  			</tr>
			<tr>
    			<td colspan="2"><small>(Geschätzte Versandkosten, Abweichungen je nach Lieferadresse möglich)</small></td>
  			</tr>
			<tr>
    			<td>Gesammtsumme ohne MwSt: </td>
    			<td><small>{$sBasket.AmountNetNumeric|currency}</small></td>
  			</tr>
			<tr>
    			<td>zzgl. 19% MwSt: </td>
    			<td><small>{$sBasket.sAmountTax|currency}</small></td>
  			</tr>
			<tr>
				<td><b>Gesammtsumme:</b></td>
    			<td><b> {$sBasket.Amount|currency}</b></td>
  			</tr>
		</table>
	</div>
	{/if}
{/block} 