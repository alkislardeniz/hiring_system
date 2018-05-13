<?php
    include('config.php');
    session_start();
    $error = "";

    if (isset($_POST['add']))
    {
        if (empty($_SESSION["proposalOne"]))
        {
            $_SESSION["proposalOne"] = $_POST['add'];
        }
        elseif (empty($_SESSION["proposalTwo"]))
        {
            if ($_SESSION["proposalOne"] != $_POST['add'])
            {
                $_SESSION["proposalTwo"] = $_POST['add'];
            }
            else
                echo "Same";
        }
        else
        {
            echo "Full";
        }
    }

    if(isset($_POST['submit']))
    {
        if (!empty($_SESSION["proposalOne"]))
        {
            unset($_SESSION["proposalOne"]);
        }
        if (!empty($_SESSION["proposalTwo"]))
        {
            unset($_SESSION["proposalTwo"]);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Portakal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
    body {background-color: rgb(256, 256, 256);}
    input[class=form-control]{
        width:100%;
        background-color:#FFF;
        color:#000;
        border:2px solid #FFF;
        padding:10px;
        font-size:20px;
        cursor:pointer;
        border-radius:5px;
        margin-bottom:15px;
    }
</style>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="homepage.php">Portakal</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="login.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <h1>Comparison List</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Proposal 1</th>
            <th>Proposal 2</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Proposed price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php
                        if (!empty($_SESSION["proposalOne"]))
                        {
                            $proposalOne = $_SESSION["proposalOne"];
                            $sql = "SELECT start_date, end_date, proposed_price 
                                                    FROM proposed_services 
                                                    WHERE proposal_ID = $proposalOne";

                            $result = mysqli_query($db, $sql);
                            $error = $db->error;
                            if ($result == false) {
                                echo "$error";
                                return false;
                            }

                            while($row = mysqli_fetch_array($result))
                            {
                                echo "<td>" . $row[0] . "</td>";
                                echo "<td>" . $row[1] . "</td>";
                                echo "<td>" . $row[2] . "</td>";

                            }
                        }
                        else
                        {
                            echo "<td></td>";
                            echo "<td></td>";
                            echo "<td></td>";
                        }
                        ?>
                    </tr>
                    </tbody>
                </table>
                <form action="" method="post">
                    <div class="form-group">
                        <div class="col-sm-offset-0 col-sm-0">
                            <button type="submit" name="submit" class="btn btn-success">Accept</button>
                        </div>
                    </div>
                </form>
            </td>
            <td>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Start date</th>
                        <th>End date</th>
                        <th>Proposed price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <?php
                    if (!empty($_SESSION["proposalTwo"]))
                    {
                        $proposalTwo = $_SESSION["proposalTwo"];
                        $sql = "SELECT start_date, end_date, proposed_price 
                                                    FROM proposed_services 
                                                    WHERE proposal_ID = $proposalTwo";

                        $result = mysqli_query($db, $sql);
                        $error = $db->error;
                        if ($result == false) {
                            echo "$error";
                            return false;
                        }

                        while($row = mysqli_fetch_array($result))
                        {
                            echo "<td>" . $row[0] . "</td>";
                            echo "<td>" . $row[1] . "</td>";
                            echo "<td>" . $row[2] . "</td>";

                        }
                    }
                    else
                    {
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                    }
                    ?>
                    </tr>
                    </tbody>
                </table>
                <form action="" method="post">
                    <div class="form-group">
                        <div class="col-sm-offset-0 col-sm-0">
                            <button type="submit" name="submit" class="btn btn-success">Accept</button>
                        </div>
                    </div>
                </form>
            </td>
        </tr>
        </tbody>
    </table>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Professional 1</th>
            <th>Professional 2</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Address</th>
                        <th>Experience</th>
                        <th>Expertise Field</th>
                        <th>Rating</th>
                    </tr>
                    </thead>
                    <tbody id="myTable">
                    <tr>
                        <td>Buğra</td>
                        <td>a@a.com</td>
                        <td>Ankara</td>
                        <td>5 years</td>
                        <td>Car repair</td>
                        <td>6/10</td>
                    </tr>
                    </tbody>
                </table>
            </td>
            <td>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Address</th>
                        <th>Experience</th>
                        <th>Expertise Field</th>
                        <th>Rating</th>
                    </tr>
                    </thead>
                    <tbody id="myTable">
                    <tr>
                        <td>Buğra</td>
                        <td>a@a.com</td>
                        <td>Ankara</td>
                        <td>5 years</td>
                        <td>Car repair</td>
                        <td>6/10</td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
    <form action="" method="post">
    <div class="form-group">
        <div class="col-sm-offset-0 col-sm-0">
            <button type="submit" name="submit" class="btn btn-danger">Clear the list</button>
        </div>
    </div>
</div>
</body>
</html>