<?php include 'header.php'; ?>
<main>
    <form action="." method="get" id="make_selection">
        <select name="make_id">
            <option value="0">View All Makes</option>
            <?php foreach ($makes as $make) : ?>
                <option value="<?php echo $make['make_id']; ?>">
                    <?php echo $make['make_name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <label>Sort by: </label>
        <input type="radio" name="sort" value="price" checked> Price
        <input type="radio" name="sort" value="year"> Year
        <button type="submit">Search</button>
    </form>

    <table>
        <tr>
            <th>Year</th>
            <th>Make</th>
            <th>Model</th>
            <th>Type</th>
            <th>Class</th>
            <th>Price</th>
        </tr>
        <?php foreach ($vehicles as $vehicle) : ?>
        <tr>
            <td><?php echo $vehicle['year']; ?></td>
            <td><?php echo $vehicle['make_name']; ?></td>
            <td><?php echo $vehicle['model']; ?></td>
            <td><?php echo $vehicle['type_name']; ?></td>
            <td><?php echo $vehicle['class_name']; ?></td>
            <td>$<?php echo number_format($vehicle['price'], 2); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</main>
<?php include 'footer.php'; ?>