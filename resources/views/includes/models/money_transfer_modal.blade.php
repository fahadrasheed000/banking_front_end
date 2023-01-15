<div id="transferModal" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
    <div class="modal-lg modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Fund Transfer</h4>
            </div>
            <div class="modal-body">
                <form id="add_transfer_form" method="post" action="{{ route('transfer.save') }}">
                    @csrf
                    <div class="row">

                        <div class=" col-md-12">
                            <div class="form-group">
                                <label for="name">Select bank:</label>
                                <select class="form-control" name="bank_id" id="bank_id">
                                    <option value="">Select Bank</option>
                                    @foreach ($banks as $bank)
                                        <option value="{{ $bank['id'] }}">
                                            {{ $bank['name'] . ' - ' . $bank['branch_code'] }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class=" col-md-12">
                            <div class="form-group">
                                <label for="name">Account Number:</label>
                                <input type="number" id="account_number" name="account_number" class="form-control"
                                    placeholder="" required>
                            </div>
                        </div>
                        <p id="replacement"></p>
                        <div class="col-md-12 hiddensection">
                            <button type="button" class="btn btn-danger" onclick="closeTransferModal()">Cancel</button>
                            <button type="button" class="btn btn-success" onclick="verifyAccount()"
                                style="float:right">Verify</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
