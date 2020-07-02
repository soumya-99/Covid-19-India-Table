<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON Covid19India.org API</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
</head>
<body>
    <div class="container table-responsive">
        <div class="jumbotron text-center">
            <h1>Covid-19-India Table</h1>
        </div>
    </div>
    
    <div class="container">

    <table class="table table-striped table-bordered table-sm" id="myTable" style="text-align: center;">
    
    <thead>
        <tr>
            <th style="color: violet;">States</th>
            <th class="text-warning">Confirmed</th>
            <th class="text-info">Active</th>
            <th class="text-success">Recovered</th>
            <th class="text-danger">Deaths</th>
        </tr>
    </thead>
        
        <tbody>

        <?php
        $data = file_get_contents('https://api.covid19india.org/data.json');
        $data_decode = json_decode($data, true);


        // print_r($data_decode);


        // echo $data_decode['statewise'][1]['state'];

        $TotalStates = count($data_decode['statewise']);

        $i = 1;
        while($i < $TotalStates)
        {
            ?>

            <tr>
                <td><?php echo $data_decode['statewise'][$i]['state']?></td>
                <td><?php echo $data_decode['statewise'][$i]['confirmed']?></td>
                <td><?php echo $data_decode['statewise'][$i]['active']?></td>
                <td><?php echo $data_decode['statewise'][$i]['recovered']?></td>
                <td><?php echo $data_decode['statewise'][$i]['deaths']?></td>
            </tr>


            <!-- echo $data_decode['statewise'][$i]['state'];
            echo $data_decode['statewise'][$i]['confirmed'];
            echo $data_decode['statewise'][$i]['active'];
            echo $data_decode['statewise'][$i]['recovered'];
            echo $data_decode['statewise'][$i]['deaths']; -->

    <?php
            $i++;
        }
    ?>

    </tbody>


    </table>
    </div>


    <script>
        $(document).ready(function(){
            $('#myTable').DataTable();
        })
    </script>
</body>
</html>