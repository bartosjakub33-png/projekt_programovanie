<?php
include "db.php";

$users = mysqli_query($conn, "SELECT * FROM users");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = trim($_POST["title"]);
    $user_id = $_POST["user_id"];

    if (!empty($title)) {

        $sql = "INSERT INTO tasks(title, user_id)
                VALUES ('$title', '$user_id')";

        mysqli_query($conn, $sql);

        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h1>Pridať úlohu</h1>

<form method="POST">

    <input type="text"
           name="title"
           placeholder="Názov úlohy"
           required>

    <br>

    <select name="user_id">

        <?php while($user = mysqli_fetch_assoc($users)) : ?>

            <option value="<?php echo $user['id']; ?>">
                <?php echo $user['username']; ?>
            </option>

        <?php endwhile; ?>

    </select>

    <br>

    <button type="submit">
        Pridať
    </button>

</form>

</div>

</body>
</html>