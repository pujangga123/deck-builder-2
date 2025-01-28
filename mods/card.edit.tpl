<link rel="stylesheet" href="libs/chopper/cropper.css">
<h1>Card Editor</h1>
<div>
    <div id="cardname">{$card->getName()}</div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" onclick="setName()">
        ✍
    </button>
</div>
<a href="?p=deck.edit&deckId={$card->getDeckId()}">&lt;&lt; Back to Deck</a><br>


{if $card->hasCardDraft()}
    <div id="container-frame" style="border:1px solid black; width:400px; max-height:300px">
        <img id="draftPreview" src="{$card->getPath()}ori.png" style="max-width: 100%; display:block";/>
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

<!-- global vars -->
<script>
    var cardId = "{$card->getId()}";
    var deckId = "{$card->getDeckId()}";
</script>

<!-- https://fengyuanchen.github.io/cropperjs/ -->
<script src="libs/chopper/cropper.js"></script>
<script>
  window.addEventListener('DOMContentLoaded', function () {
    var draftPreview = document.querySelector('#draftPreview');
    var cropper = new Cropper(draftPreview, {
      ready: function () {
        var cropper = this.cropper;
        var containerData = cropper.getContainerData();
        var cropBoxData = cropper.getCropBoxData();
        var aspectRatio = cropBoxData.width / cropBoxData.height;

        cropper.setCropBoxData({
            left: (containerData.width - newCropBoxWidth) / 2,
            width: cropBoxData.height * 0.5
        });
      },

      cropmove: function () {
        var cropper = this.cropper;
        var cropBoxData = cropper.getCropBoxData();
        var aspectRatio = cropBoxData.width / cropBoxData.height;

        cropper.setCropBoxData({
            width: cropBoxData.height * 0.5
        });
        
      },
    });
  });
</script>


<script>
    function setName() {
        let cardname = $("#cardname").html();
        let newname = prompt('Set Card Name',cardname);
        if(newname) {
            $.post("api.php", { token:'setcardname',deckId:deckId, cardId:cardId, newname:newname },
                function(result) {
                    console.log(result);
                    $("#cardname").html(newname);
                }
            );
        }
    }
</script>
