<table class="b-solution-block">
    <tr>
        <td class="solution-img"><img src="{$solution.img}" alt="" title="" /></td>
        <td class="solution-desc">{$solution.description}</td>
    </tr>
    <tr>
        <td colspan="2">
            {if !empty($items)}
                <fieldset>
                    <legend>All items</legend>
                    {$items}
                </fieldset>
            {/if}
        </td>
    </tr>
</table>

            



