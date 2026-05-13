<?php
include "db.php";

$id = $_GET["id"];

$taskQuery = mysqli_query($conn,
    "SELECT * FROM tasks WHERE id = $id");

$task = mysqli_fetch_assoc($taskQuery);

$users = mysqli_query($conn,
    "SELECT * FROM users");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST["title"];
    $user_id = $_POST["user_id"];

    $sql = "
    UPDATE tasks
    SET title='$title',
        user_id='$user_id'
    WHERE id=$id
    ";

    mysqli_query($conn, $sql);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h1>Edit úlohy</h1>

<form method="POST">

<input type="text"
       name="title"
       value="<?php echo $task['title']; ?>">

<br>

<select name="user_id">

<?php while($user = mysqli_fetch_assoc($users)) : ?>

<option value="<?php echo $user['id']; ?>"

<?php
if($user['id'] == $task['user_id']) {
    echo "selected";
}
?>

>

<?php echo $user['username']; ?>

</option>

<?php endwhile; ?>

</select>

<br>

<button type="submit">
Uložiť
</button>

</form>

</div>

</body>
</html>