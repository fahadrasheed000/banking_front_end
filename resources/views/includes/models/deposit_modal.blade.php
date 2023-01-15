<div id="depositModal" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-lg modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Deposit</h4>
            </div>
            <div class="modal-body">
                <form id="add_deposit_form" method="post" action="{{route('deposits.save')}}">
                  @csrf
                    <div class="row">

                        <div class=" col-md-12">
                            <div class="form-group">
                                <label for="name">Enter Amount:</label>
                                <input type="number" min="1" max="1000000" id="amount"  name="amount" class="form-control"
                                    placeholder="" required>
                            </div>
                        </div>
                     
                        <div class=" col-md-12">
                            <div style="float:right">
                                <button type="button" class="btn btn-danger"
                                    onclick="closeDepositModal()">Cancel</button>
                                <button type="submit" class="btn btn-primary">Deposit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>