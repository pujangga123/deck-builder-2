<div class="modalPrompt" tabindex="-1" role="dialog">
  <div class="modalPrompt-dialog" role="document">
    <div class="modalPrompt-content">
      <div class="modalPrompt-header">
        <h5 class="modalPrompt-title"></h5>
        <button type="button" class="close" data-dismiss="modalPrompt" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modalPrompt-body">
        <p id="modalPromptText"></p>
        <input id="modalPromptInput">
      </div>
      <div class="modalPrompt-footer">
        <button type="button" class="btn btn-primary">OK</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modalPrompt">Cancel</button>
      </div>
    </div>
  </div>
</div>

<script>
    var myModal = new bootstrap.Modal(document.getElementById('#modalPrompt'), {
        keyboard: false
    });
    function promptBox(promptTitle, promptText, defaultValue) {
        $("#modalPromptTitle").html(promptTitle);
        $("#modalPromptText").html(promptText);
        $("#modalPromptInput").val(defaultValue);

        myModal.modal('show');
    }
    
    $(document).ready(function() {
        $('#modalPrompt').on('shown.bs.modal', function () {
            $('#modalPromptInput').trigger('focus')
        });
    });
</script>