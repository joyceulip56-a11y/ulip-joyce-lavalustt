<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f3e8ff;
            margin: 0;
            padding: 40px;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(123, 31, 162, 0.15);
            border: 1px solid #d8b4fe;
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
            padding: 12px;
            margin-bottom: 18px;
            border: 1px solid #c084fc;
            border-radius: 6px;
            font-size: 14px;
            background: #ffffff;
            color: #333;
            outline: none;
        }

        input:focus,
        textarea:focus {
            border-color: #7b1fa2;
            box-shadow: 0 0 0 3px rgba(123, 31, 162, 0.15);
        }

        input::placeholder,
        textarea::placeholder {
            color: #999;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 5px;
        }

        button {
            border: none;
            padding: 12px 18px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .save-btn {
            background: #7b1fa2;
            color: white;
        }

        .save-btn:hover {
            background: #6a1b9a;
        }

        .back-btn {
            background: white;
            color: #7b1fa2;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 6px;
            border: 1px solid #c084fc;
            font-weight: bold;
        }

        .back-btn:hover {
            background: #f3e8ff;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Add Product</h1>

    <form action="<?= site_url('products/store'); ?>" method="POST">

        <label>Product Name</label>
        <input type="text" name="product_name" placeholder="Enter product name" required>

        <label>Description</label>
        <textarea name="description" placeholder="Enter product description" required></textarea>

        <label>Price</label>
        <input type="number" name="price" step="0.01" min="0" placeholder="0.00" required>

        <label>Quantity</label>
        <input type="number" name="quantity" min="0" placeholder="Enter quantity" required>

        <div class="buttons">
            <button type="submit" class="save-btn">Save Product</button>
            <a href="<?= site_url('products'); ?>" class="back-btn">Back</a>
        </div>

    </form>

</div>

</body>
</html>