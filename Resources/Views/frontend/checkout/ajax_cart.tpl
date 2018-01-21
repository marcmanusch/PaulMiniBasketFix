{extends file='parent:frontend/checkout/ajax_cart.tpl'}

{block name="frontend_checkout_ajax_cart_button_container"}
	{$smarty.block.parent}
	{if $sBasket.Quantity > 0}
		<div class="paul-cart-text">
			<table class="table paul-cart-table">
				<tr>
    					<td colspan="2"><small>Alle Preise <a title="Versandkosten" href="{url controller=custom sCustom=6}">zzgl. Versandkosten</a></small></td>
  				</tr>
				{if $sUserLoggedIn == true}
					<tr>
						<td>Versandkosten:</td>
						<td>{$sShippingcosts|currency}</td>
					</tr>
				{/if}
				<tr>
					<td><b>{s name="paulSumWithTax"}Gesamtsumme: {/s}</b></td>
    					<td>
						<b>
						{if $sUserLoggedIn == true}
    							{($sBasket.Amount + $sShippingcosts)|currency}*
						{else}
							{$sBasket.Amount|currency}*
						{/if}
						</b>
					</td>
  				</tr>
				<tr>
    					<td>{s name="paulSumWithoutTax"}Gesamtsumme ohne MwSt: {/s}</td>
    					<td><small>{$sBasket.AmountNetNumeric|currency}</small></td>
  				</tr>
				{foreach key=schluessel item=wert from=$sBasket.sTaxRates}
					<tr>
    						<td>zzgl. {$schluessel}% MwSt: </td>
    						<td><small>{$wert|currency}</small></td>
					</tr>
				{/foreach}

				
			</table>
		</div>
		<div class="paulAdditionalTextAjax">
        		<p>* {s name="paulAjaxCartText1"}Die exakten Versandkosten für ein spezifisches Lieferland erfahren Sie auf der Seite "Zur Kasse".{/s}</p>
    		</div>
	{/if}
	
	
{/block} 

