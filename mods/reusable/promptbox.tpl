<!-- Modal -->
<div class="modal fade" id="modalPrompt" tabindex="-1" aria-labelledby="modalPromptLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalPromptTitle">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="modalPromptText"></div>
        <input id="modalPromptInput"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="modalPromptButtonOK">OK</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="modalPromptButtonCancel">Cancel</button>
      </div>
    </div>
  </div>
</div>

<script>
    function promptBox(promptTitle, promptText, defaultValue, callback) {
        $("#modalPromptTitle").html(promptTitle);
        $("#modalPromptText").html(promptText);
        $("#modalPromptInput").val(defaultValue);

        $("#modalPrompt").modal('show');   
        
    }
    
    $(document).ready(function() {
        $('#modalPrompt').on('shown.bs.modal', function () {
            $('#modalPromptInput').trigger('focus')
        });

        $()
    });
</script>