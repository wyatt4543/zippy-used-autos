<?php include 'header.php'; ?>
<main>
    <h2>Vehicle Class List</h2>
    <section>
        <?php if (!empty($classes)) : ?>
            <table>
                <tr>
                    <th>Name</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($classes as $class) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($class['class_name']); ?></td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="delete_class">
                            <input type="hidden" name="class_id" value="<?php echo $class['class_id']; ?>">
                            <button class="remove-button">Remove</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <p>No vehicle classes exist yet.</p>
        <?php endif; ?>
    </section>

    <section>
        <h2>Add Vehicle Class</h2>
        <form action="." method="post">
            <input type="hidden" name="action" value="add_class">
            <label>Name:</label>
            <input type="text" name="class_name" required>
            <button type="submit" class="button">Add Class</button>
        </form>
    </section>

    <p><a href="index.php">Back to Admin Vehicle List</a></p>
</main>
<?php include 'footer.php'; ?>