<?php
include 'database.php';
if(isset($_POST['add'])){
    $q_insert = "insert into tasks (tasklabel,taskstatus) value(
        '".$_POST['task']."',
        'open'
    )";
    $run_q_insert = mysqli_query($conn,$q_insert);
    if($run_q_insert){
        header('Refresh:0; url=index.php');
    }
}
//data
$q_select = "select * from tasks order by taskid desc";
$run_q_select= mysqli_query($conn,$q_select);

//delete
if (isset($_GET['delete'])){
    $q_delete = "delete from tasks where taskid ='".$_GET['delete']."'";
    $run_q_delete = mysqli_query($conn,$q_delete);

    header('Refresh:0 url=index.php');
}
//update
if (isset($_GET['done'])){
    $status = 'close';

if($_GET['status'] == 'open'){
        $status = 'close';
}else {
    $status = 'open';
}
$q_update = "update tasks set taskstatus = '".$status."'where taskid= '".$_GET['done']."'";
$run_q_update = mysqli_query($conn,$q_update);
header('Refresh:0 url=index.php');

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
    .title{
       
        color: white;
        display: flex;
        align-items: center;
        margin-bottom: 7px;
    }
    .title i{
        font-size: 24px;
        margin-right: 10px;
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
    
    </style>

</head>
<body>
  <div>
    <div class="container">
            <div class="header">
                <div class="title">
                <i class='bx bx-sun'></i>
                <span>To Do List</span>
                </div>
                <div class="description">
                    <?= date("l,d M Y")?>
                </div>
                
            </div>

            <div class="content">
                <div class="card">
                    <form action="" method="post">
                        <input type="text" name="task" class="input-control" placeholder="Add task">
                        <div class="text-right">
                            <button type="submit" name="add">Add</button>
                        </div>
                    </form>
                </div>
              
                <?php
                if(mysqli_num_rows($run_q_select)>0){
                while ($r = mysqli_fetch_array($run_q_select)){
                ?>
                <div class="card">
                    <div class="task-item <?=$r['taskstatus'] == 'close' ? 'done' : ''?>">
                        <div>
                            <input type="checkbox" onclick="window.location.href='?done=<?=$r['taskid']?>&status=<?=$r['taskstatus']?>'" <?=$r['taskstatus'] == 'close'? 'checked' : ''?>>
                            <span> <?= $r['tasklabel']?> </span>
                        </div>
                        <div>
                            <a href="edit.php?id=<?=$r['taskid']?>"class="text-orange" title="Edit"><i class="bx bx-edit"></i></a>
                            <a href="?delete=<?=$r['taskid']?>"class="text-red" title="Remove" onclick="return confirm('hapus list ini?')"><i class="bx bx-trash"></i></a>
                        </div>
                    </div>
                </div>
               <?php }} else {?>
                <div>Belum ada Task</div>
            <?php  }?>
    </div>
  </div>
</body>
</html>