<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <!-- YOUR CODE -->
                 <?php if (!empty($transaction)):  ?>
                    <?php foreach ($transaction as $transactions): ?>
                    <tr>
                        <td><?= dateFormate($transactions['date']) ?></td>
                        <td><?= $transactions['checkNumber'] ?></td>
                        <td><?= $transactions['description'] ?></td>
                        <td>
                            <?php if ($transactions['amount'] <0): ?>
                                <span style="color:red;" ><?= formateDollarAmount($transactions['amount']) ?></td></span>
                            <?php elseif($transactions['amount'] >0): ?>
                                <span style="color:green;" ><?= formateDollarAmount($transactions['amount']) ?></td></span>
                            <?php else: ?>
                                <?= formateDollarAmount($transactions['amount']) ?>
                            <?php endif ?>
                    </tr>
                    <?php endforeach; ?>
                <?php endif ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td><?= formateDollarAmount($totals['totalIncome'] ?? 0) ?></td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td><?= formateDollarAmount($totals['totalExpense'] ?? 0) ?></td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td><?= formateDollarAmount($totals['netTotal'] ?? 0) ?></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
