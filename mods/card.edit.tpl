<h1>Card Editor</h1>
<div>
    {$card->getName()}
</div>
<a href="?p=deck.edit&deckId={$card->getDeckId()}">&lt;&lt; Back to Deck</a><br>


{if $card->hasCardDraft()}
    <div id="container-frame" style="padding: 10px; border:1px solid black; width:420px; height:420px;">
        <div id="container-draft" >
            <img id="full-image" src="{$card->getPath()}ori.png"
                class="card-img-top" alt="..." style="position:relative" />
            <canvas id="canvas" style="position:absolute; left: 0px; top: 0px">
            </canvas>
        </div>
    </div>
{else}
    no draft
{/if}

Width: {$draftWidth} - Height: {$draftHeight}

<form action="?p=upload" method="post" enctype="multipart/form-data">
    <input type="hidden" name="token" value="card">
    <input type="hidden" name="cardId" value="{$card->getId()}">
    <input type="hidden" name="deckId" value="{$card->getDeckId()}">
    <input type="file" name="file" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

{include file="reusable/promptbox.tpl"}

<script>
    var draftWidth = {$draftWidth};
    var draftHeight = {$draftHeight};
    var containerWidth = 400;
    var containerHeight = 400;

    var ratio = 1 ;
    if(draftWidth>draftHeight) { // landscape
        ratio = containerWidth/draftWidth;
    } else {
        ratio = containerHeight/draftHeight;
    }
    var draftPreviewWidth = (draftWidth*ratio);
    var draftPreviewHeight = (draftHeight*ratio);


    var container = document.getElementById('container-draft');
    var image = document.getElementById('full-image');
    var canvas = document.getElementById('canvas');

    container.style.width = containerWidth+"px";
    container.style.height = containerHeight+"px";
    image.style.height = draftPreviewHeight+"px";
    image.style.width = draftPreviewWidth+"px";
    image.style.left = containerWidth/2 - draftWidth/2;

    var handleRadius = 10;
    var effective_image_width = draftPreviewWidth;
    var effective_image_height = draftPreviewHeight;
    var th_left = 20;
    var th_top = 0;
    var th_right = 70;
    var th_bottom = 400;
</script>
<script src="libs/js/imagecrop.js?1"></script>