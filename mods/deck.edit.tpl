<h1>{$deck->getName()}</h1>
<div>
    {if $deck->getDesc()==''}
        <span class="text-muted">no description</span>
    {else}
        {$deck->getDesc()}
    {/if}
</div>

{foreach from=$deck->cardList() item=card}
    <a href="?p=card.edit&deckId={$card->getDeckId()}&cardId={$card->getId()}">{$card->getId()} - {$card->getName()}</a><br>
{/foreach}

<hr>
<a href="?p=card.create&deckId={$deck->getId()}">New Card</a>