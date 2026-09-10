<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f3e8ff;
            color: #222;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 50px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        h1 {
            margin: 0;
            font-size: 32px;
            color: #6a1b9a;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .add-btn {
            background: #7b1fa2;
            color: white;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 6px;
            font-weight: bold;
        }

        .add-btn:hover {
            background: #6a1b9a;
        }

        .logout-btn {
            background: #d32f2f;
            color: white;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 6px;
            font-weight: bold;
        }

        .logout-btn:hover {
            background: #b71c1c;
        }

        .table-wrapper {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #7b1fa2;
            color: white;
            padding: 14px;
            text-align: left;
        }

        td {
            padding: 13px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background: #f3e5f5;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777;
        }

        .edit {
            color: #7b1fa2;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
        }

        .delete {
            color: #d32f2f;
            text-decoration: none;
            font-weight: bold;
        }
        .actions{
    white-space: nowrap;
    min-width: 120px;
}

.edit{
    display:inline;
    margin-right:8px;
}

.delete{
    display:inline;
}
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <div class="header-left">
            <h1>Product Management</h1>
        </div>

        <div class="header-right">

            <a href="<?= site_url('products/create'); ?>" class="add-btn">
                + Add Product
            </a>

            <a href="<?= site_url('auth/logout'); ?>"
   class="logout-btn"
   onclick="return confirm('Are you sure you want to logout?');">
    Logout
</a>

        </div>

    </div>

    <div class="table-wrapper">

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                <?php if (!empty($products)): ?>

                    <?php foreach ($products as $product): ?>

                        <tr>

                            <td><?= $product['id']; ?></td>

                            <td>
                                <?= htmlspecialchars($product['product_name']); ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($product['description']); ?>
                            </td>

                            <td>
                                ₱<?= number_format($product['price'], 2); ?>
                            </td>

                            <td>
                                <?= $product['quantity']; ?>
                            </td>

                            <td>
                                <?= $product['created_at']; ?>
                            </td>

                            <td class="actions">

    <a href="<?= site_url('products/edit/' . $product['id']); ?>" class="edit">
        Edit
    </a>

    |

    <a href="<?= site_url('products/delete/' . $product['id']); ?>"
       class="delete"
       onclick="return confirm('Are you sure you want to delete this product?');">
        Delete
    </a>

</td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>
                        <td colspan="7" class="empty">
                            No products found.
                        </td>
                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>