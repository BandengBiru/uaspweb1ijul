<?php
include 'database.php';
//data yg diedit
$q_select = "select * from tasks where taskid = '".$_GET['id']."' ";
$run_q_select= mysqli_query($conn,$q_select);
$d = mysqli_fetch_object($run_q_select);

//update
if(isset($_POST['edit'])){
    $q_update = "update tasks set tasklabel='".$_POST['task']."'where taskid ='".$_GET['id']."' ";
    $run_q_update = mysqli_fetch_object($con,$q_update);

    header('Refresh:0; url=index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,200;1,200&family=Press+Start+2P&family=Roboto:wght@400;500;700&display=swap');
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
        body{
        font-family: 'Roboto', 'sans-serif';
        background: #0F2027;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #2C5364, #203A43, #0F2027);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #2C5364, #203A43, #0F2027); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }
    .container{
       
        width: 590px;
        height: 100vh;
        margin: 0 auto;
    }
    .header{
       
        padding: 15px;
        color: white;
    }
    .header. title{
        display: flex;
        align-items: center;
        margin-bottom: 7px;
        color: white;
    }
    .title{
       
        color: white;
        display: flex;
        align-items: center;
        margin-bottom: 7px;
    }
    .title i{
        font-size: 24px;
        margin-right: 10px;
         color: white;
    }
    .title span{
        font-size: 24px;
    }
    .content{
       
        padding: 15px;
    }
    .card{
       
        background-color: white;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 10px;
    }
    .input-control{
        width: 100%;
        display: block;
        padding: 0.5rem;
        font-size: 1rem;
        margin-bottom: 10px;
    }
    .text-right{
        text-align: right;
    }
    button{
        padding: 0.5rem 1rem;
        font-size: 1rem;
        cursor: pointer;
        background: -webkit-linear-gradient(to right, #2C5364, #203A43, #0F2027);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #2C5364, #203A43, #0F2027); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        color: white;
        border: 1px solid;
        border-radius: 5px;
    }
    .task-item{
      
        display: flex;
        justify-content: space-between;
    }
    .text-orange{
        color: orange;
    }
    .text-red{
        color: red;
    }
    .task-item.done{
        text-decoration: line-through ;
        color: gray;
    }
    .description{
        color: white;
    }
    span{
        color: white;
    }
    
    </style>

</head>
<body>
  <div>
    <div class="container">
            <div class="header">
                <div class="title">
               <i class='bx bx-chevron-left'></i>
                <span>Edit</span>
                </div>
                <div class="description">
                    <?= date("l,d M Y")?>
                </div>
                
            </div>

            <div class="content">
                <div class="card">
                    <form action="" method="post">
                        <input type="text" name="task" class="input-control" placeholder="Edit task" value="<?=$d->tasklabel ?>">
                        <div class="text-right">
                            <button type="submit" name="edit">Edit</button>
                        </div>
                    </form>
                </div>
              
    </div>
  </div>
</body>
</html>