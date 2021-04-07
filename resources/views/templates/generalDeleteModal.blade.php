<div class="modal fade" id="generalDeleteModal" tabindex="-1" role="dialog" aria-labelledby="generalDeleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 13px;border: none">
            <div class="modal-header ffe-font">
                <h5 class="modal-title" id="generalDeleteModalLabel">Confirm
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </h5>
            </div>
            <div class="modal-body col-lg-12 ffe-font" style="padding: 20px;">
                <p class="ffe-font" style="font-size: 15px !important;">Are you sure you want to delete <span id="itemName"></span> ?</p>
            </div>
            <div class="modal-footer">
              <input type="hidden" value="" id="deleteID">
              <button id="generalDeleteConfirm" type="button" class="btn btn-primary button-bg-green"
                    style="padding: 6px 12px;border-radius: 4px;" data-dismiss="modal">
                    Confirm
                </button>
                <button id="" data-dismiss="modal" type="button" class="btn btn-secondary mdl-btn-cancel">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>