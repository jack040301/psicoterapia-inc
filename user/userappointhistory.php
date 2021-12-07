<?php



include('db_psicoterapia.php');

  

//PAGES



  $records = mysqli_query($conn,"SELECT * FROM tbl_appts LEFT JOIN tbl_employee on tbl_appts.docID = tbl_employee.id WHERE userID='{$_SESSION['userID']}'"); 



  $num = mysqli_num_rows($records);

  $numberPages = 5;

  $totalpages = ceil($num/$numberPages);

 



    if(isset($_GET['page'])){

            $page = $_GET['page'];

           



    }else{

        $page = 1;

    }



    //END OF PAGES



 $startingpagelimit= ($page-1) * $numberPages;

 $previous_page = $page - 1;

 $next_page = $page + 1;

 //QUERY FOR TABLES



  if($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['btnSearch'])) { 

    $search = $_POST['search'];



    

    $records =mysqli_query($conn, "SELECT * FROM tbl_appts LEFT JOIN tbl_employee on tbl_appts.docID = tbl_employee.id  WHERE userID='{$_SESSION['userID']}' and (date LIKE '%$search%' or tbl_appts.time LIKE '%$search%' or tbl_employee.lastname LIKE '%$search%' or tbl_employee.firstname LIKE '%$search%') ORDER BY date ASC LIMIT $startingpagelimit,$numberPages ");

    



  }

    else {

    $records =mysqli_query($conn, "SELECT * FROM tbl_appts LEFT JOIN tbl_employee on tbl_appts.docID = tbl_employee.id WHERE userID='{$_SESSION['userID']}' ORDER BY date ASC LIMIT $startingpagelimit,$numberPages");

    } 

   //END OF QUERY

  

 //SHOWING THE DATA

   

  while($row= mysqli_fetch_array($records)){

      $doctors_name = $row['time'];

      $profession = $row['date'];

      $time = $row['lastname'];

      $first = $row['firstname'];



      echo' <tr>

      <th scope="row">'.$doctors_name.'</th>

      <td>'.$profession.'</td>

      <td>'.$time.' , '.$first.'</td>

   

    </tr>';

  }



  //END OF SHOWING THE DATA

  ?>