<table class="b-answer-block" {if $answer.idSolution == ''}onclick="solutionFinderObj.loadChildrenNodes({$answer.idNode})"{else}onclick="solutionFinderObj.loadSolutionsNodes({$answer.idNode}, {$answer.idSolution})"{/if}>
    <tr>
        <td class="solution-img"><img src="{$answer.img}" alt="" title="" /></td>
        <td class="solution-desc">{$answer.description}</td>
    </tr>
</table>

