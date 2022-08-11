<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Salesperson Summary</title>
    </head>
    <body>
        <h1>Salesperson Summary</h1>
        <table border="1">
            <tr>
                <th>Emp.ID</th>
                <th>Emp.Name</th>
                <th>#Customers</th>
                <th>#Sales</th>
                <th>#Sales Totes</th>
                
            </tr>
        <?php
        // put your code here
                require_once('dblink.php');
                $query = "SELECT e.employee_id, e.last_name, count(distinct c.Customer_id) AS custcount,
          	                count(s.order_id) AS salescnt, sum(s.total) AS salestot
                        FROM customer c, sales_order s, employee e
                        WHERE c.customer_id = s.customer_id AND c.salesperson_id = e.employee_id
                        GROUP BY e.employee_id, e.last_name
                        ORDER BY salestot DESC;";
                $result = mysqli_query($dbc, $query);
                
                echo "<p>Sales People with Sales = " .mysqli_num_rows($result). "</p>";
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" .$row[0]. "</td>";
                    echo "<td>" .$row[1]. "</td>";
                    echo "<td>" .$row[2]. "</td>";
//                    echo "<td>" .$row[2]. ", " .$row[3]. " " .$row[4]. "</td>";
//                    echo "<td align='right'>$" 
//                    .number_format($row['credit_limit'], 2). "</td>";
                    echo "<td align='right'>" .$row['salescnt']. "</td>";
                    echo "<td align='right'>$" 
                    .number_format($row['salestot'], 2). "</td>";
                    
                    echo "</tr>";

                 }
                 
                   $query3 = "SELECT sum(total) AS totsales FROM sales_order";
                        $result3 = mysqli_query($dbc,$query3);
                        if (mysqli_num_rows($result3) > 0) {
                            $row = mysqli_fetch_array($result3);
                            echo "<br><p>Total for all Sales  = $" .number_format($row['totsales'],3). "</p>";
                        } else {
                            echo "<br><p>Total Sales Query returned no value</p>";
                        }

                 
            ?>    
      </table>
</html>