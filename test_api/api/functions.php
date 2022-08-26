<?php

function getPosts($connect)
{
    $posts = mysqli_query($connect, "SELECT * FROM `notebook`");
    $photosList = [];
    while ($post = mysqli_fetch_assoc($posts)) {
        $q["id"] = $post['id'];
        $q["fullname"] = $post['fullname'];
        $q["company"] = $post['company'];
        $q["telephone"] = $post['telephone'];
        $q["email"] = $post['email'];
        $q["dob"] = $post['dob'];
        if ($post['photo'] != "")
            $q["photo"] = base64_encode($post['photo']);
        else $q["photo"] = "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";
        $photosList[] = $q;
    }

    echo json_encode($photosList, JSON_UNESCAPED_UNICODE);
}

function getPost($connect, $id)
{
    $post = mysqli_query($connect, "SELECT * FROM `notebook` WHERE `id` = '$id'");

    if (mysqli_num_rows($post) === 0) {
        http_response_code(404);
        $res = [
            "status" => false,
            'message' => "Post not found",
        ];
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    } else {
        $post = mysqli_fetch_assoc($post);
        echo json_encode($post, JSON_UNESCAPED_UNICODE);
    }
};

function addPost($connect, $data)
{
    $fullname = $data['fullname'];
    $company = $data['company'];
    $telephone = $data['telephone'];
    $email = $data['email'];
    $dob = $data['dob'];
    $photo = $data['photo'];

    mysqli_query($connect, "INSERT INTO `notebook` (`id`, `fullname`, `company`, `telephone`, `email`, `dob`, `photo`) 
    VALUES (NULL, '$fullname', '$company', '$telephone', '$email', '$dob', '$photo')");

    http_response_code(201);

    $res = [
        "status" => true,
        'post_id' => mysqli_insert_id($connect),
    ];

    echo json_encode($res, JSON_UNESCAPED_UNICODE);
}

function deletePost($connect, $id)
{
    mysqli_query($connect, "DELETE FROM notebook WHERE `notebook`.`id` = '$id'");

    http_response_code(200);

    $res = [
        "status" => true,
        'message' => "Post is deleted",
    ];

    echo json_encode($res, JSON_UNESCAPED_UNICODE);
};
