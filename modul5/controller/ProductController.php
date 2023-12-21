<?php

require_once 'Controller.php';

class ProductController extends Controller
{
    public function create($data)
    {
        $name = $data['name'];
        $description = $data['description'];

        $sql = "INSERT INTO products (name, description) VALUES ('$name', '$description')";
        $result = $this->db->getConnection()->query($sql);

        if ($result) {
            return ['message' => 'Product created successfully'];
        } else {
            return ['error' => 'Failed to create product'];
        }
    }

    public function read()
    {
        $sql = "SELECT * FROM products";
        $result = $this->db->getConnection()->query($sql);

        $products = [];

        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }

        return $products;
    }

    public function update($data)
    {
        $id = $data['id'];
        $name = $data['name'];
        $description = $data['description'];

        $sql = "UPDATE products SET name='$name', description='$description' WHERE id=$id";
        $result = $this->db->getConnection()->query($sql);

        if ($result) {
            return ['message' => 'Product updated successfully'];
        } else {
            return ['error' => 'Failed to update product'];
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE id=$id";
        $result = $this->db->getConnection()->query($sql);

        if ($result) {
            return ['message' => 'Product deleted successfully'];
        } else {
            return ['error' => 'Failed to delete product'];
        }
    }
}
