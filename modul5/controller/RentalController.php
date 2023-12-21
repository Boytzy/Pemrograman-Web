<?php

namespace modul52\controller;

include "../modul52/config/config.php";

use Database;

class RentalController
{
    private $db;

    public function __construct()
    {
        // Sediakan detail koneksi database yang diperlukan
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "modul5";

        // Koneksi ke database
        $this->db = new Database($host, $username, $password, $database);
    }


public function index()
{
    // Implementasi operasi READ dengan INNER JOIN
    $sql = "SELECT rentals.id, products.name AS product_name, rentals.start_date, rentals.end_date
            FROM rentals
            INNER JOIN products ON rentals.product_id = products.id";
    $result = $this->db->getConnection()->query($sql);

    $rentals = [];

    while ($row = $result->fetch_assoc()) {
        $rentals[] = $row;
    }

    return json_encode($rentals);
}


    public function getById($id)
    {
        // Implementasi operasi READ berdasarkan ID
        $sql = "SELECT * FROM rentals WHERE id=$id";
        $result = $this->db->getConnection()->query($sql);

        if ($result->num_rows > 0) {
            $rental = $result->fetch_assoc();
            return json_encode($rental);
        } else {
            return json_encode(['error' => 'Rental not found']);
        }
    }

    public function insert()
    {
        // Implementasi operasi CREATE
        $data = json_decode(file_get_contents("php://input"), true);
        $product_id = $data['product_id'];
        $start_date = $data['start_date'];
        $end_date = $data['end_date'];

        $sql = "INSERT INTO rentals (product_id, start_date, end_date) VALUES ($product_id, '$start_date', '$end_date')";
        $result = $this->db->getConnection()->query($sql);

        if ($result) {
            return json_encode(['message' => 'Rental created successfully']);
        } else {
            return json_encode(['error' => 'Failed to create rental']);
        }
    }

    public function update($id)
    {
        // Implementasi operasi UPDATE
        $data = json_decode(file_get_contents("php://input"), true);
        $product_id = $data['product_id'];
        $start_date = $data['start_date'];
        $end_date = $data['end_date'];

        $sql = "UPDATE rentals SET product_id=$product_id, start_date='$start_date', end_date='$end_date' WHERE id=$id";
        $result = $this->db->getConnection()->query($sql);

        if ($result) {
            return json_encode(['message' => 'Rental updated successfully']);
        } else {
            return json_encode(['error' => 'Failed to update rental']);
        }
    }

    public function delete($id)
    {
        // Implementasi operasi DELETE
        $sql = "DELETE FROM rentals WHERE id=$id";
        $result = $this->db->getConnection()->query($sql);

        if ($result) {
            return json_encode(['message' => 'Rental deleted successfully']);
        } else {
            return json_encode(['error' => 'Failed to delete rental']);
        }
    }
}
