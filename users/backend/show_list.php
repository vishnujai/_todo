<?php

if(isset($_GET['id']))
{
include("../../connection.php");
$db = new DataBase('app_todo');
$id = $_GET['id'];
$sql = "SELECT * FROM todo_list WHERE id = $id";
$data =[];
$result = $db->conn->query($sql);
if($result->num_rows >0)
{
 $data[] =  $result->fetch_assoc();
}
else
{
    $_SESSION['user']['errors'][] = "No Data Found !"; 
    header("Location: ../dashbord.php");
    exit;
}

}
else
{
    $_SESSION['user']['errors'][] = "ID is required."; 
    header("Location: ../dashbord.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<!-- <h2>Create a Todo Item</h2> -->

<div class="container">
<h1 class="text-center text-primary" >Update Todo List </h1>

<form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $data[0]['id'] ?>">

    <label for="heading"><b>Heading</b></label>
    <input type="text" id="heading" name="heading" class="form-control p-3" required maxlength="255" value="<?php echo $data[0]['heading'] ?>">

    <label for="description"><b>Description</b></label>
    <textarea id="description" name="description" class="form-control p-3" rows="4"><?php echo $data[0]['description'] ?></textarea>

    <label for="priority"><b>Priority</b></label>
    <select id="priority" name="priority" class="form-control p-3 ">
        <option value="low" <?php if($data[0]['priority'] =='low')  echo "selected" ?>>Low</option>
        <option value="medium" <?php if($data[0]['priority'] =='medium')  echo "selected" ?>>Medium</option>
        <option value="high"  <?php if($data[0]['priority'] =='high')  echo "selected" ?>>High</option>
    </select>

    <label for="due_date"> <b>Due Date</b></label>
    <input type="date" id="due_date" name="due_date" class="form-control p-3" value="<?php echo $data[0]['due_date'] ?>">

    <div class="button-container  justify-content: center;">
        <button type="submit" class="btn-primary text-center m-4"><b>Submit</b> </button>
        <button type="reset" class="btn-primary text-center m-4"><b>Reset</b></button>
    </div>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>