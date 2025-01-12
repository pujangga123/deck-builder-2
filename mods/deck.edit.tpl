<h1>{$deck->getName()}</h1>
<div>
    {if $deck->getDesc()==''}
        <span class="text-muted">no description</span>
    {else}
        {$deck->getDesc()}
    {/if}
</div>

{foreach from=$deck->cardList() item=card}
    <a href="?p=card.edit&deckId={$card->getDeckId()}&cardId={$card->getId()}">
        {if $card->getName()==""}
            <span class="text-muted">no name</span>
        {else}
            {$card->getName()}
        {/if}
    </a><br>
{/foreach}

<hr>
<a href="?p=card.create&deckId={$deck->getId()}">New Card</a>