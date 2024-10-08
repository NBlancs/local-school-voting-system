<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Add New Party-List</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="partylist_add.php">
                <div class="form-group">
                    <label for="partylist" class="col-sm-3 control-label">Party-list Title</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="partylist" name="partylist" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="partylistslogan" class="col-sm-3 control-label">Party-list Slogan</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="partylistslogan" name="partylistslogan" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Party-list</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="partylist_edit.php">
                <input type="hidden" class="id" name="id">
                <div class="form-group">
                    <label for="partylist" class="col-sm-3 control-label">Party-List Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="partylist" name="partylist">
                    </div>
                </div>
                <div class="form-group">
                    <label for="partylistslogan" class="col-sm-3 control-label">Party-List Slogan</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="partylistslogan" name="partylistslogan">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="partylist_delete.php">
                <input type="hidden" class="id" name="id">
                <div class="text-center">
                    <p>ARE YOU SURE YOU WANT TO DELETE THIS PARTY-LIST?</p>
                    <h2 class="bold description"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
              </form>
            </div>
        </div>
    </div>
</div>


