<?php

function fragment_sure($id, $text, $parameter_name, $parameter_value)
{ ?>
    <div class="modal fade" id="<?php echo $id; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $text; ?></h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Nee
                    </button>
                    <button type="submit"
                            class="btn btn-primary"
                            name="<?php echo $parameter_name; ?>"
                            value="<?php echo $parameter_value; ?>">
                        Ja
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php }

?>
