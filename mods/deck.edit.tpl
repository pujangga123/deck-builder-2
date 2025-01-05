<h1>{$deck->getName()}</h1>
<div>
    {if $deck->getDesc()==''}
        <span class="text-muted">no description</span>
    {else}
        {$deck->getDesc()}
    {/if}
</div>