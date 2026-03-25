<?php include 'header.php'; ?>

<main>
    <h2>Vehicle Make List</h2>
    <section>
        <?php if (!empty($makes)) : ?>
            <table>
                <tr>
                    <th>Name</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($makes as $make) : ?>
                <tr>
                    <td><?php echo $make['make_name']; ?></td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="action" value="delete_make">
                            <input type="hidden" name="make_id" value="<?php echo $make['make_id']; ?>">
                            <button class="remove-button">Remove</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <p>No vehicle makes exist yet.</p>
        <?php endif; ?>
    </section>

    <section>
        <h2>Add Vehicle Make</h2>
        <form action="." method="post">
            <input type="hidden" name="action" value="add_make">
            
            <label>Name:</label>
            <input type="text" name="make_name" required>
            
            <button class="add-button">Add Make</button>
        </form>
    </section>

    <p><a href="index.php">Back to Admin Vehicle List</a></p>
</main>

<?php include 'footer.php'; ?>