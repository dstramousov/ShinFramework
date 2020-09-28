<table class="b-answer-block" {if empty($answer.idSolution)}onclick="itemClick('answer', {$answer.idAnswer}); solutionFinderObj.loadChildrenNodes({$answer.idNode})"{else}onclick="itemClick('answer', {$answer.idAnswer}); solutionFinderObj.loadSolutionsNodes({$answer.idNode}, {$answer.idSolution})"{/if}>
    <tr>
        <td class="solution-img"><img src="{$answer.img}" alt="" title="" /></td>
        <td class="solution-desc">{$answer.description}</td>
    </tr>
</table>

