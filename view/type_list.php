<?php include '../view/header.php'; ?>
<main>
    <h2>Vehicle Type List</h2>
    <table>
        <tr><th>Name</th><th>&nbsp;</th></tr>
        <?php foreach ($types as $type) : ?>
        <tr>
            <td><?php echo $type['type_name']; ?></td>
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_type">
                    <input type="hidden" name="type_id" value="<?php echo $type['type_id']; ?>">
                    <button class="remove-button">Remove</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Add Vehicle Type</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="add_type">
        <label>Name:</label>
        <input type="text" name="type_name" required>
        <button type="submit">Add Type</button>
    </form>
    <p><a href="index.php">Back to Admin</a></p>
</main>
<?php include '../view/footer.php'; ?>