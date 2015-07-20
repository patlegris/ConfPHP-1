<div id="modal-delete-post" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-danger"><strong>Confirmation</strong></h4>
            </div>
            <div class="modal-body">
                <p>Voulez-vous vraiment supprimer cette conférence ?</p>
            </div>
            <div class="modal-footer text-right">
                <div class="row">
                    <div class="col-lg-6 text-left">
                        <img id="loader" src="{{ url('/logos/loader.gif') }}" alt="Loader" />
                    </div>
                    <div class="col-lg-6 text-right">
                        <button type="button" class="btn btn-default" data-delete-post>Oui</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modal-status-post" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <img id="loader" src="{{ url('/logos/loader.gif') }}" alt="Loader" />
        </div>
    </div>
</div>