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
                <?php 
                require APP_PATH . 'App.php';
                foreach (parceCsv() as $subArray){
                    $formatedTime = getRightDateFormat($subArray[0]);
                    echo "<tr>
                    <td> {$formatedTime} </td>
                    <td> {$subArray[1]} </td>
                    <td> {$subArray[2]} </td>
                    <td> {$subArray[3]} </td>
                    </tr>";}
                 ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td> <?php 
                    echo '$' .$totalIncome
                    ?>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td><!-- YOUR CODE -->
                    <?php 
                    echo '$' .$totalExpese
                    ?></td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td><!-- YOUR CODE -->
                    <?php 
                    echo "$" .$totalNet;
                    ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
