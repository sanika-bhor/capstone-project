<!DOCTYPE html>
<html>

<head>
    <title>Appointment Data</title>

    <!-- font awasome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!-- css files  -->
    <link rel="stylesheet" href="./style.css" />

    <!-- sanika link start-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" />
    <script type="text/JavaScript"
        src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox-plus-jquery.min.js"></script>

    <!-- sanika link end-->

    <style>
        body {
            margin: 1rem;

        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5rem;
            font-size: 1.2rem;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: rgb(248, 237, 242);
            font-size: 1.3rem;
        }

        tr:nth-child(even) {
            background-color: rgb(248, 237, 242);
        }

        /*CSS for new entry animation */
        tr.new-entry {
            background-color: rgb(202, 138, 201);
            /* Change the background color for new entries */
        }
    </style>
</head>

<body>

    <!-- header section start  -->
    <header class="header">
        <a href="#" class="logo">
            <img src="./imgs/logo.png" alt="">
            SHIV<span> Diagnostic Center</span></a>

        <nav class="navbar">
            <a href="./admin_login.html">home</a>
            <a href="./admin_login.html">about</a>
            <a href="./admin_login.html">services</a>
            <a href="./admin_login.html">doctors</a>
            <a href="./admin_login.html">gallery</a>
            <a href="./admin_login.html">reviews</a>
            <a href="./admin_login.html">book</a>
        </nav>


        <a href="./logout.php" class="btn1">logout</a>

        <div id="menu-btn" class="fa-solid fa-bars"></div>



    </header>
    <!-- header section end  -->
    
    <div id="body">
        <div id="left">

            <br /><br />
        </div>
    </div>
    <?php

    include("config2.php");
    //execute the SQL query and return records
    $result = mysqli_query($con, "SELECT * FROM book_App");
    ?>
    <table>
        <thead>
            <tr>
                <th>Sr.No.</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Email_Id</th>
                <th>Date</th>
                <th>Delete Record</th>
            </tr>
        </thead>
        <tbody>
            <?php

            while ($row = mysqli_fetch_assoc($result)) {
                echo
             "<tr>
              <td >{$row['Id']}</td>
              <td>{$row['Name']}</td>
              <td>{$row['Contact']}</td>
              <td>{$row['Email_id']}</td>
              <td>{$row['date_app']}</td>
            <td><i class='fas fa-times'  onClick='delete_appointment({$row['Id']})'></i></td> 
              </tr>";
            }
            ?>
    <tr class='new-entry'> <td>New ID</td> <td>New Name</td> <td>New Contact</td> <td>New Email</td> <td>New Date</td> <td>Delete Record</td></tr>

        </tbody>
    </table>

    <br /><br />

    <script>
        // Function to add a new row 
        // function addNewRow() {
        //     var newRowHtml = "<tr class='new-entry'> <td>New ID</td> <td>New Name</td> <td>New Contact</td> <td>New Email</td> <td>New Date</td> <td>Delete Record</td></tr>";
        //     document.querySelector('tbody').innerHTML += newRowHtml;
        // }

        // Call addNewRow function when a new entry is added to the database
        // addNewRow();

        function delete_appointment(id) {
  var confirmation = confirm("Are you sure you want to delete this record?");
  if (confirmation) {
    window.location.href = "delete.php?id=" + id;
  }
}

    </script>

</body>

</html>