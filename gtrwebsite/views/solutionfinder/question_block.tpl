<li>
    <table>
        <tr>
            <td>
                <table class="b-solution-block">
                    <tr>
                        <td class="solution-img"><img src="{$question.img}" alt="" title="" /></td>
                        <td class="solution-desc">{$question.description}</td>
                    </tr>
                </table>
            </td>
            {if !empty($answers)}
            <td>
                <fieldset>
                    <legend>All answers</legend>
                    {$answers}
                </fieldset>
            </td>
            {/if}
        </tr>
    </table>
</li>
