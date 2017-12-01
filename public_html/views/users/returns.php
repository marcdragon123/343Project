<div class="text-center">
    <div>
        <p>Select Transaction ID to Review Transaction</p>
                <div class="well">
                    <?php
                    foreach ($viewmodel as $transaction) : ?>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                Transaction ID : <?php echo $transaction['TransactionID']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="btn btn-primary text-center" href="viewTransaction?transactionID=<?= $transaction['TransactionID']?>">View Transaction Specs</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <?php endforeach;
                    ?>
                </div>
    </div>
</div>