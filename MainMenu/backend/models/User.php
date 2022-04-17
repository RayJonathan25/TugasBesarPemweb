<?php require_once '../db/db.php'; ?>

<?php function addUser(array $data)
{
    $password = password_hash($data['password'], PASSWORD_DEFAULT);
    $name = $data['name'];
    $email = $data['email'];
    $profession = $data['profession'];
    $age = $data['age'];
    $profile_pict = $data['profile_pict'];

    $query = '';
}

?>
