<?php

namespace MVCFramework\Model;

abstract class AbstractModel implements ORMInterface, FormValidatorInterface
{
    protected $database; // Assuming you have a database connection object

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function find(int $id): array
    {
        // Assuming 'your_table' is the table name
        $query = "SELECT * FROM your_table WHERE id = :id";
        $params = [':id' => $id];

        // Execute the query and fetch the result
        $result = $this->database->execute($query, $params);

        // Return the data as an associative array
        return $result->fetch(\PDO::FETCH_ASSOC);
    }

    public function save(array $data): void
    {
        // Assuming 'your_table' is the table name
        $fields = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));

        // Build the SQL query
        $query = "INSERT INTO your_table ($fields) VALUES ($values)";

        // Execute the query with the provided data
        $this->database->execute($query, $data);
    }

    abstract public function validateForm(array $formData): bool;
}
