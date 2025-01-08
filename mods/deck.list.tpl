
<form action="?p=deck.create" method="post">
    <input type="text" name="deckName">
    <input type="number" name="deckWidth">
    <input type="number" name="deckHeight">
    <button type="submit">Create</button>
</form>

{foreach from=$list item=deck key=key}
    <a href="?p=deck.edit&deckId={$deck->getId()}">{$deck->getName()}</a><br>
{/foreach}
