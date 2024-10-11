<?php
require_once './product/view/partials/header.php';
?>

<main>
    <form method="POST" action="http://localhost:8888/esd-oop-php-main/product-created">
        <label for="productName">Product Name (3 to 100 characters)</label>
        <input type="text" id="productName" name="productName" required pattern="^[a-zA-Z0-9\s.-]{3,100}$" title="Product's name must be between 3 to 100 characters">
        <br>
        <label for="description">Product description</label>
        <textarea name="description" id="description" required></textarea>
        <br>
        <label for="price">Product price (Between $1 to $500 ... if not referred, product's price will be set at $2)</label>
        <input type="number" id="price" name="price" max="500" value="0">
        <br>
        <div><input type="checkbox" id="active" name="active" value="active">
            <label for="active">Is your product active?</label>
        </div>
        <br>
        <button type="submit">Add</button>
    </form>
</main>

<?php
require_once './product/view/partials/footer.php';
