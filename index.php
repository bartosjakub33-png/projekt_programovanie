<?php
include "db.php";

$query = "
SELECT tasks.id, tasks.title, users.username
FROM tasks
LEFT JOIN users ON tasks.user_id = users.id";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>TODO APP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h1>TODO LIST</h1>

<a href="create.php">Pridať úlohu</a>

<hr>

<?php while($row = mysqli_fetch_assoc($result)) : ?>

<p>
    <b><?php echo $row['title']; ?></b>
    -
    <?php echo $row['username']; ?>

    <a href="edit.php?id=<?php echo $row['id']; ?>">
        Edit
    </a>

    <a href="delete.php?id=<?php echo $row['id']; ?>">
        Delete
    </a>
</p>

<?php endwhile; ?>

</div>

</body>
</html>