<a href="{php} echo base_url().'/logout'; {/php}" class="logout-btn right"></a>
<a href="{php} echo base_url().'/proom'; {/php}" class="privat-room-btn right"></a>

<div class="cart left" style="{if empty($cart)}display:none;{/if}">
    {$lng_label_you_have} <span class="total-cart-items">{if empty($cart)}0{else}{$cart|@count}{/if}</span> {$lng_label_items_cart}&nbsp; &nbsp;|&nbsp; &nbsp;
    <input type="submit" class="send-picture" name="send-picture-order" id="send-picture-order" value="Send picture order" onclick="window.location='{php} echo base_url() . '/cart/showcart'; {/php}'" />
</div>