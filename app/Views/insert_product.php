<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="<?=base_url('insertproducts/')?>">
        <label for="nama_product">Nama Product</label>
        <input name="nama_product" id="nama_product" type="text" required></input>
        <label for="deskripsi_product">Deskripsi Product</label>
        <input name="description" id="description" type="text" required></input>
        <button type="submit">Insert</button>
    </form>
</body>
</html>