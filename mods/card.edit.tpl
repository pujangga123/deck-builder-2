<h1>Card Editor</h1>

{if $card->hasCardDraft()}
    <img src="{$card->getPath()}ori.png" />
{/if}

<form action="?p=upload" method="post" enctype="multipart/form-data" >
    <input type="hidden" name="token" value="card">
    <input type="hidden" name="cardId" value="{$card->getId()}">
    <input type="hidden" name="deckId" value="{$card->getDeckId()}">
  <input type="file" name="file" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

<script>
    function uploadOri() {

    }
</script>