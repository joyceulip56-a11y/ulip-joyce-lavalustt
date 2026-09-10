<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Product</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f3e8ff;
            margin: 0;
            padding: 40px;
            color: #2e1065;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(123, 31, 162, 0.15);
            border: 1px solid #e9d5ff;
        }

        h1 {
            margin-top: 0;
            margin-bottom: 25px;
            text-align: center;
            color: #7b1fa2;
            font-size: 30px;
            font-weight: 700;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #6a1b9a;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 18px;
            border: 1px solid #d8b4fe;
            border-radius: 6px;
            font-size: 14px;
            background: #ffffff;
            color: #2e1065;
            outline: none;
        }

        input:focus,
        textarea:focus {
            border-color: #7b1fa2;
            box-shadow: 0 0 0 2px rgba(123, 31, 162, 0.15);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 3px;
        }

        button {
            border: none;
            padding: 11px 18px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
        }

        .save-btn {
            background: #7b1fa2;
            color: white;
        }

        .save-btn:hover {
            background: #6a1b9a;
        }

        .back-btn {
            background: #ffffff;
            color: #6a1b9a;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 6px;
            border: 1px solid #d8b4fe;
            font-weight: 600;
        }

        .back-btn:hover {
            background: #f3e8ff;
            border-color: #7b1fa2;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>Edit Product</h1>

    <?php if (!empty($product)): ?>

        <form
            action="<?= site_url('products/update/' . $product['id']); ?>"
            method="POST"
        >

            <label for="product_name">
                Product Name
            </label>

            <input
                type="text"
                id="product_name"
                name="product_name"
                value="<?= htmlspecialchars($product['product_name']); ?>"
                required
            >

            <label for="description">
                Description
            </label>

            <textarea
                id="description"
                name="description"
                required
            ><?= htmlspecialchars($product['description']); ?></textarea>

            <label for="price">
                Price
            </label>

            <input
                type="number"
                id="price"
                name="price"
                step="0.01"
                min="0"
                value="<?= htmlspecialchars($product['price']); ?>"
                required
            >

            <label for="quantity">
                Quantity
            </label>

            <input
                type="number"
                id="quantity"
                name="quantity"
                min="0"
                value="<?= htmlspecialchars($product['quantity']); ?>"
                required
            >

            <div class="buttons">

                <button
                    type="submit"
                    class="save-btn"
                >
                    Update Product
                </button>

                <a
                    href="<?= site_url('products'); ?>"
                    class="back-btn"
                >
                    Back
                </a>

            </div>

        </form>

    <?php else: ?>

        <p>Product not found.</p>

        <a
            href="<?= site_url('products'); ?>"
            class="back-btn"
        >
            Back to Products
        </a>

    <?php endif; ?>

</div>

</body>

</html>